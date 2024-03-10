<?php
include("./config/database.php");

// if(isset($_POST['email'])){
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

    if (empty($nome) || empty($email) || empty($senha)) {
        echo "Por favor, preencha todos os campos obrigatórios.";
    } else {
        // Valida o formato do email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Formato de e-mail inválido.";
        } else {
        //  subir para banco de dados
        $mysqli->query("INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', md5('$senha'))");
        
        header("Location: index.php");
}
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuarios</title>

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style_cad_usuario.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">    
</head>

<body>
<section>
<div class="container">

<div class="cabecalho">
    <img src="../img/menu.png" class="menu">
    <img src="../img/logo.png" class="logo">
    <img src="../img/sair.png" class="sair">
</div>

<div class="cadastro">
    <div><h2>Cadastro Usuário</h2></div>
    <!-- <br><br><br><br> -->

    <form action="" method="POST">
        <p>
            <label>Nome:</label><br>
            <input type="text" placeholder="nome" name="nome">
        </p>
        <p>
            <label>E-mail:</label><br>
            <input type="text" placeholder="seu email" name="email">
        </p>
        <p>
            <label>Senha:</label><br>
            <input type="password" placeholder="senha" name="senha" >
        </p>
    </div>

    <div class="botao">
        <button type="submit">Salvar</button>
    </div>

    </form>

</div>
</section>
</body>

</html>