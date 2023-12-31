<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $image
 * @property string $date
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'image', 'date'], 'required'],
            [['content'], 'string'],
            [['date'], 'safe'],
            [['title', 'image'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Заголовок'),
            'content' => Yii::t('app', 'Текст'),
            'image' => Yii::t('app', 'Фото'),
            'date' => Yii::t('app', 'Дата'),
        ];
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['news_id' => 'id']);
    }

}
