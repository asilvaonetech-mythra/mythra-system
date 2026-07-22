/*
|--------------------------------------------------------------------------
| MYTHRA PORTAL
| Painel dos Atendentes Mythra
|--------------------------------------------------------------------------
*/

document.addEventListener("DOMContentLoaded", () => {

    const buttons = document.querySelectorAll(".agent-button");

    const panel = document.querySelector(".agent-info");

    if (!buttons.length || !panel) return;

    const title = panel.querySelector("h3");
    const role = panel.querySelector(".agent-role");
    const description = panel.querySelector("p");

    buttons.forEach(button => {

        button.addEventListener("click", () => {

            buttons.forEach(item => {
                item.classList.remove("selected");
            });

            button.classList.add("selected");

            title.textContent = button.dataset.agent;

            role.textContent = button.dataset.role;

            description.textContent = button.dataset.description;

            panel.classList.add("visible");

        });

    });

});