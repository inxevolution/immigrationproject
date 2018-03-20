<?php 

include('../conf.php');

session_start();

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB1xG03efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}

$id_code = $_REQUEST['code'];

//echo $id_code;

$sqluser = "SELECT * FROM user WHERE id_user = '$id_code' ";
$resultado_user = mysqli_query($ligacao, $sqluser);
$registo_user = mysqli_fetch_array($resultado_user);

$name = $registo_user['name'];
$datanascimento = $registo_user['datebirthday'];
$email = $registo_user['email'];
$cargo = $registo_user['office'];
$cpf = $registo_user['cpf'];
$pagamento = $registo_user['payment'];
$country = $registo_user['country'];
$city = $registo_user['city'];
$adress = $registo_user['adress'];
$numberhouse = $registo_user['number'];


$sqlpass = "SELECT * FROM p_conf WHERE id_user = '$id_code' ";
$resultado_pass = mysqli_query($ligacao, $sqlpass);
$registo_pass = mysqli_fetch_array($resultado_pass);

/*
echo "<br>";
echo "Password: ".$registo_pass['password'];
*/

$user_pw = $registo_pass['password'];
$pass_crypt = decryptIt( $user_pw );

/*
echo "<br>";
echo $pass_crypt;
echo "<br>";
echo $name;
echo "<br>";
echo $datanascimento;
echo "<br>";
echo $email;
echo "<br>";
echo $cargo;
echo "<br>";
echo $cpf;
echo "<br>";
echo $pagamento;
echo "<br>";
echo $country;
echo "<br>";
echo $city;
echo "<br>";
echo $adress;
echo "<br>";
echo $numberhouse;
echo "<br>";
echo $comment;
echo "<br>";
*/

$office = "SELECT * FROM office where id_office = '$cargo' ";
$resultado_office = mysqli_query($ligacao, $office);
$resultado_printoff = mysqli_fetch_array($resultado_office);
$cargo = $resultado_printoff['office'];

/*
echo $cargo;
echo "<br>";
*/

$payment = "SELECT * FROM payment where tp_payment = '$pagamento' ";
$resultado_payment = mysqli_query($ligacao, $payment);
$resultado_printpay = mysqli_fetch_array($resultado_payment);
$pagamento = $resultado_printpay['paymnet'];

/*
echo $pagamento;
echo "<br>";
*/

$countrysql = "SELECT * FROM country where id_country = '$country' ";
$resultado_country = mysqli_query($ligacao, $countrysql);
$resultado_printcnt = mysqli_fetch_array($resultado_country);
$country = $resultado_printcnt['country'];

/*
echo $country;
echo "<br>";
*/

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>IP - Immigration Project</title>
    <meta name="keywords" content="IP - Immigration Project" />
    <meta name="description" content="IP - Immigration Project">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" type="image/png" href="../images/logo-black.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,700,800,900" rel="stylesheet" type="text/css">

    <!-- Libs CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/style.css" rel="stylesheet" />
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <link href="../css/v-nav-menu.css" rel="stylesheet" />
    <link href="../css/v-animation.css" rel="stylesheet" />
    <link href="../css/v-bg-stylish.css" rel="stylesheet" />
    <link href="../css/v-shortcodes.css" rel="stylesheet" />
    <link href="../css/theme-responsive.css" rel="stylesheet" />
    <link href="../plugins/owl-carousel/owl.theme.css" rel="stylesheet" />
    <link href="../plugins/owl-carousel/owl.carousel.css" rel="stylesheet" />

    <!-- Current Page CSS -->
    <link href="../plugins/rs-plugin/css/settings.css" rel="stylesheet" />
    <link href="../plugins/rs-plugin/css/custom-captions.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
</head>

<body class="no-page-top" id="home-page">
    <!-- oncontextmenu="return false;" -->
    <!--Header-->
    <!--Set your own background color to the header-->
    <header class="semi-transparent-header" data-bg-color="rgba(0, 10, 48, 0.40)" data-font-color="#fff">
        <div class="container">

            <!--Site Logo-->
            <div class="logo" data-sticky-logo="../images/logo-white.png" style="width: 5%;" data-normal-logo="../images/logo-black.png">
                <a href="#home">
                    <img alt="Immigration Project" src="../images/logo-black.png" style="height: 50%; width: 20%;" data-logo-height="35">
                </a>
            </div>
            <!--End Site Logo-->

            <div class="navbar-collapse nav-main-collapse collapse">

                <!--Main Menu-->
                <nav class="nav-main mega-menu one-page-menu">
                    <ul class="nav nav-pills nav-main" id="mainMenu">
                        <!-- 
                        <li class="dropdown">
                            <a class="dropdown-toggle menu-icon indexuser" href="#">Home<i class="fa fa-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a class="indexuser" href="">Features</a></li>
                                <li class="dropdown-submenu">
                                    <a class="indexuser" href="#">Sobre nós</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="indexuser" href="#">Descrição</a></li>
                                        <li><a class="indexuser" href="#">Serviço</a></li>
                                    </ul>
                                </li>
                                <li><a class="indexuser" href="">Screenshots</a></li>
                                <li><a class="indexuser" href="">Download</a></li>
                                <li class="dropdown-submenu">
                                    <a class="indexuser" href="#">Redes Sociais</a>
                                    <ul class="dropdown-menu">
                                        <li><a target="_blank" href="https://www.facebook.com/immigrationprojectbr">Facebook</a></li>
                                        <li><a target="_blank" href="https://www.instagram.com/immigrationprojectbr/">Instagram</a></li>
                                        <li><a target="_blank" href="https://www.twitter.com/immigraproject">Twitter</a></li>
                                        <li><a target="_blank" href="https://www.youtube.com/channel/UC-QnBGMmGvPsZo5l1rGpZvg">Youtube</a></li>
                                        <li><a target="_blank" href="https://www.linkedin.com/company/ip-immigration-project">Linkedin</a></li>
                                        <li><a target="_blank" href="https://plus.google.com/104671275093138828430">Google Plus</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        -->

                        <li class="dropdown">
                            <a class="dropdown-toggle menu-icon" id="Online" href="#">
                                <i class="fa fa-user"></i>Online
                            </a>
                            <ul class="dropdown-menu">

                                <li>
                                    <form action="../wl/index.php" name="index-wl" id="index-wl" method="post">
                                        <input type="hidden" name="code" value="<?php echo $id_code; ?>" />
                                    </form>
                                    <a target="_self" onclick="document.getElementById('index-wl').submit();">
                                        <i class="fa fa-mail-reply"></i>Inicio
                                    </a>
                                </li>

                                <li>
                                <form action="../wl/logout.php" name="logout" id="logout" method="post">
                                    <input type="hidden" name="code" value="<?php echo $id_code; ?>" />
                                </form>
                                    <a target="_self" onclick="document.getElementById('logout').submit();">
                                        <i class="fa fa-sign-out"></i> Sair
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!--End Main Menu-->
            </div>
            <button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
                <i class="fa fa-bars"></i>
            </button>

        </div>
    </header>
    <!--End Header-->

    <div id="container" id="MyAccount">
        <!--Set your own slider options. Look at the v_RevolutionSlider() function in 'theme-core.js' file to see options-->
        <div class="home-slider-wrap fullwidthbanner-container" style="background: #000a30; ">
            <div class="v-rev-slider" data-slider-options='{ "startheight": 400 }'>
                <ul>
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="600">
                        <!--
                        <img src="../img/slider/image2.png" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                        -->

                        <div class="tp-caption v-caption-big-white sfl stl" data-x="525" data-y="150" data-speed="600" data-start="600" data-easing="Power1.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-endspeed="300" style="text-transform: uppercase;">
                            Immigration
                            <br /> Project
                        </div>

                        <div class="tp-caption v-caption-h1 sfl stl" data-x="525" data-y="250" data-speed="700" data-start="1200" data-easing="Power1.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0" data-endelementdelay="0" data-endspeed="300">
                            MINHA CONTA
                        </div>
                    </li>
                </ul>
            </div>

            <div class="shadow-right"></div>
        </div>

        <div class="container">
            <div class="v-spacer col-sm-12 v-height-standard"></div>
        </div>

        <div class="center">
            <div class="col-sm-8 col-sm-offset-2">
                <form action="ex_reg.php" id="registocontacto" method="post">
                    <div class="form-group">
                        <div class="col-sm-8">
                            <label>Nome Completo<span class="required">*</span></label>
                            <input type="text" value="<?php echo $name; ?>" class="form-control" name="name" id="name" readonly disabled>
                        </div>

                        <div class="col-sm-4">
                            <label>Data de nascimento<span class="required">*</span></label>
                            <input type="date" value="<?php echo $datanascimento; ?>" class="form-control" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" data-date="" data-date-format="DD MMMM YYYY" name="datanascimento" id="datanascimento" readonly disabled>
                        </div>

                        <div class="col-sm-8">
                            <label>Email<span class="required">*</span></label>
                            <input type="email" value="<?php echo $email; ?>" class="form-control" name="email" id="email1" readonly disabled>
                        </div>

                        <div class="col-sm-4">
                            <label>Cargo<span class="required">*</span></label>
                            <input type="email" value="<?php echo $cargo; ?>" class="form-control" name="email" id="email1" readonly disabled>
                            <!--
                                    <select class="form-control" name="cargo" id="cargo" required>
                                        <option value="" hidden></option>
                                        <option value="Aluno">Aluno</option>
                                        <option value="Professor">Professor</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                -->
                        </div>

                        <div class="col-sm-6">
                            <label>Password<span class="required">*</span></label>
                            <input type="password" value="<?php echo $pass_crypt; ?>" name="passoword" id="password" class="form-control" readonly disabled>
                        </div>

                        <div class="col-sm-6">
                            <label>Confirma Password<span class="required">*</span></label>
                            <input type="password" value="<?php echo $pass_crypt; ?>" name="confirm_password" id="confirm_password" class="form-control" readonly disabled>
                        </div>

                        <div class="col-sm-4">
                            <label>CPF<span class="required">*</span></label>
                            <input type="text" value="<?php echo $cpf; ?>" name="cpf" id="cpf" class="form-control" readonly disabled>
                        </div>



                        <div class="col-sm-4">
                            <label>Forma de pagemento<span class="required">*</span></label>
                            <input type="text" value="<?php echo $pagamento; ?>" name="cpf" id="cpf" class="form-control" readonly disabled>
                        </div>


                        <div class="col-sm-4">
                            <label>Pais</label>
                            <input type="text" value="<?php echo $country; ?>" class="form-control" name="country" id="country" readonly disabled>
                        </div>

                        <div class="col-sm-4">
                            <label>Cidade</label>
                            <input type="text" value="<?php echo $city; ?>" class="form-control" name="city" id="city" readonly disabled>
                        </div>

                        <div class="col-sm-4">
                            <label>Morada</label>
                            <input type="text" value="<?php echo $adress; ?>" class="form-control" name="adress" id="adress" readonly disabled>
                        </div>

                        <div class="col-sm-4">
                            <label>Número</label>
                            <input type="text" value="<?php echo $numberhouse; ?>" class="form-control" name="numberhouse" id="numberhouse" readonly disabled>
                        </div>

                    </div>
                    <div class="col-sm-12">
                        <br />
                        <button name="submit" type="submit" id="sendmesage" class="btn v-btn no-three-d">Alterar</button>
                        <button name="submit" type="submit" id="sendmesage" class="btn v-btn no-three-d">Apagar conta</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="row" style="margin-right: 0px;">
            <div class="v-spacer col-sm-12 v-height-small"></div>
        </div>

        <!--
        <div class="row center">
            <ul class="social-icons large center">
                <li class="facebook"><a href="https://www.facebook.com/immigrationprojectbr" target="_blank"><i class="fa fa-facebook"></i><i class="fa fa-facebook"></i></a></li>
                <li class="instagram"><a href="https://www.instagram.com/immigrationprojectbr" target="_blank"><i class="fa fa-instagram"></i><i class="fa fa-instagram"></i></a></li>
                <li class="twitter"><a href="https://www.twitter.com/immigraproject" target="_blank"><i class="fa fa-twitter"></i><i class="fa fa-twitter"></i></a></li>
                <li class="youtube"><a href="https://www.youtube.com/channel/UC-QnBGMmGvPsZo5l1rGpZvg" target="_blank"><i class="fa fa-youtube"></i><i class="fa fa-youtube"></i></a></li>
                <li class="linkedin"><a href="https://www.linkedin.com/company/ip-immigration-project" target="_blank"><i class="fa fa-linkedin"></i><i class="fa fa-linkedin"></i></a></li>
                <li class="googleplus"><a href="https://plus.google.com/104671275093138828430" target="_blank"><i class="fa fa-google-plus"></i><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        -->

    </div>

    <?php include('../footer.php'); ?>
