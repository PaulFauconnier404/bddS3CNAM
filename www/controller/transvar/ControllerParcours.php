<?php

require_once (File::build_path(array('model', 'ModelParcours.php')));
require_once (File::build_path(array('model', 'ModelConducteur.php')));
require_once (File::build_path(array('model', 'ModelLigne.php')));
require_once (File::build_path(array('controller', 'Controller.php')));

class ControllerParcours extends Controller {
    protected static $object = 'parcours';

    public static function readAll() {
        $tabParcours = ModelParcours::selectAll();
        $tabConducteur = ModelConducteur::selectAll();
        $tabLigne = ModelLigne::selectAll();
        $tab = [];
        foreach ($tabParcours as $parcours) {
            foreach ($tabConducteur as $conducteur) {
                foreach ($tabLigne as $ligne) {
                    if ($conducteur->get('id') === $parcours->get('idconducteur') && $ligne->get('id') === $parcours->get('idligne')) {
                        $personne = (ModelParcours::selectNomPersonne($conducteur->get('idpersonne')));
                        $data = [
                            'id' => $parcours->get('id'),
                            'depart' => $parcours->get('depart'),
                            'idconducteur' => $conducteur->get('id'),
                            'nom' => $personne[0]['nom'],
                            'idligne' => $ligne->get('id'),
                            'numero' => $ligne->get('numero')
                        ];
                        array_push($tab, $data);
                    }
                }
            }
        }
        $view = 'list';
        $pagetitle = 'Ligne - TransVar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $data = [
            "depart" => $_GET["depart"],
            "idconducteur" => $_GET["idconducteur"],
            "idligne" => $_GET["idligne"],
        ];

        $p = new ModelParcours($data);
        $p->save($data);

        self::readAll();
    }

    public static function deleted() {
        ModelParcours::delete($_GET['id']);

        self::readAll();
    }

    public static function read() {
        $parcours = ModelParcours::select($_GET["id"]);
        $conducteur = ModelConducteur::select($parcours->get('idconducteur'));
        $ligne = ModelLigne::select($parcours->get('idligne'));
        $personne = (ModelParcours::selectNomPersonne($conducteur->get('idpersonne')));

        $datas = [
            'id' => $parcours->get('id'),
            'depart' => $parcours->get('depart'),
            'nom' => $personne[0]['nom'],
            'numero' => $ligne->get('numero')
        ];

        $tabParcours = ModelParcours::selectAll();
        $tabConducteur = ModelConducteur::selectAll();
        $tabLigne = ModelLigne::selectAll();
        $tab = [];
        foreach ($tabParcours as $parcours) {
            foreach ($tabConducteur as $conducteur) {
                foreach ($tabLigne as $ligne) {
                    if ($conducteur->get('id') === $parcours->get('idconducteur') && $ligne->get('id') === $parcours->get('idligne')) {
                        $personne = (ModelParcours::selectNomPersonne($conducteur->get('idpersonne')));
                        $data = [
                            'id' => $parcours->get('id'),
                            'depart' => $parcours->get('depart'),
                            'idconducteur' => $conducteur->get('id'),
                            'nom' => $personne[0]['nom'],
                            'idligne' => $ligne->get('id'),
                            'numero' => $ligne->get('numero')
                        ];
                        array_push($tab, $data);
                    }
                }
            }
        }
        $view = 'list';
        $pagetitle = 'Ligne - TransVar';
        require (File::build_path(array('view', 'view.php')));
    }


}