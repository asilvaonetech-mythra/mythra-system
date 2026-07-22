/*
|--------------------------------------------------------------------------
| MYTHRA PORTAL
| Controle dos Atendentes Mythra
|--------------------------------------------------------------------------
*/


document.addEventListener("DOMContentLoaded", () => {



    const agents = document.getElementById("portal-agents");

    const toggle = document.querySelector(".agent-toggle");



    if(!agents || !toggle) return;




    toggle.addEventListener("click", () => {



        agents.classList.toggle("active");



    });





    /*
    |--------------------------------------------------------------------------
    | FECHAR AO CLICAR FORA
    |--------------------------------------------------------------------------
    */


    document.addEventListener("click", (event) => {



        const clickedInside = agents.contains(event.target);



        if(!clickedInside){


            agents.classList.remove("active");


        }



    });



});