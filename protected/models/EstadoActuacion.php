<?php

/**
 * This is the model class for table "estado_actuacion".
 *
 * The followings are the available columns in table 'estado_actuacion':
 * @property integer $id
 * @property integer $id_empresa
 * @property string $estado_actuacion
 *
 * The followings are the available model relations:
 * @property Actuacion[] $actuacions
 * @property Empresa $idEmpresa
 */
class EstadoActuacion extends EstadoActuacion_base
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EstadoActuacion_base the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

?>
