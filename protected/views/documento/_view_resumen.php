<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('archivo')) . " #" . $data->id; ?>:</b>
	<?php
        $url = 'http://'.Yii::app()->request->getServerName();
        $url .= CController::createUrl('docs/'.$data->id_expediente.'/'.$data->archivo);
        $url = str_replace("index.php?r=", "", $url);
        echo "<a href ='". $url."'>$data->archivo </a>";
    ?>
	<br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->titulo), array('documento/view', 'id'=>$data->id, 'id_expediente'=> $data->id_expediente))  ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />


    
    <b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuarioCreacion->nombre_usuario) .' ('. CHtml::encode($data->fecha_creacion) .')'; ?>
	<br />


</div>