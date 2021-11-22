<?php

require_once(File::build_path(array('model', 'ModelAdministrateur.php')));
require_once(File::build_path(array('controller', 'Controller.php')));

class ControllerAdministrateur extends Controller
{
    protected static $object = 'administrateur';

    public static function readAll()
    {
        $view = 'list';
        $pagetitle = 'Connectez vous - recupAuto';
        require(File::build_path(array('view', 'view.php')));
    }

    public static function connect()
    {
        $user = ModelAdministrateur::select($_GET['mail']);



        if ($user['mailadmin']  == $_GET['mail'] && password_verify($_GET['password'], $user['password'])) {

            $searchString = " ";
            $replaceString = "";
            $originalString = $_GET['mail'];

            $outputString = str_replace($searchString, $replaceString, $originalString);

            $_SESSION['mail'] = $outputString;
            $_SESSION['password'] = $_GET['password'];
        }


        self::readAll();
    }
}
