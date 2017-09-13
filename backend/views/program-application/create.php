<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\OrganizationProgram */

$this->title = Yii::t('app', 'Create Organization Program');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organization Programs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-program-create page-content">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
