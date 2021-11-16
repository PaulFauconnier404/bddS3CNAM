<?php
class Controller
{
    public static function error404()
    {
        $pagetitle = 'Erreur 404';
        require(File::build_path(array('view', 'error.php')));
    }

    public static function errorAction()
    {
        self::error404();
    }

    public static function errorClass()
    {
        self::error404();
    }
}
