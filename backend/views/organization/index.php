<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel common\models\OrganizationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Organizations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-index  page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Organization'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Org_ID',
            'OrganizationName',
            'MarketingOrgName',
            'Website',
            'MailingAddress',
//            'UserName',
            // 'MailingSuite_FloorNumber',
            // 'MailingCity',
            // 'MailingState',
            // 'Zipcode',
            // 'YearOfInc',
            // 'BoroughLocated',
            // 'IsActive',
            // 'CreatedDate',
            // 'ModifiedDate',

//            ['class' => 'yii\grid\ActionColumn'],
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{atinek}',
                    'buttons' => [
                        'atinek' => function ($url, $model) {
                            return Html::a('<span class="fa fa-book"></span>', $url, [
                                        'title' => Yii::t('yii', 'View Submited Servey'),
                            ]);
                        }
                    ]
                ]
            ],
    ]); ?>
<?php Pjax::end(); ?></div>
