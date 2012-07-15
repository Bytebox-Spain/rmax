<?php


/**
 * Prepara los campos de auditoria antes de que se realice la validación
 *
 * @author kublai
 */
abstract class _BASEActiveRecord extends CActiveRecord{
    
    /**
     * Función para actualizar datos en campos de auditoria (si existen en la tabla)
     * el formato de la fecha es d/m/Y (formato de aplicacion) porque
     * es el modelo el que hace la traducción a yyyy-mm-dd justo antes
     * de grabar el dato en DDBB.
     * ver método beforeValidate en cada modelo que herede de este objeto
     * @return Object 
     */
    protected function beforeValidate(){
        if ($this->isNewRecord){
            foreach($this->metadata->tableSchema->columns as $columnName => $column){
                if ($columnName == 'id_usuario_creacion') $this->id_usuario_creacion = Yii::app()->user->id;
                if ($columnName == 'id_usuario_ultmodif') $this->id_usuario_ultmodif = $this->id_usuario_creacion;
                if ($columnName == 'fecha_creacion') $this->fecha_creacion = date('d/m/Y H:i:s', time());
                if ($columnName == 'fecha_ultmodif') $this->fecha_ultmodif = $this->fecha_creacion;
            }
        }else{
            foreach($this->metadata->tableSchema->columns as $columnName => $column){            
                if ($columnName == 'id_usuario_ultmodif') $this->id_usuario_ultmodif = Yii::app()->user->id;
                if ($columnName == 'fecha_ultmodif') $this->fecha_ultmodif = date('d/m/Y H:i:s', time());
            }
        }
        return parent::beforeValidate();
    }
   
    /**
     * Función para tratar los datos de fechas antes de grabarlos
     * @return boolean 
     */
    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            // Format dates based on the locale
            foreach($this->metadata->tableSchema->columns as $columnName => $column)
            {
                if ($column->dbType == 'date')
                {
                    $aux= CDateTimeParser::parse($this->$columnName,"dd/MM/yyyy");
                    $this->$columnName = ($aux != null )?date('Y-m-d',$aux ):null;
                }
                elseif ($column->dbType == 'datetime')
                {
                    $aux= CDateTimeParser::parse($this->$columnName,"dd/MM/yyyy HH:mm:ss");
                    if ($aux=="") $aux= CDateTimeParser::parse($this->$columnName,"dd/MM/yyyy HH:mm");
                    if ($aux=="") $aux= CDateTimeParser::parse($this->$columnName,"dd/MM/yyyy");
                    $this->$columnName = ($aux != null )?date('Y-m-d H:i:s',$aux ):null;
                }
            }
            return true;
        }
        else
            return false;
    }
    
    /*
     * Funcion para formatear los campos fecha una vez que se recuperan de la base de datos
     * 
     */
    public function afterFind(){
        // Format dates based on the locale
        foreach($this->metadata->tableSchema->columns as $columnName => $column){
            if ($column->dbType == 'date'){
                $aux= CDateTimeParser::parse($this->$columnName,"yyyy-MM-dd");
                $this->$columnName = ($aux != null )?date('d/m/Y',$aux ):null;
            }elseif ($column->dbType == 'datetime'){
                $aux= CDateTimeParser::parse($this->$columnName,"yyyy-MM-dd HH:mm:ss");
                $this->$columnName = ($aux != null )?date('d/m/Y H:i:s',$aux ):null;
            }
        }
    }    
}
?>
