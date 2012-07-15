<?php
/**
 * Description of Documento
 *
 * @author kublai
 */
class Documento extends Documento_base {
    	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Documento_base the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    public function rules(){
        $aux = parent::rules();
        //añadimos reglas de validación adicionales a las que genera el modelo base
        $aux[]=  array('archivo', 'file', 'types'=>'pdf, doc, docx, xls, txt, jpg, gif, png');
        return $aux;
    }

    /**
     * Sobreescribe las etiquetas de campo del modelo base
     * @return array 
     */
	public function attributeLabels()
	{
        $attrArray= parent::attributeLabels();
        $attrArray['titulo'] = "Título";
        $attrArray['descripcion'] = "Descripción";
        $attrArray['id_usuario_creacion'] = "Creado por";
        $attrArray['fecha_creacion'] = "Creado el";
        $attrArray['id_usuario_ultmodif'] = "Modificado por";
        $attrArray['fecha_ultmodif'] = "Modificado el";
        
        return $attrArray;

	}
    
}

?>
