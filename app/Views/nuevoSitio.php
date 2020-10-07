<!-- Administrador de Sitios de Interes para agregar uno nuevo-->

<?php
       
       echo form_open('/AdminSitiosInteres/insertar');
?>
</br></br>
<center> <h2> Complete el formulario para ingresar un nuevo Sitio de Interes </h2> </center>
</br> </br>

<div class="container">

    <form>
            <center>
                <div class="form-group">
                        <?php 
                        echo form_label('Salida','idSalida');
                        ?></br><?php
                        echo form_dropdown('idSalida', $salidasModel);
                        ?>
                </div>
                <div class="form-group">
                    <?php
                        echo form_label('Nombre del Sitio','nombreSitio'); 
                        echo form_input(array('name'=>'nombreSitio', 'class'=>'form-control'));
                    ?> 
                </div>
         
                <div class="form-group">
                    <?php
                        echo form_label('Descripcion del Sitio de interes','desSitio'); 
                        echo form_textarea(array('name'=>'desSitio', 'class'=>'form-control'));
                    ?>
                </div>

                <?php echo form_submit('insertar','Insertar','class="btn btn-danger"'); ?>
            <center>
            </br></br>
    </form>
</div>