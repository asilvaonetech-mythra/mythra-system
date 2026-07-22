/*
|--------------------------------------------------------------------------
| MYTHRA PORTAL
| Navegação + Estado Vivo do Ecossistema
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
| Aplica estado vivo nos módulos
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





            const moduleData =
                data.modules[module];





            /*
            |--------------------------------------------------------------------------
            | Dados internos do módulo
            |--------------------------------------------------------------------------
            */


            element.dataset.energy =
                moduleData.energy;



            element.dataset.status =
                moduleData.status;





            /*
            |--------------------------------------------------------------------------
            | Variável de energia para o CSS
            |--------------------------------------------------------------------------
            */


            element.style.setProperty(
                "--module-energy",
                moduleData.energy
            );






            /*
            |--------------------------------------------------------------------------
            | Limpa estados anteriores
            |--------------------------------------------------------------------------
            */


            element.classList.remove(
                "active",
                "dominant"
            );






            /*
            |--------------------------------------------------------------------------
            | Estado ativo
            |--------------------------------------------------------------------------
            */


            if(
                moduleData.status === "active"
            ){

                element.classList.add(
                    "active"
                );

            }







            /*
            |--------------------------------------------------------------------------
            | Módulo dominante do ecossistema
            |--------------------------------------------------------------------------
            */


            if(
                data.dominant === module
            ){

                element.classList.add(
                    "dominant"
                );

            }



        });






    console.log(
        "Energia média Mythra:",
        data.avgEnergy
    );



}