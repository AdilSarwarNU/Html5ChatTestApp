<header>
    <span> 
        <img class="logo_container_pdf" src ="<?php echo base_url(); ?>/assets/img/logo.jpg"/>
        <img class="logo_container_heading_pdf" src ="<?php echo base_url(); ?>/assets/img/header.png" width="550" height="100"/>
    </span>
    <br>
    <div class="top_header_sticker"><br></div>
</header>

<htmlpagefooter name="MyFooter1">
    <table width="100%" class="pdf_footer">
        <tr>
            <td width="33%" class="pdf_footer_column">
                <span>
                    <p class="pdf_footer_row1"><strong>Al-Rehman Cattle & Breeder</strong></p>
                </span>
            </td>
        </tr>
        <tr>
            <td width="33%" class="pdf_footer_column">
                <p class="pdf_footer_row2">Raiwind to Bhamba Road, Near B.R.B Canal, Bhamba Kalan, Kasur</p>
            </td>
        </tr>
        <tr>
            <td width="33%" class="pdf_footer_column">
                <p class="pdf_footer_row3"><a href="<?php echo base_url(); ?>">http://localhost/Breeder/</a></p>
            </td>
        </tr>
    </table>
</htmlpagefooter>

<sethtmlpagefooter name="MyFooter1" value="on" />
    
<div id="top-heading-report" class="pdf_main_margin">
    <p class="pdf_report_heading">
        <strong>Report: Animal Expense History Report</strong>
    </p>

    <span>
        <p class="pdf_dates_block">
            <strong >Ear Tag Number: <?php echo $earTag; ?></strong>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <strong>Release Date: <?php echo date('d-m-Y');?></strong>
        </p>
    </span>
</div>

<div id="animal_expense_report" class="report-forms-admin">
    <p class="menu-heading"> Animal Details </p>
    <table>
        <tr>
            <td>
                <div class="search_result_subrow">
                    <p class="info-label"> Ear Tag #: <?php echo $profileResult['earTag'.'0']?></p>
                </div>

                <div class="search_result_subrow">
                    <p class="info-label"> Type: <?php echo $profileResult['type'.'0']?></p>
                </div>

                <div class="search_result_subrow">
                    <p class="info-label"> Category: <?php echo $profileResult['category'.'0']?></p>
                </div>
                <div class="search_result_subrow">
                    <p class="info-label">  Breed : <?php echo $profileResult['breed'.'0']?></p>
                </div>
                <div class="search_result_subrow">
                    <p class="info-label"> Initial Weight: <?php echo $profileResult['initialWeight'.'0']?></p>
                </div>
                <div class="search_result_subrow">
                    <p class="info-label"> Purchase Price: <?php echo $profileResult['purchasePrice'.'0']?> </p>
                </div>
                <div class="search_result_subrow">
                    <p class="info-label">  Purchase Date: <?php echo date('d-m-Y', strtotime($profileResult['purchaseDate'.'0']));?></p>
                </div>
                <div class="search_result_subrow">
                    <p class="info-label">  Travel Expenses : <?php echo $profileResult['travelExpenses'.'0']?></p>
                </div>
                <div class="search_result_subrow">
                    <p class="info-label">  Weekly Expenses : <?php echo $profileResult['totalExpenses'.'0']?></p>
                </div>
            </td>
        </tr>
    </table>
    <br>
    <table>     
        <tr>
            <td  colspan="6" class="report-table-heading">
                Animal Expense  Report
            </td>
        </tr>
        <?php if($expenseResult_no_of_elements>0) {?>
        <tr>
            <td   class="report-table-heading_pdf">
                Date 
            </td>
            <td   class="report-table-heading_pdf">
                Current Weight
            </td>
            <td   class="report-table-heading_pdf">
                Vaccine Expense
            </td>
            <td   class="report-table-heading_pdf">
                Feed Expense 
            </td>
            <td   class="report-table-heading_pdf">
                Other Expense
            </td>
            <td   class="report-table-heading_pdf">
                Total
            </td>
        </tr>
        <?php for($k = 0; $k < $expenseResult_no_of_elements; $k++){?>
        <tr>
            <td  class="report-table-values_pdf">
                <?php if(strcmp($expenseResult['date'.$k], '---') != 0) echo date('d-m-Y', strtotime($expenseResult['date'.$k])); else echo $expenseResult['date'.$k]; ?>
            </td>
            <td  class="report-table-values_pdf">
                <?php echo $expenseResult['current_change'.$k]?> 
            </td>
            <td  class="report-table-values_pdf">
                <?php echo $expenseResult['vaccine_expenses'.$k]?> 
            </td>
            <td  class="report-table-values_pdf">
                <?php echo $expenseResult['feed_expenses'.$k]?> 
            </td>
            <td  class="report-table-values_pdf">
                <?php echo $expenseResult['other_expenses'.$k]?> 
            </td>
            <td  class="report-table-values_pdf">
                <?php echo $expenseResult['current_expense'.$k]?> 
            </td>
        </tr>
        <?php }?>
        <tr>
            <td colspan="3" class="report-table-heading">
                Total Expense
            </td>
            <td colspan="3" class="report-table-values">
                <?php echo $profileResult['totalExpenses'.'0']?> 
            </td>
        </tr>
        <?php }?>
        <tr>
            <td colspan="3" class="report-table-heading">
                Purchase Price
            </td>
            <td colspan="3" class="report-table-values">
                <?php echo $profileResult['purchasePrice'.'0']?> 
            </td>
        </tr>
        <tr>
            <td colspan="3" class="report-table-heading">
                Travel Expenses
            </td>
            <td colspan="3" class="report-table-values">
                <?php echo $profileResult['travelExpenses'.'0']?> 
            </td>
        </tr>
            <tr>
            <td colspan="3" class="report-table-heading">
                Grand Total
            </td>
            <td colspan="3" class="report-table-values">
                <?php echo $profileResult['GrandTotalExpenses'.'0']?> 
            </td>
        </tr>
    </table>
</div>