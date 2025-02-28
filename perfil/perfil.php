<?php

include('../extra/protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>FinanceMyLife</title>

    <link rel="stylesheet" href="perfil.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>

<body>

    <div class="navbar boxsombra">

        <div class="navbarconteiner">
            <img class="namelogo" src="../img/name.png">
            <ul class="menu">

                <li><a href="" class="titulo2 clickavel">Sobre</a></li>

                <li>
                    <h2 class="titulo2">I</h2>
                </li>

                <li><a href="" class="titulo2 clickavel" id="menuatual">Home</a></li>

                <li>
                    <h2 class="titulo2">I</h2>
                </li>

                <li><a href="" class="titulo2 clickavel">Ajuda</a></li>

            </ul>
        </div>

    </div>

    <div class="body">

        <div class="menulateralcontainer boxsombra">
            <div class="menulateral">

                <div class="itensmenlat clickavel perfil boxsombra" id="menulatatual">

                    <img class="img" src="../img/perfil.png">

                    <a href="" class="titulo1 clickavel txtsombra">
                        <?php

                        $username = $_SESSION['usuario_nome'];

                        echo "$username";

                        ?>
                    </a>
                </div>

                <ul class="listamenlat txtsombra">

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../metas/metas.php" class="titulo1 clickavel">Metas</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../geral/geral.php" class="titulo1 clickavel">Geral</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../renda/renda.php" class="titulo1 clickavel">Renda</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../gastos/gastos.php" class="titulo1 clickavel">Gastos</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../investimento/investimento.php" class="titulo1 clickavel">Investimento</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../lazer/lazer.php" class="titulo1 clickavel">Lazer</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../financiamento/financiamento.php" class="titulo1 clickavel">Financiamento</a>
                    </li>

                </ul>
                <div class="itensmenlat clickavel sair boxsombra">
                    <a href="../logout.php" class="titulo1 clickavel txtsombra">Sair</a>
                </div>

            </div>
        </div>
        <div class="perfilpage">
            <div class="titulo">
                <p class="titulo3 txtsombra">Perfil</p>
            </div>
            <div class="dashboard boxsombra">
                <div class="container">
                    <img class="img" src="../img/perfil.png">
                </div>
                <div class="container">
                    <p class="titulo2">Nome
                    <p>
                    <div class="containertxt">
                        <a href="" class="titulo2 txtsombra">
                            <?php

                            $username = $_SESSION['usuario_nome'];

                            echo "$username";

                            ?>
                        </a>
                    </div>
                </div>
                <div class="container">
                    <p class="titulo2">E-mail
                    <p>
                    <div class="containertxt">
                        <a href="" class="titulo2 txtsombra">
                            <?php

                            $useremail = $_SESSION['usuario_email'];

                            echo "$useremail";

                            ?>
                        </a>
                    </div>
                </div>
                <div class="container">
                    <button class="titulo2 clickavel">Alterar Senha</button>
                </div>

            </div>
        </div>

    </div>

    <script type="module" src="../js/grafico.js"></script>

</body>

</html>