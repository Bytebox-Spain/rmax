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
		<?php echo $form->label($model,'id_tipo_tarea'); ?>
		<?php echo $form->textField($model,'id_tipo_tarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario_asignado'); ?>
		<?php echo $form->textField($model,'id_usuario_asignado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'final'); ?>
		<?php echo $form->textField($model,'final'); ?>
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