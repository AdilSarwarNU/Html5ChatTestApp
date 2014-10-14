<?php  
class login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('asset');
    }
    
    public function index()
    {
        $data['flag']=-1;
        if($this->session->userdata('logged_in'))
        {
            redirect('tools','refresh');
        }else{
        
          $this->load->helper(array('form'));
          $data['page_title'] = 'Al-Rehman Cattle & Breeder';
          $this->load->view('login_header',$data);
          $this->load->view('login_page');
          $this->load->view('login_footer');
        }
    }
}
?>