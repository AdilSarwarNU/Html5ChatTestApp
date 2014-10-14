<?php  
session_start();
class Feedbacks extends CI_Controller{
     private $reroute = 0;
     private $deletion = -1;
     private $usertype;
     private $search_date;
     
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        $this->load->model('getData_model');
        $this->load->model('dataEntry_model');
        $this->load->library("pagination");  //pagination Library
         if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $this->usertype = $session_data['usertype'];
            
            //check for admin or accountant here
          
        }else{
            redirect('login', 'refresh');    
        }
    }
     
    // Feedback by Day
    public function getFeedbackByDay()
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
            // Passing Data to model to get LOG from DB
            $result['deletion_performed']=$this->deletion;
            $result['date']=$var;
            $result['type']=1;
            
            $date= date_parse_from_format("Y-m-d H:i:s", $var);
            $month = $date['month'];
            $year = $date['year'];
            $day = $date['day'];
            
            // initializing stuff for pagintaion
            $i_size = 0;  // we would pass this by reference to the model to get no of rows in current page
            $config = array();
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;
            $config["full_tag_open"] = '<div id="pagination" >';
            $config["full_tag_close"] = '</div>';
            $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $config["base_url"] = base_url() . "feedbacks/getFeedbackByDay";
            $config["total_rows"] = $this->getData_model->getFeedbackByDay_count($day,$month,$year);

            $this->pagination->initialize($config); //insialized

            // getting result from model w.r.t. pagination
            $result['result'] = $this->getData_model->getFeedbackByDay($day,$month,$year,$config["per_page"], $page_segment, $i_size);

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
                $result['page_title'] = 'Al-Rehman Cattle & Breeder | Feedback';
                $this->load->view('login_header',$result);
                $this->load->view('feedback');
                $this->load->view('login_footer');
        }
        else{
            redirect('login', 'refresh');    
        }
        $this->reroute=0;
        $this->deletion=-1;
    }
    
    //Feedback by Month
    public function getFeedbackByMonth()
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
            $result['deletion_performed']=$this->deletion;
            $result['date']=$var;
            $result['type']=2;
            
            // initializing stuff for pagintaion
            $i_size = 0;  // we would pass this by reference to the model to get no of rows in current page
            $config = array();
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;
            $config["full_tag_open"] = '<div id="pagination" >';
            $config["full_tag_close"] = '</div>';
            $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $config["base_url"] = base_url() . "feedbacks/getFeedbackByMonth";
            $config["total_rows"] = $this->getData_model->getFeedbackByMonth_count($month,$year);

            $this->pagination->initialize($config); //insialized

            // getting result from model w.r.t. pagination
            $result['result'] = $this->getData_model->getFeedbackByMonth($month,$year,$config["per_page"], $page_segment, $i_size);

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
                $result['page_title'] = 'Al-Rehman Cattle & Breeder | Feedback';
                $this->load->view('login_header',$result);
                $this->load->view('feedback');
                $this->load->view('login_footer');
        }
        else{
            redirect('login', 'refresh');    
        }
          $this->reroute=0;
        $this->deletion=-1;
    }
    
    
    // feedback by Year
    public function getFeedbackByYear()
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
             $result['deletion_performed']=$this->deletion;
             // Passing Data to model to get LOG from DB
             $result['date']=$var;
             $result['type']=3;
             
             // initializing stuff for pagintaion
            $i_size = 0;  // we would pass this by reference to the model to get no of rows in current page
            $config = array();
            $config["per_page"] = 5;
            $config["uri_segment"] = 3;
            $config["full_tag_open"] = '<div id="pagination" >';
            $config["full_tag_close"] = '</div>';
            $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

            $config["base_url"] = base_url() . "feedbacks/getFeedbackByYear";
            $config["total_rows"] = $this->getData_model->getFeedbackByYear_count($year);

            $this->pagination->initialize($config); //insialized

            // getting result from model w.r.t. pagination
            $result['result'] = $this->getData_model->getFeedbackByYear($year,$config["per_page"], $page_segment, $i_size);

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
                   $result['page_title'] = 'Al-Rehman Cattle & Breeder | Feedback';
                   $this->load->view('login_header',$result);
                   $this->load->view('feedback');
                   $this->load->view('login_footer');
        }
        else{
            redirect('login', 'refresh');    
        }
        $this->reroute=0;
        $this->deletion=-1;
    }
    // Deleting User Feedback
    public function deleteFeedback()
    {
        // Getting Data from View
        $id  = $this->security->xss_clean($this->input->get('id'));
        $type  = $this->security->xss_clean($this->input->get('type'));
        $this->search_date  = $this->security->xss_clean($this->input->get('date'));
        $this->reroute=1;
        
       $result=$this->dataEntry_model->deleteFeedback($id);
       if($result)
       {
            $this->deletion=1;
       }
       else
       {
            $this->deletion = 0;
       }
       
       switch($type)
       {
           case 1:
               $this->getFeedbackByDay();
               break;
           case 2:
               $this->getFeedbackByMonth();
               break;
           case 3:
               $this->getFeedbackByYear();
               break;
           default:
               redirect('login', 'refresh'); 
               break;
       }
    
       
    }
}
?>
    