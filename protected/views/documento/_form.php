<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'documento-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><span class="required">*</span> Campos requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model,'id_expediente',array('size'=>60,'maxlength'=>250)); ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'archivo') . "Archivo: " . $model->archivo; ?>
		<?php echo $form->fileField($model,'archivo'); ?>
		<?php echo $form->error($model,'archivo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Adjuntar Documento' : 'Actualizar documento'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->