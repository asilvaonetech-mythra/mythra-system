/*
|--------------------------------------------------------------------------
| REDE VIVA DO PORTAL MYTHRA
| Inteligência das Conexões
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
                    startRect.left +
                    startRect.width / 2 -
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
                    startRect.top +
                    startRect.height / 2 -
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
                    endRect.left +
                    endRect.width / 2 -
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
                    endRect.top +
                    endRect.height / 2 -
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



        const moduleName =
            connection[1]
            .replace(
                "module-",
                ""
            );



        const moduleState =
            data.modules &&
            data.modules[moduleName]
            ?
            data.modules[moduleName]
            :
            null;



        if(moduleState){


            const energy =
                moduleState.energy
                ||
                50;



            line.dataset.energy =
                energy;



            line.style.opacity =
                0.35 +
                (
                    energy / 250
                );



            line.setAttribute(
                "stroke-width",
                (
                    1 +
                    energy / 100
                )
            );


        }



        if(
            data.dominant &&
            data.dominant === moduleName
        ){


            line.classList.add(
                "dominant-link"
            );


        }



        if(
            data.risk === true
        ){


            line.classList.add(
                "risk-link"
            );


        }



        svg.appendChild(
            line
        );


    });



    console.log(
        "Rede Mythra Inteligente:",
        connections.length,
        "conexões"
    );


}





/*
|--------------------------------------------------------------------------
| NAVEGAÇÃO DOS MÓDULOS MYTHRA
|--------------------------------------------------------------------------
*/


function activatePortalModules(){


    const modules = {


        "module-core":
            "core",


        "module-talent":
            "talent",


        "module-marketing":
            "marketing",


        "module-vision":
            "vision",


        "module-academy":
            "academy",


        "module-insight":
            "insight",


        "module-essence":
            "essence",


        "module-business":
            "business",


        "module-nexus":
            "nexus",


        "module-enterprise":
            "enterprise"


    };





    Object.keys(modules)
    .forEach(className=>{


        const element =
            document.querySelector(
                "." + className
            );



        if(!element)
            return;



        element.dataset.module =
            modules[className];





        element.addEventListener(
            "click",
            function(){


                const module =
                    this.dataset.module;



                if(!module)
                    return;



                openModule(module);



            }
        );


    });


}






/*
|--------------------------------------------------------------------------
| EFEITO DE ATIVAÇÃO
|--------------------------------------------------------------------------
*/


function activateModuleHover(){


    const hotspots =
        document.querySelectorAll(
            ".portal-hotspot"
        );



    hotspots.forEach(hotspot=>{


        hotspot.addEventListener(
            "mouseenter",
            ()=>{


                hotspot.classList.add(
                    "active"
                );


            }
        );



        hotspot.addEventListener(
            "mouseleave",
            ()=>{


                hotspot.classList.remove(
                    "active"
                );


            }
        );


    });


}





/*
|--------------------------------------------------------------------------
| ESTADO VIVO DO PORTAL
|--------------------------------------------------------------------------
*/


async function loadPortalState(){


    try{


        const response =
            await fetch(
                "/portal/state"
            );



        const data =
            await response.json();



        generatePortalNetwork(
            data
        );



        applyPortalEnergy(
            data
        );


    }
    catch(error){


        console.error(
            "Erro ao carregar estado Mythra:",
            error
        );


    }


}





/*
|--------------------------------------------------------------------------
| ENERGIA DOS MÓDULOS
|--------------------------------------------------------------------------
*/


function applyPortalEnergy(data){


    if(
        !data ||
        !data.modules
    )
        return;



    Object.keys(data.modules)
    .forEach(module=>{


        const hotspot =
            document.querySelector(
                ".module-" + module
            );



        if(!hotspot)
            return;



        const energy =
            data.modules[module].energy
            ||
            50;



        hotspot.style
        .setProperty(
            "--module-energy",
            energy
        );



        if(
            data.dominant &&
            data.dominant === module
        ){


            hotspot.classList.add(
                "dominant"
            );


        }


    });


}





/*
|--------------------------------------------------------------------------
| INICIALIZAÇÃO
|--------------------------------------------------------------------------
*/


document.addEventListener(
    "DOMContentLoaded",
    ()=>{


        activatePortalModules();


        activateModuleHover();


        loadPortalState();


    }
);