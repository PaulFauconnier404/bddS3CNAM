<?php
if ($_GET['action'] !== "readAll" && $_GET['action'] !== "read" && $_GET['action'] !== "update") {
    echo '<meta http-equiv="refresh" content="1; URL=index.php?controller='.static::$object.'&action=readAll" />';
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
            <span class="text">Ajouter un <?php echo static::$object ?></span>
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
                        <th>Actions</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Ville</th>
                        <th>Code postal</th>
                        <th>Date de naissance</th>
                        <th>Abonnement</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($tab as $cl) {
                        echo '
                            <tr>
                                <td>
                                    <a href="index.php?controller='.static::$object.'&action=read&id='.rawurldecode($cl['id']).'" class="btn btn-info btn-circle btn-sm">
                                        <i class="fas fa-info-circle"></i>
                                    </a>
                                    <a href="index.php?controller='.static::$object.'&action=update&id='.rawurldecode($cl['id']).'" class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="index.php?controller='.static::$object.'&action=deleted&id='.rawurldecode($cl['id']).'" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                                <td>'.htmlspecialchars($cl['nom']).'</td>
                                <td>'.htmlspecialchars($cl['prenom']).'</td>
                                <td>'.htmlspecialchars($cl['ville']).'</td>
                                <td>'.htmlspecialchars($cl['codepostal']).'</td>
                                <td>'.htmlspecialchars($cl['datenaissance']).'</td>
                                <td>'.htmlspecialchars($cl['abonnement']).'</td>
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
                    <h5 class="modal-title" id="create<?php echo ucfirst(static::$object) ?>"><i class="fas fa-plus"></i> Créer un <?php echo static::$object ?></h5>
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
                                            <input type="text" class="form-control form-control-user" name="nom" id="nom_id"
                                                   placeholder="Nom" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="prenom" id="prenom_id"
                                                   placeholder="Prenom" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="ville" id="ville_id"
                                                   placeholder="Ville" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="codepostal" id="agemax_id"
                                                   placeholder="Code postal" pattern="[0-9]{5}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="datenaissance" id="dateembauche_id"
                                                   placeholder="Date de naissance" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select form-control" name="idabonnement" required>
                                                <option selected value="-1">Selectionner un abonnement</option>
                                                <?php
                                                foreach ($tab_abonnement as $abonnement) {
                                                    echo '<option value="'.$abonnement->get('id').'">'.$abonnement->get('intitule').'</option>';
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
                    <h5 class="modal-title" id="read<?php echo ucfirst(static::$object) ?>"><i class="fas fa-info-circle"></i> Détails d'un <?php echo static::$object ?></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    echo '
                            <p>Nom : '.htmlspecialchars($datas['nom']).'</p>
                            <p>Prenom : '.htmlspecialchars($datas['prenom']).'</p>
                            <p>Ville : '.htmlspecialchars($datas['ville']).'</p>
                            <p>Code postal : '.htmlspecialchars($datas['codepostal']).'</p>
                            <p>Date de naissance : '.htmlspecialchars($datas['datenaissance']).'</p>
                            <p>Abonnement : '.htmlspecialchars($datas['abonnement']).'</p>
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
                    <h5 class="modal-title" id="update<?php echo ucfirst(static::$object) ?>"><i class="fas fa-edit"></i> Modifier un <?php echo static::$object ?></h5>
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
                                    <form method="get" action="index.php" class="user" id="<?php echo static::$object ?>_update">
                                        <?php
                                        $controller = static::$object;
                                        echo'<input type="hidden" name="controller" value="'.htmlspecialchars($controller).'">';
                                        ?>
                                        <input type="hidden" name="action" value="updated">
                                        <?php
                                        echo '<input type="hidden" name="id" value="'.$datas['id'].'">';
                                        echo '<input type="hidden" name="idpersonne" value="'.$datas['idpersonne'].'">';
                                        ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="nom" id="nom_id"
                                                <?php echo 'value="'.$datas['nom'].'"'; ?>
                                                   placeholder="Nom" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="prenom" id="prenom_id"
                                                <?php echo 'value="'.$datas['prenom'].'"'; ?>
                                                   placeholder="Prenom" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="ville" id="ville_id"
                                                <?php echo 'value="'.$datas['ville'].'"'; ?>
                                                   placeholder="Ville" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="codepostal" id="agemax_id"
                                                <?php echo 'value="'.$datas['codepostal'].'"'; ?>
                                                   placeholder="Code postal" pattern="[0-9]{5}" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="datenaissance" id="dateembauche_id"
                                                <?php echo 'value="'.$datas['datenaissance'].'"'; ?>
                                                   placeholder="Date de naissance" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                                        </div>
                                        <div class="form-group">
                                            <select class="custom-select form-control" name="idabonnement" required>
                                                <?php
                                                foreach ($tab_abonnement as $abonnement) {
                                                    if($datas['idabonnement'] == $abonnement->get('id')) {
                                                        echo '<option selected value="'.$abonnement->get('id').'">'.$abonnement->get('intitule').'</option>';
                                                    }
                                                    else {
                                                        echo '<option value="'.$abonnement->get('id').'">'.$abonnement->get('intitule').'</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
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