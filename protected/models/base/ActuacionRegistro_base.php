<?php

/**
 * This is the model class for table "actuacion_registro".
 *
 * The followings are the available columns in table 'actuacion_registro':
 * @property integer $id
 * @property integer $id_actuacion
 * @property string $fecha
 * @property string $registro
 * @property integer $id_usuario_creacion
 * @property string $fecha_creacion
 * @property integer $id_usuario_ultmodif
 * @property string $fecha_ultmodif
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuarioUltmodif
 * @property Usuario $idUsuarioCreacion
 * @property Actuacion $idActuacion
 */
class ActuacionRegistro_base extends _BASEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ActuacionRegistro_base the static model class
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
		return 'actuacion_registro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_actuacion, fecha, registro, id_usuario_creacion, fecha_creacion, id_usuario_ultmodif, fecha_ultmodif', 'required'),
			array('id_actuacion, id_usuario_creacion, id_usuario_ultmodif', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_actuacion, fecha, registro, id_usuario_creacion, fecha_creacion, id_usuario_ultmodif, fecha_ultmodif', 'safe', 'on'=>'search'),
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
			'idUsuarioUltmodif' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_ultmodif'),
			'idUsuarioCreacion' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_creacion'),
			'idActuacion' => array(self::BELONGS_TO, 'Actuacion', 'id_actuacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_actuacion' => 'Id Actuacion',
			'fecha' => 'Fecha',
			'registro' => 'Registro',
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
		$criteria->compare('id_actuacion',$this->id_actuacion);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('registro',$this->registro,true);
		$criteria->compare('id_usuario_creacion',$this->id_usuario_creacion);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('id_usuario_ultmodif',$this->id_usuario_ultmodif);
		$criteria->compare('fecha_ultmodif',$this->fecha_ultmodif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}