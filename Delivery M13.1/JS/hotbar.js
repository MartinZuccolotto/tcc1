 function exibirTrechoHTML() {
  const trechoHTML = `<div>
    <div>
      <img src="../img/botao-de-inicio 1.png" class="botao_de_inicio" alt="">
      <a style="font-size: 36px; top: -6px; left: 170px;" class="letras" href="inicio.php">Inicio</a>
      <img src="../img/cesta-de-compra 1.png" class="cesta_de_compras" alt="">
      <a style="font-size: 36px; top: -6px; left: 228px;" class="letras" href="carrinho.php">Carrinho</a>
      <img src="../img/Group 1.png" class="logo1" alt="">
      <a href="perfil.php"><img src="../img/perfil 1.png" class="perfil" alt=""></a>
    </div>
    <hr class="linha">
  </div>`;

  document.getElementById('hotbar').innerHTML = trechoHTML;
}

function exibirTrechoHTMLInf() {
  const trechoHTML = `<div>
  <div class="itens">
  <img id="logo" src="../img/logo.png" alt="">
  <a href="perfil.php">
      <img id="seta" src="../img/seta-voltar.png" alt="">
      <p>voltar</p>
  </a>
  <hr>
</div>`;

  document.getElementById('hotbar').innerHTML = trechoHTML;
}

function exibirTrechoHTMLPed() {
  const trechoHTML = `<div>
  <div class="itens">
  <img id="logo" src="../img/logo.png" alt="">
  <a href="carrinho.php">
      <img id="seta" src="../img/seta-voltar.png" alt="">
      <p>voltar</p>
  </a>
  <hr>
</div>`;

  document.getElementById('hotbar').innerHTML = trechoHTML;
}

function exibirTrechoHTMLCart() {
  const trechoHTML = `<div>
  <div class="itens">
  <img id="logo" src="../img/logo.png" alt="">
  <a href="pratos-prontos.php">
      <img id="seta" src="../img/seta-voltar.png" alt="">
      <p>voltar</p>
  </a>
  <hr>
</div>`;

  document.getElementById('hotbar').innerHTML = trechoHTML;
}

function togglePasswordVisibility() {
  var passwordField = document.getElementById("passwordField");
  if (passwordField.type === "password") {
    passwordField.type = "text";
  } else {
    passwordField.type = "password";
  }
}
