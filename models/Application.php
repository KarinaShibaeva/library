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
 * @property string $author
 * @property int|null $user_id
 * @property int $status
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
            [['surname', 'name', 'email', 'reader_ticket', 'date', 'book', 'author'], 'required'],
            [['date'], 'safe'],
            [['book'], 'string'],
            [['user_id', 'status'], 'integer'],
            ['user_id', 'default', 'value' => Yii::$app->user->getId()],
            [['surname', 'name', 'patronymic', 'email', 'reader_ticket', 'author'], 'string', 'max' => 256],
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
            'surname' => Yii::t('app', 'Фамилия'),
            'name' => Yii::t('app', 'Имя'),
            'patronymic' => Yii::t('app', 'Отчество'),
            'email' => Yii::t('app', 'Email'),
            'reader_ticket' => Yii::t('app', 'Номер читательского билета'),
            'date' => Yii::t('app', 'Дата продления'),
            'book' => Yii::t('app', 'Название книги'),
            'author' => Yii::t('app', 'Автор'),
            'user_id' => Yii::t('app', 'User ID'),
            'status' => Yii::t('app', 'Status'),
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

    public function getStatus()
    {
        switch ($this->status){
            case 0:return'Ожидание';
            case 1:return'Принято';
            case 2:return'Отклонено';
        }
    }

    public function good()
    {
        $this->status = 1;
        return $this->save(false);
    }

    public function verybad()
    {
        $this->status = 2;
        return $this->save(false);
    }
}
