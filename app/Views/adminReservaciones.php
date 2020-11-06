
</br> </br>
<center> <h2> Estas son todas las reservaciones que la corporacion ha realizado </h2> </center>
</br> </br>
<center>
<a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminReservaciones/nuevaReservacion"  role="button">Agregar una Nueva Reservacion</a>
</center>
</br> </br>

<!-- Tabla para  mostrar las cotizaciones-->

<div class= "container">
    <div class="row">
        <div class="col-md-12 text-center">    
            <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
                <thead>
                    <tr>
                        <th scope="col">Id de Reservacion</th>
                        <th scope="col">Nombre_Reservante</th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col">Lugar de salida</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Cantidad de Personas</th>
                        <th scope="col">Cantidad de Niños</th>
                        <th scope="col">Costo por persona</th>
                        <th scope="col">Dia de salida</th>
                        <th scope="col">Dia de llegada</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($ReservacionesModel as $reservaciones){
                        echo "<tr>";
                        echo "<td>".$reservaciones['idReservacion']."</td>";
                        echo "<td>".$reservaciones['nombreReserva']."</td>";
                        echo "<td>".$reservaciones['correoReserva']."</td>"; 
                        echo "<td>".$reservaciones['salidaReserva']."</td>"; 
                        echo "<td>".$reservaciones['destinoReserva']."</td>";  
                        echo "<td>".$reservaciones['cantPersonas']."</td>";  
                        echo "<td>".$reservaciones['cantNinos']."</td>";  
                        echo "<td>".$reservaciones['costoPersona']."</td>";  
                        echo "<td>".$reservaciones['diaSalida']."</td>"; 
                        echo "<td>".$reservaciones['diaLlegada']."</td>";   
                        echo "<td>".$reservaciones['menReserva']."</td>";       
                        echo "<td>";
                    ?>
                    <a href="<?php echo base_url();?>/AdminReservaciones/formEditar?idReservacion=<?php echo $reservaciones['idReservacion'];?>" class="btn btn-warning" role="button"> <i class="fa fa-pencil-square-o"></i></a> <br>
                    <?php
                        echo "</td>";
                        echo "<td>";
                    ?>
                    <a href="<?php echo base_url();?>/AdminReservaciones/eliminar?idReservacion=<?php echo $reservaciones['idReservacion'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a> <br>
                    <?php
                        echo "</td>";
                    }    
                    ?>    
            </tbody>
            </table>
        </div>
    </div>
</div>      
