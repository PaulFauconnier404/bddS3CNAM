<?php

require_once(File::build_path(array('model', 'ModelClient.php')));
require_once(File::build_path(array('controller', 'Controller.php')));

class ControllerAccueil extends Controller
{
    protected static $object = 'accueil';

    public static function readAll()
    {
        $tab = ModelClient::selectAll();
        $view = 'list';
        $pagetitle = 'Accueil - RecupAuto';
        require(File::build_path(array('view', 'view.php')));
    }
}
