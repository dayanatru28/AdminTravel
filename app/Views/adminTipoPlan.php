<!-- Tabla para editar y mostrar las salidas-->
</br> </br>
            <center>
            <a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminTipoPlan/mostrarFormulario"  role="button">Ingrese una nueva Actividad Deportiva</a>
            </center>
            </br>
            <div class= "container">
                <div class="row">
                    <div class="col-md-12 text-center">    
                        <table class="table table-striped table-bordered table condensed table-hover table-responsive " >
                            <thead>
                                <tr>
                                <th scope="col">Id_Tipo_Plan</th>
                                <th scope="col">Nombre_Tipo_De_Plan</th>
                                <th scope="col">Acciones</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($TipoPlanModel as $tplan){
                                    echo "<tr>";
                                    echo "<td>".$tplan['idTipoPlan']."</td>";
                                    echo "<td>".$tplan['nombreTipoPlan']."</td>";     
                                    echo "<td>";
                                ?>
                                <a href="<?php echo base_url();?>/AdminTipoPlan/eliminar?idTipoPlan=<?php echo $tplan['idTipoPlan'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
                                <?php
                                
                                }    
                                ?>    
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>      
           