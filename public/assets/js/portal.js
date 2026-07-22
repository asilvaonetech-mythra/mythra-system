/*
|--------------------------------------------------------------------------
| MYTHRA PORTAL
| Navegação dos Domínios
|--------------------------------------------------------------------------
*/


document.addEventListener("DOMContentLoaded",()=>{


    const modules = {


        "module-core":
        "/portal/core",


        "module-talent":
        "/portal/talent",


        "module-business":
        "/portal/business",


        "module-vision":
        "/portal/vision",


        "module-insight":
        "/portal/insight",


        "module-academy":
        "/portal/academy",


        "module-essence":
        "/portal/essence",


        "module-marketing":
        "/portal/marketing",


        "module-nexus":
        "/portal/nexus",


        "module-enterprise":
        "/portal/enterprise"


    };




    Object.keys(modules).forEach(module=>{


        const element =
            document.querySelector(
                "." + module
            );



        if(!element)
            return;



        element.addEventListener(
            "click",
            ()=>{


                window.location.href =
                    modules[module];


            }
        );



    });



});