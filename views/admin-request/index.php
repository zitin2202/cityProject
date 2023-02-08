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
            <th scope="col">Пользователь</th>
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
        foreach ($requests as $request){
            echo "<tr>";
            echo "<td>" .  $request->getUser()->one()->name ."</td>";
            echo "<td>" .  $request->name ."</td>";
            echo "<td>" .  $request->description ."</td>";
            echo "<td>" .  $request->getCategory()->one()->name ."</td>";
            echo "<td>" .  Html::img($request->img, ['alt' => $request->name, 'style' => 'width: 120px']) ."</td>";
            echo "<td>" .  $request->date ."</td>";
            echo "<td>" .  $request->status ."</td>";
            echo "<td>";
            if ($request->status == "Новая"){
                echo Html::a("Изменить", ["update",'id'=>$request->id],['class'=>"btn btn-warning",]);
                echo "<br> <p></p>";
            }
            echo Html::a("Просмотреть", ["view",'id'=>$request->id],['class'=>"btn btn-primary"]);

            echo "</td>";
            echo "</tr>";

        }
        ?>
        </tbody>

    </table>


</div>
