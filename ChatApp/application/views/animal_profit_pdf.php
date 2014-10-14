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
        <strong>Report: Animal Profit Report</strong>
    </p>

    <span>
        <p class="pdf_dates_block">
            <strong >Ear Tag Number: <?php echo $animalProfit['earTag'.'0']; ?></strong>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <strong>Release Date: <?php echo date('d-m-Y');?></strong>
        </p>
    </span>
</div>

<div id="animal_profit_report" class="report-forms-admin">
<table>
    <?php $i = 0; ?>
    <tr>
        <td  colspan="2" class="report-table-heading">
            Animal Profit  Report
        </td>
    </tr>
    <tr>
        <td   class="report-table-heading">
            Ear Tag #
        </td>
        <td   class="report-table-values">
            <?php echo $animalProfit['earTag'.$i]; ?>    
        </td>
    </tr>
    <tr>
        <td  class="report-table-heading">
            Type:
        </td>
        <td  class="report-table-values">
            <?php echo $animalProfit['type'.$i]; ?>   
        </td>
    </tr>
        <tr>
        <td  class="report-table-heading">
            Purchase Date:
        </td>
        <td  class="report-table-values">
            <?php echo date('d-m-Y', strtotime($animalProfit['purchaseDate'.$i]));?>
        </td>
    </tr>
        <tr>
        <td  class="report-table-heading">
            Purchase Price:
        </td>
        <td  class="report-table-values">
            <?php echo $animalProfit['purchasePrice'.$i]?>
        </td>
    </tr>
        <tr>
        <td  class="report-table-heading">
            Initial Weight:
        </td>
        <td  class="report-table-values">
            <?php echo $animalProfit['initialWeight'.$i]?>
        </td>
    </tr>
        <tr>
        <td  class="report-table-heading">
            Sale Date:
        </td>
        <td  class="report-table-values">
            <?php echo date('d-m-Y', strtotime($animalProfit['saleDate'.$i]));?>
        </td>
    </tr>
        <tr>
        <td  class="report-table-heading">
            Sale Price:
        </td>
        <td  class="report-table-values">
            <?php echo $animalProfit['salePrice'.$i]?>
        </td>
    </tr>
        <tr>
        <td  class="report-table-heading">
            Final Weight:
        </td>
        <td  class="report-table-values">
            <?php echo $animalProfit['finalWeight'.$i]?>
        </td>
    </tr>
        <tr>
        <td  class="report-table-heading">
        Total Expenses:
        </td>
        <td  class="report-table-values">
            <?php echo $animalProfit['totalExpenses'.$i]?>
        </td>
    </tr>
        <tr>
        <td  class="report-table-heading">
            Profit:
        </td>
        <td  class="report-table-values">
            <?php echo $animalProfit['profit'.$i]?>
        </td>
    </tr>
    </table>
</div>