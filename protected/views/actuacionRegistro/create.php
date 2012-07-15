<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente '. $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Actuación '. $model->id_actuacion => array('actuacion/view', 'id'=>$model->id_actuacion, 'id_expediente'=> $this->id_expediente), 
    'Nuevo Registro',
);
 
//,"id_actuacion"=>'.$model->id_actuacion.', "id_expediente"=>'. $this->id_expediente 
$this->menu=array(
	array('label'=>'cancelar', 'url'=>Yii::app()->createURL("actuacion/view",array("id"=>$model->id_actuacion,"id_actuacion"=>$model->id_actuacion, "id_expediente"=> $this->id_expediente  ))),
);
?>

<h1>Nuevo registro de evento (actuación #<?php echo $model->id_actuacion; ?>)</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>