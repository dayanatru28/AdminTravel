<br><br>
<center>
<div class="container">
    <h4 class="search_title"> Por favor diligencie el formulario para ingresar una nueva reservacion</h4> <br>
</div>
</center>
 <!-- Utiliza el helper form para la recepcion de informacion -->

     

<!--formulario-->
    <div class=container>
          <form method="post" action="<?php echo base_url('/AdminReservaciones/insertar')?>">
                <div class="form-group">
                    <?php 
                    echo form_label('Nombre de la persona que reserva','nombreReserva');
                    echo form_input(array('name'=>'nombreReserva','class'=>'form-control','placeholder'=>'Pepito Perez','required'=>''));
                    ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php 
                        echo form_label('Correo Electronico','correoReserva');
                        echo form_input(array('name'=>'correoReserva','class'=>'form-control', 'placeholder'=>'pepitoperez@gmail.com','required'=>''));
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php 
                            echo form_label('Lugar de salida','salidaReserva');
                            echo form_input(array('name'=>'salidaReserva','class'=>'form-control', 'placeholder'=>'1234 Main St Municipio, Departamento','required'=>''));
                        ?>
                    </div>
                </div>         
                
                 <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="form-group">
                                <?php 
                                echo form_label('Destino','destino');
                                ?></br>
                                <!-- De la consulta realizada selecciono los nombres de los lugares disponibles por un ciclo -->
                                <select class="form-control" name="destino" id="destino">
                                    <?php  for ($i=0; $i < count($salidasModel) ; $i++) {                           
                                    ?>
                                        <option value="<?php echo($salidasModel[$i]["nombreSalida"])?>"><?php echo($salidasModel[$i]["nombreSalida"])?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                        </div>
                        </div>
                        <div class="form-group col-md-4">
                             <?php 
                                echo form_label('Cantidad de Personas','cantPersonas');
                                echo form_input(array('name'=>'cantPersonas','id'=>'cantPersonas','class'=>'form-control', 'placeholder'=>'1, 2, 3... 10','required'=>''));
                            ?>
                        </div>
                        <div class="form-group col-md-4">
                            <?php 
                                echo form_label('Cantidad de Niños','cantNinos');
                                echo form_input(array('name'=>'cantNinos','id'=>'cantNinos','class'=>'form-control', 'placeholder'=>'1, 2, 3... 10'));
                            ?>
                        </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                                <?php 
                                    echo form_label('Costo por persona','costoPersona');
                                    echo form_input(array('name'=>'costoPersona','class'=>'form-control', 'placeholder'=>'1, 2, 3... 10','required'=>''));
                                ?>
                        </div> 

                        <div class="form-group col-md-2">
                            <?php 
                                echo form_label('Dia de salida:','diaSalida');?>
                                <br>
                                <input type="date" name="trip-start1" id="start1" value="<?php echo set_value('trip-start1'); ?> " min="<?php echo date("Y-m-d"); ?>" max="2030-12-31" required="" />
                        </div> 
                        <div class="form-group col-md-2">
                            <?php 
                                echo form_label('Dia de Llegada:','diaLlegada');?>
                                <br>
                                <input type="date" name="trip-start" id="start" value="<?php echo set_value('trip-start'); ?> " min="<?php echo date("Y-m-d"); ?>" max="2030-12-31" required="" />
                        </div> 
                       
                    </div>
                </div>
                <div class="form-group">
                        <?php 
                            echo form_label('Mensaje','menReserva');
                            echo form_textarea(array('name'=>'menReserva','class'=>'form-control'));
                        ?>
                </div>
                <center>
                    <?php echo form_submit('insertar','Ingresar Reserva','class="btn btn-danger"'); ?>
                <center>
            </form>
    </div>
    <?php echo form_close(); ?>
<br><br>

    </body>
</html>  