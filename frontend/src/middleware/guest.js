export default function guest ({ next, store }){
    if(store.getters['user/isAuthenticated']){
        return next({
           name: 'Home'
        })
    }
   
    return next()
   }