<?php
if ($_GET['action'] !== "readAll" && $_GET['action'] !== "read" && $_GET['action'] !== "update") {
    echo '<meta http-equiv="refresh" content="1; URL=index.php?controller=' . static::$object . '&action=readAll" />';
}
?>
<section id="Commande">
    <div class="conteneurCommande">
        <div class="contenuCommande">
            <table>
                <tr>
                    <td>Id Commande</td>
                    <td>Nom du client</td>
                    <td>Prénom du client</td>
                    <td>Nom de la pièce</td>
                    <td>Mail du client</td>
                    <td>Date de la réservation</td>
                    <td>Date de la recupération</td>
                    <td>Accompte versé ?</td>
                    <td>Référence de la voiture</td>
                    <td>Modèle</td>
                    <td>Marque</td>
                </tr>
                <?php
                echo 'cococ';
                var_dump(count($tab));
                foreach ($tab as $c) {
                    echo '
                            <tr>
                                <td>' . htmlspecialchars($c['id']) . '</td>
                                <td>' . htmlspecialchars($c['nom']) . '</td>
                                <td>' . htmlspecialchars($c['prenom']) . '</td>
                                <td>' . htmlspecialchars($c['mail']) . '</td>
                                <td>' . htmlspecialchars($c['dateReservation']) . '</td>
                                <td>' . htmlspecialchars($c['dateRecuperation']) . '</td>
                                <td>' . htmlspecialchars($c['accompte']) . '</td>
                                <td>' . htmlspecialchars($c['idVoiture']) . '</td>
                                <td>' . htmlspecialchars($c['etatVoiture']) . '</td>
                            </tr>
                            ';
                }
                ?>

            </table>
        </div>
    </div>
</section>