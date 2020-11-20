</br>
</br>
<center> <h2> Seleccione una salida en especial y su actividad deportiva correspondiente </h2> </center>
</br> </br>

 <!--Formulario para ingresar actividades deportivas de una salida o lugar en especial-->

 <div class=container>
        <form action="<?= base_url('/AdminBuscador/insertar') ?>"  method="post" >
            <center>
                <!-- ingresa el id de la salida-->
                <div class="form-group">
                        <?php 
                        echo form_label('Salida','idSalida');
                        ?></br>
                        <!-- De la consulta realizada selecciono los nombres de los lugares disponibles por un ciclo -->
                        <select class="form-control" name="idSalida" id="idSalida">
                        <?php  foreach($salidasModel as $salidas){
                                    for ($i=0; $i < count($salidas) ; $i++) {                           
                        ?>
                            <option value="<?php echo($salidas[$i]["idSalida"])?>"><?php echo($salidas[$i]["nombreSalida"])?></option>
                        <?php
                                    }
                             }
                        ?>
                        </select>
                </div>

                <!-- ingresa el id de la Actividad Deportiva-->
                <div class="form-group">
                        <?php 
                        echo form_label('Actividad Deportiva','idPlan');
                        ?></br>
                        <!-- De la consulta realizada selecciono las actividades deportivas disponibles por un ciclo -->
                        <select class="form-control" name="idPlan" id="idPlan">
                        <?php  foreach($tipoPlanModel as $plan){
                                    for ($i=0; $i < count($plan) ; $i++) {                           
                        ?>
                            <option value="<?php echo($plan[$i]["idTipoPlan"])?>"><?php echo($plan[$i]["nombreTipoPlan"])?></option>
                        <?php
                                    }
                             }
                        ?>
                        </select>
                </div>
                

                 <?php echo form_submit('insertar','Insertar','class="btn btn-danger"'); ?>
             <center>
             </br></br>
        </form>

             


      
 </div>