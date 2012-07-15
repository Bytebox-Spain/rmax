<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    /**
     *@var integer _id 
     */
    private $_id;
    
    /**
     *@var string masterCompany 
     */
    public $masterCompany;

    /**
	 * Constructor.
	 * @param string $username username
	 * @param string $password password
     * @param string $masterCompany 
	 */
	public function __construct($username,$password,$masterCompany)
	{
        $this->masterCompany=$masterCompany;
        parent::__construct($username,$password);
	}

    /**
    * Authenticates a user.
    * @return boolean whether authentication succeeds.
    */
    public function authenticate()
    {
        $empresa = Empresa::model()->findByAttributes(array('empresa'=>$this->masterCompany));
        if ($empresa === null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }else{
            $idEmpresa = $empresa->id;
            $user= Usuario::model()->findByAttributes(array('usuario'=>$this->username,'id_empresa'=>$idEmpresa));
            if ($user === null){
                $this->errorCode=self::ERROR_USERNAME_INVALID;
            }else{

                if ($user->clave !== $this->password){//implementar encriptación de claves
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                }else{
                    $this->_id = $user->id;
                    if(null === $user->ultimo_login){
                        $lastLogin = time();
                    }else{
                        $lastLogin = strtotime($user->ultimo_login);
                    }
                    $this->setState('ultimo_login', $lastLogin);
                    $this->setState('master_company_id', $idEmpresa);
                    $this->errorCode = self::ERROR_NONE;
                }
            }
        }
        return !$this->errorCode;
        
    }
    
    public function getId(){
        return $this->_id;
    }
}