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
		<?php echo $form->label($model,'id_empresa'); ?>
		<?php echo $form->textField($model,'id_empresa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_control'); ?>
		<?php echo $form->textField($model,'nro_control',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_expediente'); ?>
		<?php echo $form->textField($model,'nro_expediente',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_prioridad'); ?>
		<?php echo $form->textField($model,'id_prioridad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_compania'); ?>
		<?php echo $form->textField($model,'id_compania'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_estado'); ?>
		<?php echo $form->textField($model,'id_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_expediente'); ?>
		<?php echo $form->textField($model,'id_tipo_expediente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_plataforma'); ?>
		<?php echo $form->textField($model,'id_plataforma'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cliente_final'); ?>
		<?php echo $form->textField($model,'cliente_final',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dir_cliente_final'); ?>
		<?php echo $form->textField($model,'dir_cliente_final',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tel_cliente_final'); ?>
		<?php echo $form->textField($model,'tel_cliente_final',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_perito'); ?>
		<?php echo $form->textField($model,'id_perito',array('size'=>60,'maxlength'=>250)); ?>
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