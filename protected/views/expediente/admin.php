<?php
$this->breadcrumbs=array(
	'Expedientes'=>array('admin'),
	'Gestión',
);

$this->menu=array(
	array('label'=>'Crear Expediente', 'url'=>array('create','id_empresa'=> Yii::app()->user->master_company_id)),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('expediente-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestión de Expedientes</h1>
<?php echo CHtml::link('Búsqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 

    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'expediente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name' => 'fecha_creacion',
            'value' => 'date("d/m/Y H:i",strtotime($data->fecha_creacion))',
        ),
		'nro_expediente',
        'dir_cliente_final',
		'cliente_final', 
         array(
            'name'=>'id_tipo_expediente',
            'header'=>'Tipo',
            'value'=>'CHtml::encode(isset($data->idTipoExpediente)?$data->idTipoExpediente->tipo_expediente:"")',
        ),
		/*
        'id',
        'id_empresa',
        'nro_control',
		'nro_expediente',
		'idPrioridad.prioridad',
		'id_compania',
		'id_estado',
		'id_tipo_expediente',
        'id_plataforma',
		'descripcion',
		'cliente_final',
		'dir_cliente_final',
		'tel_cliente_final',
        'perito',
		'id_usuario_creacion',
		'fecha_creacion',
		'id_usuario_ultmodif',
		'fecha_ultmodif',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
