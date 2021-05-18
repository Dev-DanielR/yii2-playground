<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="home-view-comments">

    <h1><?= Html::encode($this->title) ?></h1>  
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Comment</th>
                <th scope="col">Publish Date</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= $comment['id'] ?></td>
                <td><?= $comment['author'] ?></td>
                <td><?= $comment['content'] ?></td>
                <td><?= $comment['publish_date'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?=LinkPager::widget(["pagination" => $pagination])?>
</div>