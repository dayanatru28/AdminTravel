

            <!-- Tabla para editar y mostrar las salidas-->
            </br> </br>
            <center>
            <a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminImagenes/mostrarFormulario"  role="button">Agregar una Nueva Foto</a>
            </center>
            </br>
            <div class= "container">
                <div class="row">
                    <div class="col-md-12 text-center">    
                        <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
                            <thead>
                                <tr>
                                <th scope="col">Id_Imagen</th>
                                <th scope="col">id_Salida</th>
                                <th scope="col">Imagen</th>
                                <th scope="col">Acciones</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($imagenesModel as $imagenes){
                                    echo "<tr>";
                                    echo "<td>".$imagenes['idFoto']."</td>";
                                    echo "<td>".$imagenes['idSalida']."</td>";
                                    echo "<td>".$imagenes['direcFoto']."</td>";       
                                    echo "<td>";
                                ?>
                                <a href="<?php echo base_url();?>/AdminImagenes/eliminar?idFoto=<?php echo $imagenes['idFoto'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
                                <?php
                                
                                }    
                                ?>    
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>      
            