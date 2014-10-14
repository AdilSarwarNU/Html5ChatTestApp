<?php
session_start();
class Pdf extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
         $this->load->model('reports_model');
    }
    
    public function pdf_report(){
        
        $report_var = $this->input->get('reportNo'); // get var from url that which report your are calling i.e. 1 for profit and expense. 2 for animal profit. 3 for animal expense
        $type_var = $this->input->get('type');  // get var from url that is it download as pdf or view as pdf
        
        
        if($report_var == 1)
        {
            $result = $this->getDailyProfit();
            $result['type'] = "Daily Profit";
            $result['rep_type'] = 0;
            $data = $this->load->view('profit_expense_pdf', $result, true);
        }
        else if($report_var == 2)
        {
            $result = $this->getMonthlyProfit();
            $result['type'] = "Monthly Profit";
            $result['rep_type'] = 0;
            $data = $this->load->view('profit_expense_pdf', $result, true);
        }
        else if($report_var == 3)
        {
            $result = $this->getYearlyProfit();
            $result['type'] = "Yearly Profit";
            $result['rep_type'] = 0;
            $data = $this->load->view('profit_expense_pdf', $result, true);
        }
        else if($report_var == 4)
        {
            $result = $this->getDailyExpense();
            $result['type'] = "Daily Expense";
            $result['rep_type'] = 1;
            $data = $this->load->view('profit_expense_pdf', $result, true);
        }
        else if($report_var == 5)
        {
            $result = $this->getMonthlyExpense();
            $result['type'] = "Monthly Expense";
            $result['rep_type'] = 1;
            $data = $this->load->view('profit_expense_pdf', $result, true);
        }
        else if($report_var == 6)
        {
            $result = $this->getYearlyExpense();
            $result['type'] = "Yearly Expense";
            $result['rep_type'] = 1;
            $data = $this->load->view('profit_expense_pdf', $result, true);
        }
        else if($report_var == 7)
        {
            $result = $this->getAnimalProfit();
            $data = $this->load->view('animal_profit_pdf', $result, true);
        }
        else if($report_var == 8)
        {
            $result = $this->getAnimalExpenses();
            $data = $this->load->view('animal_expense_history_pdf', $result, true);
        }
                    
        require_once('./application/helpers/mpdf/mpdf.php');
        
        $mpdf = new mPDF('L', // L - landscape, P - portrait
            '', '', '', 15,
            15, // margin_left/right
            16, // margin right/top
            40, // margin top
            '', // margin bottom
            9, // margin header/footer
            0); // margin footer
        $stylesheet = file_get_contents('./assets/css/HomePage.css');        
        
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($data,2);
        
        if($type_var == 1)
        {
            $mpdf->Output('Reports.pdf','D');
        }
        else
            $mpdf->Output();
            
    }
    
    public function getAnimalExpenses()
    { 
        $profileArray;
        $earTag  = $this->security->xss_clean($this->input->get('earTag'));
        
        $result['expenseResult'] = $this->reports_model->animalExpenses($earTag, $profileArray);
        $result['profileResult'] = $profileArray;
        
        $result['expenseResult_no_of_elements']=count($result['expenseResult'])/6;
        $result['profileResult_no_of_elements']=count($result['profileResult'])/12;
        $result['report_name']="Animal Expense Report";
        $result['first_time']= 1;
        $result['earTag']=$earTag;
        
        if($result['expenseResult'])
        {
            $result['success_flag']=1;
            return $result;
        }
        else
        {
            $result['success_flag']=0;
            return $result;
        }
    }
    
    // Getting Specific Animal Profit
    public function getAnimalProfit()
    {
        $earTag  = $this->security->xss_clean($this->input->get('earTag'));
        
        $result['animalProfit'] = $this->reports_model->animalProfit($earTag);
        $result['animalProfit_no_of_elements']=count($result['animalProfit'])/11;
        $result['report_name']="Animal Profit Report";
        $result['earTag']=$earTag;
        
        if($result['animalProfit'])
        {  
              $result['success_flag']=1;
            return $result;
        }
        else
        {  
             $result['success_flag']=0;
            return $result;
        }
        
    }
    
    // Getting Daily Profit
    public function getDailyProfit()
    {
        $day = $this->security->xss_clean($this->input->get('date')); 
        $profit = 0;
        $result['animalArray'] = $this->reports_model->dailyProfit($day, $profit);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['profit'] = $profit;
        $result['date'] = $day;
         $result['report_name']="Daily Profit Report";
         
        if( $result['animalArray'])
        {    $result['success_flag']=1;
            return $result;
        }
        else
        {
            $result['success_flag']=0;
            return $result;
        }
    }
    
    // Getting Monthly Profit
    public function getMonthlyProfit()
    {
        $var = $this->security->xss_clean($this->input->get('date'));
        $date= date_parse_from_format("Y-m-d H:i:s", $var);
        $month = $date['month'];
        $year = $date['year'];
        
        $profit = 0;
        $result['animalArray'] = $this->reports_model->monthlyProfit($month, $year, $profit);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['profit'] = $profit;
        $result['report_name']="Monthly Profit Report";
        $result['date'] = $var;
        if( $result['animalArray'])
        {  
             $result['success_flag']=1;
            return $result;
        }
        else
        {
             $result['success_flag']=0;
            return $result;
        }
    }
    
    // Getting Yearly Profit
    public function getYearlyProfit()
    {
       $var = $this->security->xss_clean($this->input->get('date'));
            $date= date_parse_from_format("Y-m-d H:i:s", $var);
            $year = $date['year'];
        $profit = 0;
        $result['animalArray'] = $this->reports_model->yearlyProfit($year, $profit);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['profit'] = $profit;
        $result['report_name']="Yearly Profit Report";
        $result['date'] = $var;
        if( $result['animalArray'])
        {  
             $result['success_flag']=1;
            return $result;
        }
        else
        {
             $result['success_flag']=0;
            return $result;
        }
    }
    
    
    // Getting Daily Expense
    public function getDailyExpense()
    {
        $day = $this->security->xss_clean($this->input->get('date'));
        $expense = 0;
        $result['animalArray'] = $this->reports_model->dailyExpense($day, $expense);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['expense'] = $expense;
        $result['report_name']="Daily Expense Report";
        $result['date'] = $day;

        if( $result['animalArray'])
        {  
             $result['success_flag']=1;
            return $result;
        }
        else
        {
             $result['success_flag']=0;
            return $result;
        }
    }
    
    // Getting Monthly Expense
    public function getMonthlyExpense()
    {
        $var = $this->security->xss_clean($this->input->get('date'));
        $date= date_parse_from_format("Y-m-d H:i:s", $var);
        $month = $date['month'];
        $year = $date['year'];
        $expense = 0;
        $result['animalArray'] = $this->reports_model->monthlyExpense($month, $year, $expense);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['expense'] = $expense;
        $result['report_name']="Monthly Expense Report";
        $result['date'] = $var;
        if( $result['animalArray'])
        {  
             $result['success_flag']=1;
            return $result;
        }
        else
        {
            $result['success_flag']=0;
            return $result;
        }
    }
    
    // Getting Yearly Expense
    public function getYearlyExpense()
    {
        $var = $this->security->xss_clean($this->input->get('date'));
        $date= date_parse_from_format("Y-m-d H:i:s", $var);
        $year = $date['year'];
        $expense = 0;
        $result['animalArray'] = $this->reports_model->yearlyExpense($year, $expense);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['expense'] = $expense;
        $result['report_name']="Yearly Expense Report";
        $result['date'] = $var;
        if( $result['animalArray'])
        {  
            $result['success_flag']=1;
            return $result;
        }
        else
        {  $result['success_flag']=0;
            return $result;
        }
    }
}   
?>