<?php

require_once (File::build_path(array('model', 'ModelLigne.php')));
require_once (File::build_path(array('model', 'ModelStation.php')));
require_once (File::build_path(array('controller', 'Controller.php')));

class ControllerLigne extends Controller {
    protected static $object = 'ligne';

    public static function readAll() {
        $tab_ligne = ModelLigne::selectAll();
        $tab_station = ModelStation::selectAll();
        $tab = [];

        foreach ($tab_ligne as $ligne) {
            $data = [];
            foreach ($tab_station as $station) {
                if($station->get('id') === $ligne->get('stationdepart')) {
                    $data['id'] = $ligne->get('id');
                    $data['numero'] = $ligne->get('numero');
                    $data['stationdepart'] = $station->get('id');
                    $data['stationdepart_nom'] = $station->get('nom');
                    $data['nbkilometres'] = $ligne->get('nbkilometres');
                    $data['dureetotale'] = $ligne->get('dureetotale');

                }
                if($station->get('id') === $ligne->get('stationterminus')) {
                    $data['stationterminus_nom'] = $station->get('nom');
                    $data['stationterminus'] = $station->get('id');
                }
            }
            array_push($tab, $data);
        }

        $view = 'list';
        $pagetitle = 'Ligne - TransVar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $data = [
            "numero" => strtoupper($_GET["numero"]),
            "stationdepart" => $_GET["stationdepart"],
            "stationterminus" => $_GET["stationterminus"],
            "nbkilometres" => $_GET["nbkilometres"],
            "dureetotale" => $_GET["dureetotale"],
        ];

        $l = new ModelLigne($data);
        $l->save($data);

        self::readAll();
    }

    public static function deleted() {
        ModelLigne::delete($_GET['id']);

        self::readAll();
    }

    public static function read() {
        $ligne = ModelLigne::select($_GET['id']);
        $station_terminus = ModelStation::select($ligne->get('stationterminus'));
        $station_depart = ModelStation::select($ligne->get('stationdepart'));

        $datas = [
            'id' => $_GET['id'],
            'numero' => $ligne->get('numero'),
            'stationdepart' => $station_depart->get('id'),
            'stationdepart_nom' => $station_depart->get('nom'),
            'stationterminus' => $station_terminus->get('id'),
            'stationterminus_nom' => $station_terminus->get('nom'),
            'nbkilometres' => $ligne->get('nbkilometres'),
            'dureetotale' => $ligne->get('dureetotale')
        ];

        $tab_ligne = ModelLigne::selectAll();
        $tab_station = ModelStation::selectAll();
        $tab = [];

        foreach ($tab_ligne as $lignee) {
            $data = [];
            foreach ($tab_station as $stationn) {
                if($stationn->get('id') === $lignee->get('stationdepart')) {
                    $data['id'] = $lignee->get('id');
                    $data['numero'] = $lignee->get('numero');
                    $data['stationdepart'] = $stationn->get('id');
                    $data['stationdepart_nom'] = $stationn->get('nom');
                    $data['nbkilometres'] = $lignee->get('nbkilometres');
                    $data['dureetotale'] = $lignee->get('dureetotale');

                }
                if($stationn->get('id') === $lignee->get('stationterminus')) {
                    $data['stationterminus_nom'] = $stationn->get('nom');
                    $data['stationterminus'] = $stationn->get('id');
                }
            }
            array_push($tab, $data);
        }

        $view = 'list';
        $pagetitle = 'Ligne - TransVar';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function update() {
        self::read();
    }

    public static function updated() {
        $data = [
            "id" => $_GET["id"],
            "numero" => strtoupper($_GET["numero"]),
            "stationdepart" => $_GET["stationdepart"],
            "stationterminus" => $_GET["stationterminus"],
            "nbkilometres" => $_GET["nbkilometres"],
            "dureetotale" => $_GET["dureetotale"],
        ];

        $l = new ModelLigne($data);
        $l->update($data);

        self::readAll();
    }


}