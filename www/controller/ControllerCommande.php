<?php

require_once(File::build_path(array('model', 'ModelCommande.php')));
require_once(File::build_path(array('model', 'ModelPieces.php')));
require_once(File::build_path(array('model', 'ModelClient.php')));
require_once(File::build_path(array('model', 'ModelVoiture.php')));
require_once(File::build_path(array('model', 'ModelModele.php')));
require_once(File::build_path(array('model', 'ModelMarque.php')));

require_once(File::build_path(array('controller', 'Controller.php')));

class ControllerCommande extends Controller
{
    protected static $object = 'commande';

    public static function readAll()
    {
        $tab_Commande = ModelCommande::selectAll();
        $tab_Pieces = ModelPieces::selectAll();
        $tab_Client = ModelClient::selectAll();
        $tab_Voiture = ModelVoiture::selectAll();
        $tab_Modele = ModelModele::selectAll();
        $tab_Marque = ModelMarque::selectAll();
        $tab = [];

        foreach ($tab_Commande as $commande) {
            foreach ($tab_Pieces as $pieces) {
                foreach ($tab_Client as $client) {
                    foreach ($tab_Voiture as $voiture) {
                        foreach ($tab_Modele as $modele) {
                            foreach ($tab_Marque as $marque) {
                                if ($marque->get('idmarque') === $modele->get('idmarquemodele') && $voiture->get('idmodele') === $modele->get('idmodelevoiture') && $client->get('mailclient') === $commande->get('mailclientcommande') && $pieces->get('refpiece') === $commande->get('refpiececommande') && $pieces->get('idvoiturepiece') === $voiture->get('idvoiture')) {
                                    $data = [
                                        'id' => $commande->get('idcommande'),
                                        'nom' => $client->get('nomclient'),
                                        'prenom' => $client->get('preclient'),
                                        'mail' => $client->get('mailclient'),

                                        'nomPiece' => $pieces->get('nompiece'),
                                        'refPiece' => $pieces->get('refpiece'),

                                        'dateReservation' => $commande->get('datereservation'),
                                        'dateRecuperation' => $commande->get('dateclickcollect'),

                                        'accompte' => $commande->get('accompteverse'),
                                        'idVoiture' => $voiture->get('idvoiture'),
                                        'nomModele' => $modele->get('nommodelevoiture'),
                                        'nomMarque' => $marque->get('nommarque')
                                    ];
                                    array_push($tab, $data);
                                }
                            }
                        }
                    }
                }
            }
        }

        $view = 'commande';
        $pagetitle = 'Commande - recupAuto';
        require(File::build_path(array('view', 'view.php')));
    }
    public static function deleted()
    {
        ModelCommande::delete($_GET['idcommande']);

        self::readAll();
    }
}
