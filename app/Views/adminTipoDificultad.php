<!-- Tabla para editar y mostrar las salidas-->
</br> </br>
            <center>
            <a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminTipoDificultad/mostrarFormulario"  role="button">Ingrese un nuevo tipo de dificultad</a>
            </center>
            </br>
            <div class= "container">
                <div class="row">
                    <div class="col-md-12 text-center">    
                        <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
                            <thead>
                                <tr>
                                <th scope="col">Id_Tipo_Dificultad</th>
                                <th scope="col">Nombre_Tipo_Dificultad</th>
                                <th scope="col">Acciones</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($TipoDificultadModel as $dificultad){
                                    echo "<tr>";
                                    echo "<td>".$dificultad['idTipoDificultad']."</td>";
                                    echo "<td>".$dificultad['nombreTipoDificultad']."</td>";     
                                    echo "<td>";
                                ?>
                                <a href="<?php echo base_url();?>/AdminTipoDificultad/eliminar?idTipoDificultad=<?php echo $dificultad['idTipoDificultad'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
                                <?php
                                
                                }    
                                ?>    
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>      
            