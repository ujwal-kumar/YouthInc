<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
use common\models\Users;
use common\models\Organization;
/* @var $this yii\web\View */
/* @var $searchModel common\models\NotificationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Messages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="message-index page-content">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php Html::a(Yii::t('app', 'Create Message'), ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Message_Id',
            'Message_Content',
            [
                'attribute' => 'User_Id',
                'label'     => 'Organization', 
                'value'     => function ($model, $index, $widget) { 
                                
                                    return $model->uploadedBy->organization->Organization_Name; 
                                
                
                },
                'filter'    =>ArrayHelper::map(Organization::find()->asArray()->all(), 'Organization_Id', 'Organization_Name'),
            ],
            [
                'attribute' => 'User_Id',
                'label'     => 'User', 
                'value'     => function ($model, $index, $widget) { 
                                if(!empty($model->Uploaded_By))
                                    return $model->uploadedBy->User_Name; 
                                else
                                    return '-'; 
                
                },
                'filter'    =>ArrayHelper::map(Users::find()->asArray()->all(), 'User_id', 'User_Name'),
            ],
            'Status',
//            'Created_Date',
            // 'Last_Modified_Date',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
