<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $gender
 * @property string $birthday
 * @property string $authKey
 * @property string $accessToken
 * @property string $join_date
 * @property string $last_active
 *
 * @property Comment[] $comments
 * @property Post[] $posts
 */
class User extends \yii\db\ActiveRecord
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
            [['username', 'email', 'password', 'gender', 'birthday', 'authKey', 'accessToken', 'join_date' ], 'required'],
            [['birthday', 'join_date', 'last_active'], 'safe'],
            [['username'], 'string', 'max' => 16],
            [['email', 'password'], 'string', 'max' => 32],
            [['gender'], 'string', 'max' => 1],
            [['authKey', 'accessToken'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'username'    => 'Username',
            'email'       => 'Email',
            'password'    => 'Password',
            'gender'      => 'Gender',
            'birthday'    => 'Birthday',
            'authKey'     => 'Auth Key',
            'accessToken' => 'Access Token',
            'join_date'   => 'Join Date',
            'last_active' => 'Last Active',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Posts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['user_id' => 'id']);
    }
}
