/*
|--------------------------------------------------------------------------
| MYTHRA PORTAL
| Navegação + Estado do Ecossistema
|--------------------------------------------------------------------------
*/


document.addEventListener("DOMContentLoaded",()=>{


    /*
    |--------------------------------------------------------------------------
    | NAVEGAÇÃO DOS MÓDULOS
    |--------------------------------------------------------------------------
    */


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





    /*
    |--------------------------------------------------------------------------
    | MYTHRA STATE ENGINE
    |--------------------------------------------------------------------------
    */


    loadMythraState();



});






/*
|--------------------------------------------------------------------------
| Carrega estado do Ecossistema Mythra
|--------------------------------------------------------------------------
*/


function loadMythraState(){



    fetch("/portal/state")


        .then(response=>response.json())


        .then(data=>{


            console.log(
                "Mythra State:",
                data
            );



            applyModuleState(data);



        })


        .catch(error=>{


            console.error(
                "Erro ao carregar estado Mythra:",
                error
            );


        });


}






/*
|--------------------------------------------------------------------------
| Aplica estado nos módulos
|--------------------------------------------------------------------------
*/


function applyModuleState(data){



    if(!data.modules)
        return;



    Object.keys(data.modules)
        .forEach(module=>{


            const element =
                document.querySelector(
                    ".module-" + module
                );



            if(!element)
                return;



            element.dataset.energy =
                data.modules[module].energy;



            element.dataset.status =
                data.modules[module].status;



            if(
                data.modules[module].status
                ===
                "active"
            ){

                element.classList.add(
                    "active"
                );

            }



        });



    console.log(
        "Energia média Mythra:",
        data.avgEnergy
    );


}