<!-- Tabla para editar y mostrar las salidas-->
</br> </br>
            <center>
            <a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminTipoSalida/mostrarFormulario"  role="button">Ingrese el nuevo tipo de salida</a>
            </center>
            </br>
            <div class= "container">
                <div class="row">
                    <div class="col-md-12 text-center">    
                        <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
                            <thead>
                                <tr>
                                <th scope="col">Id_Tipo_Salida</th>
                                <th scope="col">Nombre_Tipo_De_Salida</th>
                                <th scope="col">Acciones</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($TipoSalidaModel as $tsalida){
                                    echo "<tr>";
                                    echo "<td>".$tsalida['idTipoSalida']."</td>";
                                    echo "<td>".$tsalida['nombreTipoSalida']."</td>";     
                                    echo "<td>";
                                ?>
                                <a href="<?php echo base_url();?>/AdminTipoSalida/eliminar?idTipoSalida=<?php echo $tsalida['idTipoSalida'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
                                <?php
                                
                                }    
                                ?>    
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>      
            