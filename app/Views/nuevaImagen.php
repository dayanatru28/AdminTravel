
</br>
</br>
<center> <h2> Complete el formulario para ingresar una nueva imagen </h2> </center>
</br> </br>

 <!--Formulario para ingresar imagenes-->

 <div class=container>
        <form action="<?= base_url('/AdminImagenes/upload') ?>"  method="post" enctype="multipart/form-data">
            <center>
                <!-- ingresa el id de la salida-->
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
                <!-- Carga el archivo-->
                <div class="form-group">
                        <?php 
                        echo form_label('Ubicacion Del archivo','fileToUpload');
                        ?></br><?php
                        echo form_upload(array('type'=>'file','name'=>'fileToUpload', 'id'=>'fileToUpload'));?>
                        <!--<input type="file" name="fileToUpload" id="fileToUpload">-->
                 </div>

                 <?php echo form_submit('Upload Image','Insertar','class="btn btn-danger"'); ?>
                 <!--<input type="submit" value="Upload Image" name="submit">-->
             <center>
             </br></br>
            </form>

             


      
 </div>