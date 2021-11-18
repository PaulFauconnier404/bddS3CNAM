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
        if ($_GET["etatvendablevoiture"] != 1) {
            $accompte = 0;
        } else {
            $accompte = 1;
        }
        $data_voiture = array(
            "dateentreevoiture" => $_GET["dateentreevoiture"],
            "descriptifvoiture" => $_GET["descriptifvoiture"],
            "couleurvoiture" => $_GET["couleurvoiture"],
            "etatvendablevoiture" => $accompte,
            "idmodele" => $_GET["idmodele"]
        );

        $p = new ModelVoiture($data_voiture);
        $p->save($data_voiture);

        self::readAll();
    }
    public static function deleted()
    {
        ModelVoiture::delete($_GET['idvoiture']);

        self::readAll();
    }
    public static function updated()
    {

        if ($_GET["etatvendablevoiture"] != 1) {
            $accompte = 0;
        } else {
            $accompte = 1;
        }
        $data_voiture = array(
            "idvoiture" => $_GET["idvoiture"],
            "dateentreevoiture" => $_GET["dateentreevoiture"],
            "descriptifvoiture" => $_GET["descriptifvoiture"],
            "couleurvoiture" => $_GET["couleurvoiture"],
            "etatvendablevoiture" => $accompte,
            "idmodele" => $_GET["idmodele"]
        );

        $pieces = new ModelVoiture($data_voiture);
        $pieces->update($data_voiture);

        self::readAll();
    }
}
