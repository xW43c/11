// Função para abrir/fechar a imagem
function toggleImage(imageId) {
  var lightbox = document.getElementById(imageId);
  if (lightbox.classList.contains("show")) {
    lightbox.classList.remove("show");
  } else {
    lightbox.classList.add("show");
  }
}
