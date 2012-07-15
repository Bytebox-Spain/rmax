<?php
$this->breadcrumbs=array(
	'Listado expedientes'=>array('admin'),
	'Expediente ' . $model->nro_expediente,
);

$this->menu=array(
    array('label'=>'Listado Expedientes', 'url'=>array('admin')),
	array('label'=>'Editar Expediente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Expediente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Nuevo Evento', 'url'=>array('expedienteRegistro/create', 'id_expediente'=>$model->id)),
    array('label'=>'Nueva Actuación', 'url'=>array('actuacion/create', 'id_expediente'=>$model->id)),
    array('label'=>'Nueva Tarea', 'url'=>array('tarea/create', 'id_expediente'=>$model->id)),
    array('label'=>'Adjuntar Documento', 'url'=>array('documento/create', 'id_expediente'=>$model->id)),
);
?>


<h1>Expediente <?php echo $model->nro_expediente; ?></h1>

<?php 
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        /*
		'id',
		'id_empresa',
         */
        'nro_control',
        'nro_expediente',
		'idPrioridad.prioridad',
		'idCompania.compania',
		'idEstado.estado',
		'idTipoExpediente.tipo_expediente',
		'idPlataforma.plataforma',
		'descripcion',
		'cliente_final',
		'dir_cliente_final',
		'tel_cliente_final',
       array('name'=>'Causante Externo', 'value'=>$model->causante_externo?"Si":"No"),
        'datos_causante_externo',
		array('name'=>'Perito', 'value'=>$model->datosPerito($model->idPerito)),
        array('name'=>'Creado por','value'=>$model->idUsuarioCreacion->nombre_usuario),
		array('name'=>'fecha de creacion','value'=>$model->fecha_creacion),
        array('name'=>'Modificado por', 'value'=>$model->idUsuarioUltmodif->nombre_usuario),
        array('name'=>'Ultima modificación','value'=>$model->fecha_ultmodif),
	),
)); 
?>
<br>
<h2>Eventos</h2>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$eventosExpDataProvider,
    'columns'=>array(
         array(
            'name'=>'id',
            'header'=>'Id',
            'value'=>'CHtml::encode($data->id)',
        ),
        'fecha',
         array(
            'name'=>'regsitro',
            'header'=>'Evento Registrado',
            'value'=>'CHtml::encode($data->registro)',
        ), 
        array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createURL("expedienteRegistro/view",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
                'update'=>array(
                    'url'=>'Yii::app()->createURL("expedienteRegistro/update",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
                'delete'=>array(
                    'url'=>'Yii::app()->createURL("expedienteRegistro/delete",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
            ),
		),        
    ),
));
?>

<br>
<h2>Actuaciones</h2>
<?php 
$this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$actuacionesDataProvider,
    'columns'=>array(
        array(
            'name'=>'id',
            'header'=>'Id',
            'value'=>'CHtml::encode($data->id)',
        ),
        array(
            'name'=>'id_tipo_actuacion',
            'header'=>'Tipo',
            'value'=>'CHtml::encode($data->idTipoActuacion->tipo_actuacion)',
        ),
        array(
            'name'=>'descrip_actuacion',
            'header'=>'Descripción',
            'value'=>'CHtml::encode($data->descrip_actuacion)',
        ),
        array(
            'name'=>'fecha_tope',
            'header'=>'Tope',
            'value'=>'CHtml::encode($data->fecha_tope)',
        ),
         array(
            'name'=>'fecha_asignacion',
            'header'=>'Asig.',
            'value'=>'CHtml::encode($data->fecha_asignacion)',
        ),      
         array(
            'name'=>'fecha_inicio',
            'header'=>'Inicio',
            'value'=>'CHtml::encode($data->fecha_inicio)',
        ),      
         array(
            'name'=>'fecha_fin',
            'header'=>'Fin',
            'value'=>'CHtml::encode($data->fecha_fin)',
        ),  
        array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createURL("actuacion/view",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
                'update'=>array(
                    'url'=>'Yii::app()->createURL("actuacion/update",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
                'delete'=>array(
                    'url'=>'Yii::app()->createURL("actuacion/delete",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
            ),
		),
    ),
));
?>

<h2>Tareas</h2>
<?php 
$this->widget('zii.widgets.grid.CGridView',array(
    'dataProvider'=>$tareasDataProvider,
    'columns'=>array(
        array(
            'name'=>'id',
            'header'=>'Id',
            'value'=>'CHtml::encode($data->id)',
        ),        
        array(
            'name'=>'id_tipo_tarea',
            'header'=>'Tipo',
            'value'=>'CHtml::encode($data->idTipoTarea->tarea)',
        ),
        array(
            'name'=>'id_usuario_asignado',
            'header'=>'Usuario Asig.',
            'value'=>'CHtml::encode($data->idUsuarioAsignado->nombre_usuario)',
        ),
        array(
            'name'=>'descripcion',
            'header'=>'Descripción',
            'value'=>'CHtml::encode($data->descripcion)',
        ),
         array(
            'name'=>'inicio',
            'header'=>'Inicio',
            'value'=>'CHtml::encode($data->inicio)',
        ),      
         array(
            'name'=>'final',
            'header'=>'Final',
            'value'=>'CHtml::encode($data->final)',
        ),
        array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'Yii::app()->createURL("tarea/view",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
                'update'=>array(
                    'url'=>'Yii::app()->createURL("tarea/update",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
                'delete'=>array(
                    'url'=>'Yii::app()->createURL("tarea/delete",array("id"=>$data->id,"id_expediente"=>$data->id_expediente))',
                ),
            ),
		),
    ),
));
?>
<h2>Documentos</h2>
<?php 
 $this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$documentosDataProvider,
    'itemView'=>'/documento/_view_resumen'
));

?>