export default function auth({ next, store }) {
    console.log("da")
    if (!store.state.user.token) {
        return next({ name: "Login", query: { redirect: '/cart-info' } });
    }
    return next()
}