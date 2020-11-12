<!-- Administrador de Actividades de Ecoturismo para agregar una nueva-->

<?php
       
       echo form_open('/AdminActividadesTur/insertar');
?>
</br></br>
<center> <h2> Complete el formulario para ingresar una nueva actividad de Ecoturismo </h2> </center>
</br> </br>

<div class="container">

    <form>
            <center>
                <div class="form-group">
                        <?php 
                        echo form_label('Salida','idSalida');
                        ?></br>
                        <!-- De la consulta realizada selecciono los nombres de los lugares disponibles por un ciclo -->
                        <select class="form-control" name="idSalida" id="idSalida">
                        <?php  for ($i=0; $i < count($salidasModel) ; $i++) {                           
                        ?>
                            <option value="<?php echo($salidasModel[$i]["idSalida"])?>"><?php echo($salidasModel[$i]["nombreSalida"])?></option>
                        <?php
                        }
                        ?>
                        </select>
                </div>
                <div class="form-group">
                    <?php
                        echo form_label('Nombre de la Actividad de Ecoturismo','nombreActividad'); 
                        echo form_input(array('name'=>'nombreActividad', 'class'=>'form-control'));
                    ?> 
                </div>
         
                <div class="form-group">
                    <?php
                        echo form_label('Descripcion de la Actividad','desActividad'); 
                        echo form_textarea(array('name'=>'desActividad', 'class'=>'form-control'));
                    ?>
                </div>

                <?php echo form_submit('insertar','Insertar','class="btn btn-danger"'); ?>
            <center>
            </br></br>
    </form>
</div>