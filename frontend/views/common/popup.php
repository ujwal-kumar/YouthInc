<div class="pop-up-dummy hidden">
    <h2>Loading...</h2>

    <div class="row-fluid dummy-content">
        <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
        <span class="sr-only">Loading...</span>
    </div> 
</div>

<!-- Form  Popup Start -->
<?php
yii\bootstrap\Modal::begin([
    'id' => 'formPopUp',
    'header' => '<h2>Loading...</h2>',
    'size' => 'modal-dialog modal-sm  ',
    'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
]);
?>
<div class="row-fluid form-ajax-content">
    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
    <span class="sr-only">Loading...</span>
</div>    
<?php
yii\bootstrap\Modal::end();
?>
<!--Form Popup End -->

<!-- Form  Popup Start -->
<?php
yii\bootstrap\Modal::begin([
    'id' => 'statusPopUp',
    'header' => '<h2>Confirmation</h2>',
    'footer' => '<div class="pull-right">
                            <a  class="btn btn-primary status-button">Ok</a>
                            <a  class="btn btn-primary popup-cancel">Cancel</a>

                        </div>',
    'size' => 'modal-dialog   ',
    'options' => ['data-keyboard' => "false", 'data-backdrop' => 'static'],
]);
?>
<div class="row-fluid ">

    <br>
    <span class="">Are you sure you want to Enable/Disabled this NPO?</span>
    <br>
    <br>

    <div class="clearfix"></div>
</div>    
<?php
yii\bootstrap\Modal::end();
?>



<!--Form Popup End -->