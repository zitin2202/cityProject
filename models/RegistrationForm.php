<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 *
 * 
 */
class RegistrationForm extends User
{
    public $confirm_password;
    public $agree;  
    public function rules()
    {
            $rules = parent::rules();
            array_push($rules,
            [['confirm_password','agree'],'required'],
            [['confirm_password'],'compare', 'compareAttribute'=>'password'],
            [['agree'],'compare','compareValue'=>true, 'message'=>'']
            );

        return $rules;
           
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
            'confirm_password'=>'Повтор пароль',
            'agree'=>"Согласие на обработку персональных данных"
        ];
    }

  
}
