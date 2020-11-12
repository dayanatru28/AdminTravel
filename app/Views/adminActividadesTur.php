</br> </br>
            <center>
            <a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminActividadesTur/mostrarFormulario"  role="button">Agregar una nueva actividad de Ecoturismo</a>
            </center>   
        
        <!-- Tabla para modificar o eliminar los sitios de interes-->
        </br> </br>
            <div class= "container">
                <div class="row">
                    <div class="col-md-12 text-center">    
                        <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
                            <thead>
                                <tr>
                                    <th scope="col">Id_Sitio</th>
                                    <th scope="col">id_Salida</th>
                                    <th scope="col">Nombre de Actividades de Ecoturismo</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Acciones</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($ActividadesTurModel as $actividad){
                                        echo "<tr>";
                                        echo "<td>".$actividad['idActividad']."</td>";
                                        echo "<td>".$actividad['idSalida']."</td>";
                                        echo "<td>".$actividad['nombreActividad']."</td>";
                                        echo "<td>".$actividad['desActividad']."</td>";       
                                        echo "<td>";
                                    ?>
                                    <!-- Al editar se pasan los valores de valores de la salida y el sitio para realizar la busqueda -->
                                    <a href="<?php echo base_url();?>/AdminActividadesTur/formEditar?idActividad=<?php echo $actividad['idActividad'];?>&idSalida=<?php echo $actividad['idSalida'];?>" class="btn btn-warning" role="button"> <i class="fa fa-pencil-square-o"></i></a> </br>
                                    <a href="<?php echo base_url();?>/AdminActividadesTur/eliminar?idActividad=<?php echo $actividad['idActividad'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
                                    <?php
                                    
                                    }    
                                    ?>                               
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
