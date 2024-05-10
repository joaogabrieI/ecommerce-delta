const menuIcon = document.querySelector(".menu-icon");
const navList = document.querySelector("ul");

menuIcon.addEventListener("click", () => {
  menuIcon.classList.toggle("active");
  navList.classList.toggle("active");
});

document.addEventListener("DOMContentLoaded", function () {
    const cardsPai = document.getElementById("cardsPai");
    const modeloCard = document.getElementById("modeloCard");
    const nav = document.querySelector("#nav");

    const numRepeticoes = 12;

    for (let i = 1; i < numRepeticoes; i++) {
        const clone = modeloCard.cloneNode(true);
        cardsPai.appendChild(clone);
    }

    window.addEventListener("scroll", function () {
        const navTop = nav.getBoundingClientRect().bottom;

        const cards = document.querySelectorAll(".card");

        cards.forEach((card) => {
            const cardTop = card.getBoundingClientRect().top;

            // Verificar se a parte superior do cartão está encostando na parte inferior da barra de navegação ou abaixo dela
            if (cardTop <= navTop) {
                card.classList.add("desativar");
            } else {
                card.classList.remove("desativar");
            }
        });

        // Alterar a cor da navbar com transição ao rolar para baixo
        if (window.scrollY > 170) {
            nav.classList.add("scrolled");
        } else {
            nav.classList.remove("scrolled");
        }
    });
});