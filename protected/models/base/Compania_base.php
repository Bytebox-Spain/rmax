<?php

/**
 * This is the model class for table "compania".
 *
 * The followings are the available columns in table 'compania':
 * @property integer $id
 * @property integer $id_empresa
 * @property string $compania
 *
 * The followings are the available model relations:
 * @property Empresa $idEmpresa
 * @property Expediente[] $expedientes
 */
class Compania_base extends _BASEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Compania_base the static model class
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
		return 'compania';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_empresa, compania', 'required'),
			array('id_empresa', 'numerical', 'integerOnly'=>true),
			array('compania', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_empresa, compania', 'safe', 'on'=>'search'),
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
			'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'expedientes' => array(self::HAS_MANY, 'Expediente', 'id_compania'),
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
			'compania' => 'Compania',
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
		$criteria->compare('compania',$this->compania,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}