<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Comment;

/**
 * CommentSearch represents the model behind the search form of `app\models\Comment`.
 */
class CommentSearch extends Comment
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'post_id', 'user_id', 'active'], 'integer'],
            [['content', 'publish_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Comment::find();
        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'pagination' => ['pageSize' => 10],
        ]);

        $this->id      = isset($params['id']) ? $params['id'] : NULL;
        $this->post_id = isset($params['post_id']) ? $params['post_id'] : NULL;
        $this->user_id = isset($params['user_id']) ? $params['user_id'] : NULL;
        $this->active  = isset($params['active']) ? $params['active'] : NULL;
        if (!$this->validate()) { return $dataProvider;}

        $query->andFilterWhere([
            'id'           => $this->id,
            'post_id'      => $this->post_id,
            'user_id'      => $this->user_id,
            'active'       => $this->active,
            'publish_date' => $this->publish_date,
        ]);
        $query->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
