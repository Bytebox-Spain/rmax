<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<script>
$(document).ready(function(){
    if ($('#Expediente_causante_externo').val() == 0){
         $('#Expediente_datos_causante_externo').hide();
    }else{
         $('#Expediente_datos_causante_externo').show();
    }
    $('#Expediente_causante_externo').change(function(){
         if ($('#Expediente_causante_externo').val() == 0){
            $('#Expediente_datos_causante_externo').slideUp();
         }else{
            $('#Expediente_datos_causante_externo').slideDown();
         }
    });
})    
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'expediente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Datos obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_expediente'); ?>
		<?php echo $form->textField($model,'nro_expediente',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nro_expediente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_prioridad'); ?>
		<?php echo $form->dropDownList($model,'id_prioridad',$this->_empresa->getPrioridadesOptions()); ?>
		<?php echo $form->error($model,'id_prioridad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_compania'); ?>
		<?php echo $form->dropDownList($model,'id_compania', $this->_empresa->getCompaniasOptions()); ?>
		<?php echo $form->error($model,'id_compania'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estado'); ?>
		<?php echo $form->dropDownList($model,'id_estado', $this->_empresa->getEstadosOptions()); ?>
		<?php echo $form->error($model,'id_estado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_expediente'); ?>
		<?php echo $form->dropDownList($model,'id_tipo_expediente', $this->_empresa->getTipoExpedientesOptions()); ?>
		<?php echo $form->error($model,'id_tipo_expediente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_plataforma'); ?>
		<?php echo $form->dropDownList($model,'id_plataforma', $this->_empresa->getPlataformasOptions()); ?>
		<?php echo $form->error($model,'id_plataforma'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>100)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'causante_externo'); ?>
		<?php echo $form->dropDownList($model,'causante_externo',array(0=>'No', 1=>'Si')); ?>
		<?php echo $form->error($model,'causante_externo'); ?>
	</div>
    
 	<div class="row">
        <?php echo $form->labelEx($model,'datos_causante_externo'); ?>
		<?php echo $form->textArea($model,'datos_causante_externo',array('rows'=>6, 'cols'=>100)); ?>
		<?php echo $form->error($model,'datos_causante_externo'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'cliente_final'); ?>
		<?php echo $form->textField($model,'cliente_final',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'cliente_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dir_cliente_final'); ?>
		<?php echo $form->textField($model,'dir_cliente_final',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'dir_cliente_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_cliente_final'); ?>
		<?php echo $form->textField($model,'tel_cliente_final',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'tel_cliente_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_perito'); ?>
		<?php echo $form->dropDownList($model,'id_perito', $this->_empresa->getPeritosOptions()); ?>
		<?php echo $form->error($model,'id_perito'); ?>
	</div>

    <div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear Expediente' : 'Guardar Expediente'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->