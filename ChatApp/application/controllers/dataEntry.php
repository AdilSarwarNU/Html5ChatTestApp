<?php  
class DataEntry extends CI_Controller{
        public $usertype;
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
         if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $this->usertype = $session_data['usertype'];
            
            //check for admin or accountant here
          
        }else{
            redirect('login', 'refresh');    
        }
    }
    
    // Adding Animal into DB
    public function addAnimal()
    {
        // Getting Data from View
        $earTag  = $this->security->xss_clean($this->input->post('add_ear_tag_no'));
        $picPath = $this->security->xss_clean($this->input->post('userfile'));
        $purchasePrice = $this->security->xss_clean($this->input->post('add_price_purchase'));
        $type = $this->security->xss_clean($this->input->post('type_animal'));
        $initialWeight = $this->security->xss_clean($this->input->post('add_weight'));
        $breed = $this->security->xss_clean($this->input->post('add_breed'));
        $travelExpenses = $this->security->xss_clean($this->input->post('add_price_travel'));
        $category = $this->security->xss_clean($this->input->post('category_animal'));
        $purchaseDate = $this->security->xss_clean($this->input->post('add_date_purchase'));
        
        // Loading Model
        $this->load->model('dataEntry_model');
        
        // Passing Data to model to insert into DB
        $exists = $this->dataEntry_model->checkExisting($earTag);
        if(!$exists)
        {
            $result = $this->dataEntry_model->insertData($earTag, $picPath, $purchasePrice, $type, $initialWeight, $breed, $travelExpenses, $category, $purchaseDate);

            if($result)
            {
                $data['addition_performed']=1;
            }
            else
            {
                $data['addition_performed']=-1;
            }
        }
        else
        {
           $data['addition_performed']=-2; 
        }
        $data['page_title'] = 'Al-Rehman Cattle & Breeder';
        $this->load->view('login_header',$data);
        $this->load->view('add');
        $this->load->view('login_footer');
    }
        // Adding Sale of Animal
    public function addSaleAnimal()
    {
        // Getting Data from View
        $earTag  = $this->security->xss_clean($this->input->post('add_ear_tag_no'));
        $salePrice = $this->security->xss_clean($this->input->post('add_price_purchase')); 
        $finalWeight = $this->security->xss_clean($this->input->post('add_weight')); 
        $saleDate = $this->security->xss_clean($this->input->post('add_date_purchase'));
        
        // Loading Model
        $this->load->model('dataEntry_model');
        
        // Passing Data to model to insert into DB
        $result = $this->dataEntry_model->saleAnimal($earTag, $salePrice, $finalWeight, $saleDate);
        
        if($result)
        {
            $data['sale_added']=1;
        }
        else
        {
            $data['sale_added']=-1;
        }
        $data['page_title'] = 'Al-Rehman Cattle & Breeder';
        $this->load->view('login_header',$data);
        $this->load->view('add_sale');
        $this->load->view('login_footer');
    }
    // delete Animal From DB
    public function deleteAnimal()
    {
        // Getting Data from View
        $earTag  = $this->security->xss_clean($this->input->get('earTag'));
        
        // Loading Model
        $this->load->model('dataEntry_model');
       
       $result=$this->dataEntry_model->deleteAnimal($earTag);
       if($result==1)
       {
             $data['deletion_performed']=1;
       }
       else
       {
        $data['deletion_performed']=-1;
       }
        $data['no_of_elements']=-1;
        $data['page_title'] = 'Al-Rehman Cattle & Breeder - Delete Animal Data';
        $this->load->view('login_header',$data);
        $this->load->view('delete');
        $this->load->view('login_footer');
      
       
    }
   
    
    
    
       // Deleting Sale Animal
    public function deleteAnimalSale()
    {
        // Getting Data from View
        $earTag  = $this->security->xss_clean($this->input->post('add_ear_tag_no'));
        
        // Loading Model
        $this->load->model('dataEntry_model');
       $result=$this->dataEntry_model->deleteAnimalFromSale($earTag);
       if($result)
       {
            $data['sale_deleted']=1;
       }
       else
       {
         $data['sale_deleted']=-1;
       }
        
        $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Delete Sale ';
        $this->load->view('login_header',$data);
        $this->load->view('delete_sale');
        $this->load->view('login_footer');   
    }
    
    // Updating Animal Profile
    public function updateAnimalProfile()
    {
           // Getting Data from View
        $earTag  = $this->security->xss_clean($this->input->post('add_ear_tag_no'));
        $picPath = $this->security->xss_clean($this->input->post('userfile'));
        $picCheck = $this->security->xss_clean($this->input->post('filename'));
        $purchasePrice = $this->security->xss_clean($this->input->post('add_price_purchase'));
        $type = $this->security->xss_clean($this->input->post('type_animal'));
        $initialWeight = $this->security->xss_clean($this->input->post('add_weight'));
        $breed = $this->security->xss_clean($this->input->post('add_breed'));
        $travelExpenses = $this->security->xss_clean($this->input->post('add_price_travel'));
        $category = $this->security->xss_clean($this->input->post('category_animal'));
        $purchaseDate = $this->security->xss_clean($this->input->post('add_date_purchase'));

        // Loading Model
        $this->load->model('dataEntry_model');
        
        // Passing Data to model to update DB
        $result = $this->dataEntry_model->updateAnimalProfile($earTag, $picPath, $picCheck, $purchasePrice, $type, $initialWeight, $breed, $travelExpenses, $category, $purchaseDate);
    
        if($result==1)
        {
              $data['update_performed']=1;
           
        }
        else
        {
             $data['update_performed']=-1;
        }
          $data['result']['earTag'.'0']=null;
        $data['no_of_elements']= -1;
        $data['first_time']= 0;
        $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Update Animal Data';
        $this->load->view('login_header',$data);
        $this->load->view('update');
        $this->load->view('login_footer'); 
    }
    
    // Updating Animal Daily Profile
    public function updateAnimalDaily()
    {
        // Getting Data from View
        $earTag  = $this->security->xss_clean($this->input->post('update_ear_tag_no'));
        $date  = $this->security->xss_clean($this->input->post('update_date'));
        $vaccineExpenses = $this->security->xss_clean($this->input->post('update_vaccine'));
        $feedExpenses = $this->security->xss_clean($this->input->post('update_feed'));
        $currentWeight = $this->security->xss_clean($this->input->post('update_weight'));
        $otherExpenses = $this->security->xss_clean($this->input->post('update_other'));
        
        // Loading Model
        $this->load->model('dataEntry_model');
        
        // Passing Data to model to update DB
        $result = $this->dataEntry_model->dailyUpdateAnimal($earTag, $date, $vaccineExpenses, $feedExpenses, $currentWeight, $otherExpenses);
    
        if($result==1)
        {
             $data['update_performed']=1;
          
        }
        else
        {
             $data['update_performed']=-1;
        }
          $data['result']['earTag'.'0']=null;
        $data['no_of_elements']= -1;
        $data['first_time']= 0;
        $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Update Animal Data';
        $this->load->view('login_header',$data);
        $this->load->view('update');
        $this->load->view('login_footer'); 
    }
    
    // Updating User Password
    public function updatePassword()
    {
        $type = $this->security->xss_clean($this->input->post('pass_type'));
        $newPassword = $this->security->xss_clean($this->input->post('new_password'));

        // Loading Model
        $this->load->model('updatePassword_model');

        // Passing Data to model to update DB
        $result = $this->updatePassword_model->updatePassword($type, $newPassword);

        if($result)
        {
            $data['flag']=1;
        }
        else
        {
            $data['flag']=-1;
        }
        $data['page_title'] = 'Al-Rehman Cattle & Breeder  - Update Password';
        $this->load->view('login_header',$data);
        $this->load->view('update_password');
        $this->load->view('login_footer');
    }
    
}
?>
