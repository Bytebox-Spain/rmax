<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archivo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->archivo), array('view', 'docs/'.$data->id.'/'.$data->archivo));?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_expediente')); ?>:</b>
	<?php echo CHtml::encode($data->id_expediente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_ultmodif')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_ultmodif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ultmodif')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ultmodif); ?>
	<br />

	*/ ?>

</div>