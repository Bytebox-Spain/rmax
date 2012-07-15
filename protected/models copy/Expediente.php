<?php

/**
 * This is the model class for table "expediente".
 *
 * The followings are the available columns in table 'expediente':
 * @property integer $id
 * @property integer $id_empresa
 * @property string $nro_control
 * @property string $nro_expediente
 * @property integer $id_prioridad
 * @property integer $id_compania
 * @property integer $id_estado
 * @property integer $id_tipo_expediente
 * @property integer $id_plataforma
 * @property string $cliente_final
 * @property string $dir_cliente_final
 * @property string $tel_cliente_final
 * @property string $perito
 *
 * The followings are the available model relations:
 * @property Actuacion[] $actuacions
 * @property Plataforma $idPlataforma
 * @property Estado $idEstado
 * @property Empresa $idEmpresa
 * @property TipoExpediente $idTipoExpediente
 * @property Prioridad $idPrioridad
 * @property Compania $idCompania
 * @property Tareas[] $tareases
 */
class Expediente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Expediente the static model class
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
		return 'expediente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empresa, nro_control, nro_expediente, id_prioridad, id_compania, id_estado, id_tipo_expediente, id_plataforma, cliente_final', 'required'),
			array('id_empresa, id_prioridad, id_compania, id_estado, id_tipo_expediente, id_plataforma', 'numerical', 'integerOnly'=>true),
			array('nro_control, nro_expediente', 'length', 'max'=>50),
			array('cliente_final, dir_cliente_final, tel_cliente_final, perito', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_empresa, nro_control, nro_expediente, id_prioridad, id_compania, id_estado, id_tipo_expediente, id_plataforma, cliente_final, dir_cliente_final, tel_cliente_final, perito', 'safe', 'on'=>'search'),
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
			'actuaciones' => array(self::HAS_MANY, 'Actuacion', 'id_expediente'),
			'idPlataforma' => array(self::BELONGS_TO, 'Plataforma', 'id_plataforma'),
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'idTipoExpediente' => array(self::BELONGS_TO, 'TipoExpediente', 'id_tipo_expediente'),
			'idPrioridad' => array(self::BELONGS_TO, 'Prioridad', 'id_prioridad'),
			'idCompania' => array(self::BELONGS_TO, 'Compania', 'id_compania'),
			'tareas' => array(self::HAS_MANY, 'Tareas', 'id_expediente'),
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
			'nro_control' => 'Nro Control',
			'nro_expediente' => 'Nro Expediente',
			'id_prioridad' => 'Id Prioridad',
			'id_compania' => 'Id Compania',
			'id_estado' => 'Id Estado',
			'id_tipo_expediente' => 'Id Tipo Expediente',
			'id_plataforma' => 'Id Plataforma',
			'cliente_final' => 'Cliente Final',
			'dir_cliente_final' => 'Dir Cliente Final',
			'tel_cliente_final' => 'Tel Cliente Final',
			'perito' => 'Perito',
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
		$criteria->compare('nro_control',$this->nro_control,true);
		$criteria->compare('nro_expediente',$this->nro_expediente,true);
		$criteria->compare('id_prioridad',$this->id_prioridad);
		$criteria->compare('id_compania',$this->id_compania);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_tipo_expediente',$this->id_tipo_expediente);
		$criteria->compare('id_plataforma',$this->id_plataforma);
		$criteria->compare('cliente_final',$this->cliente_final,true);
		$criteria->compare('dir_cliente_final',$this->dir_cliente_final,true);
		$criteria->compare('tel_cliente_final',$this->tel_cliente_final,true);
		$criteria->compare('perito',$this->perito,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        

        /**
         * Lista de plataforma asociadas
         * @return type array
         */
        public function getPlataformaOptions(){
            return CHtml::listData($this->idPlataforma,'id','plataforma');
        }
        
}