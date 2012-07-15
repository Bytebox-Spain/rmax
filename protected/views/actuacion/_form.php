<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'actuacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><span class="required">*</span> Campos requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
    <?php echo $form->hiddenField($model,'id_expediente',array('size'=>60,'maxlength'=>250)); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_actuacion'); ?>
        <?php echo $form->dropDownList($model,'id_tipo_actuacion',$this->_empresa->getTiposActuacionOptions()); ?>
		<?php echo $form->error($model,'id_tipo_actuacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estado_actuacion'); ?>
        <?php echo $form->dropDownList($model,'id_estado_actuacion',$this->_empresa->getEstadosActuacionOptions()); ?>
		<?php echo $form->error($model,'id_estado_actuacion'); ?>
	</div>    
    
	<div class="row">
		<?php echo $form->labelEx($model,'descrip_actuacion'); ?>
		<?php echo $form->textArea($model,'descrip_actuacion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descrip_actuacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_tope'); ?>
		<?php echo $form->textField($model,'fecha_tope'); ?>
		<?php echo $form->error($model,'fecha_tope'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_asignacion'); ?>
		<?php echo $form->textField($model,'fecha_asignacion'); ?>
		<?php echo $form->error($model,'fecha_asignacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_inicio'); ?>
		<?php echo $form->textField($model,'fecha_inicio'); ?>
		<?php echo $form->error($model,'fecha_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		<?php echo $form->textField($model,'fecha_fin'); ?>
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_operario_responsable'); ?>
        <?php echo $form->dropDownList($model,'id_operario_responsable',$this->_empresa->getOperariosOptions()); ?>
		<?php echo $form->error($model,'id_operario_responsable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_operario_aux1'); ?>
        <?php echo $form->dropDownList($model,'id_operario_aux1',$this->_empresa->getOperariosOptions()); ?>
		<?php echo $form->error($model,'id_operario_aux1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_operario_aux2'); ?>
        <?php echo $form->dropDownList($model,'id_operario_aux2',$this->_empresa->getOperariosOptions()); ?>
		<?php echo $form->error($model,'id_operario_aux2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_operario_aux3'); ?>
        <?php echo $form->dropDownList($model,'id_operario_aux3',$this->_empresa->getOperariosOptions()); ?>
		<?php echo $form->error($model,'id_operario_aux3'); ?>    
    </div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'id_baremo'); ?>
		<?php echo $form->textField($model,'id_baremo'); ?>
		<?php echo $form->error($model,'id_baremo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descrip_baremo'); ?>
		<?php echo $form->textArea($model,'descrip_baremo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descrip_baremo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_unidad'); ?>
		<?php echo $form->dropDownList($model,'id_unidad',$this->_empresa->getTipoUnidadesOptions()); ?>
		<?php echo $form->error($model,'id_unidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_coste'); ?>
		<?php echo $form->textField($model,'precio_coste'); ?>
		<?php echo $form->error($model,'precio_coste'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio_venta'); ?>
		<?php echo $form->textField($model,'precio_venta'); ?>
		<?php echo $form->error($model,'precio_venta'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->