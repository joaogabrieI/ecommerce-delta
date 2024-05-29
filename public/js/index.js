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



// carousel

document.addEventListener('DOMContentLoaded', function () {
    const carouselImages = document.querySelector('.carousel-images');
    const images = document.querySelectorAll('.carousel-images img');
    const thumbnails = document.querySelectorAll('.thumbnails img');
    let imageWidth = images[1].clientWidth; // Width of one image (non-clone)
    let currentIndex = 1;
    let isTransitioning = false;
  
    function updateImageWidth() {
        imageWidth = images[1].clientWidth;
    }
  
    function updateCarousel() {
        const offset = -currentIndex * imageWidth;
        carouselImages.style.transform = `translateX(${offset}px)`;
        isTransitioning = true;
    }
  
    function showImage(index) {
        if (isTransitioning) return;
        currentIndex = index;
        updateCarousel();
    }
  
    function checkIndex() {
        isTransitioning = false;
        if (images[currentIndex].classList.contains('clone')) {
            carouselImages.style.transition = 'none';
            currentIndex = (currentIndex === images.length - 1) ? 1 : images.length - 2;
            const offset = -currentIndex * imageWidth;
            carouselImages.style.transform = `translateX(${offset}px)`;
            setTimeout(() => {
                carouselImages.style.transition = 'transform 0.5s ease-in-out';
            }, 50);
        }
    }
  
    function nextImage() {
        if (isTransitioning) return;
        currentIndex++;
        updateCarousel();
    }
  
    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => {
            showImage(index + 1);
        });
    });
  
    carouselImages.addEventListener('transitionend', checkIndex);
  
    setInterval(nextImage, 3000); // Change image every 3 seconds
  
    window.addEventListener('resize', () => {
        updateImageWidth();
        const offset = -currentIndex * imageWidth;
        carouselImages.style.transition = 'none';
        carouselImages.style.transform = `translateX(${offset}px)`;
        setTimeout(() => {
            carouselImages.style.transition = 'transform 0.5s ease-in-out';
        }, 0);
    });
  
    updateImageWidth();
    showImage(currentIndex);
  });
  
  var btn = document.querySelector("#btn");
  var btn_s = document.querySelector("#btn");
  
  var sidebar = document.querySelector(".sidebar");
  var searchBtn = document.querySelector(".bx-search");
  var navList = document.querySelector(".nav-list");
  
  btn.onclick = function() {
      sidebar.classList.toggle("active");
      navList.classList.toggle("active");
  }
  
  
  btn_S.onclick = function() {
    sidebar.classList.toggle("active");
    navList.classList.toggle("active");
  }
  
  searchBtn.onclick = function() {
      sidebar.classList.toggle("active");
      navList.classList.toggle("active");
  }
  
  const cards = document.querySelectorAll(".card");
  cards.forEach((card) => {
    card.addEventListener("mouseover", function() {
      if (!card.classList.contains("desativar")) {
        card.classList.add("hover");
      }
    });
  
    card.addEventListener("mouseout", function() {
      if (!card.classList.contains("desativar")) {
        card.classList.remove("hover");
      }
    });
  });