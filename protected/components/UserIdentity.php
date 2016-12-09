<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{

		$usuario = Profesor::model()->findByAttributes(
			array(
				'mail' => $this->username,
            )
        );

        if($usuario==null){
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }else{
            if(trim($usuario->password) == trim($this->password)){
                /* Usuario Autenticado !! */
                $this->errorCode=self::ERROR_NONE;
                Yii::app()->user->setState('idProfesor', $usuario->idProfesor);
                Yii::app()->user->setState('usuario', $usuario);
                switch($usuario->perfil){
                    case 0:
                        $this->username='profesor';
                        break;
                    case 1:
                        $this->username='super';
                        break;
                }
            }else{
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            }
        
        }        
        return !$this->errorCode;
	}
}