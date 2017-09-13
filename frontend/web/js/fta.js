$(document).ready(function () {
    DivNumericHandler();
	DivRemoveDollar();
    //1. Did your organization have an operating surplus or deficit?
    SurplusBlur();
    //2.Unrestricted Revenue
    RevenueBlur();
    //3.FoundationBlur
    FoundationBlur();
    //4.Government Funding
    GovernmentFunding();
    //5.EarnedIncome
    EarnedIncome();
    //6.Total program
    TotalProgram();
    //7.Total Management
    TotalManagement();
    //8.Total FundRaising
    TotalFundraising();
    //9.FixedAssets
    FixedAssets();
    //10.LUNA
    LUNA();
    //11.Total Annual Expense
    CashAnnualExpense();
    //12.Board Contributing
    BoardContributing();
    //13.Board Contributions Revenue
    BoardContributionFinal();
	//14.In-Kind Revenue
	InkindRevenue();
	//15.Special Events
	Specialevents();

});
function DivNumericHandler() {
    $("div").on(
        "keydown", function (event) {
            if (event.keyCode == 190 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
                (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||
                (event.ctrlKey == true && (event.which == '99' || event.which == '67')) ||
                (event.keyCode == 65 && event.ctrlKey === true) ||
                (event.keyCode >= 35 && event.keyCode <= 39)) {
                
                return;
            }
            else {
                if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105)) {
                    event.preventDefault();
                }
            }
			
        }
		
		);
}
function DivRemoveDollar() {
    $("div").on(
        "focusin",function(event){
		if($(event.target).text().indexOf('$') > -1)
		{
			$(event.target).text($(event.target).text().replace('$',''));
		}
	});
}


function TotalRevenueThreeyearsAgo() {
    CompleteTotalRevenue('UnrestrictedRevenueThreeyearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'FoundationCorporateThreeyearsAgoDiv', 'SatisfactionThreeyearsAgoDiv', 'GovernmentFundingThreeyearsAgoDiv', 'EarnedIncomeThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv', 'EarnedTotalRevenueThreeYearsAgoDiv','InKindRevenueThreeyearsAgoDiv')
}
function TotalRevenueTwoyearsAgo() {
    CompleteTotalRevenue('UnrestrictedRevenueTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'GovernmentFundingTwoYearsAgoDiv', 'EarnedIncomeTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv', 'EarnedTotalRevenueTwoYearsAgoDiv','InKindRevenueTwoYearsAgoDiv')
}
function TotalRevenueLastYear() {
    CompleteTotalRevenue('UnrestrictedRevenueLastYearsDiv', 'IndividualContributionsLastYearsDiv', 'FoundationCorporateLastYearsDiv', 'SatisfactionLastYearsDiv', 'GovernmentFundingLastYearsDiv', 'EarnedIncomeLastYearsDiv', 'OtherIncomeLastYearDiv', 'OtherIncomerevenueLastYearDiv', 'EarnedTotalRevenueLastYearsDiv','InKindRevenueLastYearsDiv')
}
function TotalRevenueCurrentYear() {
    CompleteTotalRevenue('UnrestrictedRevenueCurrentYearDiv', 'IndividualContributionsCurrentYearDiv', 'FoundationCorporateCurrentYearDiv', 'SatisfactionCurrentYearDiv', 'GovernmentFundingCurrentYearDiv', 'EarnedIncomeCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv', 'EarnedTotalRevenueCurrentYearDiv','InKindRevenueCurrentYearDiv')
}
function Specialevents(){
	$("#GrossSpecialRevenueThreeyearsAgoDiv").blur(function () {
	SpecialEventCalc('GrossSpecialRevenueThreeyearsAgoDiv','DirectEventExpenseThreeyearsAgoDiv', 'NetSpecialRevenueThreeYearsAgoDiv', 'FundRaisingefficencyThreeyearsAgoDiv');
    });

    $("#GrossSpecialRevenueTwoyearsAgoDiv").blur(function () {
        SpecialEventCalc('GrossSpecialRevenueTwoyearsAgoDiv','DirectEventExpenseTwoyearsAgoDiv', 'NetSpecialRevenueTwoYearsAgoDiv', 'FundRaisingefficencyTwoyearsAgoDiv');
    });

    $("#GrossSpecialRevenueLastyearsAgoDiv").blur(function () {
        SpecialEventCalc('GrossSpecialRevenueLastyearsAgoDiv','DirectEventExpenseLastyearsAgoDiv', 'NetSpecialRevenueLastYearsDiv', 'FundRaisingefficencyLastyearsAgoDiv');
    });
	
	
	$("#DirectEventExpenseThreeyearsAgoDiv").blur(function () {
	SpecialEventCalc('GrossSpecialRevenueThreeyearsAgoDiv','DirectEventExpenseThreeyearsAgoDiv', 'NetSpecialRevenueThreeYearsAgoDiv', 'FundRaisingefficencyThreeyearsAgoDiv');
    });

    $("#DirectEventExpenseTwoyearsAgoDiv").blur(function () {
        SpecialEventCalc('GrossSpecialRevenueTwoyearsAgoDiv','DirectEventExpenseTwoyearsAgoDiv', 'NetSpecialRevenueTwoYearsAgoDiv', 'FundRaisingefficencyTwoyearsAgoDiv');
    });

    $("#DirectEventExpenseLastyearsAgoDiv").blur(function () {
        SpecialEventCalc('GrossSpecialRevenueLastyearsAgoDiv','DirectEventExpenseLastyearsAgoDiv', 'NetSpecialRevenueLastYearsDiv', 'FundRaisingefficencyLastyearsAgoDiv');
    });

}
function SurplusBlur() {

    $("#UnrestrictedRevenueThreeyearsAgoDiv").blur(function () {
        OperatingSurplus('UnrestrictedRevenueThreeyearsAgoDiv', 'TotalExpensesThreeyearsAgoDiv', 'UnrestrictedChangeThreeYearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv', 'CashAverageMonthlyThreeYearsAgoDiv', 'TotalAverageMonthlyThreeYearsAgoDiv', 'TotalBoardAmountThreeyearsAgoDiv', 'CashEquivalentsThreeyearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'FoundationCorporateThreeyearsAgoDiv', 'SatisfactionThreeyearsAgoDiv', 'GovernmentFundingThreeyearsAgoDiv', 'EarnedIncomeThreeyearsAgoDiv', 'TotalprogramExpenseThreeyearsAgoDiv', 'TotalManagementThreeyearsAgoDiv', 'TotalFundRaisingThreeyearsAgoDiv');
        TotalRevenueThreeyearsAgo();
    });
    $("#TotalExpensesThreeyearsAgoDiv").blur(function () {
        OperatingSurplus('UnrestrictedRevenueThreeyearsAgoDiv', 'TotalExpensesThreeyearsAgoDiv', 'UnrestrictedChangeThreeYearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv', 'CashAverageMonthlyThreeYearsAgoDiv', 'TotalAverageMonthlyThreeYearsAgoDiv', 'TotalBoardAmountThreeyearsAgoDiv', 'CashEquivalentsThreeyearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'FoundationCorporateThreeyearsAgoDiv', 'SatisfactionThreeyearsAgoDiv', 'GovernmentFundingThreeyearsAgoDiv', 'EarnedIncomeThreeyearsAgoDiv', 'TotalprogramExpenseThreeyearsAgoDiv', 'TotalManagementThreeyearsAgoDiv', 'TotalFundRaisingThreeyearsAgoDiv');
        TotalRevenueThreeyearsAgo();
    });

    $("#UnrestrictedRevenueTwoYearsAgoDiv").blur(function () {
        OperatingSurplus('UnrestrictedRevenueTwoYearsAgoDiv', 'TotalExpensesTwoYearsAgoDiv', 'UnrestrictedChangeTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv', 'CashAverageMonthlyTwoYearsAgoDiv', 'TotalAverageMonthlyTwoYearsAgoDiv', 'TotalBoardAmountTwoyearsAgoDiv', 'CashEquivalentsTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'GovernmentFundingTwoYearsAgoDiv', 'EarnedIncomeTwoYearsAgoDiv', 'TotalprogramExpenseTwoYearsAgoDiv', 'TotalManagementTwoYearsAgoDiv', 'TotalFundRaisingTwoYearsAgoDiv');
        TotalRevenueTwoyearsAgo();
    });
    $("#TotalExpensesTwoYearsAgoDiv").blur(function () {
        OperatingSurplus('UnrestrictedRevenueTwoYearsAgoDiv', 'TotalExpensesTwoYearsAgoDiv', 'UnrestrictedChangeTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv', 'CashAverageMonthlyTwoYearsAgoDiv', 'TotalAverageMonthlyTwoYearsAgoDiv', 'TotalBoardAmountTwoyearsAgoDiv', 'CashEquivalentsTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'GovernmentFundingTwoYearsAgoDiv', 'EarnedIncomeTwoYearsAgoDiv', 'TotalprogramExpenseTwoYearsAgoDiv', 'TotalManagementTwoYearsAgoDiv', 'TotalFundRaisingTwoYearsAgoDiv');
        TotalRevenueTwoyearsAgo();
    });

    $("#UnrestrictedRevenueLastYearsDiv").blur(function () {
        OperatingSurplus('UnrestrictedRevenueLastYearsDiv', 'TotalExpensesLastYearsDiv', 'UnrestrictedChangeLastYearDiv', 'OtherIncomeLastYearDiv', 'OtherIncomerevenueLastYearDiv', 'CashAverageMonthlyLastYearDiv', 'TotalAverageMonthlyLastYearsDiv', 'TotalBoardAmountLastyearsAgoDiv', 'CashEquivalentsLastYearsDiv', 'IndividualContributionsLastYearsDiv', 'FoundationCorporateLastYearsDiv', 'SatisfactionLastYearsDiv', 'GovernmentFundingLastYearsDiv', 'EarnedIncomeLastYearsDiv', 'TotalprogramExpenseLastYearsDiv', 'TotalManagementLastYearsDiv', 'TotalFundRaisingLastYearsDiv');
        TotalRevenueLastYear();
    });
    $("#TotalExpensesLastYearsDiv").blur(function () {
        OperatingSurplus('UnrestrictedRevenueLastYearsDiv', 'TotalExpensesLastYearsDiv', 'UnrestrictedChangeLastYearDiv', 'OtherIncomeLastYearDiv', 'OtherIncomerevenueLastYearDiv', 'CashAverageMonthlyLastYearDiv', 'TotalAverageMonthlyLastYearsDiv', 'TotalBoardAmountLastyearsAgoDiv', 'CashEquivalentsLastYearsDiv', 'IndividualContributionsLastYearsDiv', 'FoundationCorporateLastYearsDiv', 'SatisfactionLastYearsDiv', 'GovernmentFundingLastYearsDiv', 'EarnedIncomeLastYearsDiv', 'TotalprogramExpenseLastYearsDiv', 'TotalManagementLastYearsDiv', 'TotalFundRaisingLastYearsDiv');
        TotalRevenueLastYear();
    });

    $("#UnrestrictedRevenueCurrentYearDiv").blur(function () {
        OperatingSurplus('UnrestrictedRevenueCurrentYearDiv', 'TotalExpensesCurrentYearDiv', 'UnrestrictedChangeCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv', null, null, 'IndividualContributionsCurrentYearDiv', 'FoundationCorporateCurrentYearDiv', 'SatisfactionCurrentYearDiv', 'GovernmentFundingCurrentYearDiv', 'EarnedIncomeCurrentYearDiv', 'TotalprogramExpenseCurrentYearDiv', 'TotalManagementCurrentYearDiv', 'TotalFundRaisingCurrentYearDiv');
        TotalRevenueCurrentYear();
    });
    $("#TotalExpensesCurrentYearDiv").blur(function () {
        OperatingSurplus('UnrestrictedRevenueCurrentYearDiv', 'TotalExpensesCurrentYearDiv', 'UnrestrictedChangeCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv', null, null, 'IndividualContributionsCurrentYearDiv', 'FoundationCorporateCurrentYearDiv', 'SatisfactionCurrentYearDiv', 'GovernmentFundingCurrentYearDiv', 'EarnedIncomeCurrentYearDiv', 'TotalprogramExpenseCurrentYearDiv', 'TotalManagementCurrentYearDiv', 'TotalFundRaisingCurrentYearDiv');
        TotalRevenueCurrentYear();
    });
}
function RevenueBlur() {
    $("#IndividualContributionsThreeyearsAgoDiv").blur(function () {
        UnRestrictedRevenue('UnrestrictedRevenueThreeyearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'IndividualTotalRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv');
        FoundationRevenue('FoundationCorporateThreeyearsAgoDiv', 'SatisfactionThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'CorporateRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
        TotalRevenueThreeyearsAgo();
    });

    $("#IndividualContributionsTwoYearsAgoDiv").blur(function () {
        UnRestrictedRevenue('UnrestrictedRevenueTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'IndividualTotalRevenueTwoyearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv');
        FoundationRevenue('FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'CorporateRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
        TotalRevenueTwoyearsAgo();
    });

    $("#IndividualContributionsLastYearsDiv").blur(function () {
        UnRestrictedRevenue('UnrestrictedRevenueLastYearsDiv', 'IndividualContributionsLastYearsDiv', 'IndividualTotalRevenueLastYearDiv', 'OtherIncomeLastYearDiv');
        FoundationRevenue('FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'CorporateRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
        TotalRevenueLastYear();
    });

    $("#IndividualContributionsCurrentYearDiv").blur(function () {
        UnRestrictedRevenue('UnrestrictedRevenueCurrentYearDiv', 'IndividualContributionsCurrentYearDiv', 'IndividualTotalRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv');
        FoundationRevenue('FoundationCorporateLastYearsDiv', 'SatisfactionLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'CorporateRevenueLastYearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
        TotalRevenueCurrentYear();
    });
}
function FoundationBlur() {
    $("#FoundationCorporateThreeyearsAgoDiv").blur(function () {
        FoundationRevenue('FoundationCorporateThreeyearsAgoDiv', 'SatisfactionThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'CorporateRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
        TotalRevenueThreeyearsAgo();
    });
    $("#SatisfactionThreeyearsAgoDiv").blur(function () {
        FoundationRevenue('FoundationCorporateThreeyearsAgoDiv', 'SatisfactionThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'CorporateRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
        TotalRevenueThreeyearsAgo();
    });


    $("#FoundationCorporateTwoYearsAgoDiv").blur(function () {
        FoundationRevenue('FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'CorporateRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
        TotalRevenueTwoyearsAgo();
    });
    $("#SatisfactionTwoYearsAgoDiv").blur(function () {
        FoundationRevenue('FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'CorporateRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
        TotalRevenueTwoyearsAgo();
    });

    $("#FoundationCorporateLastYearsDiv").blur(function () {
        FoundationRevenue('FoundationCorporateLastYearsDiv', 'SatisfactionLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'CorporateRevenueLastYearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
        TotalRevenueLastYear();
    });
    $("#SatisfactionLastYearsDiv").blur(function () {
        FoundationRevenue('FoundationCorporateLastYearsDiv', 'SatisfactionLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'CorporateRevenueLastYearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
        TotalRevenueLastYear();
    });

    $("#FoundationCorporateCurrentYearDiv").blur(function () {
        FoundationRevenue('FoundationCorporateCurrentYearDiv', 'SatisfactionCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'CorporateRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'IndividualContributionsCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv');
        TotalRevenueCurrentYear();
    });
    $("#SatisfactionCurrentYearDiv").blur(function () {
        FoundationRevenue('FoundationCorporateCurrentYearDiv', 'SatisfactionCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'CorporateRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'IndividualContributionsCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv');
        TotalRevenueCurrentYear();
    });

}
function GovernmentFunding() {
    $("#GovernmentFundingThreeyearsAgoDiv").blur(function () {
        GovernmentRevenue('GovernmentFundingThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'GovernmentRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'FoundationCorporateThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
        TotalRevenueThreeyearsAgo();
    });

    $("#GovernmentFundingTwoYearsAgoDiv").blur(function () {
        GovernmentRevenue('GovernmentFundingTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'GovernmentRevenueTwoyearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'FoundationCorporateTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
        TotalRevenueTwoyearsAgo();
    });

    $("#GovernmentFundingLastYearsDiv").blur(function () {
        GovernmentRevenue('GovernmentFundingLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'GovernmentRevenueLastyearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'FoundationCorporateLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
        TotalRevenueLastYear();
    });

    $("#GovernmentFundingCurrentYearDiv").blur(function () {
        GovernmentRevenue('GovernmentFundingCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'GovernmentRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'IndividualContributionsCurrentYearDiv', 'FoundationCorporateCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv');
        TotalRevenueCurrentYear();
    });



}
function EarnedIncome() {
    $("#EarnedIncomeThreeyearsAgoDiv").blur(function () {
        EarnedRevenue('EarnedIncomeThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'EarnedTotalRevenueThreeYearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'GovernmentFundingThreeyearsAgoDiv', 'FoundationCorporateThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
        TotalRevenueThreeyearsAgo();
    });

    $("#EarnedIncomeTwoYearsAgoDiv").blur(function () {
        EarnedRevenue('EarnedIncomeTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'EarnedTotalRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'GovernmentFundingTwoYearsAgoDiv', 'FoundationCorporateTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
        TotalRevenueTwoyearsAgo();
    });

    $("#EarnedIncomeLastYearsDiv").blur(function () {
        EarnedRevenue('EarnedIncomeLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'EarnedTotalRevenueLastYearsDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'GovernmentFundingLastYearsDiv', 'FoundationCorporateLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
        TotalRevenueLastYear();
    });

    $("#EarnedIncomeCurrentYearDiv").blur(function () {
        EarnedRevenue('EarnedIncomeCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'EarnedTotalRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'IndividualContributionsCurrentYearsDiv', 'GovernmentFundingCurrentYearDiv', 'FoundationCorporateCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv');
        TotalRevenueCurrentYear();
    });

}
function InkindRevenue() {
    $("#InKindRevenueThreeyearsAgoDiv").blur(function () {
        InkindRevenueCalc('InKindRevenueThreeyearsAgoDiv','InKindTotalRevenueThreeYearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv','IndividualContributionsThreeyearsAgoDiv','FoundationCorporateThreeyearsAgoDiv','SatisfactionThreeyearsAgoDiv','GovernmentFundingThreeyearsAgoDiv','EarnedIncomeThreeyearsAgoDiv');
        TotalRevenueThreeyearsAgo();
    });

    $("#InKindRevenueTwoYearsAgoDiv").blur(function () {
        InkindRevenueCalc('InKindRevenueTwoYearsAgoDiv','InKindTotalRevenueTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv','IndividualContributionsTwoYearsAgoDiv','FoundationCorporateTwoYearsAgoDiv','SatisfactionTwoYearsAgoDiv','GovernmentFundingTwoYearsAgoDiv','EarnedIncomeTwoYearsAgoDiv');
        TotalRevenueTwoyearsAgo();
    });

    $("#InKindRevenueLastYearsDiv").blur(function () {
        InkindRevenueCalc('InKindRevenueLastYearsDiv','InKindTotalRevenueLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'OtherIncomeLastYearDiv', 'OtherIncomerevenueLastYearDiv','IndividualContributionsLastYearsDiv','FoundationCorporateLastYearsDiv','SatisfactionLastYearsDiv','GovernmentFundingLastYearsDiv','EarnedIncomeLastYearsDiv');
        TotalRevenueLastYear();
    });

    $("#InKindRevenueCurrentYearDiv").blur(function () {
        InkindRevenueCalc('InKindRevenueCurrentYearDiv','InKindTotalRevenueCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv','IndividualContributionsCurrentYearDiv','FoundationCorporateCurrentYearDiv','SatisfactionCurrentYearDiv','GovernmentFundingCurrentYearDiv','EarnedIncomeCurrentYearDiv');
        TotalRevenueCurrentYear();
    });
}
function TotalProgram() {
    $("#TotalprogramExpenseThreeyearsAgoDiv").blur(function () {
        TotalEarnedRevenue('TotalprogramExpenseThreeyearsAgoDiv', 'ProgramTotalThreeYearsAgoDiv', 'TotalExpensesThreeyearsAgoDiv');
    });

    $("#TotalprogramExpenseTwoYearsAgoDiv").blur(function () {
        TotalEarnedRevenue('TotalprogramExpenseTwoYearsAgoDiv', 'ProgramTotalTwoYearsAgoDiv', 'TotalExpensesTwoYearsAgoDiv');
    });

    $("#TotalprogramExpenseLastYearsDiv").blur(function () {
        TotalEarnedRevenue('TotalprogramExpenseLastYearsDiv', 'ProgramTotalLastYearDiv', 'TotalExpensesLastYearsDiv');
    });

    $("#TotalprogramExpenseCurrentYearDiv").blur(function () {
        TotalEarnedRevenue('TotalprogramExpenseCurrentYearDiv', 'ProgramTotalCurrentYearDiv', 'TotalExpensesCurrentYearDiv');
    });



}
function TotalManagement() {
    $("#TotalManagementThreeyearsAgoDiv").blur(function () {
        TotalManagementRevenue('TotalManagementThreeyearsAgoDiv', 'ManagementTotalPrecentageThreeYearsAgoDiv', 'TotalExpensesThreeyearsAgoDiv');
    });

    $("#TotalManagementTwoYearsAgoDiv").blur(function () {
        TotalManagementRevenue('TotalManagementTwoYearsAgoDiv', 'ManagementTotalPrecentageTwoYearsAgoDiv', 'TotalExpensesTwoYearsAgoDiv');
    });

    $("#TotalManagementLastYearsDiv").blur(function () {
        TotalManagementRevenue('TotalManagementLastYearsDiv', 'ManagementTotalPrecentageLastYearDiv', 'TotalExpensesLastYearsDiv');
    });

    $("#TotalManagementCurrentYearDiv").blur(function () {
        TotalManagementRevenue('TotalManagementCurrentYearDiv', 'ManagementTotalPrecentageCurrentYearDiv', 'TotalExpensesCurrentYearDiv');
    });


}
function TotalFundraising() {
    $("#TotalFundRaisingThreeyearsAgoDiv").blur(function () {
        TotalFundraisingRevenue('TotalFundRaisingThreeyearsAgoDiv', 'FundRaisingExpensePercentageThreeYearAgosDiv', 'TotalExpensesThreeyearsAgoDiv');
    });

    $("#TotalFundRaisingTwoYearsAgoDiv").blur(function () {
        TotalFundraisingRevenue('TotalFundRaisingTwoYearsAgoDiv', 'FundRaisingExpensePercentageTwoYearAgosDiv', 'TotalExpensesTwoYearsAgoDiv');
    });

    $("#TotalFundRaisingLastYearsDiv").blur(function () {
        TotalFundraisingRevenue('TotalFundRaisingLastYearsDiv', 'FundRaisingExpensePercentageLastYearDiv', 'TotalExpensesLastYearsDiv');
    });

    $("#TotalFundRaisingCurrentYearDiv").blur(function () {
        TotalFundraisingRevenue('TotalFundRaisingCurrentYearDiv', 'FundRaisingExpensePercentageCurrentYearDiv', 'TotalExpensesCurrentYearDiv');
    });


}
function FixedAssets() {
    $("#DepreciationFixedAssetsThreeyearsAgoDiv").blur(function () {
        FixedAssetsRevenue('DepreciationFixedAssetsThreeyearsAgoDiv', 'MortgagesThreeyearsAgoDiv', 'DebtRelatedThreeYearAgosDiv', 'AvailableLUNAThreeYearAgosDiv', 'CashAverageMonthlyThreeYearsAgoDiv', 'MonthCoveredThreeYearAgosDiv', 'LUNAThreeYearAgosDiv', 'UnrestrictedNetThreeyearsAgoDiv','BoardDesignatedThreeyearsAgoDiv');
    });
    $("#DepreciationFixedAssetsTwoYearsAgoDiv").blur(function () {
        FixedAssetsRevenue('DepreciationFixedAssetsTwoYearsAgoDiv', 'MortgagesTwoYearsAgoDiv', 'DebtRelatedTwoYearAgosDiv', 'AvailableLUNATwoYearAgosDiv', 'CashAverageMonthlyTwoYearsAgoDiv', 'MonthCoveredTwoYearAgosDiv', 'LUNATwoYearAgosDiv', 'UnrestrictedNetTwoYearsAgoDiv','BoardDesignatedTwoYearsAgoDiv');
    });
    $("#DepreciationFixedAssetsLastYearsDiv").blur(function () {
        FixedAssetsRevenue('DepreciationFixedAssetsLastYearsDiv', 'MortgagesLastYearsDiv', 'DebtRelatedLastYearDiv', 'AvailableLUNALastYearDiv', 'CashAverageMonthlyLastYearDiv', 'MonthCoveredLastYearDiv', 'LUNALastYearDiv', 'UnrestrictedNetLastYearsDiv','BoardDesignatedLastYearsDiv');
    });

    $("#MortgagesThreeyearsAgoDiv").blur(function () {
        FixedAssetsRevenue('DepreciationFixedAssetsThreeyearsAgoDiv', 'MortgagesThreeyearsAgoDiv', 'DebtRelatedThreeYearAgosDiv', 'AvailableLUNAThreeYearAgosDiv', 'CashAverageMonthlyThreeYearsAgoDiv', 'MonthCoveredThreeYearAgosDiv', 'LUNAThreeYearAgosDiv', 'UnrestrictedNetThreeyearsAgoDiv', 'BoardDesignatedThreeyearsAgoDiv');
    });
    $("#MortgagesTwoYearsAgoDiv").blur(function () {
        FixedAssetsRevenue('DepreciationFixedAssetsTwoYearsAgoDiv', 'MortgagesTwoYearsAgoDiv', 'DebtRelatedTwoYearAgosDiv', 'AvailableLUNATwoYearAgosDiv', 'CashAverageMonthlyTwoYearsAgoDiv', 'MonthCoveredTwoYearAgosDiv', 'LUNATwoYearAgosDiv', 'UnrestrictedNetTwoYearsAgoDiv', 'BoardDesignatedTwoYearsAgoDiv');
    });
    $("#MortgagesLastYearsDiv").blur(function () {
        FixedAssetsRevenue('DepreciationFixedAssetsLastYearsDiv', 'MortgagesLastYearsDiv', 'DebtRelatedLastYearDiv', 'AvailableLUNALastYearDiv', 'CashAverageMonthlyLastYearDiv', 'MonthCoveredLastYearDiv', 'LUNALastYearDiv', 'UnrestrictedNetLastYearsDiv', 'BoardDesignatedLastYearsDiv');
    });
}
function LUNA() {
    $("#UnrestrictedNetThreeyearsAgoDiv").blur(function () {
        LUNARevenue('UnrestrictedNetThreeyearsAgoDiv', 'BoardDesignatedThreeyearsAgoDiv', 'DebtRelatedThreeYearAgosDiv', 'LUNAThreeYearAgosDiv', 'AvailableLUNAThreeYearAgosDiv', 'MonthCoveredThreeYearAgosDiv', 'CashAverageMonthlyThreeYearsAgoDiv');
        FixedAssetsRevenue('DepreciationFixedAssetsThreeyearsAgoDiv', 'MortgagesThreeyearsAgoDiv', 'DebtRelatedThreeYearAgosDiv', 'AvailableLUNAThreeYearAgosDiv', 'CashAverageMonthlyThreeYearsAgoDiv', 'MonthCoveredThreeYearAgosDiv', 'LUNAThreeYearAgosDiv', 'UnrestrictedNetThreeyearsAgoDiv', 'BoardDesignatedThreeyearsAgoDiv');
    });
    $("#UnrestrictedNetTwoYearsAgoDiv").blur(function () {
        LUNARevenue('UnrestrictedNetTwoYearsAgoDiv', 'BoardDesignatedTwoYearsAgoDiv', 'DebtRelatedTwoYearAgosDiv', 'LUNATwoYearAgosDiv', 'AvailableLUNATwoYearAgosDiv', 'MonthCoveredThreeYearAgosDiv', 'CashAverageMonthlyThreeYearsAgoDiv');
        FixedAssetsRevenue('DepreciationFixedAssetsTwoYearsAgoDiv', 'MortgagesTwoYearsAgoDiv', 'DebtRelatedTwoYearAgosDiv', 'AvailableLUNATwoYearAgosDiv', 'CashAverageMonthlyTwoYearsAgoDiv', 'MonthCoveredTwoYearAgosDiv', 'LUNATwoYearAgosDiv', 'UnrestrictedNetTwoYearsAgoDiv', 'BoardDesignatedTwoYearsAgoDiv');
    });
    $("#UnrestrictedNetLastYearsDiv").blur(function () {
        LUNARevenue('UnrestrictedNetLastYearsDiv', 'BoardDesignatedLastYearsDiv', 'DebtRelatedLastYearDiv', 'LUNALastYearDiv', 'AvailableLUNALastYearDiv', 'MonthCoveredTwoYearAgosDiv', 'CashAverageMonthlyTwoYearsAgoDiv');
        FixedAssetsRevenue('DepreciationFixedAssetsLastYearsDiv', 'MortgagesLastYearsDiv', 'DebtRelatedLastYearDiv', 'AvailableLUNALastYearDiv', 'CashAverageMonthlyLastYearDiv', 'MonthCoveredLastYearDiv', 'LUNALastYearDiv', 'UnrestrictedNetLastYearsDiv', 'BoardDesignatedLastYearsDiv');
    });

    $("#BoardDesignatedThreeyearsAgoDiv").blur(function () {
        LUNARevenue('UnrestrictedNetThreeyearsAgoDiv', 'BoardDesignatedThreeyearsAgoDiv', 'DebtRelatedThreeYearAgosDiv', 'LUNAThreeYearAgosDiv', 'AvailableLUNAThreeYearAgosDiv', 'MonthCoveredTwoYearAgosDiv', 'CashAverageMonthlyTwoYearsAgoDiv');
    });
    $("#BoardDesignatedTwoYearsAgoDiv").blur(function () {
        LUNARevenue('UnrestrictedNetTwoYearsAgoDiv', 'BoardDesignatedTwoYearsAgoDiv', 'DebtRelatedTwoYearAgosDiv', 'LUNATwoYearAgosDiv', 'AvailableLUNATwoYearAgosDiv', 'MonthCoveredLastYearDiv', 'CashAverageMonthlyLastYearDiv');
    });
    $("#BoardDesignatedLastYearsDiv").blur(function () {
        LUNARevenue('UnrestrictedNetLastYearsDiv', 'BoardDesignatedLastYearsDiv', 'DebtRelatedLastYearDiv', 'LUNALastYearDiv', 'AvailableLUNALastYearDiv', 'MonthCoveredLastYearDiv', 'CashAverageMonthlyLastYearDiv');
    });
}
function CashAnnualExpense() {
    $("#CashEquivalentsThreeyearsAgoDiv").blur(function () {
        CashAnnualRevenue('CashEquivalentsThreeyearsAgoDiv', 'TotalAverageMonthlyThreeYearsAgoDiv', 'MonthCashOnHandThreeYearAgosDiv');
    });

    $("#CashEquivalentsTwoYearsAgoDiv").blur(function () {
        CashAnnualRevenue('CashEquivalentsTwoYearsAgoDiv', 'TotalAverageMonthlyTwoYearsAgoDiv', 'MonthCashOnHandTwoYearsAgoDiv');
    });

    $("#CashEquivalentsLastYearsDiv").blur(function () {
        CashAnnualRevenue('CashEquivalentsLastYearsDiv', 'TotalAverageMonthlyLastYearsDiv', 'MonthCashOnHandLastYearsDiv');
    });


}
function BoardContributing() {
    $("#TotalBoardMembersThreeyearsAgoDiv").blur(function () {
        BoardContributingRevenue('TotalBoardMembersThreeyearsAgoDiv', 'NoOfmembersMembersThreeyearsAgoDiv', 'PercentageBoardContributingThreeYearsAgoDiv');
    });

    $("#TotalBoardMembersTwoyearsAgoDiv").blur(function () {
        BoardContributingRevenue('TotalBoardMembersTwoyearsAgoDiv', 'NoOfmembersMembersTwoyearsAgoDiv', 'PercentageBoardContributingTwoYearsAgoDiv');
    });

    $("#TotalBoardMembersLastyearsAgoDiv").blur(function () {
        BoardContributingRevenue('TotalBoardMembersLastyearsAgoDiv', 'NoOfmembersMembersLastyearsAgoDiv', 'PercentageBoardContributingLastYearsDiv');
    });

    $("#NoOfmembersMembersThreeyearsAgoDiv").blur(function () {
        BoardContributingRevenue('TotalBoardMembersThreeyearsAgoDiv', 'NoOfmembersMembersThreeyearsAgoDiv', 'PercentageBoardContributingThreeYearsAgoDiv');
    });

    $("#NoOfmembersMembersTwoyearsAgoDiv").blur(function () {
        BoardContributingRevenue('TotalBoardMembersTwoyearsAgoDiv', 'NoOfmembersMembersTwoyearsAgoDiv', 'PercentageBoardContributingTwoYearsAgoDiv');
    });

    $("#NoOfmembersMembersLastyearsAgoDiv").blur(function () {
        BoardContributingRevenue('TotalBoardMembersLastyearsAgoDiv', 'NoOfmembersMembersLastyearsAgoDiv', 'PercentageBoardContributingLastYearsDiv');
    });
}
function BoardContributionFinal() {
    $("#TotalBoardAmountThreeyearsAgoDiv").blur(function () {
        BoardContributionFinalRevenue('TotalBoardAmountThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'BoardContributionsThreeYearsAgoDiv');
    });

    $("#TotalBoardAmountTwoyearsAgoDiv").blur(function () {
        BoardContributionFinalRevenue('TotalBoardAmountTwoyearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'BoardContributionsTwoYearsAgoDiv');
    });

    $("#TotalBoardAmountLastyearsAgoDiv").blur(function () {
        BoardContributionFinalRevenue('TotalBoardAmountLastyearsAgoDiv', 'UnrestrictedRevenueLastYearsDiv', 'BoardContributionsLastYearsDiv');
    });
}
//Reverse Calculation
function ReverseCheck(id) {
    switch (id) {
        case "TotalBoardAmountThreeyearsAgoDiv":
            BoardContributionFinalRevenue('TotalBoardAmountThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'BoardContributionsThreeYearsAgoDiv');
            break;
        case "TotalBoardAmountTwoyearsAgoDiv":
            BoardContributionFinalRevenue('TotalBoardAmountTwoyearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'BoardContributionsTwoYearsAgoDiv');
            break;
        case "TotalBoardAmountLastyearsAgoDiv":
            BoardContributionFinalRevenue('TotalBoardAmountLastyearsAgoDiv', 'UnrestrictedRevenueLastYearsDiv', 'BoardContributionsLastYearsDiv');
            break;
        case "CashEquivalentsThreeyearsAgoDiv":
            CashAnnualRevenue('CashEquivalentsThreeyearsAgoDiv', 'TotalAverageMonthlyThreeYearsAgoDiv', 'MonthCashOnHandThreeYearAgosDiv');
            break;
        case "CashEquivalentsTwoYearsAgoDiv":
            CashAnnualRevenue('CashEquivalentsTwoYearsAgoDiv', 'TotalAverageMonthlyTwoYearsAgoDiv', 'MonthCashOnHandTwoYearsAgoDiv');
            break;
        case "CashEquivalentsLastYearsDiv":
            CashAnnualRevenue('CashEquivalentsLastYearsDiv', 'TotalAverageMonthlyLastYearsDiv', 'MonthCashOnHandLastYearsDiv');
            break;
        case "IndividualContributionsThreeyearsAgoDiv":
            UnRestrictedRevenue('UnrestrictedRevenueThreeyearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'IndividualTotalRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv');
            break;
        case "IndividualContributionsTwoYearsAgoDiv":
            UnRestrictedRevenue('UnrestrictedRevenueTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'IndividualTotalRevenueTwoyearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv');
            break;
        case "IndividualContributionsLastYearsDiv":
            UnRestrictedRevenue('UnrestrictedRevenueLastYearsDiv', 'IndividualContributionsLastYearsDiv', 'IndividualTotalRevenueLastYearDiv', 'OtherIncomeLastYearDiv');
            break;
        case "IndividualContributionsCurrentYearDiv":
            UnRestrictedRevenue('UnrestrictedRevenueCurrentYearDiv', 'IndividualContributionsCurrentYearDiv', 'IndividualTotalRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv');
            break;

        case "FoundationCorporateThreeyearsAgoDiv":
            FoundationRevenue('FoundationCorporateThreeyearsAgoDiv', 'SatisfactionThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'CorporateRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
            break;
        case "FoundationCorporateTwoYearsAgoDiv":
            FoundationRevenue('FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'CorporateRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
            break;
        case "FoundationCorporateLastYearsDiv":
            FoundationRevenue('FoundationCorporateLastYearsDiv', 'SatisfactionLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'CorporateRevenueLastYearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
            break;
        case "FoundationCorporateCurrentYearDiv":
            FoundationRevenue('FoundationCorporateCurrentYearDiv', 'SatisfactionCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'CorporateRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'IndividualContributionsCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv');
            break;

        case "SatisfactionThreeyearsAgoDiv":
            FoundationRevenue('FoundationCorporateThreeyearsAgoDiv', 'SatisfactionThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'CorporateRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
            break;
        case "SatisfactionTwoYearsAgoDiv":
            FoundationRevenue('FoundationCorporateTwoYearsAgoDiv', 'SatisfactionTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'CorporateRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
            break;
        case "SatisfactionLastYearsDiv":
            FoundationRevenue('FoundationCorporateLastYearsDiv', 'SatisfactionLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'CorporateRevenueLastYearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
            break;
        case "SatisfactionCurrentYearDiv":
            FoundationRevenue('FoundationCorporateCurrentYearDiv', 'SatisfactionCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'CorporateRevenueCurrentYearDiv', 'OtherIncomeCurrentYearDiv', 'IndividualContributionsCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv');
            break;

        case "GovernmentFundingThreeyearsAgoDiv":
            GovernmentRevenue('GovernmentFundingThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'GovernmentRevenueThreeyearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'FoundationCorporateThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
            break;
        case "GovernmentFundingTwoYearsAgoDiv":
            GovernmentRevenue('GovernmentFundingTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'GovernmentRevenueTwoyearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'FoundationCorporateTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
            break;
        case "GovernmentFundingLastYearsDiv":
            GovernmentRevenue('GovernmentFundingLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'GovernmentRevenueLastyearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'FoundationCorporateLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
            break;
        case "GovernmentFundingCurrentYearDiv":
            GovernmentRevenue('GovernmentFundingCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'GovernmentRevenueCurrentYearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'FoundationCorporateCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv');
            break;

        case "EarnedIncomeThreeyearsAgoDiv":
            EarnedRevenue('EarnedIncomeThreeyearsAgoDiv', 'UnrestrictedRevenueThreeyearsAgoDiv', 'EarnedTotalRevenueThreeYearsAgoDiv', 'OtherIncomeThreeYearsAgoDiv', 'IndividualContributionsThreeyearsAgoDiv', 'GovernmentFundingThreeyearsAgoDiv', 'FoundationCorporateThreeyearsAgoDiv', 'OtherIncomerevenueThreeYearsAgoDiv');
            break;
        case "EarnedIncomeTwoYearsAgoDiv":
            EarnedRevenue('EarnedIncomeTwoYearsAgoDiv', 'UnrestrictedRevenueTwoYearsAgoDiv', 'EarnedTotalRevenueTwoYearsAgoDiv', 'OtherIncomeTwoYearsAgoDiv', 'IndividualContributionsTwoYearsAgoDiv', 'GovernmentFundingTwoYearsAgoDiv', 'FoundationCorporateTwoYearsAgoDiv', 'OtherIncomerevenueTwoYearsAgoDiv');
            break;
        case "EarnedIncomeLastYearsDiv":
            EarnedRevenue('EarnedIncomeLastYearsDiv', 'UnrestrictedRevenueLastYearsDiv', 'EarnedTotalRevenueLastYearsDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'GovernmentFundingLastYearsDiv', 'FoundationCorporateLastYearsDiv', 'OtherIncomerevenueLastYearDiv');
            break;
        case "EarnedIncomeCurrentYearDiv":
            EarnedRevenue('EarnedIncomeCurrentYearDiv', 'UnrestrictedRevenueCurrentYearDiv', 'EarnedTotalRevenueCurrentYearDiv', 'OtherIncomeLastYearDiv', 'IndividualContributionsLastYearsDiv', 'GovernmentFundingCurrentYearDiv', 'FoundationCorporateCurrentYearDiv', 'OtherIncomerevenueCurrentYearDiv');
            break;
        case "TotalprogramExpenseThreeyearsAgoDiv":
            TotalEarnedRevenue('TotalprogramExpenseThreeyearsAgoDiv', 'ProgramTotalThreeYearsAgoDiv', 'TotalExpensesThreeyearsAgoDiv');
            break;
        case "TotalprogramExpenseTwoYearsAgoDiv":
            TotalEarnedRevenue('TotalprogramExpenseTwoYearsAgoDiv', 'ProgramTotalTwoYearsAgoDiv', 'TotalExpensesTwoYearsAgoDiv');
            break;
        case "TotalprogramExpenseLastYearsDiv":
            TotalEarnedRevenue('TotalprogramExpenseLastYearsDiv', 'ProgramTotalLastYearDiv', 'TotalExpensesLastYearsDiv');
            break;
        case "TotalprogramExpenseCurrentYearDiv":
            TotalEarnedRevenue('TotalprogramExpenseCurrentYearDiv', 'ProgramTotalCurrentYearDiv', 'TotalExpensesCurrentYearDiv');
            break;
        case "TotalManagementThreeyearsAgoDiv":
            TotalManagementRevenue('TotalManagementThreeyearsAgoDiv', 'ManagementTotalPrecentageThreeYearsAgoDiv', 'TotalExpensesThreeyearsAgoDiv');
            break;
        case "TotalManagementTwoYearsAgoDiv":
            TotalManagementRevenue('TotalManagementTwoYearsAgoDiv', 'ManagementTotalPrecentageTwoYearsAgoDiv', 'TotalExpensesTwoYearsAgoDiv');
            break;
        case "TotalManagementLastYearsDiv":
            TotalManagementRevenue('TotalManagementLastYearsDiv', 'ManagementTotalPrecentageLastYearDiv', 'TotalExpensesLastYearsDiv');
            break;
        case "TotalManagementCurrentYearDiv":
            TotalManagementRevenue('TotalManagementCurrentYearDiv', 'ManagementTotalPrecentageCurrentYearDiv', 'TotalExpensesCurrentYearDiv');
            break;
        case "TotalFundRaisingThreeyearsAgoDiv":
            TotalFundraisingRevenue('TotalFundRaisingThreeyearsAgoDiv', 'FundRaisingExpensePercentageThreeYearAgosDiv', 'TotalExpensesThreeyearsAgoDiv');
            break;
        case "TotalFundRaisingTwoYearsAgoDiv":
            TotalFundraisingRevenue('TotalFundRaisingTwoYearsAgoDiv', 'FundRaisingExpensePercentageTwoYearAgosDiv', 'TotalExpensesTwoYearsAgoDiv');
            break;
        case "TotalFundRaisingLastYearsDiv":
            TotalFundraisingRevenue('TotalFundRaisingLastYearsDiv', 'FundRaisingExpensePercentageLastYearDiv', 'TotalExpensesLastYearsDiv');
            break;
        case "TotalFundRaisingCurrentYearDiv":
            TotalFundraisingRevenue('TotalFundRaisingCurrentYearDiv', 'FundRaisingExpensePercentageCurrentYearDiv', 'TotalExpensesCurrentYearDiv');
            break;

        default:
            return;
    }
}
function CompleteTotalRevenue(id1, id2, id3, id4, id5, id6, id7, id8, id9,id10) {
	
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
    var id5 = "#" + id5;
    var id6 = "#" + id6;
    var id7 = "#" + id7;
    var id8 = "#" + id8;
    var id9 = "#" + id9;
	var id10 = "#" + id10;

    DividePercentage(id9, id6, id1);
    TotalCalc(id7, id1, id2, id3, id4, id5, id6,id10);
    DividePercentage(id8, id7, id1);
}
function OperatingSurplus(id1, id2, id3, id4, id5, id6, id7, id8, id9, id10, id11, id12, id13, id14, id15, id16, id17) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
    var id5 = "#" + id5;
    var id6 = "#" + id6;
    var id7 = "#" + id7;
    var id8 = "#" + id8;
    var id9 = "#" + id9;
    var id10 = "#" + id10;
    var id11 = "#" + id11;
    var id12 = "#" + id12;
    var id13 = "#" + id13;
    var id14 = "#" + id14;
    var id15 = "#" + id15;
    var id16 = "#" + id16;
    var id17 = "#" + id17;
    AddDollar(id1);
    AddDollar(id2);
    
    Subtractcalc(id3,id1,id2);
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        $(id4).text(($(id1).text()));
    }
    else {
        $(id4).text($(id1).text());
    }
    Display(id4);
    DividePercentage(id5, id4, id1);
    DividePercentageBy12(id6,id2);
    DividePercentageBy12(id7, id2);
    //reverse process
    if ($(id8).text() != null && $(id8).text() != "") {
        ReverseCheck($(id8).attr('id'));
    }
    if ($(id9).text() != null && $(id9).text() != "") {
        ReverseCheck($(id9).attr('id'));
    }
    if ($(id10).text() != "") {
        ReverseCheck($(id10).attr('id'));
    }
    if ($(id11).text() != "" || $(id12).text() != "") {
        ReverseCheck($(id11).attr('id'));
        ReverseCheck($(id12).attr('id'));
    }
    if ($(id13).text() != "") {
        ReverseCheck($(id13).attr('id'));
    }
    if ($(id14).text() != "") {
        ReverseCheck($(id14).attr('id'));
    }
    if ($(id15).text() != "") {
        ReverseCheck($(id15).attr('id'));
    }
    if ($(id16).text() != "") {
        ReverseCheck($(id16).attr('id'));
    }
    if ($(id17).text() != "") {
        ReverseCheck($(id17).attr('id'));
    }
}
function EarnedRevenue(id1, id2, id3, id4, id5, id6, id7, id8) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
    var id5 = "#" + id5;
    var id6 = "#" + id6;
    var id7 = "#" + id7;
    var id8 = "#" + id8;
    AddDollar(id1);
    DividePercentage(id3,id1,id3);
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        $(id4).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))))))));
    }
    else {
        $(id4).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))))))));
    }
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        Display(id4);
    }
    DividePercentage(id8, id4, id2);
}
function SpecialEventCalc(id1,id2,id3,id4){
	var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
	AddDollar(id1);
	AddDollar(id2);
	Subtractcalc(id3,id1,id2);
	DivideWithoutPercentageandRoundWithTwodecimal(id4,id2,id1);
}
function InkindRevenueCalc(id1, id2, id3, id4,id5,id6,id7,id8,id9,id10) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
	var id5 = "#" + id5;
    var id6 = "#" + id6;
    var id7 = "#" + id7;
    var id8 = "#" + id8;
    var id9 = "#" + id9;
    var id10 = "#" + id10;
    
    AddDollar(id1);
    DividePercentage(id2,id1,id3);
	
	 
	  // if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
         // $(id4).text("$" + (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))))))));
     // }
     // else {
         // $(id4).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))))))));
     // }
	
    // if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        // $(id4).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))))))));
    // }
    // else {
        // $(id4).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))))))));
    // }
	
	// if ($(id5).text() != "" && $(id5).text().indexOf("$") != 0) {
        // $(id5).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))))))));
    // }
    // else {
        // $(id5).text("$" + (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))))))));
    // }
	
    TotalCalc(id4, id3, id6, id7, id8, id9, id10, id1);
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        Display(id4);
    }
    
}
function GovernmentRevenue(id1, id2, id3, id4, id5, id6, id7) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
    var id5 = "#" + id5;
    var id6 = "#" + id6;
    var id7 = "#" + id7;
    AddDollar(id1);
    DividePercentage(id3, id1, id2);
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        $(id4).text( (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,'')))))));
    }
    else {
        $(id4).text( (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - (parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,'')))))));
    }
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        Display(id4);
    }
    DividePercentage(id7, id4, id2);

}
function FoundationRevenue(id1, id2, id3, id4, id5, id6, id7) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
    var id5 = "#" + id5;
    var id6 = "#" + id6;
    var id7 = "#" + id7;

    AddDollar(id1);
    AddDollar(id2);
    if ($(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
        $(id4).text(Math.round(parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,''))) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,''))) * 100);
    }
    if ($(id4).text() != "") {
        $(id4).text(Math.round($(id4).text()) + "%");
    }
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        Display(id4);
    }
    if ($(id5).text() != "" && $(id5).text().indexOf("$") != 0) {
        $(id5).text((parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,'')))))));
    }
    else {
        $(id5).text((parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,'')))))));
    }
    if ($(id5).text() != "" && $(id5).text().indexOf("$") != 0) {
        Display(id5);
    }
    DividePercentage(id7, id5, id3);
    
}
function UnRestrictedRevenue(id1, id2, id3, id4, id5) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
    var id5 = "#" + id5;

    AddDollar(id2);
    DividePercentage(id3, id2, id1);
    Subtractcalc(id4,id1,id2);
    DividePercentage(id5, id4, id1);
}
function TotalEarnedRevenue(id1, id2, id3) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    AddDollar(id1);
    DividePercentage(id2, id1, id3);
}
function TotalManagementRevenue(id1, id2, id3) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    AddDollar(id1);
    DividePercentage(id2, id1, id3);
}
function TotalFundraisingRevenue(id1, id2, id3) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    AddDollar(id1);
    DividePercentage(id2, id1, id3);
    
}
function FixedAssetsRevenue(id1, id2, id3, id4, id5, id6, id7, id8, id9) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
    var id5 = "#" + id5;
    var id6 = "#" + id6;
    var id7 = "#" + id7;
    var id8 = "#" + id8;
    var id9 = "#" + id9;
    AddDollar(id1);
    AddDollar(id2);
    Subtractcalc(id3, id1, id2);
    
    if ($(id7).text() != "" && $(id7).text().indexOf("$") != 0) {
        $(id7).text((parseInt($(id8).text() == "" ? 0 : $(id8).text().replace(/[-$\(\)]/g,'')) - (parseInt($(id9).text() == "" ? 0 : $(id9).text().replace(/[-$\(\)]/g,''))) - (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')))));
    }
    else {
        $(id7).text((parseInt($(id8).text() == "" ? 0 : $(id8).text().replace(/[-$\(\)]/g,'')) - (parseInt($(id9).text() == "" ? 0 : $(id9).text().replace(/[-$\(\)]/g,''))) - (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')))));
    }
    $(id4).text($(id7).text());
    if ($(id7).text() != "" && $(id7).text().indexOf("$") != 0) {
        Display(id7);
    }
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        Display(id4);
    }
    //DividePercentage(id6, id4, id5);
    DivideWithoutPercentage(id6, id7, id5);
}
function LUNARevenue(id1, id2, id3, id4, id5, id6, id7) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    var id4 = "#" + id4;
    var id5 = "#" + id5;
    var id6 = "#" + id6;
    var id7 = "#" + id7;
    AddDollar(id1);
    AddDollar(id2);
    if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        $(id4).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) - (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,''))) - (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')))));
    }
    else {

        $(id4).text((parseInt($(id1).text() == "" ? 0 : $(id1).text().replace(/[-$\(\)]/g,'')) - (parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,''))) - (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')))));
    }
    //if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
        $(id5).text($(id4).text());
    //}
        if ($(id4).text() != "" && $(id4).text().indexOf("$") != 0) {
            Display(id4);
        }
        if ($(id5).text() != "" && $(id5).text().indexOf("$") != 0) {
            Display(id5);
        }
    //DividePercentage(id7, id5, id6);
}
function CashAnnualRevenue(id1, id2, id3) {
    
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    AddDollar(id1);
    DivideWithoutPercentage(id3,id1,id2);
}
function BoardContributingRevenue(id1, id2, id3) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    AddDollar(id1);
    AddDollar(id2);
    DividePercentage(id3, id2, id1);
}
function BoardContributionFinalRevenue(id1, id2, id3) {
    var id1 = "#" + id1;
    var id2 = "#" + id2;
    var id3 = "#" + id3;
    AddDollar(id1);
    DividePercentage(id3, id1, id2);
}
//Definition
function DividePercentage(id1,id2,id3){

    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        if ($(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text(Math.round((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,''))) / ((parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')))) * 100) + "%");
        }
    }
    else {
        if ($(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text(Math.round((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,''))) / ((parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')))) * 100) + "%");
        }
    }
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        //if ($(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g, '') > 0) {
            //$(id1).text("-" + $(id1).text());
            Display(id1);
        //}
    }
}
function DivideWithoutPercentage(id1, id2, id3) {
	
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        if ($(id2).text() != "" && $(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g, '')) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g, '')))).toFixed(1));
        }
    }
    else {
        if ($(id2).text() != "" && $(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g, '')) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g, '')))).toFixed(1));
        }
    }
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        DisplaywithoutDollar(id1);
    }
}
function DivideWithoutPercentageandRound(id1, id2, id3) {
	
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        if ($(id2).text() != "" && $(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g, '')) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g, '')))).toFixed(1));
        }
    }
    else {
        if ($(id2).text() != "" && $(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g, '')) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g, '')))).toFixed(1));
        }
    }
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        DisplaywithoutDollar(id1);
    }
}
function DivideWithoutPercentageandRoundWithTwodecimal(id1, id2, id3) {
	
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        if ($(id2).text() != "" && $(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g, '')) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g, '')))).toFixed(1));
        }
    }
    else {
        if ($(id2).text() != "" && $(id3).text() != "" && $(id3).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text(roundToTwo(parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g, '')) / (parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g, '')))).toFixed(1));
        }
    }
	
    AddDollarwithCents(id1);
}
function roundToTwo(value) {
    return(Math.round(value * 100) / 100);
}
function DividePercentageBy12(id1, id2) {
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        if ($(id2).text() != "" && $(id2).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text(Math.round((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,''))) / (12)));
        }
    }
    else {
        if ($(id2).text() != "" && $(id2).text().replace(/[-$\(\)]/g,'') > 0) {
            $(id1).text(Math.round((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,''))) / (12)));
        }
    }
    $(id1).text($(id1).text());
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        Display(id1);
    }
}
function TotalCalc(id1, id2, id3, id4, id5, id6, id7,id8){
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        $(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id4).text() == "" ? 0 : $(id4).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id8).text() == "" ? 0 : $(id8).text().replace(/[-$\(\)]/g,'')))))))));
        //$(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g, '')) - ((parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g, '')) + (parseInt($(id4).text() == "" ? 0 : $(id4).text().replace(/[-$\(\)]/g, '')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g, ''))) +  (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g, ''))) + (parseInt($(id8).text() == "" ? 0 : $(id8).text().replace(/[-$\(\)]/g, ''))))))));
    }
    else {
        $(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - ((parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id4).text() == "" ? 0 : $(id4).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id6).text() == "" ? 0 : $(id6).text().replace(/[-$\(\)]/g,'')) + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g,''))) + (parseInt($(id8).text() == "" ? 0 : $(id8).text().replace(/[-$\(\)]/g,'')))))))));
        //$(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g, '')) - ((parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g, '')) + (parseInt($(id4).text() == "" ? 0 : $(id4).text().replace(/[-$\(\)]/g, '')) + (parseInt($(id5).text() == "" ? 0 : $(id5).text().replace(/[-$\(\)]/g, '')))  + (parseInt($(id7).text() == "" ? 0 : $(id7).text().replace(/[-$\(\)]/g, ''))) + (parseInt($(id8).text() == "" ? 0 : $(id8).text().replace(/[-$\(\)]/g, ''))))))));
    }
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        Display(id1);
    }
}
function Display(id1){
	if($(id1).text().indexOf("-") > -1)
	{
		$(id1).text( "$ " + "(" + $(id1).text().replace(/[-$]/g,'') + ")");
		$(id1).css("color", "black");
    }
    else if ($(id1).text().indexOf("%") > -1)
    {
        $(id1).text($(id1).text());
        $(id1).css("color", "black");
    }
   
	else
	{
		$(id1).text("$ " + $(id1).text());
		$(id1).css("color", "black");
	}
    
}

function DisplaywithoutDollar(id1) {
    if ($(id1).text().indexOf("-") > -1) {
        $(id1).text("$ " + "(" + $(id1).text().replace(/[-$]/g, '') + ")");
        $(id1).css("color", "black");
    }
    else if ($(id1).text().indexOf("%") > -1) {
        $(id1).text($(id1).text());
        $(id1).css("color", "black");
    }

    else {
        $(id1).text( $(id1).text());
        $(id1).css("color", "black");
    }

}


function AddDollar(id1){
	
     if ($(id1).text() != "" && $(id1).text().indexOf("$") !=0  ) {
         $(id1).text("$ " + $(id1).text());
     }
      else {
         $(id1).text($(id1).text());
      }
}
function AddDollarwithCents(id1){
	
	if(parseInt($(id1).text().replace("$","")) > 0)
	{
		if ($(id1).text() != "" && $(id1).text().indexOf("$") < 0) {
			$(id1).text( "$ " +  $(id1).text());
			
		}
		else {
			$(id1).text($(id1).text());
		}
	}
	else
	{
		if ($(id1).text() != "" && $(id1).text().indexOf("$")  < 0) {
			$(id1).text( $(id1).text().replace("$","") + " ¢");
		}
		else {
			$(id1).text($(id1).text());
		}
	}
	$(id1).css("color", "black");
	//Display(id1);
}
function Subtractcalc(id1,id2,id3){
    
    if ($(id1).text() != "" && $(id1).text().indexOf("$") != 0) {
        $(id1).text((parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - parseInt($(id3).text() == "" ? 0 : $(id3).text().replace(/[-$\(\)]/g,''))));
    }
    else {
        $(id1).text(parseInt($(id2).text() == "" ? 0 : $(id2).text().replace(/[-$\(\)]/g,'')) - parseInt(($(id3).text() == "") ? 0 : $(id3).text().replace(/[-$\(\)]/g,'')));
    }
    $(id1).text($(id1).text());
    Display(id1);
}

