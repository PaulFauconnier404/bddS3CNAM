<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../css/style.css">

    <title><?php echo $pagetitle ?></title>



</head>

<body>

    <div id="menu_nav">
        <div class="conteneur_menu">
            <h1>Gestion
                <span>
                    Auto'</span>
            </h1>
            <div class="conteneurIcon">

                <a href="index.php?controller=accueil&action=readAll">
                    <div class="IconMenu">
                        <img src="img/icon/homeP.png" alt="">
                        <h2>Accueil</h2>
                    </div>
                </a>
                <a href="index.php?controller=commande&action=readAll">
                    <div class="IconMenu">
                        <img src="img/icon/cartV.png" alt="">
                        <h2>Commandes reçus</h2>
                    </div>
                </a>
                <a href="index.php?controller=pieces&action=readAll">
                    <div class="IconMenu">
                        <img src="img/icon/setV.png" alt="">
                        <h2>Gérer les pièces</h2>
                    </div>
                </a>
                <a href="index.php?controller=voiture&action=readAll">
                    <div class="IconMenu">
                        <img src="img/icon/carV.png" alt="">
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
    </div>


    <div class="errorPage">
        <div>
            <p>Page non trouvée</p>
            <p>Il semble y avoir un bug dans la matrice ...</p>
            <a href="index.php">&larr; Retour à l'accueil</a>
        </div>

    </div>
</body>

</html>