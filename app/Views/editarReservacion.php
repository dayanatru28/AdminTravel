<!-- Se recibe la informacion mandada del controlador para ser mostrada de manera inmediata en el formulario -->
<?php

    // recibo la informacion del id para editar-
    
        if(isset($reservaciones)){
            $codigoReserva=$reservaciones[0]['codigoReserva'];
            $nombreReserva=$reservaciones[0]['nombreReserva'];
            $correoReserva=$reservaciones[0]['correoReserva'];
            $salidaReserva=$reservaciones[0]['salidaReserva'];
            $destino=$reservaciones[0]['destinoReserva'];
            $cantPersonas=$reservaciones[0]['cantPersonas'];
            $cantNinos=$reservaciones[0]['cantNinos'];
            $costoPersona=$reservaciones[0]['costoPersona'];
            $diaSalida=$reservaciones[0]['diaSalida'];
            $diaLlegada=$reservaciones[0]['diaLlegada'];
            $menReserva=$reservaciones[0]['menReserva'];
        }
        else{
            $codigoReserva="";
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
          <form method="post" action="<?php echo base_url('/AdminReservaciones/editar')?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <?php 
                        echo form_label('Codigo de la reserva','codigoReserva');
                        echo form_input(array('name'=>'codigoReserva','class'=>'form-control','value'=>$codigoReserva,'required'=>''));
                        ?>
                    </div>
                    <div class="form-group col-md-6">
                        <?php 
                        echo form_label('Nombre de la persona que reserva','nombreReserva');
                        echo form_input(array('name'=>'nombreReserva','class'=>'form-control','value'=>$nombreReserva,'required'=>''));
                        ?>
                    </div>
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
                                echo form_input(array('name'=>'destino','id'=>'destino','class'=>'form-control','value'=>$destino));
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
                                <input type="date" name="trip-start" id="start" value="<?php echo set_value('trip-start'); ?> " min="<?php echo date("Y-m-d"); ?>" max="2030-12-31" required="" />
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
                    <?php echo form_submit('editar','Ingresar Reserva','class="btn btn-danger"'); ?>
                <center>
                    <?php if(isset($reservaciones)){
                    echo form_hidden('idReservacion',$reservaciones[0]['idReservacion']);} ?>
            </form>
    </div>
    <?php echo form_close(); ?>
<br><br>

    </body>
</html>  