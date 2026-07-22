/*
|--------------------------------------------------------------------------
| MYTHRA ASSISTANT
| Jornadas dos Atendentes Mythra
|--------------------------------------------------------------------------
*/


document.addEventListener("DOMContentLoaded",()=>{


    const buttons =
        document.querySelectorAll(".agent-button");


    const assistant =
        document.getElementById("portal-assistant");


    const name =
        document.getElementById("assistant-name");


    const role =
        document.getElementById("assistant-role");


    const message =
        document.getElementById("assistant-message");


    const start =
        document.getElementById("start-assistant");


    const close =
        document.querySelector(".assistant-close");



    if(!assistant)
        return;



    let currentAgent = null;



    const journeys = {


        Lumia:{
            domain:"core",
            role:"Acolhimento",
            message:
            "Vou apresentar o Ecossistema Mythra e conduzir seus primeiros passos."
        },


        Nara:{
            domain:"talent",
            role:"Descoberta",
            message:
            "Vamos compreender talentos, necessidades e possibilidades."
        },


        Elara:{
            domain:"marketing",
            role:"Criatividade",
            message:
            "Vamos transformar ideias em comunicação e conexão."
        },


        Kael:{
            domain:"business",
            role:"Estratégia",
            message:
            "Vamos organizar caminhos para crescimento e evolução."
        },


        Lyra:{
            domain:"essence",
            role:"Experiência",
            message:
            "Vamos explorar cuidado, beleza e conexão humana."
        },


        Orion:{
            domain:"vision",
            role:"Visão",
            message:
            "Vamos analisar cenários, dados e inteligência técnica."
        },


        Amara:{
            domain:"academy",
            role:"Conhecimento",
            message:
            "Vamos construir aprendizado e desenvolvimento contínuo."
        },


        Nova:{
            domain:"enterprise",
            role:"Evolução",
            message:
            "Vamos implementar soluções e expandir possibilidades."
        },


        Íris:{
            domain:"insight",
            role:"Percepção",
            message:
            "Vamos transformar informações em inteligência."
        }


    };





    buttons.forEach(button=>{


        button.addEventListener("click",()=>{


            currentAgent =
            button.dataset.agent;



            const data =
            journeys[currentAgent];



            if(!data)
                return;



            name.textContent =
            currentAgent;



            role.textContent =
            data.role;



            message.textContent =
            data.message;



            start.textContent =
            "Iniciar Jornada";



            start.dataset.module =
            data.domain;



            assistant.classList.add("active");



        });


    });







    start.addEventListener("click",()=>{


        const module =
        start.dataset.module;



        if(!module)
            return;



        window.location.href =
        "/portal/" + module;



    });







    if(close){


        close.addEventListener("click",()=>{


            assistant.classList.remove("active");


        });


    }



});