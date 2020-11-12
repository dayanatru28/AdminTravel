<!-- Administrador de Sitios de Interes para editar una Actividad -->

<?php
       
       echo form_open('/AdminActividadesTur/editar');

       foreach($ActividadesTurModel as $actividad){
			
		
        //Trae toda la informacion guardada anteriormente y se almacena en variables para poder ponerlas en los campos del formulario
        if(isset($actividad)){           
            $nombreActividad=$actividad[0]['nombreActividad'];
            $desActividad=$actividad[0]['desActividad'];
        }
        else{
            $idActividad="";
            $nombreActividad="";
            $desActividad="";
        }
    }

?>
</br></br>
<center> <h2> Complete el formulario para Editar una Actividad de Ecoturismo </h2> </center>
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
                        echo form_label('Nombre de la Actividad de Ecoturismo','nombreActividad'); 
                        echo form_input(array('name'=>'nombreActividad', 'class'=>'form-control','value'=>$nombreActividad));
                    ?> 
                </div>
         
                <div class="form-group">
                    <?php
                        echo form_label('Descripcion de la Actividad','desActividad'); 
                        echo form_textarea(array('name'=>'desActividad', 'class'=>'form-control','value'=>$desActividad));
                    ?>
                </div>

                <?php echo form_submit('editar','Editar','class="btn btn-danger"'); ?>
            <center>
            </br></br>
            <?php if(isset($actividad)){
                    echo form_hidden('idActividad',$actividad[0]['idActividad']);} ?>
    </form>
</div>