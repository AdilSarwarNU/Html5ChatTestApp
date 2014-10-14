<?php
/**
 * Description of user
 *
 * @author Haider
 */
class user extends CI_Model {
    
    public function login($username,$password)
    {
        
        $this-> db-> where('username', $username);
        $this-> db-> where('password', MD5($password));      //haider - MD5($password) - then you need to insert it in md5() way
        $this-> db -> limit(1);
        
        $query = $this -> db -> get('login');
        if($query -> num_rows() == 1)
	{
	    return $query->row();
	}
	else
	   {
	    return false;
	}
    }
}