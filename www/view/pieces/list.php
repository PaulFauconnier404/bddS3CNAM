<section id="piece">
    <div class="conteneurpiece">
        <div class="contenupiece">
            <div class="titleSection">
                <h1>Gérez vos stocks comme un AS !</h1>
                <button onclick='creation()'>
                    Créer une pièce
                </button>
            </div>

            <table>
                <tr>
                    <td>Référence de pièce</td>
                    <td>Nom de pièce</td>
                    <td>Quantité de pièce</td>
                    <td>Prix pièce</td>

                    <td>État de la pièce</td>
                    <td>Date de modification</td>

                    <td>Catégorie</td>
                    <td>Voiture</td>

                    <td>Modèle</td>

                    <td>Marque</td>

                    <td></td>

                    <td></td>


                </tr>
                <?php

                foreach ($tab as $c) {
                    echo '
                            <tr>
                                <td>' . htmlspecialchars($c['refPiece']) . '</td>
                                <td>' . htmlspecialchars($c['nomPiece']) . '</td>
                                <td>' . htmlspecialchars($c['quantPiece']) . '</td>
                                <td>' . htmlspecialchars($c['prixPiece']) . ' €</td>
                                <td>' . htmlspecialchars($c['etatPiece']) . '</td>

                                <td>' . htmlspecialchars($c['datePiece']) . ' par ' . htmlspecialchars($c['mailAdmin']) . '</td>
                                
                                <td>' . htmlspecialchars($c['categorie']) . '</td>

                                <td>' . htmlspecialchars($c['voiture']) . '</td>
                                <td>' . htmlspecialchars($c['modele']) . '</td>
                            
                                <td>' . htmlspecialchars($c['marque']) . '</td>
                              
                  
                                <td onclick=\'modification("' . htmlspecialchars($c['refPiece']) . '")\'> 
                                    <img src="img/icon/penP.png" alt="trash"/>
                                </td>
                                    <td> 
                                    <a href="index.php?controller=pieces&action=deleted&idpiece=' . htmlspecialchars($c['refPiece']) . '">

                                        <img src="img/icon/trash.png" alt="trash"/>
                                        </a>

                                    </td>
                                

                            </tr>
                            ';
                }
                ?>

        </div>
        <div id="creaPiece" class="formulairePiece unvisible">
            <h2>Créer une pièce</h2>
            <form action="index.php" method="get">
                <input type="hidden" name="controller" value="pieces">
                <input type="hidden" name="action" value="created">
                <div class="conteneurInput">
                    <label>Référence de la pièce</label>
                    <input type="text" required placeholder="Référence de la pièce" name="refPiece" />
                </div>
                <div class="conteneurInput">
                    <label>Nom de la pièce</label>
                    <input type="text" required placeholder="Nom de la pièce" name="nomPiece" />
                </div>
                <div class="conteneurInput">
                    <label>Quantité de la pièces</label>
                    <input type="number" required placeholder="Quantité de pièces" name="quantPiece" />
                </div>
                <div class="conteneurInput">
                    <label>Prix de la pièce</label>
                    <input type="number" required placeholder="Prix de la pièce" step="0.01" name="prixPiece" />
                </div>
                <div class="conteneurInput">
                    <label>État de la pièce</label>
                    <input type="text" required placeholder="État de la pièce" name="etatPiece" />
                </div>
                <div class="conteneurInput">
                    <label>Catégorie de la pièce</label>
                    <select name="idCategoriePiece" required>
                        <option value="">--Catégorie de la pièces--</option>
                        <?php

                        foreach ($categorieView as $cate) {
                            echo '<option value="' . $cate['idcategorie'] . '">' . $cate['nomcategorie'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="conteneurInput">
                    <label>Voiture de la pièce</label>
                    <select name="idVoiturePiece" required>
                        <option value="">--Voiture de la pièce--</option>
                        <?php
                        foreach ($voitureView as $voit) {
                            echo '<option value="' . $voit['idvoiture'] . '">' . $voit['idvoiture'] . ' - ' . $voit['dateentreevoiture'] . ' - ' . $voit['couleurvoiture'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="conteneurInput">
                </div>



                <button type="submit">
                    Envoyer
                </button>
            </form>
            <a href="index.php?controller=voiture&action=readAll">
                <button class="ajoutCar">
                    Ajouter une voiture ?
                </button>
            </a>
            <button onclick='unvisible()'>
                Annuler
            </button>
        </div>
        <?php
        foreach ($tab as $c) {
            echo '
            <div id="' . htmlspecialchars($c['refPiece']) . '" class="formulairePiece unvisible">
                        <h2>Modifier une pièce - ' . htmlspecialchars($c['refPiece']) . '</h2>
                        <form action="index.php" method="get">
                            <input type="hidden" name="controller" value="pieces">
                        <input type="hidden" name="action" value="updated">
                        <input type="hidden" name="refPiece" value="' . htmlspecialchars($c['refPiece']) . '">
                            <div class="conteneurInput">
                                <label>Nom de la pièce</label>
                                <input type="text" required value="' . htmlspecialchars($c['nomPiece']) . '" name="nomPiece" />
                            </div>
                            <div class="conteneurInput">
                                <label>Quantité de la pièces</label>
                                <input type="number" required value="' . htmlspecialchars($c['quantPiece']) . '" name="quantPiece" />
                            </div>
                            <div class="conteneurInput">
                                <label>Prix de la pièce</label>
                                <input type="number" required step="0.01" value="' . htmlspecialchars($c['prixPiece']) . '" name="prixPiece" />
                            </div>
                            <div class="conteneurInput">
                                <label>État de la pièce</label>
                                <input type="text" required value="' . htmlspecialchars($c['etatPiece']) . '" name="etatPiece" />
                            </div>
                            <div class="conteneurInput">
                                <label>Catégorie de la pièce</label>
                                <select name="idCategoriePiece" required>
                                    <option value="' . htmlspecialchars($c['idcategorie']) . '">' . htmlspecialchars($c['categorie']) . '</option>';
            foreach ($categorieView as $cate) {
                echo '<option value="' . $cate['idcategorie'] . '">' . $cate['nomcategorie'] . '</option>';
            }
            echo '
                                </select>
                            </div>
                            <div class="conteneurInput">
                                <label>Voiture de la pièce</label>
                                <select name="idVoiturePiece" required>
                                    <option value="' . htmlspecialchars($c['voiture']) . '">' . htmlspecialchars($c['voiture']) . ' - ' . htmlspecialchars($c['dateentreevoiture']) . '</option>';
            foreach ($voitureView as $voit) {
                echo '<option value="' . $voit['idvoiture'] . '">' . $voit['idvoiture'] . ' - ' . $voit['dateentreevoiture'] . ' - ' . $voit['couleurvoiture'] . '</option>';
            }
            echo '
                                </select>
                            </div>
                        

                            <button type="submit">
                                Envoyer
                            </button>
                        </form>
                        <button onclick=\'unvisiblemodif("' . htmlspecialchars($c['refPiece']) . '")\'>
                            Annuler
                        </button>
                    </div>';
        }
        ?>


    </div>
</section>
<script>
    function creation() {
        document.getElementById('creaPiece').classList.remove('unvisible');
    }

    function unvisible() {
        document.getElementById('creaPiece').classList.add('unvisible');
    }

    function modification(refpiece) {
        document.getElementById(refpiece).classList.remove('unvisible');
    }

    function unvisiblemodif(refpiece) {
        document.getElementById(refpiece).classList.add('unvisible');
    }
</script>
<!-- 
 -->