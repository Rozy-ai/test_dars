<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $name
 * @property int|null $author_id
 * @property string|null $date_created
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['author_id'], 'integer'],
            [['date_created'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'author_id' => 'Author ID',
            'date_created' => 'Date Created',
        ];
    }

    public function getAuthor(){
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    public function getGenres() {
        return $this->hasMany(Genres::className(), ['id' => 'genre_id'])
          ->viaTable('tbl_genres_books', ['book_id' => 'id']);
    }
}
