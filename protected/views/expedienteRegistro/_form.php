<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expediente-registro-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Campo requerido.</p>

	<?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model,'id_expediente'); ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registro'); ?>
		<?php echo $form->textArea($model,'registro',array('rows'=>6, 'cols'=>100)); ?>
		<?php echo $form->error($model,'registro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear evento' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->