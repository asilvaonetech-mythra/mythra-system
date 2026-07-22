document.addEventListener("DOMContentLoaded", () => {


    const universe = document.querySelector(".stars");


    if (universe) {


        const totalStars = 180;


        for (let i = 0; i < totalStars; i++) {


            const star = document.createElement("span");


            const size = Math.random() * 3 + 1;


            star.className = "star";


            star.style.width = `${size}px`;

            star.style.height = `${size}px`;


            star.style.left = `${Math.random() * 100}%`;

            star.style.top = `${Math.random() * 100}%`;


            star.style.animationDelay =
                `${Math.random() * 5}s`;


            universe.appendChild(star);


        }

    }




    const logo = document.querySelector(".mythra-logo");


    if (logo) {

        logo.style.opacity = "0";


        setTimeout(() => {

            logo.style.transition = "2.5s ease";

            logo.style.opacity = "1";

        }, 500);

    }




    const message = document.querySelector(".mythra-message");


    if (message) {

        message.style.opacity = "0";


        setTimeout(() => {

            message.style.transition = "1.5s ease";

            message.style.opacity = "1";


        }, 2200);

    }




    const actions = document.querySelector(".mythra-actions");


    if (actions) {

        actions.style.opacity = "0";


        setTimeout(() => {

            actions.style.transition = "1.5s ease";

            actions.style.opacity = "1";


        }, 3500);

    }


});