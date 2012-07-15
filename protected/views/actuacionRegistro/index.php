<?php
$this->breadcrumbs=array(
	'Actuacion Registros',
);

$this->menu=array(
	array('label'=>'Create ActuacionRegistro', 'url'=>array('create')),
	array('label'=>'Manage ActuacionRegistro', 'url'=>array('admin')),
);
?>

<h1>Actuacion Registros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
