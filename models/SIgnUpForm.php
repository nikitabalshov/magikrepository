<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Users;

class SIgnUpForm extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules(): array
    {
        return [
            [['username', 'email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],
        ];
    }
    public function attributeLabels(): array
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * @return Users|TYPE_NAME|null
     */
    public function signup(): Users|TYPE_NAME|null
    {
        if ($this->validate()) {
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            /** @var TYPE_NAME $user */
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }
        return null;
    }

}