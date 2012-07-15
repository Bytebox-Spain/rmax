<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente '. $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Actuación '. $model->id,
);

$this->menu=array(
	array('label'=>'Volver al Expediente', 'url'=>array('expediente/view','id'=>$this->id_expediente)), 
    array('label'=>'Editar actuación', 'url'=>array('actuacion/update','id'=>$model->id, 'id_expediente'=>$this->id_expediente)),
	array('label'=>'Eliminar actuación', 'url'=>'#', 'linkOptions'=>array('submit'=>array('actuacion/delete','id'=>$model->id,'id_expediente'=>$this->id_expediente), 'confirm'=>'Por favor, confirmar eliminación')),    
    array('label'=>'Nuevo evento', 'url'=>array('actuacionRegistro/create','id_actuacion'=>$model->id, 'id_expediente'=>$this->id_expediente)),
);
/*
$this->menu=array(
	array('label'=>'List Actuacion', 'url'=>array('index')),
	array('label'=>'Create Actuacion', 'url'=>array('create')),
	array('label'=>'Update Actuacion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Actuacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Actuacion', 'url'=>array('admin')),
);
*/
?>

<h1>Actuación #<?php echo $model->id; ?>(<?php echo $this->id_expediente; ?>)</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTipoActuacion.tipo_actuacion',
        array(
            'name'=>'Estado',
            'value'=>$model->idEstadoActuacion->estado_actuacion ,
        ),
		'descrip_actuacion',
		'fecha_tope',
		'fecha_asignacion',
		'fecha_inicio',
		'fecha_fin',
        array(
            'name'=>'Operario responsable',
            'value'=>$model->getDatosOperario($model->idOperarioResponsable) ,
        ),
        array(
            'name'=>'Operario auxiliar 1',
            'value'=>$model->getDatosOperario($model->idOperarioAux1),
        ),
        array(
            'name'=>'Operario auxiliar 2',
            'value'=>$model->getDatosOperario($model->idOperarioAux2) ,
        ),
        array(
            'name'=>'Operario auxiliar 3',
            'value'=>$model->getDatosOperario($model->idOperarioAux3) ,
        ),
        'id_baremo',
		'descrip_baremo',
		'cantidad',
		'idUnidad.unidad',
		'precio_coste',
		'precio_venta',
		'idUsuarioCreacion.nombre_usuario',
		'fecha_creacion',
		'idUsuarioUltmodif.nombre_usuario',
		'fecha_ultmodif',
	),
));


?>


<br>
<h2>Registro histórico de eventos</h2>
<?php 
//print_r($actuacionesDataProvider->getdata());
//die();
$this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$registroActuacionesDataProvider,
    'columns'=>array(
        array(
            'name'=>'id',
            'header'=>'Id',
            'value'=>'CHtml::encode($data->id)',
        ),
        array(
            'name'=>'fecha',
            'header'=>'Fecha',
            'value'=>'CHtml::encode($data->fecha)',
        ),
        array(
            'name'=>'registro',
            'header'=>'Evento registrado',
            'value'=>'CHtml::encode($data->registro)',
        ), 
        array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createURL("actuacionRegistro/view",array("id"=>$data->id,"id_actuacion"=>'.$model->id.', "id_expediente"=>'. $this->id_expediente .'))',
                ),
                'update'=>array(
                    'url'=>'Yii::app()->createURL("actuacionRegistro/update",array("id"=>$data->id, "id_actuacion"=>'.$model->id.', "id_expediente"=>'. $this->id_expediente .'))',
                ),
                'delete'=>array(
                    'url'=>'Yii::app()->createURL("actuacionRegistro/delete",array("id"=>$data->id, "id_actuacion"=>'.$model->id.', "id_expediente"=>'. $this->id_expediente .'))',
                ),
            ),
		),
    ),
));
?>