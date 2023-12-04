<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property string $email
 * @property string $reader_ticket
 * @property string $date
 * @property string $book
 * @property int|null $user_id
 *
 * @property User $user
 */
class Application extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'email', 'reader_ticket', 'date', 'book'], 'required'],
            [['date'], 'safe'],
            [['book'], 'string'],
            [['user_id'], 'integer'],
            [['surname', 'name', 'patronymic', 'email', 'reader_ticket'], 'string', 'max' => 256],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'surname' => Yii::t('app', 'Surname'),
            'name' => Yii::t('app', 'Name'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'email' => Yii::t('app', 'Email'),
            'reader_ticket' => Yii::t('app', 'Reader Ticket'),
            'date' => Yii::t('app', 'Date'),
            'book' => Yii::t('app', 'Book'),
            'user_id' => Yii::t('app', 'User ID'),
        ];
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
