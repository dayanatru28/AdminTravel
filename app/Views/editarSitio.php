<!-- Administrador de Sitios de Interes para editar un sitio de interes-->

<?php
       
       echo form_open('/AdminSitiosInteres/insertar');

       foreach($SitiosInteresModel as $sitios){
			
		

        if(isset($sitios)){
            $idSalida=intval($sitios[0]['idSalida']);
            $idSalida=(($idSalida)-1);
            $nombreSitio=$sitios[0]['nombreSitio'];
            $desSitio=$sitios[0]['desSitio'];
        }
        else{
            $idSitio="";
            $nombreSitio="";
            $desSitio="";
        }
    }


?>
</br></br>
<center> <h2> Complete el formulario para ingresar un nuevo Sitio de Interes </h2> </center>
</br> </br>

<div class="container">

    <form>
            <center>
                <div class="form-group">
                        <?php 
                        echo form_label('Salida','idSalida');
                        ?></br><?php
                        echo form_dropdown('idSalida', $salidasModel,$idSalida);
                        ?>
                </div>
                <div class="form-group">
                    <?php
                        echo form_label('Nombre del Sitio','nombreSitio'); 
                        echo form_input(array('name'=>'nombreSitio', 'class'=>'form-control','value'=>$nombreSitio));
                    ?> 
                </div>
         
                <div class="form-group">
                    <?php
                        echo form_label('Descripcion del Sitio de interes','desSitio'); 
                        echo form_textarea(array('name'=>'desSitio', 'class'=>'form-control','value'=>$desSitio));
                    ?>
                </div>

                <?php echo form_submit('insertar','Insertar','class="btn btn-danger"'); ?>
            <center>
            </br></br>
            <?php if(isset($sitios)){
                    echo form_hidden('idSitio',$sitios[0]['idSitio']);} ?>
    </form>
</div>