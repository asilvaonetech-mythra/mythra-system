/*
|--------------------------------------------------------------------------
| MYTHRA PORTAL
| Navegação + Estado Vivo + Rede do Ecossistema
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



            generatePortalNetwork(data);



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





            const moduleData =
                data.modules[module];





            element.dataset.energy =
                moduleData.energy;




            element.dataset.status =
                moduleData.status;





            element.style.setProperty(
                "--module-energy",
                moduleData.energy
            );





            element.classList.remove(
                "active",
                "dominant"
            );





            if(
                moduleData.status === "active"
            ){

                element.classList.add(
                    "active"
                );

            }





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


/*
|--------------------------------------------------------------------------
| REDE VIVA DO PORTAL MYTHRA
|--------------------------------------------------------------------------
*/


function generatePortalNetwork(data){



    const svg =
        document.getElementById(
            "portal-network"
        );



    if(!svg)
        return;




    svg.innerHTML = "";





    const connections = [


        [
            "module-core",
            "module-talent"
        ],


        [
            "module-core",
            "module-business"
        ],


        [
            "module-core",
            "module-insight"
        ],


        [
            "module-core",
            "module-academy"
        ],


        [
            "module-core",
            "module-marketing"
        ],


        [
            "module-core",
            "module-vision"
        ],


        [
            "module-core",
            "module-nexus"
        ],


        [
            "module-core",
            "module-essence"
        ],


        [
            "module-core",
            "module-enterprise"
        ]


    ];







    const portal =
        document
        .getElementById(
            "portal-map"
        )
        .getBoundingClientRect();







    connections.forEach(connection=>{



        const start =
            document.querySelector(
                "." + connection[0]
            );



        const end =
            document.querySelector(
                "." + connection[1]
            );



        if(
            !start ||
            !end
        )
            return;





        const startRect =
            start.getBoundingClientRect();



        const endRect =
            end.getBoundingClientRect();






        const x1 =
            (
                (
                    startRect.left
                    +
                    startRect.width / 2
                    -
                    portal.left
                )
                /
                portal.width
            )
            *
            100;





        const y1 =
            (
                (
                    startRect.top
                    +
                    startRect.height / 2
                    -
                    portal.top
                )
                /
                portal.height
            )
            *
            100;





        const x2 =
            (
                (
                    endRect.left
                    +
                    endRect.width / 2
                    -
                    portal.left
                )
                /
                portal.width
            )
            *
            100;





        const y2 =
            (
                (
                    endRect.top
                    +
                    endRect.height / 2
                    -
                    portal.top
                )
                /
                portal.height
            )
            *
            100;







        const line =
            document.createElementNS(
                "http://www.w3.org/2000/svg",
                "line"
            );






        line.setAttribute(
            "x1",
            x1
        );


        line.setAttribute(
            "y1",
            y1
        );


        line.setAttribute(
            "x2",
            x2
        );


        line.setAttribute(
            "y2",
            y2
        );





        line.setAttribute(
            "stroke",
            "rgba(212,175,55,.35)"
        );





        line.setAttribute(
            "stroke-width",
            "1.5"
        );





        line.classList.add(
            "mythra-link"
        );





        svg.appendChild(
            line
        );



    });






    console.log(
        "Rede Mythra gerada:",
        connections.length,
        "conexões"
    );



}