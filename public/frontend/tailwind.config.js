/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./public/**/*.html", "./src/**/*.{vue,js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors: {
        "dark-sky": "#033A63",
        "light-sky": "#4CA4E8",
        ocean: "#0784E3",
        "moon-sky": "#214763",
        "dark-blue": "#0668B3",
      },
    },
  },
  plugins: [],
};
