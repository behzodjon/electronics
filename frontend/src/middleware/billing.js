export default function billing({ next, store }) {
    if (!store.state.cart.items.length) {
        return false
    } else if (!store.state.user.token) {
        return next({ name: "Login", query: { redirect: '/cart-info' } });
    } else {
        return next()
    }

}