<?php
/* @var $this yii\web\View */

?>
  

<!-- BREADCRUMBS -->
<div class="page-content">
    <div class="contai ner">
      <div class="row">
            <div class="col-xs-12">  <br>
                <br>
                <br>
                <br>
                <br>
                <br>

                <h3>Welcome to the Youth INC Partner Network Application</h3>
                <b>Please refer to the application instructions</b> (emailed with your application link ) while completing your
                application.
                <br>
                <br>
                Please note that <b>additional required materials</b> must be emailed to Partnernetwork@youthinc-usa.org by your
                application deadline. Please see your application instructions for a checklist of items.
                <br>
                <br>
                It is highly recommended that you review the word document template of the application included in the
                application materials folder. You will be able to easily review the full application, as well as craft your answers
                which you can then copy and paste into the online form. You can find this word document attached in the email
                providing your application link.

                <br>
                <br>
                For questions please contact Lauren Elicks McCort at lemccort@youthinc-usa.org or 212-401-4059.

                <br>
                <br>
                <br>
            </div>
      </div>  

        <div class="row-fluid">
            <div class="pull-right">
                <a  class="btn btn-primary svy-next" href="<?php echo Yii::$app->request->baseUrl; ?>/survey/index/1">Next</a>
            </div>
        </div>
    </div>
</div>

<?php
    
    $this->registerJs(''
            . '$(".svy-next").click(function(){'
                . ''
            . '})'
            . '', \yii\web\VIEW::POS_READY);
?>


