<?php
       
        echo form_open('/salidaNueva/insertar');
?>
</br>
</br>
<center> <h2> Complete el formulario para ingresar una nueva salida </h2> </center>
<center> <h4> Tenga en cuenta que el id de Clasificacion </h4> </center>
<center> <h4> 1-Huila ----- 2-Nacional </h4> </center>
</br> </br>

<div class=container>
            <form>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php
                            echo form_label('Id de Clasificacion','idClasificacion'); 
                            echo form_input(array('name'=>'idClasificacion', 'class'=>'form-control'));
                            ?>
                    </div>

                    <div class="form-group col-md-6">
                            <?php
                            echo form_label('Nombre de Salida','nombreSalida'); 
                            echo form_input(array('name'=>'nombreSalida', 'class'=>'form-control'));
                            ?> 
                    </div>
                </div>
                
                
                <div class="form-group">
                        <?php
                        echo form_label('Descripcion de Salida','desSalida'); 
                        echo form_textarea(array('name'=>'desSalida', 'class'=>'form-control'));
                        ?>
                </div>
                
                <div class="form-group">
                        <?php
                        echo form_label('Direccion en Mapa','dirMapa'); 
                        echo form_input(array('name'=>'dirMapa', 'class'=>'form-control'));
                        ?> 
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php
                        echo form_label('Incluye Salida','incluyeSalida'); 
                        echo form_textarea(array('name'=>'incluyeSalida', 'class'=>'form-control'));
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php
                        echo form_label('No Incluye Salida','noIncluyeSalida'); 
                        echo form_textarea(array('name'=>'noIncluyeSalida', 'class'=>'form-control'));
                        ?>
                    </div>
                </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <?php 
                            echo form_label('Tipo de Salida','tipoSalida');
                            ?></br><?php
                            echo form_dropdown('tipoSalida', $tiposSalida);
                            ?>
                        </div>

                        <div class="form-group col-md-6">
                            <?php 
                            echo form_label('Tipo de Dificultad','tiposDificultad');
                            ?></br><?php
                            echo form_dropdown('tiposDificultad', $tiposDificultad);
                            ?>
                        </div>
                    </div>
                    
                
                <center>
                <?php echo form_submit('insertar','Insertar','class="btn btn-danger"'); ?>
                <center>
                <?php if(isset($salida)){
                    echo form_hidden('idSalida',$salida[0]['idSalida']);} ?>
            </form>
        </div>
        <?php echo form_close(); ?>


            </br> </br>
   <div>         