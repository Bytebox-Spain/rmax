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
 * @property TipoUnidad $idUsuarioUltmodif
 * @property Actuacion $idActuacion
 * @property Usuario $idUsuarioCreacion
 */
class ActuacionRegistro extends ActuacionRegistro_base
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
    

  

}