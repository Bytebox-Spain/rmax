<?php

/**
 * This is the model class for table "actuacion".
 *
 * The followings are the available columns in table 'actuacion':
 * @property integer $id
 * @property integer $id_expediente
 * @property integer $tipo_actuacion
 * @property string $fecha_tope
 * @property string $fecha_asignacion
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property integer $id_baremo
 * @property double $cantidad
 * @property integer $id_unidad
 * @property integer $precio_coste
 * @property integer $precio_venta
 * @property integer $usuario_creacion
 * @property string $fecha_creacion
 * @property integer $usuario_ultmodif
 * @property string $fecha_ultmodif
 *
 * The followings are the available model relations:
 * @property Expediente $idExpediente
 * @property ActuacionOperario[] $actuacionOperarios
 */
class Actuacion extends Actuacion_base
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
	 * Devuelve nombre y apellido del operario si es que los datos
     * son diferentes a null, caso contrario devuelve una cadena vacia
	 * @param object 
	 * @return string
	 */    
    public function getDatosOperario($operario)
    {
        $data = "";
        if (isset($operario->nombre) && isset($operario->apellido)) {
            $esp=" "; 
        }else{
            $esp = "";
        }
        if (isset($operario->nombre)) $data = $operario->nombre;
        if (isset($operario->apellido)) $data .= $esp . $operario->apellido;
        return $data;
    }
  
    /**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
        $attrArray=parent::attributeLabels();
        $attrArray['id_expediente']="Expediente";
        $attrArray['id_tipo_actuacion']="Tipo actuación";
        $attrArray['id_operario_aux1'] ="Operario auxiliar 1";
        $attrArray['id_operario_aux2'] ="Operario auxiliar 2";
        $attrArray['id_operario_aux2'] ="Operario auxiliar 3";
        $attrArray['id_operario_responsable'] ="Operario responsable";
        
    }
}