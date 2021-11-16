<?php

require_once (File::build_path(array('model', 'ModelStation.php')));
require_once (File::build_path(array('controller', 'Controller.php')));

class ControllerStation extends Controller {
    protected static $object = 'station';

    public static function readAll() {
        $tab = ModelStation::selectAll();
        $view = 'list';
        $pagetitle = 'Station - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $data = array(
            "nom" => strtoupper($_GET["nom"]),
            "geolocalisation" => $_GET["geolocalisation"],
        );

        $s = new ModelStation($data);
        $s->save($data);

        self::readAll();
    }

    public static function deleted() {
        ModelStation::delete($_GET['id']);

        self::readAll();
    }

    public static function read() {
        $station = ModelStation::select($_GET['id']);
        $tab = ModelStation::selectAll();
        $view = 'list';
        $pagetitle = 'Station - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function update() {
        $station = ModelStation::select($_GET['id']);
        $tab = ModelStation::selectAll();
        $view = 'list';
        $pagetitle = 'Station - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function updated() {
        $data = array(
            "id" => $_GET["id"],
            "nom" => strtoupper($_GET["nom"]),
            "geolocalisation" => $_GET["geolocalisation"],
        );

        $s = new ModelStation($data);
        $s->update($data);

        self::readAll();
    }


}