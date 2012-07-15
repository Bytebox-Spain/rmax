<?php
$this->breadcrumbs=array(
	'Actuacions',
);

$this->menu=array(
	array('label'=>'Create Actuacion', 'url'=>array('create')),
	array('label'=>'Manage Actuacion', 'url'=>array('admin')),
);
?>

<h1>Actuacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
