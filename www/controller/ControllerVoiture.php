<?php

require_once(File::build_path(array('model', 'ModelVoiture.php')));
require_once(File::build_path(array('model', 'ModelModele.php')));
require_once(File::build_path(array('model', 'ModelMarque.php')));

require_once(File::build_path(array('controller', 'Controller.php')));

class ControllerVoiture extends Controller
{
    protected static $object = 'voiture';

    public static function readAll()
    {
        $tab_Voiture = ModelVoiture::selectAll();
        $tab_Modele = ModelModele::selectAll();
        $tab_Marque = ModelMarque::selectAll();
        $tab = [];
        $marqueView = [];
        $modeleView = [];


        foreach ($tab_Voiture as $voiture) {
            foreach ($tab_Modele as $modele) {
                foreach ($tab_Marque as $marque) {
                    if ($marque->get('idmarque') === $modele->get('idmarquemodele') && $voiture->get('idmodele') === $modele->get('idmodelevoiture')) {
                        $data = [
                            'idVoiture' => $voiture->get('idvoiture'),
                            'dateEntree' => $voiture->get('dateentreevoiture'),
                            'decriptif' => $voiture->get('descriptifvoiture'),
                            'couleur' => $voiture->get('couleurvoiture'),
                            'etatVoiture' => $voiture->get('etatvendablevoiture'),

                            'nomModele' => $modele->get('nommodelevoiture'),
                            'anneemodelevoiture' => $modele->get('anneemodelevoiture'),
                            'nbvoiture' => $marque->get('nbvoiture'),

                            'marque' => $marque->get('nommarque'),
                            'idmarque' => $marque->get('idmarque'),


                        ];
                        array_push($tab, $data);
                    }
                }
            }
        }
        foreach ($tab_Marque as $marque) {
            $dataMarque = [
                'idMarque' => $marque->get('idmarque'),
                'nomMarque' => $marque->get('nommarque')
            ];
            array_push($marqueView, $dataMarque);
        }
        foreach ($tab_Modele as $modele) {
            $dataModele = [
                'idModeleVoiture' => $modele->get('idmodelevoiture'),
                'nomModeleVoiture' => $modele->get('nommodelevoiture'),
                'anneeModeleVoiture' => $modele->get('anneemodelevoiture')
            ];
            array_push($modeleView, $dataModele);
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
            "mailadminpiece" => 'administrateur1@gmail.com',
            "idvoiturepiece" => $_GET["idVoiturePiece"],
        );

        $p = new ModelPieces($data_piece);
        $p->save($data_piece);

        self::readAll();
    }
    public static function deleted()
    {
        ModelVoiture::delete($_GET['idvoiture']);

        self::readAll();
    }
}
