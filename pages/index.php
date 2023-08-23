<?php
include '../vendor/autoload.php';
use \App\Entity\Palestra;

$new_obj = new Palestra();
$palestras = $new_obj->filtrar();
//echo "<pre>"; print_r($palestras); echo "</pre>";
$results = '';
    foreach($palestras as $palestra){
        $contVagas = $palestra->vagas;
        if($contVagas <= 0){
            $results .= '
            <div class="todo_card ">
                <div class="card">
                    <div class="back">
                        <div class="area_ftperfil back-content">
                            <img class="ftperfil " src=".'.$palestra->foto.' " alt=" ">
                        </div>
                    </div>
                    <img class="seta_pixel_card " src="../elementos/elementos_hub-innovation-2023_seta-pixels.png " alt=" ">
                    <div class="bot">
                        <div class="container_bloco">
                            <div class="bloco_bot ">
                                <div class="content_bloco_bot ">
                                    <strong class="nome_card "> '.$palestra->nome_palestrante.' </strong>
                                </div>
                            </div>
                            <div class="quadrados ">
                                <div class="q1 quadrado "></div>
                                <div class="q2 quadrado "></div>
                                <div class="q2 quadrado qVagas ">
                                    <div class="q_quadrado qq1 "></div>
                                    <div class="q_quadrado qq2 "></div>
                                    <div class="q_quadrado qq3 "></div>
                                    <div class="q_quadrado qq4 "></div>
                                    <div class="q_quadrado qq4 "></div>
                                    <div class="q_quadrado qq2 "></div>
                                    <div class="q_quadrado qq3 "></div>
                                    <div class="q_quadrado qq1 "></div>
                                    <div class="q_quadrado qq4 "></div>
                                    <div class="q_quadrado qq2 "></div>
                                    <div class="q_quadrado qq1 "></div>
                                    <div class="q_quadrado qq3 "></div>
                                    <div class="q_quadrado qq1 "></div>
                                    <div class="q_quadrado qq2 "></div>
                                    <div class="q_quadrado qq2 "></div>
                                    <div class="q_quadrado qq4 "></div>
                                    <div class="q_quadrado qq3 "></div>
                                    <div class="q_quadrado qq1 "></div>
                                    <div class="q_quadrado qq2 "></div>
                                    <div class="q_quadrado qq4 "></div>
                                    <h3 class="h1_q2 " id="titulo "> Encerradas</h3>
                                </div>
                                <div class="q3 quadrado "></div>
                                <div class="q4 quadrado "></div>
                                <div class="qgeral "></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          ';
        }
        else{
            $results .= '
        <!--  <a href="../participante.php?id_palestra='.$palestra->id_palestra.'"> -->
        <div onclick="mudarPagina('.$palestra->id_palestra.') " class="todo_card ">
            <div class="card">
                <div class="back">
                    <div class="area_ftperfil back-content">
                        <img class="ftperfil " src=".'.$palestra->foto.' " alt=" ">
                    </div>
                </div>
                <img class="seta_pixel_card " src="../elementos/elementos_hub-innovation-2023_seta-pixels.png " alt=" ">
                <div class="bot">
                    <div class="container_bloco">
                        <div class="bloco_bot ">
                            <div class="content_bloco_bot ">
                                <strong class="nome_card "> '.$palestra->nome_palestrante.' </strong>
                            </div>
                        </div>
                        <div class="quadrados ">
                            <div class="q1 quadrado "></div>
                            <div class="q2 quadrado "></div>
                            <div class="q2 quadrado qVagas ">
                                <div class="q_quadrado qq1 "></div>
                                <div class="q_quadrado qq2 "></div>
                                <div class="q_quadrado qq3 "></div>
                                <div class="q_quadrado qq4 "></div>
                                <div class="q_quadrado qq4 "></div>
                                <div class="q_quadrado qq2 "></div>
                                <div class="q_quadrado qq3 "></div>
                                <div class="q_quadrado qq1 "></div>
                                <div class="q_quadrado qq4 "></div>
                                <div class="q_quadrado qq2 "></div>
                                <div class="q_quadrado qq1 "></div>
                                <div class="q_quadrado qq3 "></div>
                                <div class="q_quadrado qq1 "></div>
                                <div class="q_quadrado qq2 "></div>
                                <div class="q_quadrado qq2 "></div>
                                <div class="q_quadrado qq4 "></div>
                                <div class="q_quadrado qq3 "></div>
                                <div class="q_quadrado qq1 "></div>
                                <div class="q_quadrado qq2 "></div>
                                <div class="q_quadrado qq4 "></div>
                                <h1 class="h1_q2 " id="titulo "> '.$palestra->vagas.' vagas</h1>
                            </div>
                            <div class="q3 quadrado "></div>
                            <div class="q4 quadrado "></div>
                            <div class="qgeral "></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUB INNOVATION II</title>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel=" stylesheet " href="../css/footer.css">
    <link rel="stylesheet" href="../css/barraNeonStyle.css">
    <link rel="stylesheet" href="../css/cards.css">
</head>

<body>
    <div class="area">
        <div id="q1">
            <div id="q2">
                <div id="q3"></div>
            </div>
        </div>
    </div>

    <header class="header">
        <nav class="navbar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="./index.php" class="nav-link">HOME</a>
                </li>
                <li class="nav-item">
                    <a href="#sobre" class="nav-link">SOBRE</a>
                </li>
                <li class="nav-item">
                    <a href="#anteriores" class="nav-link">EDIÇÕES</a>
                </li>
                <li class="nav-item">
                    <a href="#palestrantes" class="nav-link">PALESTRANTES</a>
                </li>
                <li class="nav-item">
                    <a href="../login.php" class="nav-link">LOGIN</a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>

    </header>

    <footer class="footer">
        <div class="contador">
            <div id="countdown" class="countdown">
                <div class="contador-mobile">
                    <div class="chamada">
                        <h1 class="vem-ai">FALTAM </h1>
                    </div>
                    <div class="time">
                        <h2 id="days">00 </h2>
                        <small> Dias</small>
                    </div>
                </div>
                <div class="contador-mobile">
                    <div class="time">
                        <h2 id="hours">00 </h2>
                        <small> Horas</small>
                    </div>
                    <div class="time">
                        <h2 id="minutes">00 </h2>
                        <small> Minutos</small>
                    </div>
                </div>
                <div class="botaochamada">
                    <a href=" #palestrantes"><button class="botao-footer">INSCREVA-SE</button></a>
                </div>
            </div>
        </div>
    </footer>


    <div class="parte_principal" id="topo">
        <div class="fundo">
            <img class="triangulo_contorno_pequeno" src="../elementos//elementos_hub-innovation-2023_triangulo-contorno.png" alt="">
            <img class="triangulo_contorno" src="../elementos//elementos_hub-innovation-2023_triangulo-contorno.png " alt=" ">
            <img class="triangulo_preenchimento" src="../elementos/elementos_hub-innovation-2023_triangulo-preenchimento.png " alt=" ">
            <div class="area_logo_principal">
                <div class="content_logo_virus">
                    <img class="logo_efeito_principal" src="../logos com efeitos/logo_hub-innovation-2023_completa-com-efeitos.png" alt=" ">
                    <div class="area_virus_logo">
                        <img class="virus_logo" src="../elementos/elementos_hub-innovation-2023_x-pixels.png">
                    </div>
                </div>
                <div class="area_seta_pixel">
                    <img class="seta_pixel" src="../elementos/elementos_hub-innovation-2023_seta-pixels.png" alt=" ">
                </div>
            </div>
            <div class="area_logos_senac">
                <img class="logo_senac" src="..//logos_senac/Logo Hub Negativo.png" alt=" ">
                <img class="logo_senac" src="..//logos_senac/logoFecomercionegativo.png" alt=" ">
            </div>
        </div>
    </div>

    <div class="segunda_parte">
        <img class="triangulo_fundop2" src="../elementos/elementos_hub-innovation-2023_triangulo-preenchimento.png" alt=" ">
        <div class="content_segunda_parte" id="sobre">
            <div class="content_cards_segunda_parte">
                <div class="d-flex-top">
                    <div class="pontaBarraNeon"></div>
                    <div class="barraNeon"></div>
                    <div class="pontaBarraNeon"></div>
                </div>

                <div class="card_segunda_parte">
                    <img class="icon_sobre" src="../icons/icon_calendar.png" alt=" ">
                    <strong class="text-icons">21/06</strong>
                </div>

                <div class="card_segunda_parte">
                    <img class="icon_sobre" src="../icons/icon_relogio.png" alt=" ">
                    <strong class="text-icons">19:00 21:30</strong>
                </div>

                <div class="card_segunda_parte">
                    <a href="https://goo.gl/maps/vHmFotcfc1wy2Npe7?coh=178571&entry=tt" class="text-icons"><img class="icon_sobre" src="../icons/icon_localidade.png" alt=" ">
                        <strong class="text-icons">senac hub academy</strong></a>
                </div>
                <div class="card_segunda_parte">
                    <img class="icon_sobre" src="../icons/icon_pessoas.png" alt=" ">
                    <strong class="text-icons">empresários profissionais estudantes universitários</strong>
                </div>

                <div class="card_segunda_parte">
                    <img class="icon_sobre" src="../icons/icon_foguete.png" alt=" ">
                    <strong class="text-icons">palestras workshops network</strong>
                </div>
                <div class="d-flex">
                    <div class="pontaBarraNeon"></div>
                    <div class="barraNeon"></div>
                    <div class="pontaBarraNeon"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="background_default " id="anteriores ">
        <img class="logo_senacUp " src="../logos com efeitos/logo_hub-innovation-2023_completa-com-efeitos.png ">
        <div class="content_terceira_parte ">
            <div class="about_terceira_parte ">
                <div class="content_about ">
                    <div class="titulo_sobre " id="anteriores ">
                        <div class="parte1 ">
                            <div class="titulo_parte1 ">
                                <p>Dados da</p>
                            </div>
                        </div>
                        <div class="parte2 ">
                            <div class="bloco_content_titulo_sobre ">
                                <p>1º Edição</p>
                            </div>
                            <div class="quadrados ">
                                <div class="q1 quadrado "></div>
                                <div class="q2 quadrado "></div>
                                <div class="q3 quadrado "></div>
                                <div class="q4 quadrado "></div>
                                <div class="qgeral "></div>
                            </div>
                        </div>
                    </div>
                    <div class="about ">
                        <div class="titulo ">
                            <div class="area_seta_rosa ">
                                <img class="seta_rosa " src="../elementos/quadrados_rosa.png " alt=" ">
                            </div>
                            <strong>+50</strong>
                        </div>
                        <p class="pabout ">PALESTRAS workshops</p>
                    </div>
                    <div class="about ">
                        <div class="titulo ">
                            <div class="area_seta_rosa ">
                                <img class="seta_rosa " src="../elementos/quadrados_rosa.png " alt=" ">
                            </div>
                            <strong>+1200</strong>
                        </div>
                        <p class="pabout ">INSCRITOS</p>
                    </div>
                    <div class="about ">
                        <div class="titulo ">
                            <div class="area_seta_rosa ">
                                <img class="seta_rosa " src="../elementos/quadrados_rosa.png " alt=" ">
                            </div>
                            <p class="pdiferente ">networking</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="area_img_noticias_1evento ">
                <img class="img_noticia_1evento " src="../img/noticias_1evento.png " alt=" ">
            </div>
        </div>
    </div>

    <div class="background_default modify_cards " id="palestrantes ">
        <div class="area_logo_senac_midUp ">
            <img class="logo_senac_midUp " src="../logos com efeitos/logo_hub-innovation-2023_completa-com-efeitos.png ">
        </div>
        <img class="triangulo_preenchido_palestrantes " src="../elementos/elementos_hub-innovation-2023_triangulo-preenchimento.png " alt=" ">
        <img class="triangulo_contorno_palestrantes " src="../elementos/elementos_hub-innovation-2023_triangulo-contorno.png " alt=" ">
        <div class="area_cards ">
            <div class="container_titulo_palestrantes ">
                <div class="content_titulo_palestrantes ">
                    <img src="../elementos/quadrados_rosa.png " alt=" ">
                    <div class="area_titulo_palestrantes ">
                        <strong>PALESTRAS</strong>
                    </div>
                </div>
            </div>

            <div class="content_cards ">
                 <?=$results?>
                <!-- ====================  LISTA CARDS  ============================ -->
            </div>

        </div>


    </div>



</body>
<?php echo "<pre>"; print_r($palestras); echo "</pre>"; ?>
<script src="../js/contador.js"></script>
<script src="../js/main.js"></script>
<script src="../js/menu.js"></script>

</html>
