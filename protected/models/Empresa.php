<?php

/**
 * This is the model class for table "empresa".
 *
 * The followings are the available columns in table 'empresa':
 * @property integer $id
 * @property string $empresa
 * @property integer $estado
 * @property string $nro_control
 *
 * The followings are the available model relations:
 * @property Compania[] $companias
 * @property Estado[] $estados
 * @property Expediente[] $expedientes
 * @property Plataforma[] $plataformas
 * @property Prioridad[] $prioridads
 * @property TipoExpediente[] $tipoExpedientes
 * @property TipoTarea[] $tipoTareas
 * @property Usuario[] $usuarios
 */
class Empresa extends Empresa_base
{
    /**
    * Returns the static model of the specified AR class.
    * @param string $className active record class name.
    * @return Empresa_base the static model class
    */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * lista de tipos de actuación válidas para una empresa dada
     * @return type array
     */
    public function getTiposActuacionOptions(){
        return CHtml::listData($this->tipoActuaciones,'id','tipo_actuacion');

    }    

    /**
     * lista de operarios válidos para una empresa dada
     * @return type array
     */
    public function getOperariosOptions(){
        $listaOperarios=array();
        $listaOperarios[null]="";
        foreach ($this->operarios as $operario){
            $listaOperarios[$operario->id]=$operario->nombre ." ". $operario->apellido;
        }
        return $listaOperarios;
    }        

    /**
     * lista de usuarios válidos para una empresa dada
     * @return type array
     */
    public function getUsuariosOptions(){
        $listaUsuarios=array();
        // $listaUsuarios[null]="";
        foreach ($this->usuarios as $usuario){
            $listaUsuarios[$usuario->id]=$usuario->nombre_usuario; 
        }
        return $listaUsuarios;
    }    
    
    /**
     * lista de unidades válidas para una empresa dada
     * @return type array
     */
    public function getTipoUnidadesOptions(){
        return CHtml::listData($this->tipoUnidades,'id','unidad');
    } 
    
    /**
     * lista de tipos de tareas válidas para una empresa dada
     * @return type array
     */
    public function getTiposTareasOptions(){
        return CHtml::listData($this->tipoTareas,'id','tarea');
    }  
    
    /**
     * lista de prioridades válidas para una empresa dada
     * @return type array
     */
    public function getPrioridadesOptions(){
        return CHtml::listData($this->prioridades,'id','prioridad');
    }

    /**
    * lista de compañias válidas para una empresa dada
    * @return type array
    */
    public function getCompaniasOptions(){
        return CHtml::listData($this->companias,'id','compania');
    }  

    /**
    * lista de estados válidos para una empresa dada
    * @return type array
    */
    public function getEstadosOptions(){
        return CHtml::listData($this->estados,'id','estado');
    }  

    /**
    * lista de estados válidos para una empresa dada
    * @return type array
    */
    public function getEstadosActuacionOptions(){
        return CHtml::listData($this->estadoActuaciones,'id','estado_actuacion');
    }  
    
    /**
    * lista de tipos de expedientes válidos para una empresa dada
    * @return type array
    */
    public function getTipoExpedientesOptions(){
        $lista=array();
        $lista[null]="";
        foreach ($this->tipoExpedientes as $expediente){
            $lista[$expediente->id]=$expediente->tipo_expediente;
        }
        return $lista;
    }  


    /**
    * lista de PLATAFORMAS válidas para una empresa dada
    * @return type array
    */
    public function getPlataformasOptions(){
        return CHtml::listData($this->plataformas,'id','plataforma');
    }         

    /**
    * lista de PERITOS para una empresa dada
    * @return type array
    */
    public function getPeritosOptions(){
        $lista=array();
        $lista[null]="";
        foreach ($this->peritos as $perito){
            $lista[$perito->gabinete][$perito->id]=$perito->nombre;
        }
        return $lista; 
        //return CHtml::listData($this->peritos,'id','nombre','gabinete');
    }    
    
}