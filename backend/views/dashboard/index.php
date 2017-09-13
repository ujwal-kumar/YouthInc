<?php 

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
   $this->title = Yii::t('app', 'Dashboard YouthInc');
    $this->params['breadcrumbs'][] = $this->title;
?>


<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        
        <li class="active"><i class="ace-icon fa fa-home home-icon"></i> Dashboard</li>
    </ul><!-- /.breadcrumb -->



</div>

<div class="page-content">


    <div class="page-header">
        <h1>
            <strong>Dashboard</strong>  
<!--                    <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                overview &amp; stats
            </small>-->
        </h1>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <div class="row">

                <div class="col-sm-6 pull-right text-right">
                    <?php if(Yii::$app->controller->action->id == "index"): ?>
                    <a href="<?php echo Yii::$app->request->baseUrl; ?>/dashboard/barchart">
                        <b>Bar Chart</b>
                    </a>
                     <?php endif; ?>


                </div>
                <div class="space-6"></div>
                <div class="space-6"></div>
            </div>
            <?php 
            $org = '';

                 $count = 0;
                $total_records = 0;
                $completed = 0;
                $initiated = 0;
                $inprogress = 0;

                $chartColor = '';

                if(!empty(json_decode($data, true)))
                {

                    foreach(json_decode($data, true) as $key => $value)
                    {
                        if(!empty($value['SURVEYSTATUS']))
                        {
                            if($value['SURVEYSTATUS']  == 'Completed')
                            {
                                $completed = $value['COUNT'];
                                $color = '#109618';
                                $chartColor .= "'#109618',";
                            }   
                            if(trim($value['SURVEYSTATUS'])  == 'Application Sent')
                            {
                                $initiated = $value['COUNT'];

                                $color = '#E37F64';
                                $chartColor .= "'#E37F64',";
                            }
                            if($value['SURVEYSTATUS']  == 'InProgress')
                            {
                                $inprogress = $value['COUNT'];
                                $color = '#58ADDB';
                                $chartColor .= "'#58ADDB',";
                            }

                            $org .="['".$value['SURVEYSTATUS']."',".$value['COUNT']."],";

                        }

        //              $total_records = $total_records + $value['COUNT'];
                        $count++;         
//                            print_r($value);
                    }
                }
            ?>

            <div class="row">
                <div class="space-6"></div>

                <div class="col-sm-12 ">
                    <div class="widget-box">
                        <div class="widget-header widget-header-flat widget-header-small">
                            <h5 class="widget-title">
                                <i class="ace-icon fa fa-signal"></i>
                                Survey Report
                            </h5>

                            <div class="widget-toolbar no-border">
                                <div class="inline dropdown-hover">

                                </div>
                            </div>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">
                                <div id="piechart-placeholder1"></div>
                                <div id="pi_chart_div" >
                                    <div class="text-center">
                                        <img  src="<?php echo Yii::$app->request->baseUrl; ?>/images/ajax-loader.gif" alt="" >
                                    </div>
                                </div>
                                <div class="hr hr8 hr-double"></div>

                                <div class="clearfix">
                                    <div class="grid3">
                                        <h5 class="pull-left" style="color: #109618">
                                            <b>Completed </b>
                                            &nbsp; 
                                        </h5>
                                        <h5 class=" pull-right"><?php echo $completed ?></h5>
                                    </div>

                                    <div class="grid3">
                                        <h5 class="pull-left" style="color: #E37F64">
                                            <b>Application Sent</b>
                                            &nbsp; 
                                        </h5>
                                        <h5 class=" pull-right"><?php echo  $initiated ?></h5>
                                    </div>

                                    <div class="grid3">
                                        <h5 class="pull-left" style="color: #58ADDB">
                                            <b>InProgress</b>
                                        </h5>
                                        <h5 class="bigger pull-right"><?php echo $inprogress ?></h5>
                                    </div>
                                </div>
                            </div><!-- /.widget-main -->
                        </div><!-- /.widget-body -->
                    </div>
                </div>

                <div class="vspace-12-sm"></div>



            <div class="hr hr32 hr-dotted"></div>


            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</div><!-- /.page-content -->
</div>
        
    
<?php
$this->registerJs('$(".drop-model-youth").click(function(){ 
        $(this).toggleClass("open")
    });'
                
                . "// Load Charts and the corechart package.
                        google.charts.load('current',   {'packages':['corechart']});

                        // Draw the pie chart for Sarah's pizza when Charts is loaded.
                        google.charts.setOnLoadCallback(drawPiChart);

                        // Draw the pie chart for the Anthony's pizza when Charts is loaded.
//                        google.charts.setOnLoadCallback(drawAnthonyChart);

                        // Callback that draws the pie chart for Sarah's pizza.
                        function drawPiChart() {

                          // Create the data table for Sarah's pizza.
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Topping');
                          data.addColumn('number', 'Slices');
                          

                          data.addRows([
                            ".$org."
                          ]);

                          // Set options for Sarah's pie chart.
                          var options = {
                            //title:'How many organisation has completed survey',
                                         width: '100%',
                                        height: 500,
                                        colors: [$chartColor]
                                         };

                          // Instantiate and draw the chart for Sarah's pizza.
                          var chart = new google.visualization.PieChart(document.getElementById('pi_chart_div'));
                          chart.draw(data, options);
                        }

                        // Callback that draws the pie chart for Anthony's pizza.
                        function drawAnthonyChart() {

                          // Create the data table for Anthony's pizza.
                          var data = new google.visualization.DataTable();
                          data.addColumn('string', 'Topping');
                          data.addColumn('number', 'Slices');
                          data.addRows([
                            ['Mushrooms', 2],
                            ['Onions', 2],
                            ['Olives', 2],
                            ['Zucchini', 0],
                            ['Pepperoni', 3]
                          ]);

                          // Set options for Anthony's pie chart.
                          var options = {title:'How Much Pizza Anthony Ate Last Night',
                                         width:400,
                                         height:300};

                          // Instantiate and draw the chart for Anthony's pizza.
                          var chart = new google.visualization.PieChart(document.getElementById('Anthony_chart_div'));
                          chart.draw(data, options);
                        }"
        . ""
             
                . '', \yii\web\VIEW::POS_READY);
    ?>

