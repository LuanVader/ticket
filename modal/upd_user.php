
    <div class="modal fade bs-example-modal-lg-upd" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" id="upd_user" name="upd_user">
                        <div id="result_user2"></div>
                        <input type="hidden" id="mod_id" name="mod_id">
                        <div class="col-md-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <input name="mod_name" id="mod_name" type="text" class="form-control" required>
                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 col-sm-6 col-xs-6 form-group has-feedback">
                                <input name="usuario" type="text" class="form-control" placeholder="Usuario" id="mod_usuario"  required >
                                <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                            </div>
                            <div class="col-md-12 col-sm-6 col-xs-6">
                                <input name="password" type="password" class="form-control" placeholder="Contraseña" id="mod_password"  >
                                <span class="fa fa-key form-control-feedback right" aria-hidden="true"></span>
                                <p class="text-muted">La contraseña solo se modificará si escribes algo, en caso contrario no se modifica.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-12 col-sm-6 col-xs-12 form-group has-feedback">
                                <select class="form-control" required name="mod_status" id="mod_status">
                                        <option value="" selected>-- Selecciona estado --</option>
                                        <option value="1" >Activo</option>
                                        <option value="0" >Inactivo</option>  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback text-right">
                            <div class="form-group">
                                <button id="upd_data" type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /Modal -->