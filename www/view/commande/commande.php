<?php
if ($_GET['action'] !== "readAll" && $_GET['action'] !== "read" && $_GET['action'] !== "update") {
    echo '<meta http-equiv="refresh" content="1; URL=index.php?controller=' . static::$object . '&action=readAll" />';
}
?>
<section id="Commande">
    <div class="conteneurCommande">
        <div class="contenuCommande">
            <div class="titleSection">
                <h1>Découvrez vos nouvelles commandes !</h1>

            </div>
            <table>
                <tr>
                    <td>Id Commande</td>
                    <td>Nom du client</td>
                    <td>Prénom du client</td>
                    <td>Mail du client</td>

                    <td>Nom de la pièce</td>
                    <td>Référence de la pièce</td>

                    <td>Date de la réservation</td>
                    <td>Date de la recupération</td>

                    <td>Accompte versé ?</td>

                    <td>Référence de la voiture</td>

                    <td>Modèle</td>

                    <td>Marque</td>

                    <td></td>

                </tr>
                <?php

                foreach ($tab as $c) {
                    echo '
                            <tr>
                                <td>' . htmlspecialchars($c['id']) . '</td>
                                <td>' . htmlspecialchars($c['nom']) . '</td>
                                <td>' . htmlspecialchars($c['prenom']) . '</td>
                                <td>' . htmlspecialchars($c['mail']) . '</td>

                                <td>' . htmlspecialchars($c['nomPiece']) . '</td>
                                <td>' . htmlspecialchars($c['refPiece']) . '</td>

                                <td>' . htmlspecialchars($c['dateReservation']) . '</td>
                                <td>' . htmlspecialchars($c['dateRecuperation']) . '</td>';
                    if (htmlspecialchars($c['accompte']) == true) {
                        $accompte = 'Accompte versé';
                    } else {
                        $accompte = '<b>Accompte non-versé</b>';
                    }
                    echo '
                                <td>' . $accompte . '</td>
                                <td>' . htmlspecialchars($c['idVoiture']) . '</td>
                                <td>' . htmlspecialchars($c['nomModele']) . '</td>
                                <td>' . htmlspecialchars($c['nomMarque']) . '</td>
                                <td>' . htmlspecialchars($c['nomModele']) . '</td>
                               
                                <td> 
                                    <a href="index.php?controller=commande&action=deleted&idcommande=' . htmlspecialchars($c['id']) . '">
                                        <img src="img/icon/trash.png" alt="trash"/>
                                    </a>                                    
                                </td>
                                

                            </tr>
                            ';
                }
                ?>

            </table>
        </div>
    </div>
</section>