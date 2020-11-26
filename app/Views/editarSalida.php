<?php

        // recibo la informacion del id para editar-
    foreach($salidas as $salida){
			
		

        if(isset($salida)){
            $idClasificacion=$salida['idClasificacion'];
            $nombreSalida=$salida['nombreSalida'];
            $desSalida=$salida['desSalida'];
            $dirMapa=$salida['dirMapa'];
            $incluyeSalida=$salida['incluyeSalida'];
            $noIncluyeSalida=$salida['noIncluyeSalida'];
            $fotoSalida=$salida['fotoSalida'];
        }
        else{
            $idClasificacion="";
            $nombreSalida="";
            $desSalida="";
            $dirMapa="";
            $incluyeSalida="";
            $noIncluyeSalida="";
            $fotoSalida="";            
        }
    }
?>

</br>
</br>
<center> <h2> Complete el formulario para editar una nueva salida </h2> </center>
<center> <h4> Tenga en cuenta que el id de Clasificacion </h4> </center>
<center> <h4> 1-Huila ----- 2-Nacional </h4> </center>
</br> </br>
<div class=container>
        <form action="<?= base_url('/AdminSalidas/editar') ?>"  method="post" enctype="multipart/form-data">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php
                            echo form_label('Id de Clasificacion','idClasificacion'); 
                            echo form_input(array('name'=>'idClasificacion', 'class'=>'form-control','value'=>$idClasificacion));
                            ?>
                    </div>

                    <div class="form-group col-md-6">
                            <?php
                            echo form_label('Nombre de Salida','nombreSalida'); 
                            echo form_input(array('name'=>'nombreSalida', 'class'=>'form-control','value'=>$nombreSalida));
                            ?> 
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <?php
                        echo form_label('Descripcion de Salida','desSalida'); 
                        echo form_textarea(array('name'=>'desSalida', 'class'=>'form-control','value'=>$desSalida));
                        ?>
                    </div>
                    <div class="form-group col-md-4">
                        <?php echo form_label('Foto de la salida','fotoSalida'); ?>
                        <div class="card__image card__image--fence">
                            <img class="d-block w-100" src="<?php echo base_url();echo $salida['fotoSalida'] ?>" > </img>
                        </div>   
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <?php
                        echo form_label('Direccion en Mapa','dirMapa'); 
                        echo form_textarea(array('name'=>'dirMapa', 'class'=>'form-control','value'=>$dirMapa));
                        ?> 
                    </div>
                    <div class="form-group col-md-4">
                        <!-- Carga el archivo-->
                        <?php 
                        echo form_label('Ubicacion Del archivo','fileToUpload');
                        ?></br><?php
                        echo form_upload(array('type'=>'file','name'=>'fileToUpload', 'id'=>'fileToUpload'));?>
                
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php
                        echo form_label('Incluye Salida','incluyeSalida'); 
                        echo form_textarea(array('name'=>'incluyeSalida', 'class'=>'form-control','value'=>$incluyeSalida));
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php
                        echo form_label('No Incluye Salida','noIncluyeSalida'); 
                        echo form_textarea(array('name'=>'noIncluyeSalida', 'class'=>'form-control','value'=>$noIncluyeSalida));
                        ?>
                    </div>
                </div>
                    
                
                <center>
                <?php echo form_submit('editar','Editar','class="btn btn-danger"'); ?>
                <center>
                <?php if(isset($salida)){
                    echo form_hidden('idSalida',$salida['idSalida']);} ?>
            </form>
        </div>
        <?php //echo form_close(); ?>


            </br> </br>
   <div>         