<template>
    <div class="svg-component">
        <div class="landscape">
            <svg
                class="sun"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 375 374.5"
            >
                <circle
                    class="sun-circle"
                    cx="187.5"
                    cy="187"
                    r="77"
                    fill="gold"
                />
                <path
                    class="sun-rays"
                    fill="none"
                    stroke="gold"
                    stroke-miterlimit="0"
                    stroke-width="10"
                    d="M187.5 100V0M187.5 374.5v-100M275 187h100M0 187h100M252.1 121.4l70.7-70.7M52.1 326.6l70.7-70.7M122.5 122L51.8 51.3M323.5 323l-70.7-70.7"
                />
            </svg>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style>
.svg-component {
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.sun-rays {
    animation: 2s rotate-rays infinite ease-in-out alternate;
}

@keyframes rotate-rays {
    0% {
        transform: rotate(0deg);
        transform-origin: 50% 50%;
    }
    100% {
        transform: rotate(360deg);
        transform-origin: 50% 50%;
    }
}

.sun {
    height: 80vh;
}
</style>
