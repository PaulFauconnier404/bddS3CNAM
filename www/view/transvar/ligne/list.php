<?php
if ($_GET['action'] !== "readAll" && $_GET['action'] !== "read" && $_GET['action'] !== "update") {
    echo '<meta http-equiv="refresh" content="1; URL=index.php?controller=ligne&action=readAll" />';
}

if($_GET['action'] === "update") {
    echo '<script>
        $(document).ready(function(){
          $("#updateModal").modal("show");
        });
    </script>';
}

if($_GET['action'] === "read") {
    echo '<script>
        $(document).ready(function(){
          $("#readModal").modal("show");
        });
    </script>';
}

?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo ucfirst(static::$object) ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"
       data-toggle="modal" data-target="#createModal">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Ajouter une <?php echo static::$object ?></span>
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des <?php echo static::$object ?>s</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th>Action</th>
                    <th>Numéro</th>
                    <th>Station de départ</th>
                    <th>Terminus</th>
                    <th>Nombre de kilomètres</th>
                    <th>Duree totale (en min)</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    /**
                     * @var ModelLigne $l
                     */
                        foreach ($tab as $l) {
                            echo '
                            <tr>
                                <td>
                                    <a href="index.php?controller='.static::$object.'&action=read&id='.rawurldecode($l['id']).'" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="index.php?controller='.static::$object.'&action=update&id='.rawurldecode($l['id']).'" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?controller='.static::$object.'&action=deleted&id='.rawurldecode($l['id']).'" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td>'.htmlspecialchars($l['numero']).'</td>
                                <td>'.htmlspecialchars($l['stationdepart_nom']).'</td>
                                <td>'.htmlspecialchars($l['stationterminus_nom']).'</td>
                                <td>'.htmlspecialchars($l['nbkilometres']).'</td>
                                <td>'.htmlspecialchars($l['dureetotale']).'</td>
                            </tr>
                            ';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Create Modal-->
<div class="modal fade" id="createModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create<?php echo ucfirst(static::$object) ?>"><i class="fas fa-plus"></i> Créer une <?php echo static::$object ?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="p-5">
                                <form method="get" action="index.php" class="user" id="<?php echo static::$object ?>_create">
                                    <?php
                                    $controller = static::$object;
                                    echo('<input type="hidden" name="controller" value="'.htmlspecialchars($controller).'">');
                                    ?>
                                    <input type="hidden" name="action" value="created">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="numero" id="numero_id"
                                               placeholder="Numero" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select form-control" name="stationdepart" required>
                                            <option selected value="-1">Selectionner une station de départ</option>
                                            <?php
                                            foreach ($tab_station as $station) {

                                                echo '<option value="'.$station->get('id').'">'.$station->get('nom').'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select form-control" name="stationterminus" required>
                                            <option selected value="-1">Selectionner un terminus</option>
                                            <?php
                                            foreach ($tab_station as $station) {

                                                echo '<option value="'.$station->get('id').'">'.$station->get('nom').'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="nbkilometres" id="nbkilometres_id"
                                               placeholder="Nombre de kilomètres" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="dureetotale" id="dureetotale_id"
                                               placeholder="Durée totale" required>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-user btn-block" id="submit_create" value="Enregistrer">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($datas)) {
    ?>

    <!-- Read Modal -->
    <div class="modal fade" id="readModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="read<?php echo ucfirst(static::$object) ?>"><i class="fas fa-info-circle"></i> Détails d'une <?php echo static::$object ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo '
                            <p>Numéro : '.htmlspecialchars($datas['numero']).'</p>
                            <p>Station de départ : '.htmlspecialchars($datas['stationdepart_nom']).'</p>
                            <p>Terminus : '.htmlspecialchars($datas['stationterminus_nom']).'</p>
                            <p>Nombre de kilomètres : '.htmlspecialchars($datas['nbkilometres']).'</p>
                            <p>Durée totale : '.htmlspecialchars($datas['dureetotale']).'</p>
                        ';
                    ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Modal-->
    <div class="modal fade" id="updateModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="update<?php echo ucfirst(static::$object) ?>"><i class="fas fa-edit"></i> Modifier une <?php echo static::$object ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="card o-hidden border-0 shadow-lg">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col">
                                <div class="p-5">
                                    <form method="get" action="index.php" class="user" id="<?php echo ucfirst(static::$object) ?>_update">
                                        <?php
                                        $controller = static::$object;
                                        echo'<input type="hidden" name="controller" value="'.htmlspecialchars($controller).'">';
                                        ?>
                                        <input type="hidden" name="action" value="updated">
                                        <?php
                                        echo '<input type="hidden" name="id" value="'.$datas['id'].'">'
                                        ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                <?php echo 'value="'.$datas['numero'].'"'; ?>
                                                   name="numero" id="numero_id"
                                                   placeholder="Numero" required>
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select form-control" name="stationdepart" required>
                                                <?php
                                                foreach ($tab_station as $station) {
                                                    if($datas['stationdepart'] == $station->get('id')) {
                                                        echo '<option selected value="' . $station->get(
                                                                'id'
                                                            ) . '">' . $station->get('nom') . '</option>';
                                                    }
                                                    else {
                                                        echo '<option value="' . $station->get(
                                                                'id'
                                                            ) . '">' . $station->get('nom') . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select form-control" name="stationterminus" required>
                                                <?php
                                                foreach ($tab_station as $station) {
                                                    if ($datas['stationterminus'] == $station->get('id')) {
                                                        echo '<option selected value="' . $station->get(
                                                                'id'
                                                            ) . '">' . $station->get('nom') . '</option>';
                                                    } else {
                                                        echo '<option value="' . $station->get(
                                                                'id'
                                                            ) . '">' . $station->get('nom') . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                <?php echo 'value="'.$datas['nbkilometres'].'"'; ?>
                                                   name="nbkilometres" id="nbkilometres_id"
                                                   placeholder="Nombre de kilomètres" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                <?php echo 'value="'.$datas['dureetotale'].'"'; ?>
                                                   name="dureetotale" id="dureetotale_id"
                                                   placeholder="Durée totale" required>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" id="submit_modifier" value="Modifier">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>