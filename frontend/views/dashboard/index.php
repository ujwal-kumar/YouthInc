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
<!--            <div class="ace-settings-container" id="ace-settings-container">
                <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
                    <i class="ace-icon fa fa-cog bigger-130"></i>
                </div>

                <div class="ace-settings-box clearfix" id="ace-settings-box">
                    <div class="pull-left width-50">
                        <div class="ace-settings-item">
                            <div class="pull-left">
                                <select id="skin-colorpicker" class="hide">
                                    <option data-skin="no-skin" value="#438EB9">#438EB9</option>
                                    <option data-skin="skin-1" value="#222A2D">#222A2D</option>
                                    <option data-skin="skin-2" value="#C6487E">#C6487E</option>
                                    <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
                                </select>
                            </div>
                            <span>&nbsp; Choose Skin</span>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
                            <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
                            <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
                            <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
                            <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
                            <label class="lbl" for="ace-settings-add-container">
                                Inside
                                <b>.container</b>
                            </label>
                        </div>
                    </div> /.pull-left 

                    <div class="pull-left width-50">
                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
                            <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
                            <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
                        </div>

                        <div class="ace-settings-item">
                            <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
                            <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
                        </div>
                    </div> /.pull-left 
                </div> /.ace-settings-box 
            </div> /.ace-settings-container -->

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
                                <b>Pie Chart</b>
                            </a>
                            
                            <a href="<?php echo Yii::$app->request->baseUrl; ?>/dashboard/barchart">
                                Bar Chart
                            </a>
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
                        
                        if(!empty($data))
                        {
//                        prd(json_decode($data, true));
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
                                    if($value['SURVEYSTATUS']  == 'Initiated')
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
                                            <button class="btn btn-minier btn-primary" disabled>
                                                This Year
                                                <i class="ace-icon fa fa-angle-down icon-on-right bigger-110"></i>
                                            </button>

                                            <ul   class="dropdown-menu dropdown-menu-right dropdown-125 dropdown-lighter dropdown-close dropdown-caret">
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
                            </div>
                        </div>

                        <div class="vspace-12-sm"></div>

<!--                       
                    </div><!-- /.row -->

                    <div class="hr hr32 hr-dotted"></div>


                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
        </div>
        
    
<?php
        $this->registerJs(''
                . ''
                . "// Load Charts and the corechart package.
                        google.charts.load('current', {'packages':['corechart']});

                        // Draw the pie chart for Sarah's pizza when Charts is loaded.
                        google.charts.setOnLoadCallback(drawSarahChart);

                        // Draw the pie chart for the Anthony's pizza when Charts is loaded.
                        google.charts.setOnLoadCallback(drawAnthonyChart);

                        // Callback that draws the pie chart for Sarah's pizza.
                        function drawSarahChart() {

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
                          var chart = new google.visualization.PieChart(document.getElementById('Sarah_chart_div'));
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
