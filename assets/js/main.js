
// const components = {
//     Cookies: require('./component/cookies')
// }

const modules = {
    SearchCountry: require('./module/search-bloc'),
    //ProductPrice: require('./module/product-price')
}
console.log(modules);



// Main Object
const Site = function () {    
    // // Component init    
    // for (const key in components) {
    //     try {
    //         this[key] = new components[key];
    //         console.log(key)
    //     } catch (err) {
    //         console.log(key, err);
    //     }
    // }
    // Modules init    
    for (const key in modules) {                   
            try {                
                this[key] = new modules[key];    
                console.log(key) 
            } catch(err) {                
                console.log(key, err);            
            }       
        }
};
new Site();



console.log('exit')