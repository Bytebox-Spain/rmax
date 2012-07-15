<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_expediente')); ?>:</b>
	<?php echo CHtml::encode($data->id_expediente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_tarea')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_tarea); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_asignado')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_asignado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inicio')); ?>:</b>
	<?php echo CHtml::encode($data->inicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('final')); ?>:</b>
	<?php echo CHtml::encode($data->final); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_ultmodif')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_ultmodif); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ultmodif')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ultmodif); ?>
	<br />

	*/ ?>

</div>