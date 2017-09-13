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
                    

                    <div class="row">
                        <div class="space-6"></div>

                        <div class="col-sm-4 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Operating Surplus (Deficit)
                                    </h5>

                                    
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="operatingSurplus" ></div>
                                        <div class="hr hr8 hr-double"></div>

                                        
                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div>
                        </div>
                        
                        <div class="col-sm-4 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Functional Expense Mix
                                    </h5>

                                    
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="functionalExpMix" ></div>
                                        <div class="hr hr8 hr-double"></div>


                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div>
                        </div>
                        
                        <div class="col-sm-4 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Operating Revenue Mix
                                    </h5>

                                    
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="operatingRevenue" ></div>
                                        <div class="hr hr8 hr-double"></div>


                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div>
                        </div>
                        
                        <div class="col-sm-4 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Cash Balance 
                                    </h5>

                                    
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="cashBalance" ></div>
                                        <div class="hr hr8 hr-double"></div>


                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div>
                        </div>
                        
                        <div class="col-sm-4 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Months of Cash on Hand		
                                    </h5>

                                    
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="monthsCashOnHand" ></div>
                                        <div class="hr hr8 hr-double"></div>


                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div>
                        </div>
                        
                        <div class="col-sm-4 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        LUNA Balance 
                                    </h5>

                                    
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="lunaBalance" ></div>
                                        <div class="hr hr8 hr-double"></div>


                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div>
                        </div>
                        
                        <div class="col-sm-4 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        Months of LUNA	
                                    </h5>

                                    
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="monthsOfLuna" ></div>
                                        <div class="hr hr8 hr-double"></div>


                                    </div><!-- /.widget-main -->
                                </div><!-- /.widget-body -->
                            </div>
                        </div>
                        
                        
                        <div class="col-sm-4 ">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5 class="widget-title">
                                        <i class="ace-icon fa fa-signal"></i>
                                        BOARD ENGAGEMENT
                                    </h5>

                                    
                                </div>

                                <div class="widget-body">
                                    <div class="widget-main">
                                        <div id="piechart-placeholder1"></div>
                                        <div id="boardGiving" ></div>
                                        <div class="hr hr8 hr-double"></div>


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
    /**
     * Operating Surplus or (Deficit)”
     */
    $unrestrictedRevenueSupport = '';
    
    $unrestrictedRevenueSupport1 = '';
    $totalExpenses1 = '';
    $changeInUnrestrictedNetAssets1 = '';
    
    $unrestrictedRevenueSupport2 = '';
    $totalExpenses2 = '';
    $changeInUnrestrictedNetAssets2 = '';
    
    $unrestrictedRevenueSupport3 = '';
    $totalExpenses3 = '';
    $changeInUnrestrictedNetAssets3 = '';
    
    $unrestrictedRevenueSupport4 = '';
    $totalExpenses4 = '';
    $changeInUnrestrictedNetAssets4 = '';
    
    /**
     * Functional Expenses Mix
     */
    
    $functionalExpenseMix = '';
    
    $totalFundraisingExpense1 = '';
    $totalManagementGeneralExpense1 = '';
    $totalProgramExpense1 = '';
    
    $totalFundraisingExpense2 = '';
    $totalManagementGeneralExpense2 = '';
    $totalProgramExpense2 = '';
    
    $totalFundraisingExpense3 = '';
    $totalManagementGeneralExpense3 = '';
    $totalProgramExpense3 = '';
    
    $totalFundraisingExpense4 = '';
    $totalManagementGeneralExpense4 = '';
    $totalProgramExpense4 = '';
    
    /**
     * Operating Revenue Mix
     */
    $operatingRevenueMix = '';
    
    $individualContributionsRevenue1 = '';
    $foundationCorporateRevenue1 = '';
    $governmentFundingRevenue1 = '';
    $earnedIncomeRevenue1 = '';
    $otherIncomeRevenue1 = '';
    
    $individualContributionsRevenue2 = '';
    $foundationCorporateRevenue2 = '';
    $governmentFundingRevenue2 = '';
    $earnedIncomeRevenue2 = '';
    $otherIncomeRevenue2 = '';
    
    $individualContributionsRevenue3 = '';
    $foundationCorporateRevenue3 = '';
    $governmentFundingRevenue3 = '';
    $earnedIncomeRevenue3 = '';
    $otherIncomeRevenue3 = '';
    
    $individualContributionsRevenue4 = '';
    $foundationCorporateRevenue4 = '';
    $governmentFundingRevenue4 = '';
    $earnedIncomeRevenue4 = '';
    $otherIncomeRevenue4 = '';
    
    /**
     * Cash Balance
     */

    $cashBalance = '';
    
    $cashBalance1 = '';
    $cashBalance2 = '';
    $cashBalance3 = '';
    
    /**
     * Luna Balance
     */

    $lunaBalance = '';
    
    $lunaBalance1 = '';
    $lunaBalance2 = '';
    $lunaBalance3 = '';
    
    /**
     * boardGiving
     */

    $boardGiving = '';
    
    $boardGiving1 = '';
    $boardGiving2 = '';
    $boardGiving3 = '';
    
    /**
     * percentageOfBoardContributing
     */

    $percentageOfBoardContributing = '';
    
    $percentageOfBoardContributing1 = '';
    $percentageOfBoardContributing2 = '';
    $percentageOfBoardContributing3 = '';
    
    /**
     * Months of Cash on Hand
     */

    $monthsCashOnHand = '';
    
    $monthsCashOnHand1 = '';
    $monthsCashOnHand2 = '';
    $monthsCashOnHand3 = '';
    
    /**
     * Months of Cash on Hand
     */

    $monthsOfLuna = '';
    
    $monthsOfLuna1 = '';
    $monthsOfLuna2 = '';
    $monthsOfLuna3 = '';
    
    
    
    foreach($prevData as $data)
    {
        
        /**
        * Operating Surplus or (Deficit)”
        */
        if($data->Ftat_Question_Id == 1)
        {
            
                $unrestrictedRevenueSupport1 .=   "".removeDollar($data->Prev_3yrs_Stat).", ";
                $unrestrictedRevenueSupport2 .=   "".removeDollar($data->Prev_2yrs_Stat).", ";
                $unrestrictedRevenueSupport3 .=   "".removeDollar($data->Prev_1yrs_Stat).",";
                $unrestrictedRevenueSupport4 .=   "".removeDollar($data->Curr_Yr_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 2)
        {
            
                $totalExpenses1 .=   "".removeDollar($data->Prev_3yrs_Stat).", ";
                $totalExpenses2 .=   "".removeDollar($data->Prev_2yrs_Stat).", ";
                $totalExpenses3 .=   "".removeDollar($data->Prev_1yrs_Stat).",";
                $totalExpenses4 .=   "".removeDollar($data->Curr_Yr_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 3)
        {
            
                $changeInUnrestrictedNetAssets1 .=   "".removeDollar($data->Prev_3yrs_Stat).", ";
                $changeInUnrestrictedNetAssets2 .=   "".removeDollar($data->Prev_2yrs_Stat).", ";
                $changeInUnrestrictedNetAssets3 .=   "".removeDollar($data->Prev_1yrs_Stat).",";
                $changeInUnrestrictedNetAssets4 .=   "".removeDollar($data->Curr_Yr_Stat).",";
        }
        
        
        /**
        * Functional Expenses Mix
        */
        if($data->Ftat_Question_Id == 20)
        {
            
                $totalFundraisingExpense1 .=   "".removePercentage($data->Prev_3yrs_Stat).", ";
                $totalFundraisingExpense2 .=   "".removePercentage($data->Prev_2yrs_Stat).", ";
                $totalFundraisingExpense3 .=   "".removePercentage($data->Prev_1yrs_Stat).",";
                $totalFundraisingExpense4 .=   "".removePercentage($data->Curr_Yr_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 18)
        {
            
                $totalManagementGeneralExpense1 .=   "".removePercentage($data->Prev_3yrs_Stat).", ";
                $totalManagementGeneralExpense2 .=   "".removePercentage($data->Prev_2yrs_Stat).", ";
                $totalManagementGeneralExpense3 .=   "".removePercentage($data->Prev_1yrs_Stat).",";
                $totalManagementGeneralExpense4 .=   "".removePercentage($data->Curr_Yr_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 16)
        {
                
                $totalProgramExpense1 .=   "".removePercentage($data->Prev_3yrs_Stat).", ";
                $totalProgramExpense2 .=   "".removePercentage($data->Prev_2yrs_Stat).", ";
                $totalProgramExpense3 .=   "".removePercentage($data->Prev_1yrs_Stat).",";
                $totalProgramExpense4 .=   "".removePercentage($data->Curr_Yr_Stat).",";
        }
        /**
        * Operating Revenue Mix
        */
        if($data->Ftat_Question_Id == 5)
        {
                
                $individualContributionsRevenue1 .=   "".removePercentage($data->Prev_3yrs_Stat).", ";
                $individualContributionsRevenue2 .=   "".removePercentage($data->Prev_2yrs_Stat).", ";
                $individualContributionsRevenue3 .=   "".removePercentage($data->Prev_1yrs_Stat).",";
                $individualContributionsRevenue4 .=   "".removePercentage($data->Curr_Yr_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 8)
        {
                
                $foundationCorporateRevenue1 .=   "".removePercentage($data->Prev_3yrs_Stat).", ";
                $foundationCorporateRevenue2 .=   "".removePercentage($data->Prev_2yrs_Stat).", ";
                $foundationCorporateRevenue3 .=   "".removePercentage($data->Prev_1yrs_Stat).",";
                $foundationCorporateRevenue4 .=   "".removePercentage($data->Curr_Yr_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 10)
        {
                
                $governmentFundingRevenue1 .=   "".removePercentage($data->Prev_3yrs_Stat).", ";
                $governmentFundingRevenue2 .=   "".removePercentage($data->Prev_2yrs_Stat).", ";
                $governmentFundingRevenue3 .=   "".removePercentage($data->Prev_1yrs_Stat).",";
                $governmentFundingRevenue4 .=   "".removePercentage($data->Curr_Yr_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 12)
        {
                
                $earnedIncomeRevenue1 .=   "".removePercentage($data->Prev_3yrs_Stat).", ";
                $earnedIncomeRevenue2 .=   "".removePercentage($data->Prev_2yrs_Stat).", ";
                $earnedIncomeRevenue3 .=   "".removePercentage($data->Prev_1yrs_Stat).",";
                $earnedIncomeRevenue4 .=   "".removePercentage($data->Curr_Yr_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 14)
        {
                
                $otherIncomeRevenue1 .=   "".removePercentage($data->Prev_3yrs_Stat).", ";
                $otherIncomeRevenue2 .=   "".removePercentage($data->Prev_2yrs_Stat).", ";
                $otherIncomeRevenue3 .=   "".removePercentage($data->Prev_1yrs_Stat).",";
                $otherIncomeRevenue4 .=   "".removePercentage($data->Curr_Yr_Stat).",";
        }
        /**
        * Cash Balance
        */
        if($data->Ftat_Question_Id == 30)
        {
            
                $cashBalance1 .=   "".removeDollar($data->Prev_3yrs_Stat).", ";
                $cashBalance2 .=   "".removeDollar($data->Prev_2yrs_Stat).", ";
                $cashBalance3 .=   "".removeDollar($data->Prev_1yrs_Stat).",";
                
        }
        /**
        * Luna Balance
        */
        
        if($data->Ftat_Question_Id == 26)
        {
                $lunaBalance1 .=   "".removeDollar($data->Prev_3yrs_Stat).", ";
                $lunaBalance2 .=   "".removeDollar($data->Prev_2yrs_Stat).", ";
                $lunaBalance3 .=   "".removeDollar($data->Prev_1yrs_Stat).",";
        }
        
        if($data->Ftat_Question_Id == 34)
        {
                $boardGiving1 .=   "".removeDollar($data->Prev_3yrs_Stat).", ";
                $boardGiving2 .=   "".removeDollar($data->Prev_2yrs_Stat).", ";
                $boardGiving3 .=   "".removeDollar($data->Prev_1yrs_Stat).",";
        }
        /**
         * Months of Cash in Hand
         */
        if($data->Ftat_Question_Id == 32)
        {
                $monthsCashOnHand1 .=   "".removeDollar($data->Prev_3yrs_Stat).", ";
                $monthsCashOnHand2 .=   "".removeDollar($data->Prev_2yrs_Stat).", ";
                $monthsCashOnHand3 .=   "".removeDollar($data->Prev_1yrs_Stat).",";
        }
        /**
         * Months of LUNA
         */
        if($data->Ftat_Question_Id == 29)
        {
                $monthsOfLuna1 .=   "".removeDollar($data->Prev_3yrs_Stat).", ";
                $monthsOfLuna2 .=   "".removeDollar($data->Prev_2yrs_Stat).", ";
                $monthsOfLuna3 .=   "".removeDollar($data->Prev_1yrs_Stat).",";
        }
    }
    function removeDollar($num)
    {
        $num = str_replace(')', '', $num);
        $num = str_replace('(', '-', $num);
        return str_replace('$', '', $num);
    }

    function removePercentage($num)
    {
        $num = str_replace(')', '', $num);
        $num = str_replace('(', '-', $num);
        return str_replace('%', '', $num);
    }
    
    $unrestrictedRevenueSupport = " "
            . ""
            . " ['2017', $unrestrictedRevenueSupport1 $totalExpenses1 $changeInUnrestrictedNetAssets1 ],
                ['2016', $unrestrictedRevenueSupport2 $totalExpenses2 $changeInUnrestrictedNetAssets2 ],
                ['2015', $unrestrictedRevenueSupport3 $totalExpenses3 $changeInUnrestrictedNetAssets3 ],
                ['2014', $unrestrictedRevenueSupport4 $totalExpenses4 $changeInUnrestrictedNetAssets4 ],
                 ";
    
//    prd($unrestrictedRevenueSupport);
    
    $functionalExpenseMix = " "
            . ""
            . " ['2017', $totalProgramExpense1 $totalManagementGeneralExpense1  $totalFundraisingExpense1],
                ['2016', $totalProgramExpense2 $totalManagementGeneralExpense2  $totalFundraisingExpense2 ],
                ['2015', $totalProgramExpense3 $totalManagementGeneralExpense3  $totalFundraisingExpense3 ],
                ['2014', $totalProgramExpense4 $totalManagementGeneralExpense4  $totalFundraisingExpense4 ],
                 ";
    
   
    
    $operatingRevenueMix = " "
            . ""
            . " ['2017', $individualContributionsRevenue1 $foundationCorporateRevenue1  $governmentFundingRevenue1 $earnedIncomeRevenue1 $otherIncomeRevenue1],
                ['2016', $individualContributionsRevenue2 $foundationCorporateRevenue2  $governmentFundingRevenue2 $earnedIncomeRevenue2 $otherIncomeRevenue2],
                ['2015', $individualContributionsRevenue3 $foundationCorporateRevenue3  $governmentFundingRevenue3 $earnedIncomeRevenue3 $otherIncomeRevenue3],
                ['2014', $individualContributionsRevenue4 $foundationCorporateRevenue4  $governmentFundingRevenue4 $earnedIncomeRevenue4 $otherIncomeRevenue4],
                 ";
    $cashBalance = " "
            . ""
            . " 
                ['2016', $cashBalance1 ],
                ['2015', $cashBalance2 ],
                ['2014', $cashBalance3 ],
                 ";
    
    $lunaBalance = " "
            . ""
            . " 
                ['2016', $lunaBalance1 ],
                ['2015', $lunaBalance2 ],
                ['2014', $lunaBalance3 ],
                 ";
    $boardGiving = " "
            . ""
            . " 
                ['2016', $boardGiving1 ],
                ['2015', $boardGiving2 ],
                ['2014', $boardGiving3 ],
                 ";
    
    $monthsCashOnHand = " "
            . ""
            . " 
                ['2016', $monthsCashOnHand1 ],
                ['2015', $monthsCashOnHand2 ],
                ['2014', $monthsCashOnHand3 ],
                 ";
    
    $monthsOfLuna = " "
            . ""
            . " 
                ['2016', $monthsOfLuna1 ],
                ['2015', $monthsOfLuna2 ],
                ['2014', $monthsOfLuna3 ],
                 ";
//    prd($boardGiving);
//    prd(trim($lunaBalance));
?>
    
<?php
        $this->registerJs(''
                
                . "
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(operatingSurplus);
                    google.charts.setOnLoadCallback(functionalExpMix);
                    google.charts.setOnLoadCallback(operatingRevenueMix);
                    google.charts.setOnLoadCallback(cashBalance);
                    google.charts.setOnLoadCallback(lunaBalance);
                    google.charts.setOnLoadCallback(boardGiving);
                    google.charts.setOnLoadCallback(monthsCashOnHand);
                    google.charts.setOnLoadCallback(monthsOfLuna);
                    
                    function operatingSurplus() {
                        // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                         ['Year', 'Unrestricted Revenue & Support', 'Total Expenses', 'Change in Unrestricted Net Assets or “Operating Surplus or (Deficit)”'],
                         
                         $unrestrictedRevenueSupport
                        ]);

                        var options = {
                            title : 'Operating Surplus (Deficit)',
                            vAxis: {
                                minValue: 0,
                                
                                format: '\'$\'#',
                            } ,
//                             bar: { groupWidth: '100%' },
                            legend: {position: 'bottom', maxLines: 3, minLines: 3},
                            height: 300,
                            seriesType: 'bars',
                            series: {2: {type: 'line'}},
                            colors:['#54B948','#057FCC'],

                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('operatingSurplus'));
                        chart.draw(data, options);
                    };
                
                

                    function functionalExpMix() {
                          // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                           ['Year',  'Total Management & General Expense', 'Total Program Expense', 'Total Fundraising Expense',],
                           $functionalExpenseMix
                        ]);

                        var options = {
                            title : 'Functional Expense Mix',
                            vAxis: {
                                minValue: 0,
                                maxValue: 100,
                                format: '#\'%\'',
                            } ,
                            legend: {position: 'bottom', maxLines: 3, minLines: 3},
                            height: 300,
                            seriesType: 'bars',
                            isStacked : true,
                            colors:['#057FCC', '#D9DA55', '#54B948'],

                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('functionalExpMix'));
                        chart.draw(data, options);
                    };
                    

                    function operatingRevenueMix() {
                          // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                           ['Year', 'Individual Contributions Revenue', 'Foundation/Corporate Revenue', 'Government Funding', 'Earned Income', 'Other Income'],
                            $operatingRevenueMix
                        ]);

                        var options = {
                          title : 'Operating Revenue Mix',
                          legend: {position: 'bottom', maxLines: 3, minLines: 3},
                            height: 300,
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('operatingRevenue'));
                        chart.draw(data, options);
                    };
                    
                    
                    function cashBalance() {
                          // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                           ['Year', 'Individual Contributions Revenue'],
                            $cashBalance
                        ]);

                        var options = {
                            title : 'Cash Balance',
                            seriesType: 'bars',
                            legend: {position: 'bottom', maxLines: 3, minLines: 3},
                            height: 300,
                            colors:['#54B948'],
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('cashBalance'));
                        chart.draw(data, options);
                    };
                    
                    function lunaBalance() {
                          // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                           ['Year', 'Luna Balance'],
                            $lunaBalance
                        ]);

                        var options = {
                            title : 'LUNA Balance',
                            seriesType: 'bars',
                            legend: {position: 'bottom', maxLines: 3, minLines: 3},
                            height: 300,
                            colors:['#54B948'],
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('lunaBalance'));
                        chart.draw(data, options);
                    };
                    
                    function boardGiving() {
                          // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                           ['Year', 'Luna Balance'],
                            $boardGiving
                        ]);

                        var options = {
                            title : 'Board Giving',
                            seriesType: 'bars',
                            legend: {position: 'bottom', maxLines: 3, minLines: 3},
                            height: 300,
                            colors:['#54B948'],
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('boardGiving'));
                        chart.draw(data, options);
                    };
                    
                    function monthsCashOnHand() {
                          // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                           ['Year', 'Months of Cash on Hand'],
                            $monthsCashOnHand
                        ]);

                        var options = {
                            title : 'Months of Cash on Hand',
                            legend: {position: 'bottom', maxLines: 3, minLines: 3},
                            height: 300,
                            colors:['#54B948'],
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('monthsCashOnHand'));
                        chart.draw(data, options);
                    };
                    function monthsOfLuna() {
                          // Some raw data (not necessarily accurate)
                        var data = google.visualization.arrayToDataTable([
                           ['Year', 'Months of LUNA'],
                            $monthsOfLuna
                        ]);

                        var options = {
                            title : 'Months of LUNA',
                            legend: {position: 'bottom', maxLines: 3, minLines: 3},
                            height: 300,
                            colors:['#54B948'],
                          
                        };

                        var chart = new google.visualization.ComboChart(document.getElementById('monthsOfLuna'));
                        chart.draw(data, options);
                    };
                "
             
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
