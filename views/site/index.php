<?php
use app\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<style>
    @font-face {
        font-family: 'Vogue Bold';
        src: local('Font Name'),
        url("../../assets/Vogue Bold.ttf");
    }
</style>
<div class="site-index">
    <h3 style="font-family:'Vogue Bold'">Количество решенных заявок: <ia id = "countSolvedRequests">0</ia></h3>
    <br>
    <div class="row row-cols-1 row-cols-md-4 g-3">
    <?php
        foreach($requests as $reguest){
            ?>
            <div class="card col"  style="width: 400px;height: 500px">
                <div class="card-body text-center">
                    <?=Html::img($reguest->img_after, ['alt' => $reguest->name, 'style'=>"width: 300px;height:350px; object-fit:contain ", 'id'=>"img_card$reguest->id"])?>
                    <h5 class="card-title"><?=$reguest->name?></h5>
                    <p class="card-text"><?=$reguest->description?></p>
                    <p class="card-title"><?=$reguest->date?></p>
                    <!-- <?=Html::a("Посмотреть", ['reguest/view','id'=>$reguest->id], $options = ["class"=>"btn btn-primary"])?> -->
                </div>
                <style>
                    #img_card<?=$reguest->id?>:hover{
                        content: url(<?=$reguest->img?>);
                        /*-webkit-animation: scale 10s linear infinite;*/
                    }
                    /*@keyframes scale {*/
                    /*    0% {*/
                    /*        transform: scale(0);*/
                    /*        border-radius: 50%;*/
                    /*    }*/
                    /*    10% {*/
                    /*        transform: scale(1);*/
                    /*        border-radius: 50%;*/
                    /*    }*/
                    /*    15% {*/
                    /*        border-radius: 0;*/
                    /*    }*/
                    /*    49.99999% {*/
                    /*        z-index: 1;*/
                    /*    }*/
                    /*    50% {*/
                    /*        z-index: -1;*/
                    /*    }*/
                    /*    100% {*/
                    /*        transform: scale(1);*/
                    /*        z-index: -1;*/
                    /*        border-radius: 0;*/
                    /*    }*/
                    /*}*/

                </style>
            </div>
            <?php
        }
        ?>
    </div>
    <script>
        setInterval(function (){
            countSolvedRequests();
        },5000)
    </script>
</div>

