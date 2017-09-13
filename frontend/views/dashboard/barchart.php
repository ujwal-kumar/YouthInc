<?php 
   $this->title = Yii::t('app', 'Dashboard YouthInc');
    $this->params['breadcrumbs'][] = $this->title;
?>


<div class="breadcrumbs ace-save-state" id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="ace-icon fa fa-home home-icon"></i>
            <a href="<?php echo Yii::$app->request->baseUrl; ?>/dashboard">Home</a>
        </li>
        <li class="active">Dashboard</li>
    </ul><!-- /.breadcrumb -->


<!--                    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="ace-icon fa fa-search nav-search-icon"></i>
            </span>
        </form>
    </div> /.nav-search -->
</div>

        <div class="page-content">


            <div class="page-header">
                <h1>
                    <strong>Dashboard</strong>  
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        overview &amp; stats
                    </small>
                </h1>
            </div><!-- /.page-header -->

            <div class="row">
                <div class="col-xs-12">
                    <div class="row">
                        
                        <div class="col-sm-6 pull-right text-right">
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/dashboard/">
                                Pie Chart
                            </a>
                            
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/dashboard/barchart">
                                <strong>Bar Chart</strong>
                            </a>
                        </div>
                        <div class="space-6"></div>
                        <div class="space-6"></div>
                    </div>
                    <?php 
                    $org = '';
                    $chartLable = "[";
                    $chartVal = "[";
                    $chart = '';    
                        $count = 0;
                        $total_records = 0;
                        $completed = 0;
                        $initiated = 0;
                        $inprogress = 0;
                        if(!empty($data))
                        {
                            foreach(json_decode($data, true) as $key => $value)
                            {
                                if(!empty($value['SURVEYSTATUS']))
                                {
                                    if($value['SURVEYSTATUS']  == 'Completed')
                                    {
                                        $completed = $value['COUNT'];
                                        $color = '#109618';
                                    }   
                                    if($value['SURVEYSTATUS']  == 'Initiated')
                                    {
                                        $initiated = $value['COUNT'];

                                        $color = '#E37F64';
                                    }
                                    if($value['SURVEYSTATUS']  == 'InProgress')
                                    {
                                        $inprogress = $value['COUNT'];
                                        $color = '#58ADDB';
                                    }
                                    $chartLable .= "'".$value['SURVEYSTATUS']."',";
                                    $chart .= "['".$value['SURVEYSTATUS']."',".$value['COUNT'].", '$color'],";
                                    $chartVal .= $value['COUNT'].',';
                                    $total_records = $total_records + $value['COUNT'];
                                }
                                $count++;         
    //                            print_r($value);
                            }
                        }
                        $chartLable .= "'Another',";
                    $chartLable .= "]";
                    $chartVal .= "]";

                    ?>

                    <div class="row">
                        <div class="space-6"></div>

<!--                        <div class="col-sm-6 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Survey Report
                                    </h5>

                                    <div class="widget-toolbar no-border">
                                        <div class="inline dropdown-hover">
                                            <button class="btn btn-minier btn-primary">
                                                This Year
                                                <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                                                <li class="active">
                                                    <a href="#" class="blue">
                                                        <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                                                        This Year
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        Last Week
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        This Month
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        Last Month
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="Sarah_chart_div" ></div>
                                        <div class="hr hr8 hr-double"></div>

                                        <div class="clearfix">
                                            <div class="grid3">
                                                <span class="grey">
                                                    Completed 
                                                    &nbsp; 
                                                </span>
                                                <h5 class=" pull-right">2</h5>
                                            </div>

                                            <div class="grid3">
                                                <span class="grey">
                                                    Initiated
                                                    &nbsp; 
                                                </span>
                                                <h5 class=" pull-right">1</h5>
                                            </div>

                                            <div class="grid3">
                                                <span class="grey">
                                                    InProgress
                                                </span>
                                                <h5 class="bigger pull-right">1</h5>
                                            </div>
                                        </div>
                                    </div> /.widget-main 
                                </div> /.widget-body 
                            </div>
                        </div>-->

                        <div class="vspace-12-sm"></div>

                        <div class="col-sm-12">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Survey Report
                                    </h5>

                                    <div class="widget-toolbar no-border">
                                        <div class="inline dropdown-hover">
                                            <button class="btn btn-minier btn-primary" disabled="disabled">
                                                20/5/2014
                                                <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
                                                <li class="active">
                                                    <a href="#" class="blue">
                                                        <i class="ace-icon fa fa-caret-right bigger-110">&nbsp;</i>
                                                        20/5/2014
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        Last Week
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        This Month
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#">
                                                        <i class="ace-icon fa fa-caret-right bigger-110 invisible">&nbsp;</i>
                                                        Last Month
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder2"></div>
                                        <div id="chart_div" ></div>   
                                        <div class="hr hr6 hr-double"></div>

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
                                                    <b>Initiated</b>
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
                            </div><!-- /.widget-box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    <div class="hr hr32 hr-dotted"></div>









                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
        
    
<?php
    
        $this->registerJs(''
                . ''
                . '// Load Charts and the corechart package.
                        google.charts.load("current", {packages:["corechart"]});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                              var data = google.visualization.arrayToDataTable([
                                ["Element", "Density", { role: "style" } ],
                                 '.$chart.'
                              ]);

                              var view = new google.visualization.DataView(data);
                              view.setColumns([0, 1,
                                               { calc: "stringify",
                                                 sourceColumn: 1,
                                                 type: "string",
                                                 role: "annotation" },
                                               2]);

                              var options = {
                        //        title: "Survey Report",
                                width: "100%",
                                height: 400,
                                bar: {groupWidth: "20%"},
                                legend: { position: "none" },
                                bars: "vertical",
                                max: '.$total_records.'
                              };
                              var chart = new google.visualization.ColumnChart(document.getElementById("chart_div"));
                              chart.draw(view, options);
                          }'
                . 'jQuery(document).ready(function() { '
                    . ' '
                
                    . 'jQuery("#login-form").submit(function(){'
                    . '})'
                        
                        
                    
                . '});'
                . '', \yii\web\VIEW::POS_READY);
    ?>
<!--<div class="row clearfix">
    <div class="col-sm-12 col-md-6 col-lg-6">
         <div id="Sarah_chart_div" ></div>
    </div>

    <div class="col-sm-12 col-md-6 col-lg-6" >
       <div id="Anthony_chart_div" ></div>
    </div>
</div>-->
