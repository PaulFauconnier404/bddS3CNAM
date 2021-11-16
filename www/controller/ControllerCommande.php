<?php

require_once(File::build_path(array('model', 'ModelCommande.php')));
require_once(File::build_path(array('model', 'ModelPieces.php')));
require_once(File::build_path(array('model', 'ModelClient.php')));
require_once(File::build_path(array('model', 'ModelVoiture.php')));

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
        $tab = [];

        foreach ($tab_Commande as $commande) {
            foreach ($tab_Pieces as $pieces) {
                foreach ($tab_Client as $client) {
                    foreach ($tab_Voiture as $voiture) {
                        if ($client->get('mailclient') === $commande->get('mailclientcommande') && $pieces->get('refpiece') === $commande->get('refpiececommande') && $pieces->get('idvoiturepiece') === $voiture->get('idvoiture')) {
                            $data = [
                                'id' => $commande->get('idcommande'),
                                'nom' => $client->get('nomclient'),
                                'prenom' => $client->get('preclient'),
                                'mail' => $client->get('mailclient'),
                                'dateReservation' => $commande->get('datereservation'),
                                'dateRecuperation' => $commande->get('dateclickcollect'),
                                'accompte' => $commande->get('accompteverse'),
                                'idVoiture' => $voiture->get('idvoiture'),
                                'etatVoiture' => $voiture->get('etatvendablevoiture')
                            ];
                            array_push($tab, $data);
                        }
                    }
                }
            }
        }

        $view = 'commande';
        $pagetitle = 'Commande - recupAuto';
        require(File::build_path(array('view', 'view.php')));
    }

    // public static function created()
    // {
    //     $data = array(
    //         "marque" => strtoupper($_GET["marque"]),
    //         "immatriculation" => strtoupper($_GET["immatriculation"]),
    //         "nbplaces" => $_GET["nbplaces"],
    //     );

    //     $b = new ModelCommande($data);
    //     $b->save($data);

    //     self::readAll();
    // }

    // public static function deleted()
    // {
    //     ModelBus::delete($_GET['id']);

    //     self::readAll();
    // }

    // public static function read()
    // {
    //     $bus = ModelBus::select($_GET['id']);
    //     $tab = ModelBus::selectAll();
    //     $view = 'list';
    //     $pagetitle = 'Bus - Transvar';
    //     require(File::build_path(array('view', 'view.php')));
    // }

    // public static function update()
    // {
    //     $bus = ModelBus::select($_GET['id']);
    //     $tab = ModelBus::selectAll();
    //     $view = 'list';
    //     $pagetitle = 'Bus - Transvar';
    //     require(File::build_path(array('view', 'view.php')));
    // }

    // public static function updated()
    // {
    //     $data = array(
    //         "id" => $_GET["id"],
    //         "marque" => strtoupper($_GET["marque"]),
    //         "immatriculation" => strtoupper($_GET["immatriculation"]),
    //         "nbplaces" => $_GET["nbplaces"],
    //     );

    //     $b = new ModelBus($data);
    //     $b->update($data);

    //     self::readAll();
    // }
}
