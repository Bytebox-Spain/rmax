<?php

/**
 * This is the model class for table "plataforma".
 *
 * The followings are the available columns in table 'plataforma':
 * @property integer $id
 * @property integer $id_empresa
 * @property string $plataforma
 *
 * The followings are the available model relations:
 * @property Expediente[] $expedientes
 * @property Empresa $idEmpresa
 */
class Plataforma extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Plataforma the static model class
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
		return 'plataforma';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empresa, plataforma', 'required'),
			array('id_empresa', 'numerical', 'integerOnly'=>true),
			array('plataforma', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_empresa, plataforma', 'safe', 'on'=>'search'),
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
			'expedientes' => array(self::HAS_MANY, 'Expediente', 'id_plataforma'),
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
			'plataforma' => 'Plataforma',
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
		$criteria->compare('plataforma',$this->plataforma,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}