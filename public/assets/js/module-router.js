/*
|--------------------------------------------------------------------------
| MYTHRA MODULE ROUTER
| Controle de abertura dos módulos
|--------------------------------------------------------------------------
*/


function openModule(module){



    const routes = {


        core:"/portal/core",

        talent:"/portal/talent",

        business:"/portal/business",

        vision:"/portal/vision",

        insight:"/portal/insight",

        academy:"/portal/academy",

        essence:"/portal/essence",

        marketing:"/portal/marketing",

        nexus:"/portal/nexus",

        enterprise:"/portal/enterprise"


    };





    const route =
        routes[module];



    if(!route){


        console.warn(
            "Módulo não encontrado:",
            module
        );


        return;


    }





    window.location.href =
        route;



}