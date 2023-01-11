import AuthGuards from "./auth/guards";

const guards = [AuthGuards];

export default function registerGuards(router) {
    guards.forEach((moduleGuards) => {
        moduleGuards.forEach((guard) => {
            router.beforeEach(guard);
        });
    });
}
