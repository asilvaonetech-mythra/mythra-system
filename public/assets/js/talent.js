/*
|--------------------------------------------------------------------------
| Mythra Talent
|--------------------------------------------------------------------------
| Núcleo JavaScript do domínio Talent
|--------------------------------------------------------------------------
*/

document.addEventListener('DOMContentLoaded', () => {

    initializeTalent();

});

function initializeTalent() {

    initializeCards();

    initializeNavigation();

}

function initializeCards() {

    const cards = document.querySelectorAll('.talent-card');

    cards.forEach(card => {

        card.addEventListener('mouseenter', () => {

            card.style.transform = 'translateY(-8px) scale(1.01)';

        });

        card.addEventListener('mouseleave', () => {

            card.style.transform = '';

        });

    });

}

function initializeNavigation() {

    const links = document.querySelectorAll('.domain-navigation a');

    const current = window.location.pathname;

    links.forEach(link => {

        const url = new URL(link.href);

        if (current === url.pathname) {

            link.classList.add('active');

        }

    });

}