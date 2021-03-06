<?php
    $projects =mysqli_query($con, "select * from project");
?>

    <div> <!-- Modal -->
        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-example-modal-lg-add"><i class="fa fa-plus-circle"></i> Agregar Usuario</button>
    </div>
    <div class="modal fade bs-example-modal-lg-add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="add_user" name="add_user">
                        <div id="result_user"></div>
                        <div class="col-md-6">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input name="name" required type="text" class="form-control" placeholder="Nombre">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="lastname" type="text" class="form-control" placeholder="Apellidos" required>
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <select class="form-control" required name="area">
                                        <option value="" selected>-- Selecciona Area --</option>
                                        <?php foreach($projects as $p):?>
                                        <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <select class="form-control" required name="nivel">
                                        <option value="" selected>-- Selecciona Nivel --</option>
                                        <option value="Administrador" >Administrador</option>
                                        <option value="Soport" >Soporte</option>
                                        <option value="Usuario" >Usuario</option>  
                                </select>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <select class="form-control" required name="status">
                                        <option value="" selected>-- Selecciona estado --</option>
                                        <option value="1" >Activo</option>
                                        <option value="0" >Inactivo</option>  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="usuario" type="text" class="form-control" placeholder="Usuario" id="usuario"  required >
                                <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <input name="password" type="password" class="form-control" placeholder="Contraseña" id="password"  required >
                                <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback text-right">
                            <button id="save_data" type="submit" class="btn btn-success" style="margin-top: 50px;">Guardar</button>
                        </div>
                    </form>
                </div>
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div> -->
            </div>
        </div>
    </div> <!-- /Modal -->