<?php

require_once(File::build_path(array('model', 'ModelPieces.php')));
require_once(File::build_path(array('model', 'ModelVoiture.php')));
require_once(File::build_path(array('model', 'ModelModele.php')));
require_once(File::build_path(array('model', 'ModelMarque.php')));
require_once(File::build_path(array('model', 'ModelCategorie.php')));

require_once(File::build_path(array('controller', 'Controller.php')));

class ControllerAccueil extends Controller
{
    protected static $object = 'accueil';

    public static function readAll()
    {
        $tab_Pieces = ModelPieces::selectAll();
        $tab_Voiture = ModelVoiture::selectAll();
        $tab_Modele = ModelModele::selectAll();
        $tab_Marque = ModelMarque::selectAll();
        $tab_Categorie = ModelCategorie::selectAll();
        $tab_recup = [];

        foreach ($tab_Pieces as $pieces) {
            foreach ($tab_Voiture as $voiture) {
                foreach ($tab_Modele as $modele) {
                    foreach ($tab_Marque as $marque) {
                        foreach ($tab_Categorie as $categorie) {
                            if ($pieces->get('idvoiturepiece') === $voiture->get('idvoiture') && $categorie->get('idcategorie') === $pieces->get('idcategoriepiece') && $marque->get('idmarque') === $modele->get('idmarquemodele') && $voiture->get('idmodele') === $modele->get('idmodelevoiture')) {
                                $data = [
                                    'nomPiece' => $pieces->get('nompiece'),
                                    'refPiece' => $pieces->get('refpiece'),
                                    'quantPiece' => $pieces->get('quantpiece'),
                                    'prixPiece' => $pieces->get('prixpiece'),
                                    'etatPiece' => $pieces->get('etatpiece'),

                                    'categorie' => $categorie->get('nomcategorie'),

                                    'modele' => $modele->get('nommodelevoiture'),

                                    'marque' => $marque->get('nommarque'),
                                    'anneeModele' => $modele->get('anneemodelevoiture')
                                ];
                                array_push($tab_recup, $data);
                            }
                        }
                    }
                }
            }
        }

        $view = 'list';
        $pagetitle = 'Accueil - RecupAuto';
        require(File::build_path(array('view', 'view.php')));
    }
}
