<?php
session_start();
class Tools extends CI_Controller{
    public $usertype;
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $this->usertype = $session_data['usertype'];
            
            //check for admin or accountant here
          
        }else{
            redirect('login', 'refresh');    
        }
    
    }
    public function index()
    {
        
            //check for admin or accountant here
            if($this->usertype=="Admin")  //opening home for admin
            {
                $this->admin();
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $this->add();
            }else{
                $this->logout();
            }
    }
    public function add()
    {
            //check for admin or accountant here
            if($this->usertype=="Admin")  //opening home for admin
            {   $this->admin();
            //    $this->load->view('about');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $data['deletion_performed']=0;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder - Add Animal Data';
                $this->load->view('login_header',$data);
                $this->load->view('add');
                $this->load->view('login_footer');
            }else{
                $this->logout();
            }
    }
    
    public function delete()
    {
            //check for admin or accountant here
            if($this->usertype=="Admin")  //opening home for admin
            {
                $this->admin();
            //    $this->load->view('about');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $data['no_of_elements']=-1;
                $data['deletion_performed']=0;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder - Delete Animal Data';
                $this->load->view('login_header',$data);
                $this->load->view('delete');
                $this->load->view('login_footer');
            }else{
                $this->logout();
            }
    }
    
    public function update()
    {
            //check for admin or accountant here
            if($this->usertype=="Admin")  //opening home for admin
            {$this->admin();
            
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
               $data['result']['earTag'.'0']=null;
                $data['update_performed']= 0;
                $data['no_of_elements']= -1;
                $data['first_time']= 0;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Update Animal Data';
                $this->load->view('login_header',$data);
                $this->load->view('update');
                $this->load->view('login_footer');    
            }else{
                $this->logout();
            }
    }
    
      public function search()
    {
            //check for admin or accountant here
            if($this->usertype=="Admin")  //opening home for admin
            {$this->admin();
            //    $this->load->view('about');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $data['no_of_elements']= -1;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Search Animal ';
                $this->load->view('login_header',$data);
                $this->load->view('search');
                $this->load->view('login_footer');   
            }else{
                $this->logout();
            }
    }
      public function search_simple()
    {
            //check for admin or accountant here
            if($this->usertype=="Admin")  //opening home for admin
            {
                $data['no_of_elements']= -1;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Search Animal ';
                $this->load->view('login_header',$data);
                $this->load->view('search_a');
                $this->load->view('login_footer'); 
              
            //    $this->load->view('about');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
               $this->add();
            }else{
                $this->logout();
            }
    }
      public function search_all()
    {
            //check for admin or accountant here
            if($this->usertype=="Admin")  //opening home for admin
            {
                 $data['no_of_elements']= -1;
        $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Search Animal ';
        $this->load->view('login_header',$data);
        $this->load->view('search_all');
        $this->load->view('login_footer');   
              
            //    $this->load->view('about');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                  $this->add();
            }else{
                $this->logout();
            }
    }
    public function admin()
    {
            //check for admin or accountant here
            if($this->usertype=="Admin")  //opening home for admin
            {
                $this->reports();
                
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $this->add();
            }else{
                $this->logout();
            }
    }
   public function logs()
   {
       if($this->usertype=="Admin")  //opening home for admin
            {
                $data['date']="1111-11-11";
                $data['type']=0;
                $data['no_of_elements']=-1;
                $data['deletion_performed']=-1;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Logs ';
                $this->load->view('login_header',$data);
                $this->load->view('log');
                $this->load->view('login_footer');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $this->add();
            }else{
                $this->logout();
            }  
   }
   
    public function feedback()          
   {
       if($this->usertype=="Admin")  //opening home for admin
            {
                $this->load->model('contact_model');
                $data['result'] = $this->contact_model->getContactData();
       
                $data['no_of_elements']=count($data['result']);
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Search Animal ';
                $this->load->view('login_header',$data);
                $this->load->view('feedback_initial');
                $this->load->view('login_footer');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $this->add();
            }else{
                $this->logout();
            }   
   }
   
   public function animal_profile_admin()
   {
        $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Animal Profile ';
         $this->load->view('login_header',$data);
         $this->load->view('animal_profile_admin');
         $this->load->view('login_footer');
   }
   
      public function animal_profile_acc()
   {
           $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Animal Profile ';
         $this->load->view('login_header',$data);
         $this->load->view('animal_profile_acc');
         $this->load->view('login_footer');
   }
     public function ifeedback()          
   {
       if($this->usertype=="Admin")  //opening home for admin
            {
                $this->load->model('contact_model');
                $data['result'] = $this->contact_model->getContactData();
       
                $data['no_of_elements']=count($data['result']);
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Search Animal ';
                $this->load->view('login_header',$data);
                $this->load->view('feedback');
                $this->load->view('login_footer');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $this->add();
            }else{
                $this->logout();
            }   
   }
   
    public function reports()          
   {
            if($this->usertype=="Admin")  //opening home for admin
                {
                    $data['flag']=0;
                    $data['report_number']=-1;
                    $data['date']="1111-11-11"; // dummy date
                    $data['earTag']=0; //dummy earTag
                    $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Reports ';
                    $this->load->view('login_header',$data);
                    $this->load->view('reports');
                    $this->load->view('login_footer'); 
                }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $this->add();
            }else{
                $this->logout();
            }
   }
    public function logout()
    {
      $data['flag']=1;
      $this->session->unset_userdata('logged_in');
      session_destroy();
      
      $this->load->helper(array('form'));
      $data['page_title'] = 'Al-Rehman Cattle & Breeder';
      $this->load->view('login_header',$data);
      $this->load->view('login_page');
      $this->load->view('login_footer');
    }
    
    public function updatePasswordProfile()
    {
        if($this->usertype=="Admin")  //opening home for admin
            {
                $data['flag']=0;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Update Password ';
                $this->load->view('login_header',$data);
                $this->load->view('update_password');
                $this->load->view('login_footer');
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $this->add();
            }else{
                $this->logout();
            } 
    }
    
    public function addSale()
    {
        if($this->usertype=="Admin")  //opening home for admin
            {
                $this->admin();
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $data['sale_added']=0;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Add Sale ';
                $this->load->view('login_header',$data);
                $this->load->view('add_sale');
                $this->load->view('login_footer');
                
            }else{
                $this->logout();
            }   
    }
    
    public function deleteSale()
    {
        if($this->usertype=="Admin")  //opening home for admin
            {
                $this->admin();
                
            }else if($this->usertype=="Accountant")   //opening home for accountant
            {
                $data['sale_deleted']=0;
                $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Delete Sale ';
                $this->load->view('login_header',$data);
                $this->load->view('delete_sale');
                $this->load->view('login_footer');
            }else{
                $this->logout();
            } 
    }
    
}
?>