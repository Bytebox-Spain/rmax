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
 * @property string $descripcion
 * @property string $cliente_final
 * @property string $dir_cliente_final
 * @property string $tel_cliente_final
 * @property integer $id_perito
 * @property integer $causante_externo
 * @property string $datos_causante_externo
 * @property integer $id_usuario_creacion
 * @property string $fecha_creacion
 * @property integer $id_usuario_ultmodif
 * @property string $fecha_ultmodif
 *
 * The followings are the available model relations:
 * @property Actuacion[] $actuacions
 * @property Documento[] $documentos
 * @property Estado $idEstado
 * @property Plataforma $idPlataforma
 * @property Usuario $idUsuarioCreacion
 * @property Usuario $idUsuarioUltmodif
 * @property Perito $idPerito
 * @property Empresa $idEmpresa
 * @property TipoExpediente $idTipoExpediente
 * @property Prioridad $idPrioridad
 * @property Compania $idCompania
 * @property Tarea[] $tareas
 */
class Expediente_base extends _BASEActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Expediente_base the static model class
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
			array('id_empresa, nro_control, nro_expediente, id_prioridad, id_compania, id_estado, id_plataforma, cliente_final, causante_externo, id_usuario_creacion, fecha_creacion, id_usuario_ultmodif, fecha_ultmodif', 'required'),
			array('id_empresa, id_prioridad, id_compania, id_estado, id_tipo_expediente, id_plataforma, id_perito, causante_externo, id_usuario_creacion, id_usuario_ultmodif', 'numerical', 'integerOnly'=>true),
			array('nro_control, nro_expediente', 'length', 'max'=>50),
			array('cliente_final, dir_cliente_final, tel_cliente_final', 'length', 'max'=>250),
			array('descripcion, datos_causante_externo',  'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_empresa, nro_control, nro_expediente, id_prioridad, id_compania, id_estado, id_tipo_expediente, id_plataforma, descripcion, cliente_final, dir_cliente_final, tel_cliente_final, id_perito, causante_externo, datos_causante_externo, id_usuario_creacion, fecha_creacion, id_usuario_ultmodif, fecha_ultmodif', 'safe', 'on'=>'search'),
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
			'actuacions' => array(self::HAS_MANY, 'Actuacion', 'id_expediente'),
			'documentos' => array(self::HAS_MANY, 'Documento', 'id_expediente'),
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'idPlataforma' => array(self::BELONGS_TO, 'Plataforma', 'id_plataforma'),
			'idUsuarioCreacion' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_creacion'),
			'idUsuarioUltmodif' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_ultmodif'),
			'idPerito' => array(self::BELONGS_TO, 'Perito', 'id_perito'),
			'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'idTipoExpediente' => array(self::BELONGS_TO, 'TipoExpediente', 'id_tipo_expediente'),
			'idPrioridad' => array(self::BELONGS_TO, 'Prioridad', 'id_prioridad'),
			'idCompania' => array(self::BELONGS_TO, 'Compania', 'id_compania'),
			'tareas' => array(self::HAS_MANY, 'Tarea', 'id_expediente'),
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
			'descripcion' => 'Descripcion',
			'cliente_final' => 'Cliente Final',
			'dir_cliente_final' => 'Dir Cliente Final',
			'tel_cliente_final' => 'Tel Cliente Final',
			'id_perito' => 'Id Perito',
			'causante_externo' => 'Causante Externo',
			'datos_causante_externo' => 'Datos Causante Externo',
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
		$criteria->compare('id_empresa',$this->id_empresa);
		$criteria->compare('nro_control',$this->nro_control,true);
		$criteria->compare('nro_expediente',$this->nro_expediente,true);
		$criteria->compare('id_prioridad',$this->id_prioridad);
		$criteria->compare('id_compania',$this->id_compania);
		$criteria->compare('id_estado',$this->id_estado);
		$criteria->compare('id_tipo_expediente',$this->id_tipo_expediente);
		$criteria->compare('id_plataforma',$this->id_plataforma);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('cliente_final',$this->cliente_final,true);
		$criteria->compare('dir_cliente_final',$this->dir_cliente_final,true);
		$criteria->compare('tel_cliente_final',$this->tel_cliente_final,true);
		$criteria->compare('id_perito',$this->id_perito);
		$criteria->compare('causante_externo',$this->causante_externo);
		$criteria->compare('datos_causante_externo',$this->datos_causante_externo,true);
		$criteria->compare('id_usuario_creacion',$this->id_usuario_creacion);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('id_usuario_ultmodif',$this->id_usuario_ultmodif);
		$criteria->compare('fecha_ultmodif',$this->fecha_ultmodif,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}