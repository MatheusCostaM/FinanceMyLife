<?php

include('../extra/protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>FinanceMyLife</title>

    <link rel="stylesheet" href="../extra/stylepages.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

</head>

<body>

    <div class="navbar boxsombra">

        <div class="navbarconteiner">
            <img class="namelogo" src="../img/name.png">
            <ul class="menu">

                <li><a href="./sobre.php" class="titulo2 clickavel">Sobre</a></li>

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

                <div class="itensmenlat clickavel perfil boxsombra">

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
                        <a href="renda.php" class="titulo1 clickavel">Renda</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra" id="menulatatual">
                        <a class="titulo1 clickavel">Gastos</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="investimento.php" class="titulo1 clickavel">Investimento</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="lazer.php" class="titulo1 clickavel">Lazer</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="financiamento.php" class="titulo1 clickavel">Financiamento</a>
                    </li>

                </ul>
                <div class="itensmenlat clickavel sair boxsombra">
                    <a href="../extra/logout.php" class="titulo1 clickavel txtsombra">Sair</a>
                </div>

            </div>
        </div>
        <div class="geral">
            <div class="titulo">
                <p class="titulo3 txtsombra">Gastos</p>
            </div>
            <div class="filtro">
                <div class="inputfilter">
                    <label for="inicio" class="titulo2 txtsombra">ínicio</label>
                    <br>
                    <input class="filtrodata insert clickavel boxsombra" type="date" name="inicio" id="inicio">
                </div>
                <div class="inputfilter">
                    <label for="fim" class="titulo2 txtsombra">fim</label>
                    <br>
                    <input class="filtrodata insert clickavel boxsombra" type="date" name="fim" id="fim">
                </div>
                <div class="total">
                    <h1 class="titulo2 txtsombra">Total</h1>
                    <div class="totalpainel boxsombra"></div>
                </div>
            </div>
            <div class="boxsombra dashboard" id="dashboard">
                <div class="registro boxsombra" id="registro0">
                    <input class="id" value="?"></input>
                    <div class="clickavel2 delete">X</div>
                    <input class="insert clickavel2 inputform inputtitulo" type="text" placeholder="Título">
                    <input class="insert clickavel2 inputform valor" type="text" placeholder="R$"
                        onkeyup="mascara(this)">
                    <select class="insert clickavel2 inputform frequencia" placeholder="Frequência">
                        <option value="uma">Uma vez</option>
                        <option value="semanal">Semanal</option>
                        <option value="quinzenal">Quinzenal</option>
                        <option value="mensal">Mensal</option>
                        <option value="anual">Anual</option>
                    </select>
                    <label class="placeholder-data">Início</label>
                    <input class="insert clickavel2 inputform data" type="date" placeholder="Data">
                    <label class="placeholder-data">Fim</label>
                    <input class="insert clickavel2 inputform datafim" type="date" placeholder="Data">
                </div>
                <div class="containeractions">
                    <img src="../img/adicionar.png" class="clickavel" id="adicionar">
                    <button id="btnsave" class="clickavel button boxsombra txtsombra">Salvar</button>
                </div>

            </div>
        </div>

    </div>

    <script type="module" src="../js/Planilha.js"></script>

</body>

</html>