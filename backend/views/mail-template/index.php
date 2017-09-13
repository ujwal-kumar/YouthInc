<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\MailTemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mail Templates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mail-template-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Mail Template'), ['create'], ['class' => 'btn  btn-primary  btn-create']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'Mail_Id',
            'Template_Name',
            'Template_Slug',
            'Mail_Sender',
            'Mail_Subject',
//            'Mail_Body:ntext',
//            'Created_Date',
            // 'Last_Modified_Date',

            ['class' => 'yii\grid\ActionColumn',
                        'template' => ' {view} {update} ',
                        'header' => 'Actions',
                'buttons' => [
                    'view' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-eye-open text-primary"></span>', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'target' => '_blank',
                                    'class' => 'model-view'
                                ]);
                    },
                    'update' => function ($url, $model) {
                        
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'title' => Yii::t('yii', 'Update'),
                                    'target' => '_blank',
                                    'class' => 'model-update'
                                ]);
                    }

                ]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
<?= $this->render('/common/popup.php'); ?>
</div>
