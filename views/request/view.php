<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Request $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if($model->status == "Новая"){
            echo Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]);
        }  ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'description',
            //'user_id',
            ['attribute'=>'Категория', 'format'=>'html','value'=>function($data){return $data->getCategory()->one()->name;}],
            ['attribute'=>'Фото', 'format'=>'html','value'=>function($data){return Html::img($data->img,['alt' => $data->name, 'style'=>'width: 120px']);}], 
            'date',
            'status',
        ],
    ]) ?>

</div>
