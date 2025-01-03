<?php

include('./extra/db_connect.php');
include('./extra/Usuario.php');


if (isset($_POST['emaillogin']) && isset($_POST['senhalogin'])) {
    $email = $_POST['emaillogin'];
    $senha = $_POST['senhalogin'];

    $usuario = Usuario::autenticar($conn, $email, $senha);
    if ($usuario) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['usuario_senha'] = $usuario['senha'];
        $name = $_SESSION['usuario_nome'];

        header("Location: metas/metas.php");
    } else {
        echo "<script> alert('Email ou senha inválidos.');</script>";
    }
}

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario($nome, $email, $senha);
    if ($usuario->cadastrar($conn)) {
        $usuario->iniciarconfigs($conn);
    } else {
        echo "<script> alert('Erro ao cadastrar usuário.');</script>";
    }
}

if (isset($_POST['nomerecuperar']) && isset($_POST['emailrecuperar']) && isset($_POST['senharecuperar'])) {
    $nome = $_POST['nomerecuperar'];
    $email = $_POST['emailrecuperar'];
    $newsenha = $_POST['senharecuperar'];

    $usuario = Usuario::recuperar($conn, $email, $nome, $newsenha);
    if ($usuario) {
        echo "<script> alert('Senha alterada.');</script>";
    } else {
        echo "<script> alert('Email ou nome inválidos.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>FinanceMyLife</title>

    <link rel="stylesheet" href="main.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>

<body>

    <div class="navbar">

        <img class="namelogo" src="img/name.png">

    </div>
    <div class="body">

        <div class="divbody" id="divbody1">

            <img src="img/logo.png">
            <div class="textconteiner">
                <h1 class="titulo1">Te ajudamos a gerenciar suas finanças e realizar o seus sonhos.</h1>
            </div>

        </div>

        <div class="divbody">

            <h1 class="titulo1">Para testar clique aqui </h1>
            <button class="button clickavel" id="teste">Testar</button>
            <br>
            <form class="formulario" id="formulariologin" action="" method="POST">

                <input class="insert clickavel" clickavel type="text" placeholder="E-mail" name='emaillogin'>

                <br>

                <input class="insert clickavel" type="password" placeholder="Senha" name='senhalogin'>

                <a class="txtinsert clickavel" id="recuperar">Esqueci minha senha</a>

                <br>

                <button class="button clickavel" type="submit">Entrar</button>

                <div class="container">

                    <h2 class="txtinsert">ou</h2>

                    <a class="button clickavel" id="cadastrar">Cadastrar-se</a>
                </div>

            </form>
            <form class="formulario" id="formulariocadastrar" action="" method="POST">

                <input class="insert clickavel" type="email" placeholder="E-mail" name="email" required>

                <br>

                <input class="insert clickavel" type="text" placeholder="Nome" name="nome" required>

                <br>

                <input class="insert clickavel" type="password" placeholder="Senha" name="senha" required>

                <br>

                <div class="containerbutton">

                    <a class="button clickavel" name="sair" id="sair">⬅</a>

                    <button class="button clickavel" id="cadastrar2" type="submit"
                        name="cadastrar">Cadastrar-se</button>

                </div>


            </form>
            <form class="formulario" id="formulariorecuperar" action="" method="POST">

                <input class="insert clickavel" type="email" placeholder="E-mail" name="emailrecuperar" required>

                <br>

                <input class="insert clickavel" type="text" placeholder="Nome" name="nomerecuperar" required>

                <br>

                <input class="insert clickavel" type="password" placeholder="Nova Senha" name="senharecuperar" required>

                <br>

                <div class="containerbutton">

                    <a class="button clickavel sair" name="sair" id="sair2">⬅</a>

                    <button class="button clickavel" id="recuperar" type="submit" name="recuperar">Alterar
                        Senha</button>

                </div>


            </form>

        </div>

    </div>
    <script src="main.js"></script>

</body>

</html>