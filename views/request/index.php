<?php

use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;

$reguests = $dataProvider->getModels();

?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th scope="col">Запрос</th>
            <th scope="col">Описание</th>
            <th scope="col">Категория</th>
            <th scope="col">Фото</th>
            <th scope="col">Дата</th>
            <th scope="col">Статус</th>
            <th scope="col">Действия</th>


        </tr>
        </thead>
        <tbody>

        <?php
            foreach ($reguests as $reguest){
                echo "<tr>";
                    echo "<td>" .  $reguest->name ."</td>";
                    echo "<td>" .  $reguest->description ."</td>";
                    echo "<td>" .  $reguest->getCategory()->one()->name ."</td>";
                    echo "<td>" .  Html::img($reguest->img, ['alt' => $reguest->name, 'style' => 'width: 120px']) ."</td>";
                    echo "<td>" .  $reguest->date ."</td>";
                    echo "<td>" .  $reguest->status ."</td>";
                    echo "<td>";                   
                    if ($reguest->status == "Новая"){
                        echo Html::a("Удалить", ["delete",'id'=>$reguest->id],['class'=>"btn btn-danger",
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ]]);
                        echo "<br> <p></p>";
                    }
                    echo Html::a("Просмотреть", ["view",'id'=>$reguest->id],['class'=>"btn btn-primary"]);

                    echo "</td>";
                echo "</tr>";

            }
            ?>
            </tbody>

        </table>


</div>


