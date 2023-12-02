<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $author_id
 * @property string $year
 * @property int $genre_id
 * @property int $publishing_house_id
 * @property string $image
 * @property string $date_add
 *
 * @property Author $author
 * @property Category $genre
 * @property PublishingHouse $publishingHouse
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'description', 'author_id', 'year', 'genre_id', 'publishing_house_id', 'image', 'date_add'], 'required'],
            [['description'], 'string'],
            [['author_id', 'genre_id', 'publishing_house_id'], 'integer'],
            [['date_add'], 'safe'],
            [['name', 'year', 'image'], 'string', 'max' => 256],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['author_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['genre_id' => 'id']],
            [['publishing_house_id'], 'exist', 'skipOnError' => true, 'targetClass' => PublishingHouse::class, 'targetAttribute' => ['publishing_house_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'author_id' => Yii::t('app', 'Author ID'),
            'year' => Yii::t('app', 'Year'),
            'genre_id' => Yii::t('app', 'Genre ID'),
            'publishing_house_id' => Yii::t('app', 'Publishing House ID'),
            'image' => Yii::t('app', 'Image'),
            'date_add' => Yii::t('app', 'Date Add'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Genre]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Category::class, ['id' => 'genre_id']);
    }

    /**
     * Gets query for [[PublishingHouse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublishingHouse()
    {
        return $this->hasOne(PublishingHouse::class, ['id' => 'publishing_house_id']);
    }
}
