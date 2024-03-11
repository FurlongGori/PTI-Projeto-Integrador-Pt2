<?php  
include("../config/database.php");

if(isset($_POST['email']) || isset($_POST['senha'])) {

    if (strlen($_POST['email']) == 0){
        echo "Preencha seu email";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    }else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = md5('$senha') LIMIT 1";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    
        $quantidade = $sql_query->num_rows;
        
        if($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['idusuarios'] = $usuario['idusuarios'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        }else {
            echo "Falha ao logar! Email ou senha incorretos";
            
            }
        }
    
    
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTI</title>

    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style_index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">    
</head>

<body>
<section>
<div class="container">

<div class="logo">
    <img src="../img/logo.png">
</div>

<div class="login">
    <form action="" method="POST">
        <p><input name="email" type="text" placeholder="Seu Email"></p>
        <p><input name="senha" type="password" placeholder="Senha"></p>
        <br>
        <p><button type="submit">Login</button></p>
    </form>
</div>

<div class="rodape">
    <p><a href="cad_usuario.php" class="underline">Não tenho conta. Clique para cadastrar.</a></p>
</div>

</div>
</section>
</body>

</html>