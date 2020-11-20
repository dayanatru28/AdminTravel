<!-- Tabla para editar y mostrar las caracteristicas del buscador-->
</br> </br>
<center>
<a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminBuscador/mostrarFormulario"  role="button">Agregar una nueva actividad deportiva de una salida en especial</a>

</center>

</br>
<div class= "container">
    <div class="row">
        <div class="col-md-12 text-center">    
            <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
                <thead>
                    <tr>
                    <th scope="col">Id_Buscador</th>
                    <th scope="col">Id_Salida</th>
                    <th scope="col">Id_Plan</th>
                    <th scope="col">Acciones</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($BuscadorModel as $buscador){
                        echo "<tr>";
                        echo "<td>".$buscador['idBuscador']."</td>";
                        echo "<td>".$buscador['idSalida']."</td>";
                        echo "<td>".$buscador['idPlan']."</td>";       
                        echo "<td>";
                    ?>
                    <a href="<?php echo base_url();?>/AdminBuscador/eliminar?idBuscador=<?php echo $buscador['idBuscador'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
                    <?php
                    
                    }    
                    ?>    
            </tbody>
            </table>
        </div>
    </div>
</div>      
