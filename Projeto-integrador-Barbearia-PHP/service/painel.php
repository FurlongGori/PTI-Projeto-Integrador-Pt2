<?php
include('../domain/protect.php');

 // require ('./data/site_db.php');
    $hora = date(format: "h:i");

    $numero_hora =date(format: "H");
    $mensagem = "Bom Dia";
    if($numero_hora >= 12){
        $mensagem = "Boa tarde";
    } 
    if($numero_hora >= 18){
        $mensagem = "Boa noite";
    }

    $numero_hora = date("H");
    $mensagem = "Bom dia";
    if ($numero_hora >= 12) $mensagem = "Boa tarde";
    if ($numero_hora >= 18) $mensagem = "Boa noite";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
</head>

<body>
    Bem vindo ao Projeto Integrador do Grupo 26 , <?php echo $mensagem?>, <?php echo $_SESSION['nome']; ?>
    
    <p>
        <a href="../domain/login.php">Sair</a>
    </p>
</body>

</html>