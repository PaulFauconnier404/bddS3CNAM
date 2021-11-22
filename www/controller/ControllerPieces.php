<?php

require_once(File::build_path(array('model', 'ModelPieces.php')));
require_once(File::build_path(array('model', 'ModelVoiture.php')));
require_once(File::build_path(array('model', 'ModelModele.php')));
require_once(File::build_path(array('model', 'ModelMarque.php')));
require_once(File::build_path(array('model', 'ModelCategorie.php')));

require_once(File::build_path(array('controller', 'Controller.php')));

class ControllerPieces extends Controller
{
    protected static $object = 'pieces';

    public static function readAll()
    {
        $tab_Pieces = ModelPieces::selectAll();
        $tab_Voiture = ModelVoiture::selectAll();
        $tab_Modele = ModelModele::selectAll();
        $tab_Marque = ModelMarque::selectAll();
        $tab_Categorie = ModelCategorie::selectAll();
        $tab = [];
        $categorieView = [];
        $voitureView = [];


        foreach ($tab_Pieces as $pieces) {
            foreach ($tab_Voiture as $voiture) {
                foreach ($tab_Modele as $modele) {
                    foreach ($tab_Marque as $marque) {
                        foreach ($tab_Categorie as $categorie) {
                            if ($pieces->get('idvoiturepiece') === $voiture->get('idvoiture') && $categorie->get('idcategorie') === $pieces->get('idcategoriepiece') && $marque->get('idmarque') === $modele->get('idmarquemodele') && $voiture->get('idmodele') === $modele->get('idmodelevoiture')) {
                                $data = [
                                    'refPiece' => $pieces->get('refpiece'),
                                    'nomPiece' => $pieces->get('nompiece'),
                                    'quantPiece' => $pieces->get('quantpiece'),
                                    'prixPiece' => $pieces->get('prixpiece'),
                                    'etatPiece' => $pieces->get('etatpiece'),

                                    'datePiece' => $pieces->get('datemodifpiece'),
                                    'mailAdmin' => $pieces->get('mailadminpiece'),
                                    'categorie' => $categorie->get('nomcategorie'),

                                    'voiture' => $voiture->get('idvoiture'),
                                    'modele' => $modele->get('nommodelevoiture'),

                                    'marque' => $marque->get('nommarque'),
                                    'dateentreevoiture' => $voiture->get('dateentreevoiture')
                                ];
                                array_push($tab, $data);
                            }
                        }
                    }
                }
            }
        }
        foreach ($tab_Categorie as $categorie) {
            $dataCategorie = [
                'idcategorie' => $categorie->get('idcategorie'),
                'nomcategorie' => $categorie->get('nomcategorie')
            ];
            array_push($categorieView, $dataCategorie);
        }
        foreach ($tab_Voiture as $voiture) {
            $dataVoiture = [
                'idvoiture' => $voiture->get('idvoiture'),
                'couleurvoiture' => $voiture->get('couleurvoiture'),
                'dateentreevoiture' => $voiture->get('dateentreevoiture')
            ];
            array_push($voitureView, $dataVoiture);
        }

        $view = 'list';
        $pagetitle = 'Gérez vos pièces - recupAuto';
        require(File::build_path(array('view', 'view.php')));
    }
    public static function created()
    {
        $data_piece = array(
            "refpiece" => strtoupper($_GET["refPiece"]),
            "nompiece" => ucfirst($_GET["nomPiece"]),
            "quantpiece" => $_GET["quantPiece"],
            "prixpiece" => $_GET["prixPiece"],
            "etatpiece" => $_GET["etatPiece"],
            "datemodifpiece" => date("Y-m-d H:i:s"),
            "idcategoriepiece" => $_GET["idCategoriePiece"],
            "idvoiturepiece" => $_GET["idVoiturePiece"],
            "mailadminpiece" => $_SESSION['mail']

        );

        $pieces = new ModelPieces($data_piece);
        $pieces->save($data_piece);

        self::readAll();
    }

    public static function deleted()
    {
        ModelPieces::delete($_GET['idpiece']);

        self::readAll();
    }
    public static function updated()
    {
        $data_piece = array(
            "refpiece" => strtoupper($_GET["refPiece"]),
            "nompiece" => ucfirst($_GET["nomPiece"]),
            "quantpiece" => $_GET["quantPiece"],
            "prixpiece" => $_GET["prixPiece"],
            "etatpiece" => $_GET["etatPiece"],
            "datemodifpiece" => date("Y-m-d H:i:s"),
            "idcategoriepiece" => $_GET["idCategoriePiece"],
            "idvoiturepiece" => $_GET["idVoiturePiece"],
            "mailadminpiece" => $_SESSION['mail']

        );

        $pieces = new ModelPieces($data_piece);
        $pieces->update($data_piece);

        self::readAll();
    }
}
