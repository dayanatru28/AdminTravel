<!-- Tabla para  mostrar las cotizaciones-->
</br> </br>
<center> <h2> Estas son todas las cotizaciones que la corporacion ha recibido </h2> </center>
</br> </br>
<div class= "container">
    <div class="row">
        <div class="col-md-12 text-center">    
            <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
                <thead>
                    <tr>
                        <th scope="col">Id_Cotizacion</th>
                        <th scope="col">Nombre_Cotizante</th>
                        <th scope="col">Correo Electronico</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Direccion</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Cantidad de Peronas</th>
                        <th scope="col">Cantidad de Niños</th>
                        <th scope="col">Dia de salida</th>
                        <th scope="col">Cantidad de dias de viaje</th>
                        <th scope="col">Mensaje</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($CotizacionesModel as $cotizaciones){
                        echo "<tr>";
                        echo "<td>".$cotizaciones['idCotizacion']."</td>";
                        echo "<td>".$cotizaciones['nombreCoti']."</td>";
                        echo "<td>".$cotizaciones['correoCoti']."</td>"; 
                        echo "<td>".$cotizaciones['celularCoti']."</td>"; 
                        echo "<td>".$cotizaciones['direccionCoti']."</td>";  
                        echo "<td>".$cotizaciones['destino']."</td>";  
                        echo "<td>".$cotizaciones['cantPersonas']."</td>";  
                        echo "<td>".$cotizaciones['cantNinos']."</td>";  
                        echo "<td>".$cotizaciones['diaSalida']."</td>"; 
                        echo "<td>".$cotizaciones['cantDias']."</td>";   
                        echo "<td>".$cotizaciones['mensajeCoti']."</td>";       
                        echo "<td>";
                    ?>
                    <a href="<?php echo base_url();?>/AdminCotizaciones/eliminar?idCotizacion=<?php echo $cotizaciones['idCotizacion'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
                    <?php
                    
                    }    
                    ?>    
            </tbody>
            </table>
        </div>
    </div>
</div>      
