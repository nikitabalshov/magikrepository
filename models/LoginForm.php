<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read Users|null $user
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public bool $rememberMe = true;

    private bool|Users $_user = false;


    public function rules(): array
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params): bool
    {
        // Проверяем, что параметр $params является массивом
        if (!is_array($params)) {
            $params = []; // Если не массив, присваиваем пустой массив
        }

        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
                return false; // Пароль не прошел проверку
            }
        }
        return true; // Пароль прошел проверку успешно
    }

    public function login ():bool
    {
        if ($this->validate()){
            return Yii::$app->user->login($this->getUser(),$this->rememberMe ? 3600 * 24 * 30 : 0);
        }else{
            return false;
        }
    }

    public function getUser(): bool|Users
    {
        if ($this->_user === false) {
            $this->_user = Users::findByUsername($this->username);
        }
        return $this->_user;
    }
}
