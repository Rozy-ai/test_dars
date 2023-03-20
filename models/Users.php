<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property int $role
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['role'], 'integer'],
            [['login', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'role' => 'Role',
        ];
    }

    const ROLE_CLIENT = 0,
    ROLE_ADMIN = 1;

    public static function getRolesOptions()
    {
        return array(
            self::ROLE_CLIENT => Yii::t('app', 'CLIENT'),
            self::ROLE_ADMIN => Yii::t('app', 'ADMIN'),
        );
    }

    public function getRoles()
    {
        $options = $this->getRolesOptions();
        return isset($options[$this->role]) ? $options[$this->role] : '';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return;
    }

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
        // public static function findByUsername($username)
        // {
        //     foreach (self::$users as $user) {
        //         if (strcasecmp($user['username'], $username) === 0) {
        //             return new static($user);
        //         }
        //     }

        //     return null;
        // }

         /**
         * Validates password
         *
         * @param string $password password to validate
         * @return bool if password provided is valid for current user
         */

        public function validatePassword($password)
        {
            return $this->password === $password;
        }
    
}
