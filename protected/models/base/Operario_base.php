<?php

/**
 * This is the model class for table "operario".
 *
 * The followings are the available columns in table 'operario':
 * @property integer $id
 * @property integer $id_empresa
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Actuacion[] $actuacions
 * @property Actuacion[] $actuacions1
 * @property Actuacion[] $actuacions2
 * @property Actuacion[] $actuacions3
 * @property Empresa $idEmpresa
 */
class Operario_base extends _BASEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Operario_base the static model class
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
		return 'operario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empresa', 'required'),
			array('id_empresa', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido, telefono, email', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_empresa, nombre, apellido, telefono, email', 'safe', 'on'=>'search'),
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
			'actuacions' => array(self::HAS_MANY, 'Actuacion', 'id_operario_aux3'),
			'actuacions1' => array(self::HAS_MANY, 'Actuacion', 'id_operario_aux1'),
			'actuacions2' => array(self::HAS_MANY, 'Actuacion', 'id_operario_aux2'),
			'actuacions3' => array(self::HAS_MANY, 'Actuacion', 'id_operario_responsable'),
			'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_empresa' => 'Id Empresa',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'telefono' => 'Telefono',
			'email' => 'Email',
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
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}