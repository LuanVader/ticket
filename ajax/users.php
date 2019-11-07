<?php

    include "../config/config.php";//Contiene funcion que conecta a la base de datos
    
    $action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';

    if (isset($_GET['id'])){

        $id_expence=intval($_GET['id']);
        $query=mysqli_query($con, "SELECT * from user where id='".$id_expence."'");
        
        $count=mysqli_num_rows($query);
        if ($delete1=mysqli_query($con,"DELETE FROM user WHERE id='".$id_expence."'")){
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Aviso!</strong> Datos eliminados exitosamente.
            </div>
            <?php 
        }else {
            ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
            </div>
<?php
        } //end else
    } //end if
?>

<?php
    if($action == 'ajax'){
        // escaping, additionally removing everything that could be (html/javascript-) code
         $q = mysqli_real_escape_string($con,(strip_tags($_REQUEST['q'], ENT_QUOTES)));
         $aColumns = array('name');//Columnas de busqueda
         $sTable = "user";
         $sWhere = "";
        if ( $_GET['q'] != "" )
        {
            $sWhere = "WHERE (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".$q."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }
        $sWhere.=" order by created_at desc";
        include 'pagination.php'; //include pagination file
        //pagination variables
        $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
        $per_page = 10; //how much records you want to show
        $adjacents  = 4; //gap between pages after number of adjacents
        $offset = ($page - 1) * $per_page;
        //Count the total number of row in your table*/
        $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
        
        $row= mysqli_fetch_array($count_query);
        $numrows = $row['numrows'];
        $total_pages = ceil($numrows/$per_page);
        $reload = './users.php';
        //main query to fetch the data
        $sql="SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
        $query = mysqli_query($con, $sql);
        //loop through fetched data
        if ($numrows>0){
            
            ?>
            <table id="tb_usuarios" class="table table-responsive table-striped table-bordered jambo_table bulk_action" style="overflow: hidden;">
                <thead>
                    <tr class="headings" style="background: #4a93ad;color: #ffffff;">
                        <th class="text-center">NOMBRE </th>
                        <th class="text-center">NIVEL </th>
                        <th class="text-center">USUARIO </th>
                        <th class="text-center">ESTADO </th>
                        <th class="text-center">FECHA </th>
                        <th class="text-center">ACCION</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        while ($r=mysqli_fetch_array($query)) {
                            $id=$r['id'];
                            $status=$r['is_active'];
                                if ($status==1){$status_f="Activo";}else {$status_f="Inactivo";}

                            $name=$r['name'];
                            $nivel=$r['nivel'];
                            $username=$r['username'];
                            $created_at=date('d/m/Y', strtotime($r['created_at']));
                ?>
                    <input type="hidden" value="<?php echo $name;?>" id="name<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $nivel;?>" id="nivel<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $username;?>" id="username<?php echo $id;?>">
                    <input type="hidden" value="<?php echo $status;?>" id="status<?php echo $id;?>">

                    <tr class="even pointer">
                        <td style="vertical-align: middle;padding: 5px 5px 5px 5px;"><?php echo $name;?></td>
                        <td style="vertical-align: middle;padding: 5px 5px 5px 5px;"><?php echo $nivel;?></td>
                        <td style="vertical-align: middle;padding: 5px 5px 5px 5px;"><?php echo $username;?></td>
                        <td style="vertical-align: middle;padding: 5px 5px 5px 5px;"><?php echo $status_f;?></td>
                        <td style="vertical-align: middle;padding: 5px 5px 5px 5px;"><?php echo $created_at;?></td>
                        <td style="vertical-align: middle;text-align: center;padding: 5px 5px 5px 5px;">
                            <a href="#" class='btn btn-sm btn-primary' style="margin: 0px;" title='Editar producto' onclick="obtener_datos('<?php echo $id;?>');" data-toggle="modal" data-target=".bs-example-modal-lg-upd"><i class="glyphicon glyphicon-edit"></i></a> 
                            <a href="#" class='btn btn-sm btn-danger'  style="margin: 0px;" title='Borrar producto' onclick="eliminar('<?php echo $id; ?>')"><i class="glyphicon glyphicon-trash"></i> </a>
                        </td>
                    </tr>
                <?php
                    } //end while
                ?>
                <tr>
                    <td colspan=6 style="text-align: right;">
                        <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </td>
                </tr>
              </table>
            </div>
            <?php
        }else{
           ?> 
            <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Aviso!</strong> No hay datos para mostrar
            </div>
        <?php    
        }
    }
?>