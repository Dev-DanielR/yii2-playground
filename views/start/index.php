<?php

use yii\helpers\Html;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;

\yii\web\YiiAsset::register($this);
?>
<div class="home-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Publish Date</th>
                <th scope="col">Total Comments</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= $post['id'] ?></td>
                <td><?= $post['title'] ?></td>
                <td><?= $post['author'] ?></td>
                <td><?= $post['publish_date'] ?></td>
                <td>
                    <a href="comments/?id=<?= $post['id'] ?>">
                        <span class="badge"><?= $post['total_comments'] ?></span>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?=LinkPager::widget(["pagination" => $pagination])?>
</div>