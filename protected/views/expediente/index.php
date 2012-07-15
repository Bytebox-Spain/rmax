<?php
$this->breadcrumbs=array(
	'Expedientes',
);

$this->menu=array(
	array('label'=>'Crear expediente', 'url'=>array('create','id_empresa'=>Yii::app()->user->master_company_id )),
	array('label'=>'Gestión expedientes', 'url'=>array('admin')),
);
?>

<h1>Expedientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
