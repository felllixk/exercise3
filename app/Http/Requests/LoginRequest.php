<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email'         => ['required', 'email'],
            'password'      => ['required'],
            'remember_me'   => ['required', 'boolean', 'sometimes'],
        ];
    }


    /**
     * Аутентификация пользователя
     *
     * @return void
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->validated();
        if (!Auth::attempt($credentials, $credentials['remember_me'] ?? false)) {

            RateLimiter::hit($this->throttleKey()); // Регистрируем неудачную попытку

            throw ValidationException::withMessages([
                trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey()); // Очищаем попытки в случае удачной аутентификации
    }

    /**
     * Проверяем что не достигнут максимум неудачных попыток.
     *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Генерация уникального ключа попытки.
     *
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('email')) . '|' . $this->ip();
    }
}
