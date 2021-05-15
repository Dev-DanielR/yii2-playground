<?php

namespace app\controllers;

use Yii;
use yii\data\SQLDataProvider;
use app\models\Comment;
use app\models\CommentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class StartController extends Controller
{
    const INDEX_PAGE_SIZE = 10;
    const COMMENTS_PAGE_SIZE = 10;

    /**
     * Shows all active Posts.
     */
    public function actionIndex()
    {
        $total = Yii::$app->db
            ->createCommand('SELECT COUNT(p.id) FROM post p WHERE active = "1";')
            ->queryScalar();
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT p.id, p.title,
                            (SELECT username FROM user u WHERE u.id = p.user_id) as author,
                            p.publish_date,
                            (SELECT COUNT(c.id) FROM comment c WHERE c.post_id = p.id AND c.active = "1") as total_comments
                        FROM post p
                        WHERE p.active = "1"',
            'totalCount' => $total,
            'pagination' => ['pageSize' => StartController::INDEX_PAGE_SIZE],
        ]);

        return $this->render('index', [
            'posts' => $dataProvider->getModels(),
        ]);
    }

    public function actionView(){}
    public function actionAuthor(){}

    public function actionComments($id){
        $total = Yii::$app->db
            ->createCommand('SELECT COUNT(c.id) FROM comment c WHERE active = "1" and post_id ="' . $id . '";')
            ->queryScalar();
        $dataProvider = new SqlDataProvider([
            'sql' => 'SELECT c.id,
                            (SELECT username FROM user u WHERE u.id = c.user_id) as author,
                            c.content,
                            c.publish_date
                        FROM comment c
                        WHERE c.active = "1"',
            'totalCount' => $total,
            'pagination' => ['pageSize' => StartController::COMMENTS_PAGE_SIZE],
        ]);

        return $this->render('comments', [
            'comments' => $dataProvider->getModels(),
        ]);
    }
}