
<!-- Tabla que presenta la informacion de cada una de las salidas-->
</br></br>
<center>
<a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminSalidas/mostrarFormulario"  role="button">Agregar una Nueva Salida</a>
</center>
</br></br>                 
<div class= "container">
    <div class="row">
    
        <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
            <thead>
                <tr>
                <th scope="col">Acciones</th>
                <th scope="col">Id_Salida</th>
                <th scope="col">Id_Clasificacion</th>
                <th scope="col">Nombre_Salida</th>
                <th scope="col">Descripcion_Salida</th>
                <th scope="col">Foto</th>
                <th scope="col">Mapa_Salida</th>
                <th scope="col">Incluye_Salida</th>
                <th scope="col">NoIncluye_Salida</th>
                <th scope="col">Tipo_De_Dificultad</th>
                                            
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($salidas as $salida){
                echo "<tr>";
                echo "<td>";
            ?>
            <a href="<?php echo base_url();?>/AdminSalidas/formEditar?idSalida=<?php echo $salida['idSalida'];?>" class="btn btn-warning" role="button"> <i class="fa fa-pencil-square-o"></i></a> <br>
            <a href="<?php echo base_url();?>/AdminSalidas/eliminar?idSalida=<?php echo $salida['idSalida'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
            <?php
                echo "</td>";
                echo "<td>".$salida['idSalida']."</td>";
                echo "<td>".$salida['idClasificacion']."</td>";
                echo "<td>".$salida['nombreSalida']."</td>";    
                echo "<td>".$salida['desSalida']."</td>";  
                echo "<td>".$salida['fotoSalida']."</td>";    
                echo "<td>".$salida['dirMapa']."</td>";    
                echo "<td>".$salida['incluyeSalida']."</td>";    
                echo "<td>".$salida['noIncluyeSalida']."</td>";
                echo "<td>".$salida['tipoDificultad']."</td>";    
            }    
            ?>    
            </tbody>
        </table>


    </div>
</div>

          
         
    
      