<?php
       
       echo form_open('/AdminTipoPlan/insertar');
?>
</br>
</br>
<center> <h2> Complete el formulario para ingresar una nueva Actividad Deportiva </h2> </center>
</br> </br>
 
 <!--Formulario para ingresar un nuevo tipo de Plan-->

 <div class=container>
        <form> 
            <center>
                <div class="form-group">
                        <?php 
                        echo form_label('Nombre del tipo de Plan','nombreTipoPlan');
                        ?></br><?php
                        echo form_input(array('name'=>'nombreTipoPlan', 'class'=>'form-control'));
                        ?>
                 </div>
                 
                <?php echo form_submit('insertar','Insertar','class="btn btn-danger"'); ?>
             <center>
             </br></br>
             </form>

             

 <?php echo form_close(); ?>

 </div>