<?php
       
       echo form_open('/AdminTipoDificultad/insertar');
?>
</br>
</br>
<center> <h2> Complete el formulario para ingresar un nuevo tipo de dificultad </h2> </center>
</br> </br>
 
 <!--Formulario para ingresar un nuevo tipo de dificultad-->

 <div class=container>
        <form> 
            <center>
                <div class="form-group">
                        <?php 
                        echo form_label('Nombre del tipo de Dificultad','nombreTipoDificultad');
                        ?></br><?php
                        echo form_input(array('name'=>'nombreTipoDificultad', 'class'=>'form-control'));
                        ?>
                 </div>
                 
                <?php echo form_submit('insertar','Insertar','class="btn btn-danger"'); ?>
             <center>
             </br></br>
             </form>

             

 <?php echo form_close(); ?>

 </div>