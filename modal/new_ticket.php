<?php
  
    $queryproject = "";
    $querypriority = "";
    $querystatus = "";
    $querykind = "";
    $querycategory = "";

    if ($_SESSION["nivel"] == 'Administrador' ){
        $queryproject = "select * from project";
        $querypriority = "select * from priority";
        $querystatus = "select * from status";
        $querykind = "select * from kind";
        $querycategory = "select * from category";
    }else{
        $queryproject = "SELECT p.* from project p INNER JOIN user u ON u.area = p.id WHERE u.id =".$_SESSION["user_id"];
        $querypriority = "select * from priority WHERE id = 2";
        $querystatus = "select * from status WHERE id = 1";
        $querykind = "select * from kind";
        $querycategory = "select * from category";
    }


    $projects =mysqli_query($con, $queryproject);
    $priorities =mysqli_query($con, $querypriority);
    $statuses =mysqli_query($con, $querystatus);
    $kinds =mysqli_query($con, $querykind);
    $categories =mysqli_query($con, $querycategory);

?>

    <div> <!-- Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Ticket</button>
    </div>
    <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Ticket</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" method="post" id="add" name="add">
                        <div id="result"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tipo
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="kind_id" >
                                      <?php foreach($kinds as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                      <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <input type="text" name="title" class="form-control" placeholder="Titulo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Detalle su problema <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                              <textarea name="description" class="form-control col-md-7 col-xs-12"  placeholder="Descripción" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Área
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="project_id" <?php if ($_SESSION["nivel"] !== 'Administrador' || $_SESSION["nivel"] !== 'Soporte') { ?>disabled<?php } ?>>
                                    <?php if ($_SESSION["nivel"] == 'Administrador' || $_SESSION["nivel"] == 'Soporte') { ?>
                                        <option selected="" value="">-- Selecciona --</option>        
                                    <?php } ?>
                                    
                                    <?php foreach($projects as $p):?>
                                    <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Categoria
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="category_id" >
                                    <option selected="" value="">-- Selecciona --</option>
                                      <?php foreach($categories as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                      <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Prioridad
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="priority_id" <?php if ($_SESSION["nivel"] !== 'Administrador' || $_SESSION["nivel"] !== 'Soporte') { ?>disabled<?php } ?>>
                                    <?php if ($_SESSION["nivel"] == 'Administrador' || $_SESSION["nivel"] == 'Soporte') { ?>
                                        <option selected="" value="">-- Selecciona --</option>
                                    <?php } ?>
                                    
                                    <?php foreach($priorities as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Estado
                            </label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" name="status_id" <?php if ($_SESSION["nivel"] !== 'Administrador' || $_SESSION["nivel"] !== 'Soporte') { ?>disabled<?php } ?>>
                                    <?php if ($_SESSION["nivel"] == 'Administrador' || $_SESSION["nivel"] == 'Soporte') { ?>
                                        <option selected="" value="">-- Selecciona --</option>
                                    <?php } ?>
                                    <?php foreach($statuses as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md alignright">
                              <button id="save_data" type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /Modal -->