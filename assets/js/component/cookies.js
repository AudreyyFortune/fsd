export function setCookie(cname, cvalue, exdays = 0, path = '/') 
    {    
        let d = new Date();
        let expires = "";
        
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