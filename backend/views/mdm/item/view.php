<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use yii\helpers\Json;
use mdm\admin\AnimateAsset;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model mdm\admin\models\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = (Yii::$app->request->isAjax)? $model->description : $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $model->getItems()
]);

$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="auth-item-view  page-content">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php /*  ?>
        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary ']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger btn-primary',
            'data-confirm' => Yii::t('rbac-admin', 'Are you sure to delete this item?'),
            'data-method' => 'post',
        ]); ?>
        <?= Html::a(Yii::t('rbac-admin', 'Create'), ['create'], ['class' => 'btn btn-success btn-primary']) ?>
        <?php */  ?>
    </p>
    <div class="row">
        <div class="col-sm-12">
            <?php 
            if(Yii::$app->request->isAjax)
        {
               echo DetailView::widget([
                'model' => $model,
                'attributes' => [
//                    'name',
                    'description:ntext',
//                    'ruleName',
//                    'data:ntext',
                ],
                'template' => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>'
            ]); 
        }
        else
        {
            echo DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
//                    'description:ntext',
//                    'ruleName',
//                    'data:ntext',
                ],
                'template' => '<tr><th style="width:25%">{label}</th><td>{value}</td></tr>'
            ]);
        }
            
            ?>
        </div>
    </div>
    <div class="row">
         <?php $form = ActiveForm::begin([
                        'options' => [
                            'id' => 'update-user-role',

                        ],
//                        'validateOnChange'     => false,
//                        'enableAjaxValidation' => true,
//                        'validateOnSubmit'     => true,
            ]); ?>
        <div class="col-sm-12">
            <div class="clearfix">

                <div class="panel-group clearfix " id="accordion" role="tablist" aria-multiselectable="true">
                    <?php 
                        $controllers = (json_decode($opts));
                        $available = (array)$controllers->items->avaliable;
                        $assigned = (array)$controllers->items->assigned;
                        $flag = false;
                        
//                        prd($controllers);
                        $controllName = '';
                        $expression = "#(\/category-type\/)#";
                        $count = 1;
                        $menus = array_merge($available, $assigned);
                        ksort($menus);
                        foreach($menus as $control => $route )
                        {
                            $checked = "";
                            if(in_array($control, array_keys($assigned)))
                            {
                                
                                $checked = 'checked';
                            }
                            
                            
                            if (substr($control, -1) == "*" ) 
                            {
                                $count++;
                                if(!preg_match("$expression", $control, $matches) && !empty($controllName))
                                {
                                    echo "  </div></div>
                                                </div>
                                            </div>";
                                }
                                $controllName = $control;
                                $controllName = rtrim($control, "* ");
                                $controllName = rtrim($controllName, "/");
                                $controllName = ltrim($controllName, "/");
                                $contorllerName = $controllName;
                                $expression = "#(\/".$controllName."\/)#"; 
                            ?>
                    <div class="panel-wrapper">
                                <div class="panel panel-default ">
                                    <div class="panel-heading" role="tab" id="headingOne<?php echo $count ?>">
                                        <h4 class="panel-title clearfix ">
                                            <div class="pull-left">
                                                <a  role="button" data-toggle="collapse" data-parent="#accordion<?php echo $count ?>" href="#collapseOne<?php echo $count ?>" aria-expanded="true" aria-controls="collapseOne">
                                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                                 </a>
                                            </div>
                                            <div class="pull-left col-sm-11">
                                                <div class="row">
                                                    
                                                    
                                                    <div class="col-sm-11 control-group checkbox clearfix">
                                                        <label class="control-label bolder col-sm-12">
                                                            
                                                            <input name="permissions[]" class="check-all " <?php echo $checked; ?>  value="<?php echo $control; ?>" type="checkbox"> 
                                                            <span class="lbl">
                                                                <?php 

                                                                    echo ucwords($contorllerName);
                                                                ?>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </h4>
                                    </div>
                                    <div id="collapseOne<?php echo $count ?>" class="panel-collapse collapse" role="tabpane<?php echo $count ?>" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                         <?php // echo $control; ?>   
                                <?php 
                                
                                }
                                else if(preg_match($expression, $control, $matches))
                                {
                                    ?>
                                            <div class="col-md-12 control-group checkbox clearfix">
                                                 <label class="control-label bolder col-sm-12">
                                                    <input name="permissions[]" class="ace" <?php echo $checked; ?>  value="<?php echo $control; ?>" type="checkbox"> 
                                                    <span class="lbl">
                                                        <?php 
                                                            $control = explode($contorllerName, $control);
                                                            $control = ltrim($control[1], "/");
                                                            echo ucwords($control);
                                                        ?>
                                                    </span>
                                                </label>
                                           </div>
                                    <?php        
                                }
                                else
                                {
//                                    echo $expression;
                                }
//                            echo $control;     
                            
                            
                        }
                        ?>
                    

                </div><!-- panel-group -->


            </div><!-- container -->
        </div>
                        
        <?php /*  ?>
        <div class="col-sm-5">
            <input class="form-control search" data-target="avaliable"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for avaliable') ?>">
            <select multiple size="20" class="form-control list" data-target="avaliable"></select>
        </div>
        <div class="col-sm-1">
            <br><br>
            <?= Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->name], [
                'class' => 'btn btn-success btn-assign',
                'data-target' => 'avaliable',
                'title' => Yii::t('rbac-admin', 'Assign')
            ]) ?><br><br>
            <?= Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->name], [
                'class' => 'btn btn-danger btn-assign',
                'data-target' => 'assigned',
                'title' => Yii::t('rbac-admin', 'Remove')
            ]) ?>
        </div>
        <div class="col-sm-5">
            <input class="form-control search" data-target="assigned"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for assigned') ?>">
            <select multiple size="20" class="form-control list" data-target="assigned"></select>
        </div>
        <?php //*/ ?>
        
        <?php ActiveForm::end(); ?>
    </div>
</div>
                <div class="form-group clearfix">
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            <?= Html::resetButton($model->isNewRecord ? Yii::t('app', 'Reset') : Yii::t('app', 'Cancel'), ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn form-close btn-primary']) ?>
        </div>
