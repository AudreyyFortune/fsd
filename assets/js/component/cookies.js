export function setCookie(cname, cvalue, exdays = 0, path = '/') 
    {    
        var d = new Date();    
        var expires = "";    
        
        console.log(expires);

        if(exdays > 0) {        
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));        
            expires = "expires=" + d.toUTCString() + ";";    
            console.log("expires",expires);
        }    
        if(cvalue instanceof Object) {        
            cvalue = JSON.stringify(cvalue)    
        }    
        
        console.log(document.cookie = cname + "=" + cvalue + ";" + expires + "path=" + path + ";")
    }


// function setCookie(cname, cvalue, exdays) {
//     const d = new Date();
//     d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
//     let expires = "expires=" + d.toUTCString();
//     document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
// }