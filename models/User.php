<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $email
 * @property string $password
* @property string $is_admin
 *
 * @property Request[] $requests
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
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
    public function rules()
    {
        return [
            [['name', 'login', 'email', 'password'], 'required'],
            [['name', 'login', 'email', 'password'], 'string', 'max' => 200],
            [["name"],"match","pattern"=> "/^[а-яёА-ЯЁ\s-]+$/u"],
            [["login"],"match","pattern"=> "/^[a-zA-Z]+$/u"],
            [["login"], "unique"],
            [["email"], "email"],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
        ];
    }

    /**
     * Gets query for [[Requests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Request::class, ['user_id' => 'id']);
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
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
    public function validatePassword($password){
        return $this->password==$password;
    }


    public static function findByLogin($login){
        return self::find()->where(['login'=> $login])->one();
    }
}
