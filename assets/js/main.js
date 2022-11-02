const modules = {
    SearchCountry: require('./module/search-bloc'),
}

// Main Object
const Site = function () {
    // Modules init    
    for (const key in modules) {                   
            try {                
                this[key] = new modules[key];
            } catch(err) {                
                console.log(key, err);
            }       
        }
};
new Site();