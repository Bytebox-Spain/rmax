<?php

class Expediente extends Expediente_base
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
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'actuaciones' => array(self::HAS_MANY, 'Actuacion', 'id_expediente'),
			'documentos' => array(self::HAS_MANY, 'Documentos', 'expediente_id'),
            'idPerito' => array(self::BELONGS_TO, 'Perito', 'id_perito'),
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
			'idPlataforma' => array(self::BELONGS_TO, 'Plataforma', 'id_plataforma'),
			'idUsuarioCreacion' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_creacion'),
			'idUsuarioUltmodif' => array(self::BELONGS_TO, 'Usuario', 'id_usuario_ultmodif'),
			'idEmpresa' => array(self::BELONGS_TO, 'Empresa', 'id_empresa'),
			'idTipoExpediente' => array(self::BELONGS_TO, 'TipoExpediente', 'id_tipo_expediente'),
			'idPrioridad' => array(self::BELONGS_TO, 'Prioridad', 'id_prioridad'),
			'idCompania' => array(self::BELONGS_TO, 'Compania', 'id_compania'),
			'tareas' => array(self::HAS_MANY, 'Tareas', 'id_expediente'),
		);
	}        

    /**
     * Devuelve los datos del perito correctamente formateados
     * @param object perito
     * @return string datos del perito 
     */
    public function datosPerito($perito){
        $data="";
        if (isset($perito->nombre)) $data=$perito->nombre;
        if (isset($perito->telefono)) $data.= "(Telf. {$perito->telefono})";
        return $data;
    }    

}