<?php

require_once (File::build_path(array('model', 'ModelAbonnement.php')));
require_once (File::build_path(array('controller', 'Controller.php')));

class ControllerAbonnement extends Controller {
    protected static $object = 'abonnement';

    public static function readAll() {
        $tab = ModelAbonnement::selectAll();
        $view = 'list';
        $pagetitle = 'Abonnement - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $data = array(
            "intitule" => strtoupper($_GET["intitule"]),
            "tarif" => $_GET["tarif"],
            "agemin" => $_GET["agemin"],
            "agemax" => $_GET["agemax"],
            "dureevalidite" => $_GET["dureevalidite"],
        );

        $b = new ModelAbonnement($data);
        $b->save($data);

        self::readAll();
    }

    public static function deleted() {
        ModelAbonnement::delete($_GET['id']);

        self::readAll();
    }

    public static function read() {
        $abonnement = ModelAbonnement::select($_GET['id']);
        $tab = ModelAbonnement::selectAll();
        $view = 'list';
        $pagetitle = 'Abonnement - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function update() {
        $abonnement = ModelAbonnement::select($_GET['id']);
        $tab = ModelAbonnement::selectAll();
        $view = 'list';
        $pagetitle = 'Abonnement - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function updated() {
        $data = array(
            "id" => $_GET["id"],
            "intitule" => strtoupper($_GET["intitule"]),
            "tarif" => $_GET["tarif"],
            "agemin" => $_GET["agemin"],
            "agemax" => $_GET["agemax"],
            "dureevalidite" => $_GET["dureevalidite"],
        );

        $a = new ModelAbonnement($data);
        $a->update($data);

        self::readAll();
    }


}