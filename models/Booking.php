<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property string $surname
 * @property string $name
 * @property string|null $patronymic
 * @property string $email
 * @property string $book_name
 * @property string $book_author
 * @property string $date
 * @property int $user_id
 * @property int $status
 *
 * @property User $user
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['surname', 'name', 'email', 'book_name', 'book_author'], 'required'],
            [['surname', 'name', 'patronymic', 'email', 'book_name', 'book_author'], 'string', 'max' => 256],
            [['patronymic',], 'string'],
            [['email',], 'email'],
            [['date',], 'safe'],
            [['status'], 'integer'],
            ['user_id', 'default', 'value'=>Yii::$app->user->getId()],
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
            'book_name' => Yii::t('app', 'Название книги'),
            'book_author' => Yii::t('app', 'Автор'),
            'date' => Yii::t('app', 'Дата, когда хотите забрать книгу'),
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

    public function saveBooking()
    {

        $booking = new Booking();
        $booking->surname = $this->surname;
        $booking->name = $this->name;
        $booking->patronymic = $this->patronymic;
        $booking->email = $this->email;
        $booking->book_name = $this->book_name;
        $booking->book_author = $this->book_author;
        $booking->date = $this->date;
        $booking->user_id = $this->user_id;
        $booking->save();
        return $booking;
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
