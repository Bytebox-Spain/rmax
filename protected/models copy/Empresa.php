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
 * @property Expediente[] $expedientes
 * @property Plataforma[] $plataformas
 * @property Prioridad[] $prioridads
 * @property TipoExpediente[] $tipoExpedientes
 * @property TipoTarea[] $tipoTareas
 */
class Empresa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Empresa the static model class
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
			'expedientes' => array(self::HAS_MANY, 'Expediente', 'id_empresa'),
			'plataformas' => array(self::HAS_MANY, 'Plataforma', 'id_empresa'),
			'prioridades' => array(self::HAS_MANY, 'Prioridad', 'id_empresa'),
			'tipoExpedientes' => array(self::HAS_MANY, 'TipoExpediente', 'id_empresa'),
			'tipoTareas' => array(self::HAS_MANY, 'TipoTarea', 'id_empresa'),
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
        
        /**
         * lista de prioridades válidas para una empresa dada
         * @return type array
         */
        
        public function getPrioridadesOptions(){
            return CHtml::listData($this->prioridades,'id','prioridad');
        }
        
        /**
         * lista de compañias válidas para una empresa dada
         * @return type array
         */
        public function getCompaniasOptions(){
            return CHtml::listData($this->companias,'id','nombre');
        }  

        /**
         * lista de estados válidos para una empresa dada
         * @return type array
         */
        public function getEstadosOptions(){
            return CHtml::listData($this->estados,'id','estado');
        }  

        /**
         * lista de tipos de expedientes válidos para una empresa dada
         * @return type array
         */
        public function getTipoExpedientesOptions(){
            return CHtml::listData($this->tipoExpedientes,'id','tipo');
        }  

        
        /**
         * lista de PLATAFORMAS válidas para una empresa dada
         * @return type array
         */
        public function getPlataformasOptions(){
            return CHtml::listData($this->plataformas,'id','plataforma');
        }          
}