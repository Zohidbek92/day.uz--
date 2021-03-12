<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $gender
 * @property string $username
 * @property string $password
 * @property string $sana
 * @property string $authKey
 * @property string $accessToken
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public $password_repeat;

    public function rules()
    {
        return [
            [['firstname', 'lastname', 'gender', 'username', 'password', 'password_repeat'], 'required'],
            ['username', 'unique'],
            [['firstname', 'lastname', 'username', 'password'], 'string', 'min' => '4', 'max' => 50],
            [['gender'], 'string', 'max' => 5],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Ismingiz',
            'lastname' => 'Familiyangiz',
            'gender' => 'Jins',
            'username' => 'Username',
            'password' => 'Parol',
            'password_repeat' => 'Parolni takrorlang',
            'sana' => 'Sana',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5(md5($password));
    }
}
