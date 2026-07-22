window.addEventListener("load", () => {

    const card = document.querySelector(".login-box");
    const content = document.querySelector(".login-content");

    card.style.opacity = "0";
    card.style.transform = "translate(-50%,-50%) scale(.96)";

    setTimeout(() => {

        card.style.transition =
            "opacity .7s ease, transform .7s ease";

        card.style.opacity = "1";
        card.style.transform =
            "translate(-50%,-50%) scale(1)";

    },600);

    setTimeout(() => {

        content.classList.add("show");

    },1100);

});