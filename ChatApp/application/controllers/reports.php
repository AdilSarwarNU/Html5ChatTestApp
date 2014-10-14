<?php  
class Reports extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        $this->load->model('reports_model');
    }
    
    // Getting Animal Expense Information
    public function getAnimalExpenses()
    { 
        $profileArray;
        $earTag  = $this->security->xss_clean($this->input->post('search_ear_tag_no'));
        
        $result['expenseResult'] = $this->reports_model->animalExpenses($earTag, $profileArray);
        $result['profileResult'] = $profileArray;
        
        $result['expenseResult_no_of_elements']=count($result['expenseResult'])/6;
        $result['profileResult_no_of_elements']=count($result['profileResult'])/12;
        $result['report_number']=8;
        $result['first_time']= 1;
        $result['earTag']=$earTag;
        $result['date']="1111-11-11"; // dummy date
        
        if($result['expenseResult'])
        {
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $result['flag'] = 1;
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
        else
        {
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $result['flag'] = -1;
            $this->load->view('login_header',$result);   
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
    }
    
    // Getting Specific Animal Profit
    public function getAnimalProfit()
    {
        $earTag  = $this->security->xss_clean($this->input->post('search_ear_tag_no'));
        
        $result['animalProfit'] = $this->reports_model->animalProfit($earTag);
        $result['animalProfit_no_of_elements']=count($result['animalProfit'])/11;
        $result['first_time']= 1;
        $result['report_number']=7;
         $result['earTag']=$earTag;
          $result['date']="1111-11-11"; // dummy date

        if($result['animalProfit'])
        {  
              $result['flag'] = 1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
        else
        {  $result['flag'] = -1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
    }
    
    // Getting Daily Profit
    public function getDailyProfit()
    {
        $day = $this->security->xss_clean($this->input->post('date')); 
        $profit = 0;
        $result['animalArray'] = $this->reports_model->dailyProfit($day, $profit);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['profit'] = $profit;
        $result['date'] = $day;
        $result['earTag']=0;
        $result['report_number']=1;
         
        if( $result['animalArray'])
        {   $result['flag'] = 1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
        else
        {
            $result['flag'] = -1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
    }
    
    // Getting Monthly Profit
    public function getMonthlyProfit()
    {
        $var = $this->security->xss_clean($this->input->post('date'));
        $date= date_parse_from_format("Y-m-d H:i:s", $var);
        $month = $date['month'];
        $year = $date['year'];
        
        $profit = 0;
        $result['animalArray'] = $this->reports_model->monthlyProfit($month, $year, $profit);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['profit'] = $profit;
        $result['report_number']=2;
        $result['date'] = $var;
        $result['earTag']=0;
        if( $result['animalArray'])
        {  
             $result['flag'] = 1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
        else
        {
             $result['flag'] = -1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
    }
    
    // Getting Yearly Profit
    public function getYearlyProfit()
    {
       $var = $this->security->xss_clean($this->input->post('date'));
            $date= date_parse_from_format("Y-m-d H:i:s", $var);
            $year = $date['year'];
        $profit = 0;
        $result['animalArray'] = $this->reports_model->yearlyProfit($year, $profit);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['profit'] = $profit;
        $result['report_number']=3;
         $result['date'] = $var;
        $result['earTag']=0;
        if( $result['animalArray'])
        {  
             $result['flag'] = 1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
        else
        {
            $result['flag'] = -1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
    }
    
    
    // Getting Daily Expense
    public function getDailyExpense()
    {
        $day = $this->security->xss_clean($this->input->post('date'));
        $expense = 0;
        $result['animalArray'] = $this->reports_model->dailyExpense($day, $expense);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['expense'] = $expense;
        $result['report_number']=4;
        $result['date'] = $day;
        $result['earTag']=0;
        if( $result['animalArray'])
        {  
            $result['flag'] = 1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
        else
        {
            $result['flag'] = -1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
    }
    
    // Getting Monthly Expense
    public function getMonthlyExpense()
    {
        $var = $this->security->xss_clean($this->input->post('date'));
        $date= date_parse_from_format("Y-m-d H:i:s", $var);
        $month = $date['month'];
        $year = $date['year'];
        $expense = 0;
        $result['animalArray'] = $this->reports_model->monthlyExpense($month, $year, $expense);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['expense'] = $expense;
        $result['report_number']=5;
         $result['date'] = $var;
        $result['earTag']=0;
        if( $result['animalArray'])
        {  
            $result['flag'] = 1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
        else
        {
           $result['flag'] = -1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
    }
    
    // Getting Yearly Expense
    public function getYearlyExpense()
    {
        $var = $this->security->xss_clean($this->input->post('date'));
        $date= date_parse_from_format("Y-m-d H:i:s", $var);
        $year = $date['year'];
        $expense = 0;
        $result['animalArray'] = $this->reports_model->yearlyExpense($year, $expense);
        $result['animalArray_no_of_elements'] = count($result['animalArray'])/2;
        $result['expense'] = $expense;
        $result['report_number']=6;
         $result['date'] = $var;
        $result['earTag']=0;
        if( $result['animalArray'])
        {  
            $result['flag'] = 1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
        else
        { $result['flag'] = -1;
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('reports');
            $this->load->view('login_footer');
        }
    }
}
?>
