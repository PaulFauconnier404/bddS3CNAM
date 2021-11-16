<?php

require_once (File::build_path(array('model', 'ModelBus.php')));
require_once (File::build_path(array('controller', 'Controller.php')));

class ControllerBus extends Controller {
    protected static $object = 'bus';

    public static function readAll() {
        $tab = ModelBus::selectAll();
        $view = 'list';
        $pagetitle = 'Bus - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $data = array(
            "marque" => strtoupper($_GET["marque"]),
            "immatriculation" => strtoupper($_GET["immatriculation"]),
            "nbplaces" => $_GET["nbplaces"],
        );

        $b = new ModelBus($data);
        $b->save($data);

        self::readAll();
    }

    public static function deleted() {
        ModelBus::delete($_GET['id']);

        self::readAll();
    }

    public static function read() {
        $bus = ModelBus::select($_GET['id']);
        $tab = ModelBus::selectAll();
        $view = 'list';
        $pagetitle = 'Bus - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function update() {
        $bus = ModelBus::select($_GET['id']);
        $tab = ModelBus::selectAll();
        $view = 'list';
        $pagetitle = 'Bus - Transvar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function updated() {
        $data = array(
            "id" => $_GET["id"],
            "marque" => strtoupper($_GET["marque"]),
            "immatriculation" => strtoupper($_GET["immatriculation"]),
            "nbplaces" => $_GET["nbplaces"],
        );

        $b = new ModelBus($data);
        $b->update($data);

        self::readAll();
    }


}