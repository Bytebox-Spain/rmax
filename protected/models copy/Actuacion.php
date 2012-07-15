<?php

/**
 * This is the model class for table "actuacion".
 *
 * The followings are the available columns in table 'actuacion':
 * @property integer $id
 * @property integer $id_expediente
 * @property integer $tipo_actuacion
 * @property string $fecha_tope
 * @property string $fecha_asignacion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $id_baremo
 * @property double $cantidad
 * @property integer $id_unidad
 * @property integer $precio_coste
 * @property integer $precio_venta
 * @property integer $usuario_creacion
 * @property string $fecha_creacion
 * @property integer $usuario_ultmodif
 * @property string $fecha_ultmodif
 *
 * The followings are the available model relations:
 * @property Expediente $idExpediente
 * @property ActuacionOperario[] $actuacionOperarios
 */
class Actuacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Actuacion the static model class
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
			array('id, id_expediente, tipo_actuacion, fecha_tope, usuario_creacion, fecha_creacion, usuario_ultmodif, fecha_ultmodif', 'required'),
			array('id, id_expediente, tipo_actuacion, id_baremo, id_unidad, precio_coste, precio_venta, usuario_creacion, usuario_ultmodif', 'numerical', 'integerOnly'=>true),
			array('cantidad', 'numerical'),
			array('fecha_asignacion, fecha_inicio, fecha_fin', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_expediente, tipo_actuacion, fecha_tope, fecha_asignacion, fecha_inicio, fecha_fin, id_baremo, cantidad, id_unidad, precio_coste, precio_venta, usuario_creacion, fecha_creacion, usuario_ultmodif, fecha_ultmodif', 'safe', 'on'=>'search'),
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
			'idExpediente' => array(self::BELONGS_TO, 'Expediente', 'id_expediente'),
			'actuacionOperarios' => array(self::HAS_MANY, 'ActuacionOperario', 'id_actuacion'),
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
			'tipo_actuacion' => 'Tipo Actuacion',
			'fecha_tope' => 'Fecha Tope',
			'fecha_asignacion' => 'Fecha Asignacion',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
			'id_baremo' => 'Id Baremo',
			'cantidad' => 'Cantidad',
			'id_unidad' => 'Id Unidad',
			'precio_coste' => 'Precio Coste',
			'precio_venta' => 'Precio Venta',
			'usuario_creacion' => 'Usuario Creacion',
			'fecha_creacion' => 'Fecha Creacion',
			'usuario_ultmodif' => 'Usuario Ultmodif',
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
		$criteria->compare('tipo_actuacion',$this->tipo_actuacion);
		$criteria->compare('fecha_tope',$this->fecha_tope,true);
		$criteria->compare('fecha_asignacion',$this->fecha_asignacion,true);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('id_baremo',$this->id_baremo);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('id_unidad',$this->id_unidad);
		$criteria->compare('precio_coste',$this->precio_coste);
		$criteria->compare('precio_venta',$this->precio_venta);
		$criteria->compare('usuario_creacion',$this->usuario_creacion);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('usuario_ultmodif',$this->usuario_ultmodif);
		$criteria->compare('fecha_ultmodif',$this->fecha_ultmodif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}