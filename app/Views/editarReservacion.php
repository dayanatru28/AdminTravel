<!-- Se recibe la informacion mandada del controlador para ser mostrada de manera inmediata en el formulario -->
<?php

    // recibo la informacion del id para editar-
    foreach($reservaciones as $reservacion){
			
		

        if(isset($reservacion)){
            $nombreReserva=$reservacion[0]['nombreReserva'];
            $correoReserva=$reservacion[0]['correoReserva'];
            $salidaReserva=$reservacion[0]['salidaReserva'];
            //Se resta un valor dado a que en la base de datos se guarda como numero la clasifacacion y al hacer la consulta se trae como arreglo entonces se modifica el id 
            $destino=intval($reservacion[0]['destinoReserva']);
            $destino=(($destino)-1);
            $cantPersonas=$reservacion[0]['cantPersonas'];
            $cantNinos=$reservacion[0]['cantNinos'];
            $costoPersona=$reservacion[0]['costoPersona'];
            $diaSalida=$reservacion[0]['diaSalida'];
            $diaLlegada=$reservacion[0]['diaLlegada'];
            $menReserva=$reservacion[0]['menReserva'];
        }
        else{
            $nombreReserva="";
            $correoReserva="";
            $salidaReserva="";
            $destino="";
            $cantPersonas="";
            $cantNinos="";
            $costoPersona="";
            $diaSalida="";
            $diaLlegada="";
            $menReserva="";

        }
    }
?>


<br><br>
<center>
<div class="container">
    <h4 class="search_title"> Por favor diligencie el formulario para editar una reservacion</h4> <br>
</div>
</center>
 <!-- Utiliza el helper form para la recepcion de informacion -->

     

<!--formulario-->
    <div class=container>
          <form method="post" action="<?php echo base_url('/AdminReservaciones/insertar')?>">
                <div class="form-group">
                    <?php 
                    echo form_label('Nombre de la persona que reserva','nombreReserva');
                    echo form_input(array('name'=>'nombreReserva','class'=>'form-control','value'=>$nombreReserva,'required'=>''));
                    ?>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php 
                        echo form_label('Correo Electronico','correoReserva');
                        echo form_input(array('name'=>'correoReserva','class'=>'form-control','value'=>$correoReserva,'required'=>''));
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php 
                            echo form_label('Lugar de salida','salidaReserva');
                            echo form_input(array('name'=>'salidaReserva','class'=>'form-control','value'=>$salidaReserva,'required'=>''));
                        ?>
                    </div>
                </div>         
                
                 <div class="form-row">
                        <div class="form-group col-md-4">
                            <div class="form-group">
                                <?php 
                                echo form_label('Destino','destino');
                                ?></br><?php
                                echo form_dropdown('destino', $salidasModel,$destino);
                                ?>
                        </div>
                        </div>
                        <div class="form-group col-md-4">
                             <?php 
                                echo form_label('Cantidad de Personas','cantPersonas');
                                echo form_input(array('name'=>'cantPersonas','id'=>'cantPersonas','class'=>'form-control','value'=>$cantPersonas ,'required'=>''));
                            ?>
                        </div>
                        <div class="form-group col-md-4">
                            <?php 
                                echo form_label('Cantidad de Niños','cantNinos');
                                echo form_input(array('name'=>'cantNinos','id'=>'cantNinos','class'=>'form-control','value'=>$cantNinos));
                            ?>
                        </div>
                </div>

                <div class="form-group">
                    <div class="form-row">
                        <div class="form-group col-md-7">
                                <?php 
                                    echo form_label('Costo por persona','costoPersona');
                                    echo form_input(array('name'=>'costoPersona','class'=>'form-control','value'=>$costoPersona,'required'=>''));
                                ?>
                        </div> 

                        <div class="form-group col-md-2">
                            <?php 
                                echo form_label('Dia de salida:  ','diaSalida');
                                echo(' seleccionado anteriormente '.$diaSalida);?>
                                <br>
                                <input type="date" name="trip-start1" id="start1" value="<?php echo set_value('trip-start1'); ?> " min="2020-01-01" max="2030-12-31" required="" />
                        </div> 
                        <div class="form-group col-md-3">
                            <?php 
                                echo form_label('Dia de Llegada:','diaLlegada');
                                echo(' seleccionado anteriormente '.$diaLlegada);?>
                                <br>
                                <input type="date" name="trip-start" id="start" value="<?php echo set_value('trip-start'); ?> min="2020-01-01" max="2030-12-31" required="" />
                        </div> 
                       
                    </div>
                </div>
                <div class="form-group">
                        <?php 
                            echo form_label('Mensaje','menReserva');
                            echo form_textarea(array('name'=>'menReserva','class'=>'form-control','value'=>$menReserva));
                        ?>
                </div>
                <center>
                    <?php echo form_submit('insertar','Ingresar Reserva','class="btn btn-danger"'); ?>
                <center>
                    <?php if(isset($reservacion)){
                    echo form_hidden('idReservacion',$reservacion[0]['idReservacion']);} ?>
            </form>
    </div>
    <?php echo form_close(); ?>
<br><br>

    </body>
</html>  