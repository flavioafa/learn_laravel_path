import User from "@/Models/User"
import { router } from "@inertiajs/vue3"

export function useCurrentUser() {
    return new User(router.page.props.auth.user)
}
