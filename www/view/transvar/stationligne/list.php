<?php
if ($_GET['action'] !== "readAll" && $_GET['action'] !== "read" && $_GET['action'] !== "update") {
    echo '<meta http-equiv="refresh" content="1; URL=index.php?controller=stationligne&action=readAll" />';
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
    <h1 class="h3 mb-0 text-gray-800">Affectation Ligne/Station</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-primary btn-icon-split shadow-sm"
       data-toggle="modal" data-target="#createModal">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Ajouter une affectation Ligne/Station</span>
    </a>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Liste des affectations Ligne/Station</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                <tr>
                    <th>Action</th>
                    <th>Ligne</th>
                    <th>Station</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    /**
                     * @var ModelStationligne $sl
                     */
                        foreach ($tab as $sl) {
                            echo '
                            <tr>
                                <td>
                                    <a href="index.php?controller='.static::$object.'&action=read&idligne='.rawurldecode($sl['idligne']) .
                                    '&idstation='.rawurldecode($sl['idstation']).'" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="index.php?controller='.static::$object.'&action=deleted&idligne='.rawurldecode($sl['idligne']) .
                                '&idstation='.rawurldecode($sl['idstation']).'" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td>'.htmlspecialchars($sl['numero']) .'</td>
                                <td>'.htmlspecialchars($sl['nom']).'</td>
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
                <h5 class="modal-title" id="create<?php echo ucfirst(static::$object) ?>"><i class="fas fa-plus"></i> Créer une affectation Ligne/Station</h5>
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
                                        <select class="custom-select form-control" name="idligne">
                                            <option selected value="-1">Sélectionner une ligne</option>
                                            <?php
                                            foreach ($tabLigne as $ligne) {

                                                echo '<option value="'.$ligne->get('id').'">'.$ligne->get('numero').'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="custom-select form-control" name="idstation">
                                            <option selected value="-1">Sélectionner une station</option>
                                            <?php
                                            foreach ($tabStation as $station) {

                                                echo '<option value="'.$station->get('id').'">'.$station->get('nom').'</option>';
                                            }
                                            ?>
                                        </select>
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
                    <h5 class="modal-title" id="read<?php echo ucfirst(static::$object) ?>"><i class="fas fa-info-circle"></i> Détails d'une affectation Ligne/Station</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo '
                            <p>Numéro de la ligne : '.htmlspecialchars($datas['numero']).'</p>
                            <p>Nom de la station : '.htmlspecialchars($datas['nom']).'</p>
                        ';
                    ?>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>