<?php

/**
 * This is the model class for table "actuacion".
 *
 * The followings are the available columns in table 'actuacion':
 * @property integer $id
 * @property integer $id_expediente
 * @property integer $id_tipo_actuacion
 * @property integer $id_estado_actuacion
 * @property string $descrip_actuacion
 * @property string $fecha_tope
 * @property string $fecha_asignacion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $id_operario_responsable
 * @property integer $id_operario_aux1
 * @property integer $id_operario_aux2
 * @property integer $id_operario_aux3
 * @property integer $id_baremo
 * @property string $descrip_baremo
 * @property double $cantidad
 * @property integer $id_unidad
 * @property integer $precio_coste
 * @property integer $precio_venta
 * @property integer $id_usuario_creacion
 * @property string $fecha_creacion
 * @property integer $id_usuario_ultmodif
 * @property string $fecha_ultmodif
 *
 * The followings are the available model relations:
 * @property EstadoActuacion $idEstadoActuacion
 * @property Expediente $idExpediente
 * @property Operario $idOperarioAux1
 * @property Operario $idOperarioAux2
 * @property Operario $idOperarioAux3
 * @property Usuario $idUsuarioCreacion
 * @property Usuario $idUsuarioUltmodif
 * @property TipoUnidad $idUnidad
 * @property TipoActuacion $idTipoActuacion
 * @property Operario $idOperarioResponsable
 * @property ActuacionRegistro[] $actuacionRegistros
 */
class Actuacion_base extends _BASEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Actuacion_base the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'actuacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_expediente, id_tipo_actuacion, id_estado_actuacion, descrip_actuacion, fecha_tope, id_operario_responsable, descrip_baremo, id_usuario_creacion, fecha_creacion, id_usuario_ultmodif, fecha_ultmodif', 'required'),
			array('id_expediente, id_tipo_actuacion, id_estado_actuacion, id_operario_responsable, id_operario_aux1, id_operario_aux2, id_operario_aux3, id_baremo, id_unidad, precio_coste, precio_venta, id_usuario_creacion, id_usuario_ultmodif', 'numerical', 'integerOnly'=>true),
			array('cantidad', 'numerical'),
			array('fecha_asignacion, fecha_inicio, fecha_fin', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_expediente, id_tipo_actuacion, id_estado_actuacion, descrip_actuacion, fecha_tope, fecha_asignacion, fecha_inicio, fecha_fin, id_operario_responsable, id_operario_aux1, id_operario_aux2, id_operario_aux3, id_baremo, descrip_baremo, cantidad, id_unidad, precio_coste, precio_venta, id_usuario_creacion, fecha_creacion, id_usuario_ultmodif, fecha_ultmodif', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idEstadoActuacion' => array(self::BELONGS_TO, 'EstadoActuacion', 'id_estado_actuacion'),
			'idExpediente' => array(self::BELONGS_TO, 'Expediente', 'id_expediente'),
			'idOperarioAux1' => array(self::BELONGS_TO, 'Operario', 'id_operario_aux1'),
			'idOperarioAux2' => array(self::BELONGS_TO, 'Operario', 'id_operario_aux2'),
			'idOperarioAux3' => array(self::BELONGS_TO, 'Operario', 'id_operario_aux3'),
			'idUsuarioCreacion' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_creacion'),
			'idUsuarioUltmodif' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_ultmodif'),
			'idUnidad' => array(self::BELONGS_TO, 'TipoUnidad', 'id_unidad'),
			'idTipoActuacion' => array(self::BELONGS_TO, 'TipoActuacion', 'id_tipo_actuacion'),
			'idOperarioResponsable' => array(self::BELONGS_TO, 'Operario', 'id_operario_responsable'),
			'actuacionRegistros' => array(self::HAS_MANY, 'ActuacionRegistro', 'id_actuacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_expediente' => 'Id Expediente',
			'id_tipo_actuacion' => 'Id Tipo Actuacion',
			'id_estado_actuacion' => 'Id Estado Actuacion',
			'descrip_actuacion' => 'Descrip Actuacion',
			'fecha_tope' => 'Fecha Tope',
			'fecha_asignacion' => 'Fecha Asignacion',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'id_operario_responsable' => 'Id Operario Responsable',
			'id_operario_aux1' => 'Id Operario Aux1',
			'id_operario_aux2' => 'Id Operario Aux2',
			'id_operario_aux3' => 'Id Operario Aux3',
			'id_baremo' => 'Id Baremo',
			'descrip_baremo' => 'Descrip Baremo',
			'cantidad' => 'Cantidad',
			'id_unidad' => 'Id Unidad',
			'precio_coste' => 'Precio Coste',
			'precio_venta' => 'Precio Venta',
			'id_usuario_creacion' => 'Id Usuario Creacion',
			'fecha_creacion' => 'Fecha Creacion',
			'id_usuario_ultmodif' => 'Id Usuario Ultmodif',
			'fecha_ultmodif' => 'Fecha Ultmodif',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_expediente',$this->id_expediente);
		$criteria->compare('id_tipo_actuacion',$this->id_tipo_actuacion);
		$criteria->compare('id_estado_actuacion',$this->id_estado_actuacion);
		$criteria->compare('descrip_actuacion',$this->descrip_actuacion,true);
		$criteria->compare('fecha_tope',$this->fecha_tope,true);
		$criteria->compare('fecha_asignacion',$this->fecha_asignacion,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_operario_responsable',$this->id_operario_responsable);
		$criteria->compare('id_operario_aux1',$this->id_operario_aux1);
		$criteria->compare('id_operario_aux2',$this->id_operario_aux2);
		$criteria->compare('id_operario_aux3',$this->id_operario_aux3);
		$criteria->compare('id_baremo',$this->id_baremo);
		$criteria->compare('descrip_baremo',$this->descrip_baremo,true);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('id_unidad',$this->id_unidad);
		$criteria->compare('precio_coste',$this->precio_coste);
		$criteria->compare('precio_venta',$this->precio_venta);
		$criteria->compare('id_usuario_creacion',$this->id_usuario_creacion);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('id_usuario_ultmodif',$this->id_usuario_ultmodif);
		$criteria->compare('fecha_ultmodif',$this->fecha_ultmodif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}