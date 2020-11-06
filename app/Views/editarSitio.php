<!-- Administrador de Sitios de Interes para editar un sitio de interes-->

<?php
       
       echo form_open('/AdminSitiosInteres/editar');

       foreach($SitiosInteresModel as $sitios){
			
		
        //Trae toda la informacion guardada anteriormente y se almacena en variables para poder ponerlas en los campos del formulario
        if(isset($sitios)){           
            $nombreSitio=$sitios[0]['nombreSitio'];
            $desSitio=$sitios[0]['desSitio'];
        }
        else{
            $idSitio="";
            $nombreSitio="";
            $desSitio="";
        }
    }

?>
</br></br>
<center> <h2> Complete el formulario para Eeditar un  Sitio de Interes </h2> </center>
</br> </br>

<div class="container">

    <form>
            <center>
                <div class="form-group">
                        <?php 
                        echo form_label('Salida','idSalida');
                        ?></br>
                        <!-- De la consulta realizada selecciono los nombres de los lugares disponibles por un ciclo -->
                        <?php 
                            //Se utiliza la consulta de la salida para traer el nombre ingresado anteriormente 
                            foreach($salidasModel as $salidasModel){
                                $nombreSalida=$salidasModel[0]['nombreSalida'];
                            }
                            echo form_input(array('name'=>'idSalida', 'class'=>'form-control','value'=>$nombreSalida, 'disabled'=>''));
                        ?>

                </div>
                <div class="form-group">
                    <?php
                        echo form_label('Nombre del Sitio','nombreSitio'); 
                        echo form_input(array('name'=>'nombreSitio', 'class'=>'form-control','value'=>$nombreSitio));
                    ?> 
                </div>
         
                <div class="form-group">
                    <?php
                        echo form_label('Descripcion del Sitio de interes','desSitio'); 
                        echo form_textarea(array('name'=>'desSitio', 'class'=>'form-control','value'=>$desSitio));
                    ?>
                </div>

                <?php echo form_submit('editar','Editar','class="btn btn-danger"'); ?>
            <center>
            </br></br>
            <?php if(isset($sitios)){
                    echo form_hidden('idSitio',$sitios[0]['idSitio']);} ?>
    </form>
</div>