<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class verifylogin extends CI_Controller{

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');
  
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.&nbsp; User redirected to Al-Rehman Cattle & Breeder
      $this->load->helper(array('form'));
      $data['page_title'] = 'Al-Rehman Cattle & Breeder';
      $this->load->view('login_header',$data);
      $this->load->view('login_page');
      $this->load->view('login_footer');
   }
   else{
       
       redirect('tools', 'refresh');     //haider - home
       
   }
 }
 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('username');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
    // $usertype = $result->type; //type
     $sess_array = array(
       'username' => $result->username,
       'usertype' => $result->type
     );
     $this->session->set_userdata('logged_in', $sess_array);
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return FALSE;
   }
 }
}
?>

