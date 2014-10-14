<?php  
session_start();
class Logs extends CI_Controller{
     private $reroute = 0;
     private $deletion = -1;
     private $usertype;
     private $search_date;
     
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        $this->load->library("pagination");  //pagination Library
        $this->load->model('getData_model');
        $this->load->model('dataEntry_model');
         if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $this->usertype = $session_data['usertype'];
            
            //check for admin or accountant here
          
        }else{
            redirect('login', 'refresh');    
        }
    }
    
    public function getLogByDay()
    {
         if($this->usertype=="Admin")
        {
            if($this->reroute==0)
            {
            $var = $this->security->xss_clean($this->input->post('date'));
            }
            else
            {
            $var = $this->search_date;
            }
            if($var == '')
            {
                $var = $_SESSION['date'];
            }else{
                $_SESSION['date'] = $var;
            }
            $date= date_parse_from_format("Y-m-d H:i:s", $var);
            $month = $date['month'];
            $year = $date['year'];
            $day = $date['day'];
            
            // Passing Data to model to get LOG from DB
            $result['date'] = $var; //date performed on
            $result['type'] = 1; //type of log i.e day, month, year
            $result['deletion_performed']=$this->deletion; //deletion check
            
            // initializing stuff for pagintaion
            $i_size = 0;  // we would pass this by reference to the model to get no of rows in current page
            $config = array();
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;
            $config["full_tag_open"] = '<div id="pagination" >';
            $config["full_tag_close"] = '</div>';
            $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $config["base_url"] = base_url() . "logs/getLogByDay";
            $config["total_rows"] = $this->getData_model->getLogByDay_count($day,$month,$year);

            $this->pagination->initialize($config); //insialized

            // getting result from model w.r.t. pagination
            $result['result'] = $this->getData_model->getLogByDay($day,$month,$year,$config["per_page"], $page_segment, $i_size);

            $result["links"] = $this->pagination->create_links();

            $result['i_getsize']= $i_size;

            //--------------------------------
             
               if($result['result'])
               {
                    $result['no_of_elements']= $config["total_rows"];
               }
               else
               {
                   $result['no_of_elements']=0;
               }
                $result['page_title'] = 'Al-Rehman Cattle & Breeder';
                $this->load->view('login_header',$result);
                $this->load->view('log');
                $this->load->view('login_footer');
        }
        else{
            redirect('login', 'refresh');    
        }
        $this->reroute=0;
        $this->deletion=-1;
    }
    
    public function getLogByMonth()
    {
         if($this->usertype=="Admin")
        {
            if($this->reroute==0)
            {
            $var = $this->security->xss_clean($this->input->post('date'));
            }
            else
            {
            $var = $this->search_date;
            }
            if($var == '')
            {
                $var = $_SESSION['date'];
            }else{
                $_SESSION['date'] = $var;
            }
            $date= date_parse_from_format("Y-m-d H:i:s", $var);
            $month = $date['month'];
            $year = $date['year'];
          
            // Passing Data to model to get LOG from DB
            $result['date'] = $var; //date performed on
            $result['type'] = 2; //type of log i.e day, month, year
            $result['deletion_performed']=$this->deletion; //deletion check
            
            // initializing stuff for pagintaion
            $i_size = 0;  // we would pass this by reference to the model to get no of rows in current page
            $config = array();
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;
            $config["full_tag_open"] = '<div id="pagination" >';
            $config["full_tag_close"] = '</div>';
            $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $config["base_url"] = base_url() . "logs/getLogByMonth";
            $config["total_rows"] = $this->getData_model->getLogByMonth_count($month,$year);

            $this->pagination->initialize($config); //insialized

            // getting result from model w.r.t. pagination
            $result['result'] = $this->getData_model->getLogByMonth($month,$year,$config["per_page"], $page_segment, $i_size);

            $result["links"] = $this->pagination->create_links();

            $result['i_getsize']= $i_size;

            //--------------------------------
             
               if($result['result'])
               {
                    $result['no_of_elements']= $config["total_rows"];
               }
               else
               {
                   $result['no_of_elements']=0;
               }
                $result['page_title'] = 'Al-Rehman Cattle & Breeder';
                $this->load->view('login_header',$result);
                $this->load->view('log');
                $this->load->view('login_footer');
        }
        else{
            redirect('login', 'refresh');    
        }
        $this->reroute=0;
        $this->deletion=-1;
    }
    
    public function getLogByYear()
    {
         if($this->usertype=="Admin")
        {
            if($this->reroute==0)
            {
            $var = $this->security->xss_clean($this->input->post('date'));
            }
            else
            {
                $var = $this->search_date;
            }
            if($var == '')
            {
                $var = $_SESSION['date'];
            }else{
                $_SESSION['date'] = $var;
            }
            
             $date= date_parse_from_format("Y-m-d H:i:s", $var);
             $year = $date['year'];
             $result['date'] = $var; //date performed on
             $result['type'] = 3; //type of log i.e day, month, year
             $result['deletion_performed']=$this->deletion; //deletion check
             
            // initializing stuff for pagintaion
            $i_size = 0;  // we would pass this by reference to the model to get no of rows in current page
            $config = array();
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;
            $config["full_tag_open"] = '<div id="pagination" >';
            $config["full_tag_close"] = '</div>';
            $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $config["base_url"] = base_url() . "logs/getLogByYear";
            $config["total_rows"] = $this->getData_model->getLogByYear_count($year);

            $this->pagination->initialize($config); //insialized

            // getting result from model w.r.t. pagination
            $result['result'] = $this->getData_model->getLogByYear($year,$config["per_page"], $page_segment, $i_size);

            $result["links"] = $this->pagination->create_links();

            $result['i_getsize']= $i_size;

            //--------------------------------
             
               if($result['result'])
               {
                    $result['no_of_elements']= $config["total_rows"];
               }
               else
               {
                   $result['no_of_elements']=0;
               }
                   $result['page_title'] = 'Al-Rehman Cattle & Breeder';
                   $this->load->view('login_header',$result);
                   $this->load->view('log');
            //       $this->load->view('login_footer');
        }
        else{
            redirect('login', 'refresh');    
        }
        $this->reroute=0;
        $this->deletion=-1;
    }
         // Deleting Logs
    public function deleteLogs()
    {
        // Getting Data from View
        $logId  = $this->security->xss_clean($this->input->get('logId'));
        $type  = $this->security->xss_clean($this->input->get('type'));
        $this->search_date  = $this->security->xss_clean($this->input->get('date'));
        $this->reroute=1;
        
       $result=$this->dataEntry_model->deleteLog($logId);
       if($result)
       {
        $this->deletion=1; //deletion successful
       }
       else
       {
        $this->deletion=0; //deletion failed
       }
       
       switch($type)
       {
           case 1:
               $this->getLogByDay();
               break;
           case 2:
               $this->getLogByMonth();
               break;
           case 3:
               $this->getLogByYear();
               break;
           default:
               redirect('login', 'refresh'); 
               break;
       }
       
       
    }
    
}
?>
    
