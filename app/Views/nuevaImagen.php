<?php
       
       echo form_open('/AdminImagenes/insertar');
?>
</br>
</br>
<center> <h2> Complete el formulario para ingresar una nueva imagen </h2> </center>
</br> </br>
 
 <!--Formulario para ingresar imagenes-->

 <div class=container>
        <form action="<?= base_url('/AdminImagenes/insertar') ?>" method="post" enctype="multipart/form-data">
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
                        echo form_label('Ubicacion Del archivo','direcFoto');
                        ?></br><?php
                        echo form_upload(array('type'=>'file','name'=>'direcFoto', 'class'=>'form-control'));
                        ?>
                 </div>
                 
                <?php echo form_submit('insertar','Insertar','class="btn btn-danger"'); ?>
             <center>
             </br></br>
             </form>

             

 <?php echo form_close(); ?>

 </div>