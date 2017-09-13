<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ReportFtatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ftats');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ftat-index">

    <?php 
    if(!Yii::$app->request->isAjax)
    {?>
    <h1><?php echo  $this->title;  ?> </h1>
    <?php } ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ftat'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Ftat_Id',
            'Organization_Id',
            'Current_Fiscal_Year',
            'Ftat_Status',
            'Created_By',
            // 'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
