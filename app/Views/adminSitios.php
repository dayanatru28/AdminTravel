        </br> </br>
            <center>
            <a class="btn btn-danger btn-lg" href="<?php echo base_url(); ?>/AdminSitiosInteres/mostrarFormulario"  role="button">Agregar un nuevo Sitio de interes</a>
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
                                    <th scope="col">Nombre de Sitio de Interes</th>
                                    <th scope="col">Descripcion</th>
                                    <th scope="col">Acciones</th>                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($SitiosInteresModel as $sitios){
                                        echo "<tr>";
                                        echo "<td>".$sitios['idSitio']."</td>";
                                        echo "<td>".$sitios['idSalida']."</td>";
                                        echo "<td>".$sitios['nombreSitio']."</td>";
                                        echo "<td>".$sitios['desSitio']."</td>";       
                                        echo "<td>";
                                    ?>
                                    <a href="<?php echo base_url();?>/AdminSitiosInteres/editar?idSitio=<?php echo $sitios['idSitio'];?>" class="btn btn-warning" role="button"> <i class="fa fa-pencil-square-o"></i></a> </br>
                                    <a href="<?php echo base_url();?>/AdminSitiosInteres/eliminar?idSitio=<?php echo $sitios['idSitio'];?>" class="btn btn-danger" role="button"> <i class="fa fa-trash"></i></a>
                                    <?php
                                    
                                    }    
                                    ?>                               
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
