<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "request".
 *
* @property int $id
 * @property string $name
 * @property string $description
 * @property int $user_id
 * @property int $category_id
 * @property string $img
 * @property string $img_after
 * @property string $date
 * @property string|null $date_after
 * @property string $status
 *
 * @property Category $category
 * @property User $user
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'user_id', 'category_id', 'img'], 'required'],
            [['user_id', 'category_id'], 'integer'],
            [['status'], 'string'],
            [['date', 'date_after'], 'safe'],
            [['name', 'description', 'img','img_after'], 'string', 'max' => 200],
            [['img','img_after'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg,', 'maxSize'=>1024*1024*10],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Тема',
            'description' => 'Описание',
            'user_id' => 'User ID',
            'category_id' => 'Category ID',
            'img' => 'Фото',
            'img_after' => 'Фото после решения',
            'date' => 'Дата создания',
            'date_after' => 'Дата решения',
            'status' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
