<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tarea-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Dato requerido.</p>

	<?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model,'id_expediente'); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_tarea'); ?>
		<?php echo $form->dropDownList($model,'id_tipo_tarea',$this->_empresa->getTiposTareasOptions()); ?>
		<?php echo $form->error($model,'id_tipo_tarea'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario_asignado'); ?>
		 <?php echo $form->dropDownList($model,'id_usuario_asignado',$this->_empresa->getUsuariosOptions()); ?>
		<?php echo $form->error($model,'id_usuario_asignado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio'); ?>
		<?php echo $form->textField($model,'inicio'); ?>
		<?php echo $form->error($model,'inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'final'); ?>
		<?php echo $form->textField($model,'final'); ?>
		<?php echo $form->error($model,'final'); ?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->