<section id="accueil">
    <div class="conteneurAccueil">

        <div class="imgAccueil">

            <div class="imgMoov deux"></div>
            <div class="imgMoov trois"></div>
            <div class="imgMoov un"></div>
        </div>
        <div class="textConteneur">
            <h1>Votre gestionnaire de casse auto en ligne !</h1>
            <p>Gérerez vos stocks comme personne !</p>
        </div>

    </div>
</section>

<section id="accueil-command-piece">
    <div class="conteneurCommand-piece">
        <h1 class="titleSection">Passez commande en un clic !</h1>
        <?php
        foreach ($tab_recup as $c) {
            echo '
                <div class="contenu-piece">
                    <h1>' . htmlspecialchars($c['nomPiece']) . '</h1>
                    <h2><span>Catégorie : </span>' . htmlspecialchars($c['categorie']) . ' </h2>
                    <h3><span>Référence : </span>' . htmlspecialchars($c['refPiece']) . ' </h3>
                    <p>
                        <span>Quantité restante : </span>' . htmlspecialchars($c['quantPiece']) . ' unités<br />
                        <span>Prix restante : </span>' . htmlspecialchars($c['prixPiece']) . ' €<br />
                        <span>État de la pièce : </span>' . htmlspecialchars($c['etatPiece']) . '<br />
                        <span>Voiture : </span>' . htmlspecialchars($c['modele']) . ' | ' . htmlspecialchars($c['marque']) . ' | ' . htmlspecialchars($c['anneeModele']) . '<br />
                    </p>
                    <div onclick="commandeProduit(\'' . htmlspecialchars($c['refPiece']) . '\')">
                    </div>
                </div>';
        }
        ?>
    </div>
    <?php
    foreach ($tab_recup as $c) {
        echo '

        <div id="' . htmlspecialchars($c['refPiece']) . '" class="commande-piece-modale unvisible">
            <h2>Commander une pièce | ' . htmlspecialchars($c['refPiece']) . '</h2>
            <form action="index.php" method="get">
                <input type="hidden" name="controller" value="accueil">
                <input type="hidden" name="action" value="created">
                <input type="hidden" required value="' . htmlspecialchars($c['refPiece']) . '" name="refPiece" />

                <div class="conteneurInput">
                    <label>Nom</label>
                    <input type="text" required placeholder="Nom" name="nom" />
                </div>
                <div class="conteneurInput">
                    <label>Prénom</label>
                    <input type="text" required placeholder="Prénom" name="prenom" />
                </div>
                <div class="conteneurInput">
                    <label>Mail</label>
                    <input type="text" required placeholder="Mail" name="mail" />
                </div>
                <div class="conteneurInput">
                    <label>Téléphone</label>
                    <input type="number" placeholder="Téléphone" name="telephone" />
                </div>
                <div class="conteneurInput">
                    <label>Date du click & collect</label>
                    <input type="date" required name="dateclickcollet" />
                </div>
                <div class="conteneurInput">
                    <label>Heure du click & collect</label>
                    <input type="time" required name="heureclickcollect" />
                </div>
                <div class="conteneurInput">
                    <label>Je verse l\'accompte</label>
                    <input type="checkbox"  name="accompte" />
                </div>
                <button type="submit">
                    Envoyer
                </button>
               
            </form>
            <button onclick="unvisible(\'' . htmlspecialchars($c['refPiece']) . '\')">
                Annuler
            </button>
        </div>';
    }
    ?>
</section>


<script>
    function commandeProduit(refproduit) {
        document.getElementById(refproduit).classList.add('visible');
        document.getElementById(refproduit).classList.remove('unvisible');
    }

    function unvisible(refproduit) {
        document.getElementById(refproduit).classList.remove('visible');
        document.getElementById(refproduit).classList.add('unvisible');
    }
</script>