<?php

require_once(File::build_path(array('model', 'ModelAdministrateur.php')));
require_once(File::build_path(array('controller', 'Controller.php')));

class ControllerSignin extends Controller
{
    protected static $object = 'signin';

    public static function readAll()
    {
        $view = 'list';
        $pagetitle = 'Connectez vous - recupAuto';
        require(File::build_path(array('view', 'view.php')));
    }

    public static function connect()
    {
        $user = ModelAdministrateur::select($_GET['mail']);

        if ($user->get('mailadmin') === $_GET['mail']) {
            $_SESSION['mail'] = $_GET['mail'];
            $_SESSION['password'] = $_GET['password'];
        }


        self::readAll();
    }
}
