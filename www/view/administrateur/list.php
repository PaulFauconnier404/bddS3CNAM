<section id="signIn">
    <div class="conteneurSignIn">
        <div class="contenuSignIn">
            <h1>Identifiez vous pour gérer vos stock</h1>
            <p>
                Les identifiants administrateur1@gmail.com | 123
            </p>
            <div class="formContenu">


                <?php
                if (isset($_SESSION['mail'])) {
                    echo '<h1>Vous êtes déjà connecté</h1>';
                } else {
                    echo '
                    <form action="index.php" method="get">
                        <input type="hidden" name="controller" value="administrateur" required />
                        <input type="hidden" name="action" value="connect" required />
                        <input type="text" placeholder="Identifiant / E-mail" name="mail" required />
                        <input type="password" placeholder="Mot de passe" name="password" required />

                        <button type="submit">
                            Connexion
                        </button>
                    </form>';
                }

                ?>
            </div>
        </div>
    </div>
</section>