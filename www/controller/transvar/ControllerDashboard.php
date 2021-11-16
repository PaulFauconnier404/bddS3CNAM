<?php

require_once (File::build_path(array('model', 'ModelLigne.php')));
require_once (File::build_path(array('model', 'ModelStation.php')));

class ControllerDashboard extends Controller {
    protected static $object = 'dashboard';

    public static function readAll() {
        //$tab = ModelBus::selectAll();

        // Station par ligne
        $tab_ligne = ModelLigne::selectAll();
        $tab_nb_station_ligne = [];
        foreach ($tab_ligne as $ligne) {
            $nb_station_ligne = count(ModelLigne::stationParLigne($ligne->get('id')));
            array_push($tab_nb_station_ligne, $nb_station_ligne);
        }

        // Ligne par station
        $tab_station = ModelStation::selectAll();
        $tab_nb_ligne_station = [];
        foreach ($tab_station as $station) {
            $nb_ligne_station = count(ModelStation::ligneParStation($station->get('id')));
            array_push($tab_nb_ligne_station, $nb_ligne_station);
        }

        $view = 'dashboard';
        $pagetitle = 'Dashboard';
        require (File::build_path(array('view', 'view.php')));
    }
}