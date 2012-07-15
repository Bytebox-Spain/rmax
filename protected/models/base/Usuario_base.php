<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $usuario
 * @property string $clave
 * @property string $nombre
 * @property string $email
 * @property integer $nivel
 * @property integer $id_empresa
 *
 * The followings are the available model relations:
 * @property Actuacion[] $actuacions
 * @property Actuacion[] $actuacions1
 * @property Expediente[] $expedientes
 * @property Expediente[] $expedientes1
 * @property Tareas[] $tareases
 * @property Tareas[] $tareases1
 * @property Empresa $idEmpresa
 */
class Usuario_base extends _BASEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario_base the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, clave, nombre, email, nivel, id_empresa', 'required'),
			array('nivel, id_empresa', 'numerical', 'integerOnly'=>true),
			array('usuario, clave', 'length', 'max'=>20),
			array('nombre, email', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario, clave, nombre, email, nivel, id_empresa', 'safe', 'on'=>'search'),
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
			'actuacions' => array(self::HAS_MANY, 'Actuacion', 'usuario_creacion'),
			'actuacions1' => array(self::HAS_MANY, 'Actuacion', 'usuario_ultmodif'),
			'expedientes' => array(self::HAS_MANY, 'Expediente', 'id_usuario_creacion'),
			'expedientes1' => array(self::HAS_MANY, 'Expediente', 'id_usuario_ultmodif'),
			'tareases' => array(self::HAS_MANY, 'Tareas', 'id_usuario_asignado'),
			'tareases1' => array(self::HAS_MANY, 'Tareas', 'id_usuario_creador'),
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
			'usuario' => 'Usuario',
			'clave' => 'Clave',
			'nombre' => 'Nombre',
			'email' => 'Email',
			'nivel' => 'Nivel',
			'id_empresa' => 'Id Empresa',
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
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('clave',$this->clave,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('nivel',$this->nivel);
		$criteria->compare('id_empresa',$this->id_empresa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}