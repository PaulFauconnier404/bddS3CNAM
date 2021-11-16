<?php

require_once (File::build_path(array('model', 'ModelPersonne.php')));
require_once (File::build_path(array('model', 'ModelClient.php')));
require_once (File::build_path(array('model', 'ModelAbonnement.php')));
require_once (File::build_path(array('controller', 'Controller.php')));

class ControllerClient extends Controller {
    protected static $object = 'client';

    public static function readAll() {
        $tab_client = ModelClient::selectAll();
        $tab_personne = ModelPersonne::selectAll();
        $tab_abonnement = ModelAbonnement::selectAll();
        $tab = [];
        foreach ($tab_client as $client) {
            foreach ($tab_personne as $personne) {
                foreach ($tab_abonnement as $abonnement) {
                    if ($personne->get('id') === $client->get('idpersonne') && $abonnement->get('id') === $client->get('idabonnement')) {
                        $data = [
                            'id' => $client->get('id'),
                            'nom' => $personne->get('nom'),
                            'prenom' => $personne->get('prenom'),
                            'ville' => $personne->get('ville'),
                            'codepostal' => $personne->get('codepostal'),
                            'datenaissance' => $client->get('datenaissance'),
                            'abonnement' => $abonnement->get('intitule'),
                            'idabonnement' => $client->get('idabonnement'),
                            'idpersonne' => $personne->get('id')
                        ];
                        array_push($tab, $data);
                    }
                }
            }
        }
        $view = 'list';
        $pagetitle = 'Client - TransVar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $data_pers = array(
            "nom" => strtoupper($_GET["nom"]),
            "prenom" => ucfirst($_GET["prenom"]),
            "ville" => $_GET["ville"],
            "codepostal" => $_GET["codepostal"]
        );

        $p = new ModelPersonne($data_pers);
        $id_pers = $p->save($data_pers);

        $data_cl = array(
            "datenaissance" => $_GET["datenaissance"],
            "idabonnement" => $_GET["idabonnement"],
            "idpersonne" => $id_pers,
        );

        $cl = new ModelClient($data_cl);
        $cl->save($data_cl);

        self::readAll();
    }

    public static function deleted() {
        ModelClient::delete($_GET['id']);

        self::readAll();
    }

    public static function read() {
        $client = ModelClient::select($_GET['id']);
        $personne = ModelPersonne::select($client->get('idpersonne'));
        $abonnement = ModelAbonnement::select($client->get('idabonnement'));

        $datas = [
            'id' => $client->get('id'),
            'nom' => $personne->get('nom'),
            'prenom' => $personne->get('prenom'),
            'ville' => $personne->get('ville'),
            'codepostal' => $personne->get('codepostal'),
            'datenaissance' => $client->get('datenaissance'),
            'abonnement' => $abonnement->get('intitule'),
            'idabonnement' => $client->get('idabonnement'),
            'idpersonne' => $personne->get('id')
        ];

        $tab_client = ModelClient::selectAll();
        $tab_personne = ModelPersonne::selectAll();
        $tab_abonnement = ModelAbonnement::selectAll();
        $tab = [];
        foreach ($tab_client as $clientt) {
            foreach ($tab_personne as $personnee) {
                foreach ($tab_abonnement as $abonnementt) {
                    if ($personnee->get('id') === $clientt->get('idpersonne') && $abonnementt->get('id') === $clientt->get('idabonnement')) {
                        $data = [
                            'id' => $clientt->get('id'),
                            'nom' => $personnee->get('nom'),
                            'prenom' => $personnee->get('prenom'),
                            'ville' => $personnee->get('ville'),
                            'codepostal' => $personnee->get('codepostal'),
                            'datenaissance' => $clientt->get('datenaissance'),
                            'abonnement' => $abonnementt->get('intitule'),
                            'idabonnement' => $clientt->get('idabonnement'),
                            'idpersonne' => $personnee->get('id')
                        ];
                        array_push($tab, $data);
                    }
                }
            }
        }
        $view = 'list';
        $pagetitle = 'Conducteur - TransVar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function update() {
        self::read();
    }

    public static function updated() {
        $data_pers = array(
            'id' => $_GET['idpersonne'],
            "nom" => strtoupper($_GET["nom"]),
            "prenom" => ucfirst($_GET["prenom"]),
            "ville" => $_GET["ville"],
            "codepostal" => $_GET["codepostal"]
        );

        $p = new ModelPersonne($data_pers);
        $p->update($data_pers);

        $data_cl = array(
            'id' => $_GET['id'],
            "datenaissance" => $_GET["datenaissance"],
            "idabonnement" => $_GET["idabonnement"],
            "idpersonne" => $_GET['idpersonne'],
        );

        $cl = new ModelClient($data_cl);
        $cl->update($data_cl);

        self::readAll();
    }
}