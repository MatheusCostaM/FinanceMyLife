<?php

include('../extra/protect.php');

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <title>FinanceMyLife</title>

    <link rel="stylesheet" href="metas.css">

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

                    <a href="" class="titulo1 clickavel txtsombra">
                        <?php

                        $username = $_SESSION['usuario_nome'];

                        echo "$username";

                        ?>
                    </a>
                </div>

                <ul class="listamenlat txtsombra">

                    <li class="itensmenlat clickavel boxsombra" id="menulatatual">
                        <a class="titulo1 clickavel">Metas</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra" href="/geral/geral.html">
                        <a href="" class="titulo1 clickavel">Geral</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="../page/renda.php" class="titulo1 clickavel">Renda</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="" class="titulo1 clickavel">Gastos</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="" class="titulo1 clickavel">Investimento</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="" class="titulo1 clickavel">Lazer</a>
                    </li>

                    <li class="itensmenlat clickavel boxsombra">
                        <a href="" class="titulo1 clickavel">Financiamento</a>
                    </li>

                </ul>
                <div class="itensmenlat clickavel sair boxsombra">
                    <a href="../extra/logout.php" class="titulo1 clickavel txtsombra">Sair</a>
                </div>

            </div>
        </div>
        <div class="metas">
            <div class="titulo">
                <p class="titulo3 txtsombra">Metas</p>
            </div>
            <div class="dashboard">
                <div class="containercontrolador">
                    <div class="controladordemetas">
                        <div class="containername">
                            <img src="img/reduzir.png" class="imgreduziraumentar clickavel" id="aumentarreduzir1">
                            <p class="titulo1 txtsombra">Gastos</p>
                        </div>
                        <div class="container boxsombra">
                            <div class="controlador boxsombra" id="gastoscontainer">
                                <div class="control min" id="controlmin1">
                                </div>
                                <div class="control max" id="controlmax1">
                                </div>
                            </div>
                            <div class="containerminmax">
                                <h2 class="numbermin controlnumber txtsombra" id="min1">0%</h2>
                                <h2 class="numbermax controlnumber txtsombra" id="max1">0%</h2>
                            </div>
                        </div>
                    </div>
                    <div class="controladordemetas">
                        <div class="containername">
                            <img src="img/reduzir.png" class="imgreduziraumentar clickavel" id="aumentarreduzir2">
                            <p class="titulo1 txtsombra">Investimento</p>
                        </div>
                        <div class="container boxsombra">
                            <div class="controlador boxsombra" id="investimentocontainer">
                                <div class="control min" id="controlmin2">
                                </div>
                                <div class="control max" id="controlmax2">
                                </div>
                            </div>
                            <div class="containerminmax">
                                <h2 class="numbermin controlnumber txtsombra" id="min2">0%</h2>
                                <h2 class="numbermax controlnumber txtsombra" id="max2">0%</h2>
                            </div>
                        </div>
                    </div>
                    <div class="controladordemetas">
                        <div class="containername">
                            <img src="img/reduzir.png" class="imgreduziraumentar clickavel" id="aumentarreduzir3">
                            <p class="titulo1 txtsombra">Lazer</p>
                        </div>
                        <div class="container boxsombra">
                            <div class="controlador boxsombra" id="lazercontainer">
                                <div class="control min" id="controlmin3">
                                </div>
                                <div class="control max" id="controlmax3">
                                </div>
                            </div>
                            <div class="containerminmax">
                                <h2 class="numbermin controlnumber txtsombra" id="min3">0%</h2>
                                <h2 class="numbermax controlnumber txtsombra" id="max3">0%</h2>
                            </div>
                        </div>
                    </div>
                    <div class="controladordemetas">
                        <div class="containername">
                            <img src="img/reduzir.png" class="imgreduziraumentar clickavel" id="aumentarreduzir4">
                            <p class="titulo1 txtsombra">Financiamento</p>
                        </div>
                        <div class="container boxsombra">
                            <div class="controlador boxsombra" id="financiamentocontainer">
                                <div class="control min" id="controlmin4">
                                </div>
                                <div class="control max" id="controlmax4">
                                </div>
                            </div>
                            <div class="containerminmax">
                                <h2 class="numbermin controlnumber txtsombra" id="min4">0%</h2>
                                <h2 class="numbermax controlnumber txtsombra" id="max4">0%</h2>
                            </div>
                        </div>
                    </div>
                    <div class="controladordemetas">
                        <div class="containername">
                            <h2 class="titulo1 txtsombra">Total</h2>
                        </div>
                        <div class="containertotal boxsombra">
                            <div class="telatotal" id="financiamentocontainer">
                                <h1 class="titulo4 numbermax txtsombra">Objetivo<h1>
                                        <h1 class="numbermax titulo4 txtsombra" id="painelmin">0%<h1>
                            </div>
                            <div class="telatotal" id="financiamentocontainer">
                                <h1 class="titulo4 numbermin txtsombra">Limite<h1>
                                        <h1 class="numbermin titulo4 txtsombra" id="painelmax">0%<h1>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="containermenudash">
                    <p class="titulo1 txtsombra" id="layout">Layout</p>
                    <div class="menudash boxsombra">
                        <ul class="listamenlat txtsombra" id="listamenudash">
                            <li class="itensmenlat clickavel" id="buttoninvestir"><a
                                    class="titulo2 clickavel">Investir</a></li>
                            <li class="itensmenlat clickavel" id="curtir"><a class="titulo2 clickavel">Curtir a vida</a>
                            </li>
                            <li class="itensmenlat clickavel" id="casa"><a class="titulo2 clickavel">Casa própria</a>
                            </li>
                            <li class="itensmenlat clickavel" id="equilibrio"><a
                                    class="titulo2 clickavel">Equilíbrio</a></li>
                            <li class="itensmenlat clickavel" id="pagardividas"><a class="titulo2 clickavel">Pagar
                                    dívidas</a>
                            </li>
                            <li class="itensmenlat clickavel" id="aposentar"><a class="titulo2 clickavel">Se
                                    aposentar</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="module" src="../js/home.js"></script>

</body>

</html>