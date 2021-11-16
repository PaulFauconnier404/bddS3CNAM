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

    <!-- Page Wrapper -->

    <div id="menu_nav">
        <div class="conteneur_menu">
            <h1>Gestion
                <span>
                    Auto'</span>
            </h1>
            <div class="conteneurIcon">

                <a href=" ">
                    <div class="IconMenu">
                        <img src="icon/" alt="">
                        <h2>Accueil</h2>
                    </div>
                </a>
                <a href="">
                    <div class="IconMenu">
                        <img src="icon/" alt="">
                        <h2>Commandes reçus</h2>
                    </div>
                </a>
                <a href="">
                    <div class="IconMenu">
                        <img src="icon/" alt="">
                        <h2>Gérer les pièces</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div id="login">
        <a href="">
            <div class="IconMenu">
                <img src="" alt="">
                <h2>Log in</h2>
            </div>
        </a>
    </div>


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