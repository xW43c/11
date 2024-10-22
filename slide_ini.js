let slideIndex = 0;
showSlides();

function showSlides() {
  const slides = document.getElementsByClassName("slide");
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {
    slideIndex = 1;
  }
  slides[slideIndex - 1].style.display = "block";
  setTimeout(showSlides, 5000); // Muda o slide a cada 5 segundos
}

function plusSlides(n) {
  slideIndex += n - 1; // Ajusta o índice
  showSlides();
}

function redirectTo(url) {
  window.location.href = url; // Redireciona para a URL
}
