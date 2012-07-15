<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $empresa
 * @property integer $estado
 * @property string $nro_control
 *
 * The followings are the available model relations:
 * @property Compania[] $companias
 * @property Estado[] $estados
 * @property EstadoActuacion[] $estadoActuacions
 * @property Expediente[] $expedientes
 * @property Operario[] $operarios
 * @property Perito[] $peritos
 * @property Plataforma[] $plataformas
 * @property Prioridad[] $prioridads
 * @property TipoActuacion[] $tipoActuacions
 * @property TipoExpediente[] $tipoExpedientes
 * @property TipoTarea[] $tipoTareas
 * @property TipoUnidad[] $tipoUnidads
 * @property Usuario[] $usuarios
 */
class Empresa_base extends _BASEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Empresa_base the static model class
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
		return 'empresa';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, empresa, nro_control', 'required'),
			array('id, estado', 'numerical', 'integerOnly'=>true),
			array('empresa, nro_control', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, empresa, estado, nro_control', 'safe', 'on'=>'search'),
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
			'companias' => array(self::HAS_MANY, 'Compania', 'id_empresa'),
			'estados' => array(self::HAS_MANY, 'Estado', 'id_empresa'),
			'estadoActuaciones' => array(self::HAS_MANY, 'EstadoActuacion', 'id_empresa'),
			'expedientes' => array(self::HAS_MANY, 'Expediente', 'id_empresa'),
			'operarios' => array(self::HAS_MANY, 'Operario', 'id_empresa'),
			'peritos' => array(self::HAS_MANY, 'Perito', 'id_empresa'),
			'plataformas' => array(self::HAS_MANY, 'Plataforma', 'id_empresa'),
			'prioridades' => array(self::HAS_MANY, 'Prioridad', 'id_empresa'),
			'tipoActuaciones' => array(self::HAS_MANY, 'TipoActuacion', 'id_empresa'),
			'tipoExpedientes' => array(self::HAS_MANY, 'TipoExpediente', 'id_empresa'),
			'tipoTareas' => array(self::HAS_MANY, 'TipoTarea', 'id_empresa'),
			'tipoUnidades' => array(self::HAS_MANY, 'TipoUnidad', 'id_empresa'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'id_empresa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'empresa' => 'Empresa',
			'estado' => 'Estado',
			'nro_control' => 'Nro Control',
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
		$criteria->compare('empresa',$this->empresa,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('nro_control',$this->nro_control,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}