    <div class="modal fade bs-example-modal-lg-obs" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"> Observaciones</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-label-left input_mask" method="post" id="upd" name="upd">
                        <div id="result2"></div>

                        <input type="hidden" name="mod_id" id="mod_id">

                            <div class="form-group">
                                <!-- <div class="col-lg-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">PRIORIDAD</i></span>
                                        <select class="form-control" name="priority_id" required id="mod_priority_id" >
                                            <?php foreach($priorities as $p):?>
                                                <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-lg-6 col-lg-offset-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">ESTADO</i></span>
                                        <select  class="form-control" name="status_id" required id="mod_status_id">
                                        <?php foreach($statuses as $p):?>
                                            <option value="<?php echo $p['id']; ?>"><?php echo $p['name']; ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">OBSERVACION</i></span>
                                        <textarea name="description" id="mod_description" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>

                        <div class="form-group">
                           
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                              <button id="upd_data" type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>