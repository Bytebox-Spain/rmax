<?php

/**
 * This is the model class for table "operario".
 *
 * The followings are the available columns in table 'operario':
 * @property integer $id
 * @property integer $id_empresa
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Actuacion[] $actuacions
 * @property Actuacion[] $actuacions1
 * @property Actuacion[] $actuacions2
 * @property Actuacion[] $actuacions3
 * @property Empresa $idEmpresa
 */
class Operario extends Operario_base
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
?>
