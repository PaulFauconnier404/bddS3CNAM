<?php

require_once (File::build_path(array('model', 'ModelStationligne.php')));
require_once (File::build_path(array('model', 'ModelStation.php')));
require_once (File::build_path(array('model', 'ModelLigne.php')));
require_once (File::build_path(array('controller', 'Controller.php')));

class ControllerStationLigne extends Controller {
    protected static $object = 'stationligne';

    public static function readAll() {
        $tabStationLigne = ModelStationligne::selectAll();
        $tabLigne = ModelLigne::selectAll();
        $tabStation = ModelStation::selectAll();
        $tab = [];
        foreach ($tabStationLigne as $stationLigne) {
            foreach ($tabLigne as $ligne) {
                foreach ($tabStation as $station) {
                    if ($ligne->get('id') === $stationLigne->get('idligne') && $station->get('id') === $stationLigne->get('idstation')) {
                        $data = [
                            'idligne' => $stationLigne->get('idligne'),
                            'numero' => $ligne->get('numero'),
                            'idstation' => $stationLigne->get('idstation'),
                            'nom' => $station->get('nom')
                        ];
                        array_push($tab, $data);
                    }
                }
            }
        }
        $view = 'list';
        $pagetitle = 'StationLigne - TransVar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $data = [
            "idligne" => $_GET["idligne"],
            "idstation" => $_GET["idstation"],
        ];

        $sl = new ModelStationligne($data);
        $sl->save($data);

        self::readAll();
    }

    public static function deleted() {
        ModelStationligne::deleteComposite($_GET['idligne'], $_GET["idstation"]);

        self::readAll();
    }

    public static function read() {
        $ligne = ModelLigne::select($_GET['idligne']);
        $station = ModelStation::select($_GET['idstation']);

        $datas = [
            'idligne' => $ligne->get('id'),
            'numero' => $ligne->get('numero'),
            'idstation' => $station->get('id'),
            'nom' => $station->get('nom')
        ];

        $tabStationLigne = ModelStationligne::selectAll();
        $tabLigne = ModelLigne::selectAll();
        $tabStation = ModelStation::selectAll();
        $tab = [];
        foreach ($tabStationLigne as $stationLigne) {
            foreach ($tabLigne as $ligne) {
                foreach ($tabStation as $station) {
                    if ($ligne->get('id') === $stationLigne->get('idligne') && $station->get('id') === $stationLigne->get('idstation')) {
                        $data = [
                            'idligne' => $stationLigne->get('idligne'),
                            'numero' => $ligne->get('numero'),
                            'idstation' => $stationLigne->get('idstation'),
                            'nom' => $station->get('nom')
                        ];
                        array_push($tab, $data);
                    }
                }
            }
        }
        $view = 'list';
        $pagetitle = 'StationLigne - TransVar';
        require (File::build_path(array('view', 'view.php')));
    }


}