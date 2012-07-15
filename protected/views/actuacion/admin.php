<?php
$this->breadcrumbs=array(
	'Actuacions'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Actuacion', 'url'=>array('index')),
	array('label'=>'Create Actuacion', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('actuacion-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Actuacions</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'actuacion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'id_expediente',
		'id_tipo_actuacion',
		'descrip_actuacion',
		'fecha_tope',
		'fecha_asignacion',
		/*
		'fecha_inicio',
		'fecha_fin',
		'id_operario_responsable',
		'id_operario_aux1',
		'id_operario_aux2',
		'id_operario_aux3',
		'id_baremo',
		'descrip_baremo',
		'cantidad',
		'id_unidad',
		'precio_coste',
		'precio_venta',
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
