export default function isAdmin ({ next, store }){
    if(!store.getters['user/isAdmin']){
        return next({
           name: 'Login'
        })
    }
    return next()
   }