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

    const container = document.querySelector(".cards-pai");

    // Função para rolar para a esquerda
    document
        .querySelector("#scroll-left")
        .addEventListener("click", function () {
            container.scrollBy({
                top: 0,
                left: -1250,
                behavior: "smooth",
            });
        });

    // Função para rolar para a direita
    document
        .querySelector("#scroll-right")
        .addEventListener("click", function () {
            container.scrollBy({
                top: 0,
                left: 1250,
                behavior: "smooth",
            });
        });
});

// carousel

document.addEventListener("DOMContentLoaded", function () {
    const carouselImages = document.querySelectorAll(".carousel-img");
    const thumbnails = document.querySelectorAll(".thumbnail-img");
    let currentIndex = 0;

    function showImage(index) {
        carouselImages.forEach((img, i) => {
            img.style.display = i === index ? "block" : "none";
        });
        currentIndex = index;
    }

    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener("click", () => {
            const index = parseInt(thumbnail.getAttribute("data-index"));
            showImage(index);
        });
    });

    // Mostrar a primeira imagem no carregamento
    showImage(currentIndex);
});


var btn = document.querySelector("#btn");
var btn_s = document.querySelector("#btn_s");

var sidebar = document.querySelector(".sidebar");
var searchBtn = document.querySelector(".bx-search");
var navList = document.querySelector(".nav-list");

btn.onclick = function () {
    sidebar.classList.toggle("active");
    navList.classList.toggle("active");
};

btn_s.onclick = function () {
    sidebar.classList.toggle("active");
    navList.classList.toggle("active");
};

searchBtn.onclick = function () {
    sidebar.classList.toggle("active");
    navList.classList.toggle("active");
};

const cards = document.querySelectorAll(".card");
cards.forEach((card) => {
    card.addEventListener("mouseover", function () {
        if (!card.classList.contains("desativar")) {
            card.classList.add("hover");
        }
    });

    card.addEventListener("mouseout", function () {
        if (!card.classList.contains("desativar")) {
            card.classList.remove("hover");
        }
    });
});
