<?php

/**
 * This is the model class for table "tarea".
 *
 * The followings are the available columns in table 'tarea':
 * @property integer $id
 * @property integer $id_expediente
 * @property integer $id_tipo_tarea
 * @property integer $id_usuario_asignado
 * @property string $descripcion
 * @property string $inicio
 * @property string $final
 * @property integer $id_usuario_creacion
 * @property string $fecha_creacion
 * @property integer $id_usuario_ultmodif
 * @property string $fecha_ultmodif
 *
 * The followings are the available model relations:
 * @property Expediente $idExpediente
 * @property TipoTarea $idTipoTarea
 * @property Usuario $idUsuarioAsignado
 * @property Usuario $idUsuarioCreacion
 * @property Usuario $idUsuarioUltmodif
 * @property TareaRegistro[] $tareaRegistros
 */
class Tarea_base extends _BASEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tarea_base the static model class
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
		return 'tarea';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_expediente, id_tipo_tarea, id_usuario_asignado, descripcion, id_usuario_creacion, fecha_creacion, id_usuario_ultmodif, fecha_ultmodif', 'required'),
			array('id_expediente, id_tipo_tarea, id_usuario_asignado, id_usuario_creacion, id_usuario_ultmodif', 'numerical', 'integerOnly'=>true),
			array('inicio, final', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_expediente, id_tipo_tarea, id_usuario_asignado, descripcion, inicio, final, id_usuario_creacion, fecha_creacion, id_usuario_ultmodif, fecha_ultmodif', 'safe', 'on'=>'search'),
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
			'idTipoTarea' => array(self::BELONGS_TO, 'TipoTarea', 'id_tipo_tarea'),
			'idUsuarioAsignado' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_asignado'),
			'idUsuarioCreacion' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_creacion'),
			'idUsuarioUltmodif' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_ultmodif'),
			'tareaRegistros' => array(self::HAS_MANY, 'TareaRegistro', 'id_tarea'),
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
			'id_tipo_tarea' => 'Id Tipo Tarea',
			'id_usuario_asignado' => 'Id Usuario Asignado',
			'descripcion' => 'Descripcion',
			'inicio' => 'Empieza (fecha y hora)',
			'final' => 'Termina (fecha y hora)',
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
		$criteria->compare('id_tipo_tarea',$this->id_tipo_tarea);
		$criteria->compare('id_usuario_asignado',$this->id_usuario_asignado);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('inicio',$this->inicio,true);
		$criteria->compare('final',$this->final,true);
		$criteria->compare('id_usuario_creacion',$this->id_usuario_creacion);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('id_usuario_ultmodif',$this->id_usuario_ultmodif);
		$criteria->compare('fecha_ultmodif',$this->fecha_ultmodif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}