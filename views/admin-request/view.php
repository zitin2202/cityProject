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


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'description',
            //'user_id',
            ['attribute'=>'Категория', 'format'=>'html','value'=>function($data){return $data->getCategory()->one()->name;}],
            ['attribute'=>'Фото проблемы', 'format'=>'html','value'=>function($data){return Html::img($data->img,['alt' => $data->name, 'style'=>'width: 120px']);}],
            ['attribute'=>'Фото решения', 'format'=>'html','value'=>function($data){return Html::img($data->img_after,['alt' => $data->name, 'style'=>'width: 120px']);}],
            'date',
            'status',
        ],
    ]) ?>

</div>
