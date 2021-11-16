<section id="piece">
    <div class="conteneurpiece">
        <div class="contenupiece">
            <h1>Gérez vos stocks comme un AS !</h1>
            <div class="btnPieces">
                <button onclick="creaPiece()" class="creation">Créer une pièce</button>
                <button onclick="modifPiece()" class="modification">Modifier une pièce</button>
                <button onclick="suppPiece()" class="suppression">Supprimer une pièce</button>
            </div>

            <div id="creaPiece" class="formulairePiece">
                <h2>Créer une pièce</h2>
                {{ form(formCreaTwig) }}
                <button type="submit">
                    Envoyer
                </button>
            </div>
            <div id="modifPiece" class="formulairePiece invisible">
                <h2>Modifier une pièce</h2>
                {{ form(formModifTwig) }}
                <button type="submit">
                    Envoyer
                </button>
            </div>
            <div id="suppPiece" class="formulairePiece invisible">
                <h2>Supprimer une pièce</h2>
                {{ form(formSupprTwig) }}
                <button type="submit">
                    Envoyer
                </button>
            </div>

        </div>
    </div>
</section>
<script>
    function creaPiece() {
        document.getElementById('creaPiece').classList.remove("invisible");
        document.getElementById('modifPiece').classList.add("invisible");
        document.getElementById('suppPiece').classList.add("invisible");
    }

    function modifPiece() {
        document.getElementById('creaPiece').classList.add("invisible");
        document.getElementById('modifPiece').classList.remove("invisible");
        document.getElementById('suppPiece').classList.add("invisible");
    }

    function suppPiece() {
        document.getElementById('creaPiece').classList.add("invisible");
        document.getElementById('modifPiece').classList.add("invisible");
        document.getElementById('suppPiece').classList.remove("invisible");
    }
</script>