 <?php  
class contact_model extends CI_Model {  
  
    function contact_model()
    {  
        // Call the Model constructor  
        parent::__construct(); 
        $this->load->helper('date');
         $this->load->library('Image_lib');
         date_default_timezone_set("Asia/Karachi");
    }  
    
      // Inserting Data into Animals Table
    public function insertContactData($name, $email, $phone, $address, $subject, $comment)
    {
         $data = array(
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'subject' => $subject,
                'comment' => $comment,
                'date' => date('Y-m-d H:i:s', time())
            );
         $this->db->insert('contact',$data);
    }
    
    public function getContactData()
    {
        $query= $this->db->get('contact');
        return $query->result_array();    
    }
}  
?>