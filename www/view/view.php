<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/bus-solid.ico">

    <title><?php echo $pagetitle ?></title>

    <link rel="stylesheet" href="../css/style.css">

    <!-- Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


</head>

<body>
    <?php
    if ($_GET['controller'] == "commande") {
        $home = 'img/icon/homeV.png';
        $cart = 'img/icon/cartP.png';
        $piece = 'img/icon/setV.png';
        $voiture = 'img/icon/carV.png';
    } else if ($_GET['controller'] == "accueil") {
        $home = 'img/icon/homeP.png';
        $cart = 'img/icon/cartV.png';
        $piece = 'img/icon/setV.png';
        $voiture = 'img/icon/carV.png';
    } else if ($_GET['controller'] == "pieces") {
        $home = 'img/icon/homeV.png';
        $cart = 'img/icon/cartV.png';
        $piece = 'img/icon/setP.png';
        $voiture = 'img/icon/carV.png';
    } else if ($_GET['controller'] == "voiture") {
        $home = 'img/icon/homeV.png';
        $cart = 'img/icon/cartV.png';
        $piece = 'img/icon/setV.png';
        $voiture = 'img/icon/carP.png';
    } else if ($_GET['controller'] == "administrateur") {
        $home = 'img/icon/homeV.png';
        $cart = 'img/icon/cartP.png';
        $piece = 'img/icon/setV.png';
        $voiture = 'img/icon/carV.png';
    }

    ?>

    <!-- Page Wrapper -->
    <?php

    if (isset($_SESSION['mail'])) {

        echo ' <div id="menu_nav">
                    <div class="conteneur_menu">
                        <h1>Gestion
                            <span>
                                Auto\'</span>
                        </h1>
                        <div class="conteneurIcon">

                            <a href="index.php?controller=accueil&action=readAll">
                                <div class="IconMenu">
                                    <img src="' . $home . '" alt="">
                                    <h2>Accueil</h2>
                                </div>
                            </a>
                            <a href="index.php?controller=commande&action=readAll">
                                <div class="IconMenu">
                                    <img src="' . $cart . '" alt="">
                                    <h2>Commandes reçus</h2>
                                </div>
                            </a>
                            <a href="index.php?controller=pieces&action=readAll">
                                <div class="IconMenu">
                                    <img src="' . $piece . '" alt="">
                                    <h2>Gérer les pièces</h2>
                                </div>
                            </a>
                            <a href="index.php?controller=voiture&action=readAll">
                                <div class="IconMenu">
                                    <img src="' . $voiture . '" alt="">
                                    <h2>Gérer les voitures</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="login">
                    <a href="index.php?controller=administrateur&action=readAll">
                        <div class="IconMenu">
                            <img src="img/icon/user.png" alt="">
                            <h2>Log in</h2>
                        </div>
                    </a>
                </div>';
    } else {
        echo ' <div id="menu_nav">
                <div class="conteneur_menu">
                    <h1>Gestion
                        <span>
                            Auto\'</span>
                    </h1>
                    <div class="conteneurIcon">

                        <a href="index.php?controller=accueil&action=readAll">
                            <div class="IconMenu">
                                <img src="' . $home . '" alt="">
                                <h2>Accueil</h2>
                            </div>
                        </a>
                        
                        
                    </div>
                </div>
            </div>

            <div id="login">
                <a href="index.php?controller=administrateur&action=readAll">
                    <div class="IconMenu">
                        <img src="img/icon/user.png" alt="">
                        <h2>Log in</h2>
                    </div>
                </a>
            </div>';
    }

    ?>


    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">
                <?php
                if (isset(self::$object)) {

                    $filepath = File::build_path(array("view", self::$object, "$view.php"));
                    require $filepath;
                } else {
                    $message = explode('CONTEXT', substr($e->errorInfo[2], 7));
                    echo '<div class="alert alert-danger col-lg-6 offset-3" role="alert"><i class="fas fa-exclamation-triangle"></i> <b>Erreur :</b>' . $message[0] . '</div>';
                }
                ?>
            </div>

        </div>

    </div>


</body>

</html>