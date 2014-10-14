 <?php  
class updatePassword_model extends CI_Model {  
  
    function updatePassword_model()
    {  
        // Call the Model constructor  
        parent::__construct(); 
    }  
    
    // Updating User Password
    public function updatePassword($type, $newPassword)
    {
        $this->db->where('type',$type);
        $this->db->set('password',MD5($newPassword));
        $res = $this->db->update('login');
        if($res)
            return true;
        else
            return false;
    }
}  
?>