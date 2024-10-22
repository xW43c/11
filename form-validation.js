document
  .getElementById("contact-form")
  .addEventListener("submit", function (event) {
    event.preventDefault(); // Evita o envio padrão do formulário

    // Obtém os valores dos campos
    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const message = document.getElementById("message").value.trim();

    // Regex para validar o formato do e-mail
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Verifica se todos os campos estão preenchidos
    if (name === "") {
      alert("Por favor, preencha o campo Nome.");
      return;
    }

    if (email === "" || !emailPattern.test(email)) {
      alert("Por favor, insira um e-mail válido.");
      return;
    }

    if (message === "") {
      alert("Por favor, preencha a mensagem.");
      return;
    }

    // Se todas as validações passarem, o formulário é enviado
    alert("Formulário enviado com sucesso!");
    this.submit(); // Envia o formulário
  });
