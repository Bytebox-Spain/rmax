<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_expediente'); ?>
		<?php echo $form->textField($model,'id_expediente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_actuacion'); ?>
		<?php echo $form->textField($model,'id_tipo_actuacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descrip_actuacion'); ?>
		<?php echo $form->textArea($model,'descrip_actuacion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_tope'); ?>
		<?php echo $form->textField($model,'fecha_tope'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_asignacion'); ?>
		<?php echo $form->textField($model,'fecha_asignacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_inicio'); ?>
		<?php echo $form->textField($model,'fecha_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_fin'); ?>
		<?php echo $form->textField($model,'fecha_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_operario_responsable'); ?>
		<?php echo $form->textField($model,'id_operario_responsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_operario_aux1'); ?>
		<?php echo $form->textField($model,'id_operario_aux1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_operario_aux2'); ?>
		<?php echo $form->textField($model,'id_operario_aux2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_operario_aux3'); ?>
		<?php echo $form->textField($model,'id_operario_aux3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_baremo'); ?>
		<?php echo $form->textField($model,'id_baremo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descrip_baremo'); ?>
		<?php echo $form->textArea($model,'descrip_baremo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_unidad'); ?>
		<?php echo $form->textField($model,'id_unidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_coste'); ?>
		<?php echo $form->textField($model,'precio_coste'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_venta'); ?>
		<?php echo $form->textField($model,'precio_venta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario_creacion'); ?>
		<?php echo $form->textField($model,'id_usuario_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario_ultmodif'); ?>
		<?php echo $form->textField($model,'id_usuario_ultmodif'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_ultmodif'); ?>
		<?php echo $form->textField($model,'fecha_ultmodif'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->