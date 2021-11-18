<section id="piece">
    <div class="conteneurpiece">
        <div class="contenupiece">
            <div class="titleSection">
                <h1>Gérez vos stocks comme un AS !</h1>
                <button onclick='creation()'>
                    Créer une Voiture
                </button>
            </div>

            <table>
                <tr>
                    <td>Id Voiture</td>
                    <td>Date d'entrée de la voiture</td>
                    <td>Descriptif de la voiture</td>
                    <td>Couleur de la voiture</td>

                    <td>État de la voiture</td>
                    <td>Modèle</td>

                    <td>anneeModeleVoiture</td>
                    <td>Nombre de voiture similaire</td>

                    <td>Marque</td>


                    <td></td>

                    <td></td>


                </tr>
                <?php

                foreach ($tab as $c) {
                    echo '
                            <tr>
                                <td>' . htmlspecialchars($c['idVoiture']) . '</td>
                                <td>' . htmlspecialchars($c['dateEntree']) . '</td>
                                <td>' . htmlspecialchars($c['decriptif']) . '</td>
                                <td>' . htmlspecialchars($c['couleur']) . '</td>';

                    if (htmlspecialchars($c['etatVoiture']) == 1) {
                        $etatVoiture = 'Voiture vendable en l\'état';
                    } else {
                        $etatVoiture = 'Voiture épave';
                    }
                    echo '
                                <td>' . $etatVoiture . '</td>

                                <td>' . htmlspecialchars($c['nomModele']) . '</td>
                                
                                <td>' . htmlspecialchars($c['anneemodelevoiture']) . '</td>

                                <td>' . htmlspecialchars($c['nbvoiture']) . '</td>
                                <td>' . htmlspecialchars($c['marque']) . '</td>
                            
                              
                                <a href="">
                                <td onclick="modification(\'' . htmlspecialchars($c['idVoiture']) . '\')"> 
                                    <img src="img/icon/penP.png" alt="trash"/>
                                </td>
                                </a>
                                    <td> 
                                        <a href="index.php?controller=voiture&action=deleted&idvoiture=' . htmlspecialchars($c['idVoiture']) . '">
                                            <img src="img/icon/trash.png" alt="trash"/>
                                        </a>
                                    </td>
                                

                            </tr>
                            ';
                }
                ?>

        </div>
        <div id="creaPiece" class="formulairePiece unvisible">
            <h2>Créer une Voiture</h2>
            <form action="index.php" method="get">
                <input type="hidden" name="controller" value="voiture">
                <input type="hidden" name="action" value="created">
                <div class="conteneurInput">
                    <label>Date d'entrée de la voiture</label>
                    <input type="date" required placeholder="Date d'entrée de la voiture" name="dateentreevoiture" />
                </div>
                <div class="conteneurInput">
                    <label>Descriptif</label>
                    <input type="text" required placeholder="Descriptif" name="descriptifvoiture" />
                </div>
                <div class="conteneurInput">
                    <label>Couleur de la voiture</label>
                    <input type="text" required placeholder="Couleur de la voiture" name="couleurvoiture" />
                </div>
                <div class="conteneurInput">
                    <label>État de la voiture </label>
                    <input type="checkbox" name="etatvendablevoiture" />
                </div>

                <div class="conteneurInput">
                    <label>Modèle de la voiture</label>
                    <select name="idmodele" required>
                        <option value="">--Modèle de la voiture--</option>
                        <?php

                        foreach ($modeleView as $modele) {
                            echo '<option value="' . $modele['idModeleVoiture'] . '">' . $modele['nomModeleVoiture'] . ' - ' . $modele['anneeModeleVoiture'] . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <button type="submit">
                    Envoyer
                </button>

            </form>
            <button onclick="unvisible()">
                Annuler
            </button>
        </div>


        <?php
        foreach ($tab as $c) {
            echo '
            <div id="' . htmlspecialchars($c['idVoiture']) . '" class="formulairePiece unvisible">
            <h2>Modifier une Voiture - ' . htmlspecialchars($c['idVoiture']) . ' | ' . htmlspecialchars($c['nomModele']) . '</h2>
            <form action="index.php" method="get">
                <input type="hidden" name="controller" value="voiture">
                <input type="hidden" name="action" value="updated">
                <input type="hidden" name="idvoiture" value="' . htmlspecialchars($c['idVoiture']) . '">
                <div class="conteneurInput">
                    <label>Date d\'entrée de la voiture</label>
                    <input type="date" required value="' . htmlspecialchars($c['dateEntree']) . '" name="dateentreevoiture" />
                </div>
                <div class="conteneurInput">
                    <label>Descriptif</label>
                    <input type="text" required value="' . htmlspecialchars($c['decriptif']) . '" name="descriptifvoiture" />
                </div>
                <div class="conteneurInput">
                    <label>Couleur de la voiture</label>
                    <input type="text" required value="' . htmlspecialchars($c['couleur']) . '" name="couleurvoiture" />
                </div>';

            if (htmlspecialchars($c['etatVoiture']) == 1) {
                $checked = 'checked';
            } else {
                $checked = '';
            }
            echo '
                <div class="conteneurInput">
                    <label>État de la voiture </label>
                    <input type="checkbox" ' . $checked . '  name="etatvendablevoiture" />
                </div>

                <div class="conteneurInput">
                    <label>Modèle de la voiture</label>
                    <select name="idmodele" required>
                        <option value="' . htmlspecialchars($c['idVoiture']) . '">' . htmlspecialchars($c['idVoiture']) . ' - ' . htmlspecialchars($c['nomModele']) . ' - ' . htmlspecialchars($c['anneemodelevoiture']) . '</option>';


            foreach ($modeleView as $modele) {
                echo '<option value="' . $modele['idModeleVoiture'] . '">' . $modele['nomModeleVoiture'] . ' - ' . $modele['anneeModeleVoiture'] . '</option>';
            }
            echo '
                    </select>
                </div>
             

                <button type="submit">
                    Envoyer
                </button>

            </form>
            <button onclick="unvisiblemodif(\'' . htmlspecialchars($c['idVoiture']) . '\')">
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