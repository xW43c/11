// Função para carregar o conteúdo comum
function loadComponent(url, selector) {
  fetch(url)
    .then((response) => response.text())
    .then((data) => {
      document.querySelector(selector).innerHTML = data;
    })
    .catch((error) => console.error("Erro ao carregar componente:", error));
}

// Carregar o cabeçalho e o rodapé
document.addEventListener("DOMContentLoaded", function () {
  loadComponent("header.html", "header");
  loadComponent("footer.html", "footer");
});
