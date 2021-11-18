<?php

require_once(File::build_path(array('model', 'ModelPersonne.php')));
require_once(File::build_path(array('model', 'ModelConducteur.php')));
require_once(File::build_path(array('model', 'ModelBus.php')));
require_once(File::build_path(array('controller', 'Controller.php')));

class ControllerConducteur extends Controller
{
    protected static $object = 'conducteur';

    public static function readAll()
    {
        $tab_conducteur = ModelConducteur::selectAll();
        $tab_personne = ModelPersonne::selectAll();
        $tab = [];
        foreach ($tab_conducteur as $conducteur) {
            foreach ($tab_personne as $personne) {
                if ($personne->get('id') === $conducteur->get('idpersonne')) {
                    $data = [
                        'id' => $conducteur->get('id'),
                        'nom' => $personne->get('nom'),
                        'prenom' => $personne->get('prenom'),
                        'ville' => $personne->get('ville'),
                        'codepostal' => $personne->get('codepostal'),
                        'salaire' => $conducteur->get('salaire'),
                        'dateembauche' => $conducteur->get('dateembauche'),
                        'idbus' => $conducteur->get('idbus'),
                        'idpersonne' => $personne->get('id')
                    ];
                    array_push($tab, $data);
                }
            }
        }
        $tab_bus = ModelBus::readBusAvailable();
        $view = 'list';
        $pagetitle = 'Conducteur - TransVar';
        require(File::build_path(array('view', 'view.php')));
    }

    public static function created()
    {
        $data_pers = array(
            "nom" => strtoupper($_GET["nom"]),
            "prenom" => ucfirst($_GET["prenom"]),
            "ville" => $_GET["ville"],
            "codepostal" => $_GET["codepostal"]
        );

        $p = new ModelPersonne($data_pers);
        $id_pers = $p->save($data_pers);

        $data_con = array(
            "salaire" => $_GET["salaire"],
            "dateembauche" => $_GET["dateembauche"],
            "idpersonne" => $id_pers,
        );
        if ($_GET['idbus'] !== "-1")
            $data_con["idbus"] = $_GET['idbus'];

        $con = new ModelConducteur($data_con);
        $con->save($data_con);

        self::readAll();
    }

    public static function deleted()
    {
        ModelConducteur::delete($_GET['id']);

        self::readAll();
    }

    public static function read()
    {
        $conducteur = ModelConducteur::select($_GET['id']);
        $personne = ModelPersonne::select($conducteur->get('idpersonne'));

        $datas = [
            'id' => $conducteur->get('id'),
            'nom' => $personne->get('nom'),
            'prenom' => $personne->get('prenom'),
            'ville' => $personne->get('ville'),
            'codepostal' => $personne->get('codepostal'),
            'salaire' => $conducteur->get('salaire'),
            'dateembauche' => $conducteur->get('dateembauche'),
            'idbus' => $conducteur->get('idbus'),
            'idpersonne' => $personne->get('id')
        ];

        $tab_conducteur = ModelConducteur::selectAll();
        $tab_personne = ModelPersonne::selectAll();
        $tab = [];
        foreach ($tab_conducteur as $conducteurr) {
            foreach ($tab_personne as $personnee) {
                if ($personnee->get('id') == $conducteurr->get('idpersonne')) {
                    $dataa = [
                        'id' => $conducteurr->get('id'),
                        'nom' => $personnee->get('nom'),
                        'prenom' => $personnee->get('prenom'),
                        'ville' => $personnee->get('ville'),
                        'codepostal' => $personnee->get('codepostal'),
                        'salaire' => $conducteurr->get('salaire'),
                        'dateembauche' => $conducteurr->get('dateembauche'),
                        'idbus' => $conducteurr->get('idbus'),
                        'idpersonne' => $personnee->get('id')
                    ];
                    array_push($tab, $dataa);
                }
            }
        }
        $tab_bus = ModelBus::readBusAvailable();
        $view = 'list';
        $pagetitle = 'Conducteur - TransVar';
        require(File::build_path(array('view', 'view.php')));
    }

    public static function update()
    {
        self::read();
    }

    public static function updated()
    {
        $data_pers = array(
            'id' => $_GET['idpersonne'],
            "nom" => strtoupper($_GET["nom"]),
            "prenom" => ucfirst($_GET["prenom"]),
            "ville" => $_GET["ville"],
            "codepostal" => $_GET["codepostal"]
        );

        $p = new ModelPersonne($data_pers);
        $p->update($data_pers);

        //var_dump($_GET['idbus']);

        $data_con = array(
            'id' => $_GET['id'],
            "salaire" => $_GET["salaire"],
            "dateembauche" => $_GET["dateembauche"],
            "idpersonne" => $_GET['idpersonne'],
        );

        if ($_GET['idbus'] !== "-1")
            $data_con["idbus"] = $_GET['idbus'];

        $con = new ModelConducteur($data_con);
        $con->update($data_con);

        self::readAll();
    }
}
