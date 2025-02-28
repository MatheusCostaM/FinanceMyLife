<?php

include('../extra/protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>FinanceMyLife</title>

    <link rel="stylesheet" href="geral.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

</head>

<body>

    <div class="navbar boxsombra">

        <div class="navbarconteiner">
            <img class="namelogo" src="../img/name.png">
            <ul class="menu">

                <li><a href="../page/sobre.php" class="titulo2 clickavel">Sobre</a></li>

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

                    <a href="" class="titulo1 margem clickavel txtsombra">
                        <?php

                        $username = $_SESSION['usuario_nome'];

                        echo "$username";

                        ?>
                    </a>
                </div>

                <ul class="listamenlat txtsombra">

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../metas/metas.php" class="titulo1 titulo6 clickavel">Metas</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra" id="menulatatual">
                        <a class="titulo1 clickavel">Geral</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../page/renda.php" class="titulo1 clickavel">Renda</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../page/gastos.php" class="titulo1 clickavel">Gastos</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../page/investimento.php" class="titulo1 clickavel">Investimento</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../page/lazer.php" class="titulo1 clickavel">Lazer</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../page/financiamento.php" class="titulo1 clickavel">Financiamento</a>
                    </li>

                </ul>
                <div class="itensmenlat clickavel sair boxsombra">
                    <a href="../extra/logout.php" class="titulo1 clickavel txtsombra">Sair</a>
                </div>

            </div>
        </div>
        <div class="geral">
            <div class="titulo">
                <p class="titulo3 txtsombra">Geral</p>
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
            </div>
            <div class="dashboard boxsombra">
                <div class="grafico">
                    <p class="titulo4 txtsombra renda">Renda | R$ 10.000,00</p>
                    <canvas id="graficoPizza" width="300" height="300"></canvas>
                    <p class="titulo2 txtsombra sobra">Sobra | R$ 2.500,00 | 25%</p>
                </div>
                <div class="containerConteudos">
                    <div class="container-graficos">
                        <div class="container">
                            <div class="containerGraficoPilha boxsombra">
                                <p class="gastos titulo2 gastosporcentagem">30%</p>
                                <div class="graficoPilha" id="graficoPilha2"></div>
                            </div>
                            <p class="titulo2 intengastos">Normal</p>
                        </div>
                        <div class="containervalor">
                            <p class="titulo4 txtsombra">GASTOS</p>
                            <p class="titulo2 gastosvalor">R$ 3.000,00</p>
                        </div>
                    </div>
                    <div class="container-graficos">
                        <div class="container">
                            <div class="containerGraficoPilha boxsombra">
                                <p class="investimento titulo2 investimentoporcentagem">15%</p>
                                <div class="graficoPilha" id="graficoPilha1"></div>
                            </div>
                            <p class="titulo2 inteninvestimento">Normal</p>
                        </div>
                        <div class="containervalor">
                            <p class="titulo4 txtsombra">INVESTIMENTO</p>
                            <p class="titulo2 investimentovalor">R$ 1.500,00</p>
                        </div>
                    </div>
                    <div class="container-graficos">
                        <div class="container">
                            <div class="containerGraficoPilha boxsombra">
                                <p class="lazer titulo2 lazerporcentagem">15%</p>
                                <div class="graficoPilha" id="graficoPilha3"></div>
                            </div>
                            <p class="titulo2 intenlazer">Normal</p>
                        </div>
                        <div class="containervalor">
                            <p class="titulo4 txtsombra">LAZER</p>
                            <p class="titulo2 lazervalor">R$ 1.500,00</p>
                        </div>
                    </div>
                    <div class="container-graficos">
                        <div class="container">
                            <div class="containerGraficoPilha boxsombra">
                                <p class="financiamento titulo2 financiamentoporcentagem">5%</p>
                                <div class="graficoPilha" id="graficoPilha4"></div>
                            </div>
                            <p class="titulo2 intenfinanciamento">Normal</p>
                        </div>
                        <div class="containervalor">
                            <p class="titulo4 txtsombra">FINANCIAMENTO</p>
                            <p class="titulo2 financiamentovalor">R$ 500,00</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script type="module" src="../js/geral.js"></script>

</body>

</html>