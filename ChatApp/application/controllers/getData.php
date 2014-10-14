<?php
session_start();
class GetData extends CI_Controller{
    public $usertype;
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
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
    
     public function getAllAnimals()
    { 
         // Loading Model
        $this->load->model('getData_model');
        
        // initializing stuff for pagintaion
        $i_size = 0;  // we would pass this by reference to the model to get no of rows in current page
        $config = array();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
        $config["full_tag_open"] = '<div id="pagination" >';
        $config["full_tag_close"] = '</div>';
        $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        $config["base_url"] = base_url() . "getData/getAllAnimals";
        $config["total_rows"] = $this->getData_model->getAllAnimals_count();
        
        $this->pagination->initialize($config); //insialized
        
        // getting result from model w.r.t. pagination
        $result['result'] = $this->getData_model->getAllAnimals($config["per_page"], $page_segment, $i_size);
        
        $result["links"] = $this->pagination->create_links();
        
        $result['no_of_elements']= $config["total_rows"];
        $result['i_getsize']= $i_size;
        $result['do_we_need_links'] = 1;
        //--------------------------------
        
         $result['first_time']= 1;
        
        if($result)
        {
           
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            $this->load->view('search_all');
            $this->load->view('login_footer');
        }
        else
        {}
    }
    
    // Getting Animals Based on Breed
    public function getAnimalByBreed()
    {
        $breed  = $this->security->xss_clean($this->input->post('search_breed'));
        $page = $this->input->post('page_id');
        
        //storing in sessions
            if($breed == '')
            {
                $breed = $_SESSION['breed'];
            }else{
                $_SESSION['breed'] = $breed;
            }
            if($page == '')
            {
                $page = $_SESSION['page'];
            }else{
                $_SESSION['page'] = $page;
            }
            
        // Loading Model
        $this->load->model('getData_model');
        
        // initializing stuff for pagintaion
        //----------------------------------
        $config = array();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
        $config["full_tag_open"] = '<div id="pagination" >';
        $config["full_tag_close"] = '</div>';
        $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $i_size = 0;    // we would pass this by reference to the model to get no of rows in current page
        
        $config["total_rows"] = $this->getData_model->getAnimalsByBreed_count($breed);
        
        $config["base_url"] = base_url() . "getData/getAnimalByBreed";
        
        $this->pagination->initialize($config); //insialized
        
        //getting result from model w.r.t. pagination
        $result['result'] = $this->getData_model->getAnimalsByBreed($breed,$config["per_page"], $page_segment, $i_size);
        
        $result["links"] = $this->pagination->create_links();
        $result['no_of_elements']= $config["total_rows"];
        $result['i_getsize']= $i_size;
        $result['do_we_need_links'] = 1;
        //-------------------------------
        
        $result['first_time']= 1;
        $result['deletion_performed']=0;
        if($result)
        {
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
             if($page=="search")
            {
                $this->load->view('search');
            }
             else  if($page=="admin_search")
            {
                $this->load->view('search_a');
            }
              else  if($page=="update_search")
            {
                $this->load->view('search');
            }
            else if($page=="delete")
            {
                $this->load->view('delete');
            }
            else if($page=="update")
            {
                $this->load->view('update');
            }
            $this->load->view('login_footer');
        }
        else
        {}
    }
    
    // Getting Animals Based on Type
    public function getAnimalByType()
    {
        // Getting Data from View
        $type  = $this->security->xss_clean($this->input->post('search_type'));
         $page = $this->input->post('page_id');
         //storing in sessions
            if($type == '')
            {
                $type = $_SESSION['type'];
            }else{
                $_SESSION['type'] = $type;
            }
            if($page == '')
            {
                $page = $_SESSION['page'];
            }else{
                $_SESSION['page'] = $page;
            }
        // Loading Model
        $this->load->model('getData_model');
        
        // initializing stuff for pagintaion
        //----------------------------------
        $config = array();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
        $config["full_tag_open"] = '<div id="pagination" >';
        $config["full_tag_close"] = '</div>';
        $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $i_size = 0;    // we would pass this by reference to the model to get no of rows in current page
        
        $config["total_rows"] = $this->getData_model->getAnimalsByType_count($type);
        
        $config["base_url"] = base_url() . "getData/getAnimalByType";
        
        $this->pagination->initialize($config); //insialized
        
        //getting result from model w.r.t. pagination
        $result['result'] = $this->getData_model->getAnimalsByType($type,$config["per_page"], $page_segment, $i_size);
        
        $result["links"] = $this->pagination->create_links();
        $result['no_of_elements']= $config["total_rows"];
        $result['i_getsize']= $i_size;
        $result['do_we_need_links'] = 1;
        //-------------------------------
        
        
        // Passing Data to model to insert into DB
         $result['first_time']= 1;
         $result['deletion_performed']=0;
        if($result)
        {
        
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            if($page=="search")
            {
                $this->load->view('search');
            }
             else  if($page=="admin_search")
            {
                $this->load->view('search_a');
            }
            else  if($page=="update_search")
            {
                $this->load->view('search');
            }
            else if($page=="delete")
            {
                $this->load->view('delete');
            }
            else if($page=="update")
            {
                $this->load->view('update');
            }
            $this->load->view('login_footer');
        }
        else
        {}
    }
    
    // Getting Animals Based on Category
    public function getAnimalByCategory()
    {
        // Getting Data from View
        $category  = $this->security->xss_clean($this->input->post('search_category'));
         $page = $this->input->post('page_id');
         //storing in sessions
            if($category == '')
            {
                $category = $_SESSION['category'];
            }else{
                $_SESSION['category'] = $category;
            }
            if($page == '')
            {
                $page = $_SESSION['page'];
            }else{
                $_SESSION['page'] = $page;
            }
        // Loading Model
        $this->load->model('getData_model');
        
        // initializing stuff for pagintaion
        //----------------------------------
        $config = array();
        $config["per_page"] = 8;
        $config["uri_segment"] = 3;
        $config["full_tag_open"] = '<div id="pagination" >';
        $config["full_tag_close"] = '</div>';
        $page_segment = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $i_size = 0;    // we would pass this by reference to the model to get no of rows in current page
        
        $config["total_rows"] = $this->getData_model->getAnimalsByCategory_count($category);
        
        $config["base_url"] = base_url() . "getData/getAnimalByCategory";
        
        $this->pagination->initialize($config); //insialized
        
        //getting result from model w.r.t. pagination
        $result['result'] = $this->getData_model->getAnimalsByCategory($category,$config["per_page"], $page_segment, $i_size);
        
        $result["links"] = $this->pagination->create_links();
        $result['no_of_elements']= $config["total_rows"];
        $result['i_getsize']= $i_size;
        $result['do_we_need_links'] = 1;
        //-------------------------------
        
        $result['first_time']= 1;
         $result['deletion_performed']=0;
        if($result)
        {
          
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            if($page=="search")
            {
                $this->load->view('search');
            }
             else  if($page=="admin_search")
            {
                $this->load->view('search_a');
            }
              else  if($page=="update_search")
            {
                $this->load->view('search');
            }
            else if($page=="delete")
            {
                $this->load->view('delete');
            }
            else if($page=="update")
            {
                $this->load->view('update');
            }
            $this->load->view('login_footer');
        }
        else
        {}
    }
    
      public function getAnimalProfile()
      {
       $earTag  = $this->security->xss_clean($this->input->get('id'));
       $page = $this->security->xss_clean($this->input->get('page'));
      
     //    Loading Model
        $this->load->model('getData_model');

        $result['result'] = $this->getData_model->getAnimal($earTag);
        $result['no_of_elements']=count($result['result'])/9;
//         $result['first_time']= 1;
//         $result['deletion_performed']=0;
        
        if($result)
        {
           $result['error_flag']=0;
          
        }
        else
        {
            $result['error_flag']=1;
          
        }
          $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            
                if($this->usertype=="Admin")
                {
                 $this->load->view('animal_profile_admin');
                }
                else if($this->usertype=="Accountant")
                {
                 $this->load->view('animal_profile_acc');
                }
                else
                {
                   redirect('login', 'refresh');    
                }
            
            $this->load->view('login_footer');
      }
    // Getting One Animal Based on Eartag
    public function getAnimal()
    { 
        // Getting Data from View
        $earTag  = $this->security->xss_clean($this->input->post('search_ear_tag_no'));
        $page = $this->input->post('page_id');
        // Loading Model
        $this->load->model('getData_model');
        
        // Passing Data to model to insert into DB
        // Passing Data to model to insert into DB
        $result['result'] = $this->getData_model->getAnimal($earTag);
        $result['no_of_elements']=count($result['result'])/9;
         $result['first_time']= 1;
         $result['deletion_performed']=0;
        $result['i_getsize'] = $result['no_of_elements'];
        $result['do_we_need_links'] = 0;
        if($result)
        {
           
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
            $this->load->view('login_header',$result);
            if($page=="search")
            {
                $this->load->view('search');
            }
             else  if($page=="admin_search")
            {
                $this->load->view('search_a');
            }
              else  if($page=="update_search")
            {
                $this->load->view('search');
            }
            else if($page=="delete")
            {
                $this->load->view('delete');
            }
            else if($page=="update")
            {
                $this->load->view('update');
            }
            $this->load->view('login_footer');
        }
        else
        {}
    }
    
    public function getForUpdate()
    {
        $earTag = $this->input->get('eartag');
        $type = $this->input->get('type');
        
        $this->load->model('getData_model');
        
        $result['result']= $this->getData_model->getAnimal($earTag);
        if($type=="profile")
            {
                $result['no_of_elements']=1;
            }
        else if($type=="daily")
            {
                $result['no_of_elements']=-1;
            }
        if($result)
        {
            $result['page_title'] = 'Al-Rehman Cattle & Breeder';
             $result['first_time']= 1;
             $result['update_performed']=0;
            $this->load->view('login_header',$result);
            $this->load->view('update');
            $this->load->view('login_footer');
        }
        else
        {}
    }
    public function deleteAnimal()
    {
        
    }
    
    public function getContactData()
    {
          $this->load->model('contact_model');
          $result['result'] = $this->contact_model->getContactData();
          print_r($result); 
    }
}
?>
