<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $middlename
 * @property string $password
 * @property string $auth_key
 * @property string $email
 * @property string $created_at
 * @property string $updated_at
 * @property string|null $deleted_at
 * @property int $ok_deleted
 */
class Users extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName():string
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules():array
    {
        return [
            [['username', 'firstname', 'lastname', 'middlename', 'password', 'auth_key', 'email', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['ok_deleted'], 'integer'],
            [['username', 'firstname', 'lastname', 'middlename'], 'string', 'max' => 50],
            [['password', 'auth_key', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'firstname' => Yii::t('app', 'Firstname'),
            'lastname' => Yii::t('app', 'Lastname'),
            'middlename' => Yii::t('app', 'Middlename'),
            'password' => Yii::t('app', 'Password'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'email' => Yii::t('app', 'Email'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
            'ok_deleted' => Yii::t('app', 'Ok Deleted'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find():UsersQuery
    {
        return new UsersQuery(get_called_class());
    }

    public static function findIdentity($id):?IdentityInterface
    {
        return static::findOne($id);
    }

    /**
     * @param $token
     * @param $type
     * @return mixed
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null): mixed
    {
        throw new NotSupportedException(Yii::t('app','"findIdentityByAccessToken" is not implement'));
    }

    public static function findByUsername(string $username):Users
    {
        return static::findOne(['username'=>$username]);
    }

    /**
     * @return int|string
     */
    public function getId(): int|string
    {
        return $this->id;
    }

    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }
    public function validatePassword(string $password):bool
    {
        return Yii::$app->security>$this->validatePassword($password, $this->password);
    }

    /**
     * @throws Exception
     */

    public function beforeSave($insert):bool
    {
        if (parent::beforeSave($insert)){
            if($this->isNewRecord){
                $this->auth_key =Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function generateAuthKey(): void
    {
        $this->auth_key;
    }
}
