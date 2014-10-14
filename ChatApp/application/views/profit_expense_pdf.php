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
        <strong>Report: <?php echo $type; ?> </strong>
    </p>

    <span>
        <p class="pdf_dates_block">
            <strong >For the Date: <?php echo date('d-m-Y', strtotime($date));?></strong>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <strong>Release Date: <?php echo date('d-m-Y');?></strong>
        </p>
    </span>
</div>

<div id="expense_report" class="report-forms-admin">
    <table>       
        <tr>
            <td  colspan="2" class="report-table-heading">
                <?php if($rep_type == 0) echo "Profit"; else echo "Expense"; ?> Report
            </td>               
        </tr>
        <tr>
            <td   class="report-table-heading">
                Ear Tag #
            </td>
            <td   class="report-table-heading">
                <?php if($rep_type == 0) echo "Profit"; else echo "Expense"; ?>
            </td>
        </tr>
        <?php for($i=0; $i<$animalArray_no_of_elements; $i++) {?>
        <tr>
            <td  class="report-table-values">
                <?php echo  $animalArray['earTagNum'.$i] ?>
            </td>
            <td  class="report-table-values">
                <?php if($rep_type == 0) echo $animalArray['animalProfit'.$i]; else echo $animalArray['animalExpenses'.$i]; ?>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td  class="report-table-heading">
                Total <?php if($rep_type == 0) echo "Profit"; else echo "Expense"; ?>
            </td>
            <td  class="report-table-values">
                <?php if($rep_type == 0) echo $profit; else echo $expense; ?>
            </td>
        </tr>   
    </table>        
</div>