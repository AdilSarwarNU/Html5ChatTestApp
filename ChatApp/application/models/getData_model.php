 <?php  
class getData_model extends CI_Model {  
  
    function getData_model()
    {  
        // Call the Model constructor  
        parent::__construct(); 
    }
    
    public function getAllAnimals_count() {
        return $this->db->get('animals')->num_rows();
    }
    public function getAllAnimals($limit, $start ,&$i_size)
    {
        $this->db->limit($limit, $start);   //to limit the no. of rows we need for current page
        $result = $this->db->get('animals');
        
        $output = Array();
        $i = 0;
        foreach($result->result_array() as $row)
        {
            $output['earTag'.$i] = $row['eartag_no'];
            $output['picPath'.$i] = $row['pic_path'];
            $output['purchasePrice'.$i] = $row['purchase_price'];
            $output['type'.$i] = $row['type'];
            $output['initialWeight'.$i] = $row['initial_weight'];
            $output['breed'.$i] = $row['breed'];
            $output['travelExpenses'.$i] = $row['travel_expenses'];
            $output['category'.$i] = $row['category'];
              $output['purchaseDate'.$i] = $row['purchase_date'];
            $i++;
        }
        $i_size = $i;   // $i_size was passed by reference
        return $output;
    }
    // Getting Animal based on Eartag
    public function getAnimal($earTag)
    {
        $this->db->where('eartag_no',$earTag);
        $result = $this->db->get('animals');
           
        $output = Array();
        $i = 0;
        foreach($result->result_array() as $row)
        {
            $output['earTag'.$i] = $row['eartag_no'];
            $output['picPath'.$i] = $row['pic_path'];
            $output['purchasePrice'.$i] = $row['purchase_price'];
            $output['type'.$i] = $row['type'];
            $output['initialWeight'.$i] = $row['initial_weight'];
            $output['breed'.$i] = $row['breed'];
            $output['travelExpenses'.$i] = $row['travel_expenses'];
            $output['category'.$i] = $row['category'];
            $output['purchaseDate'.$i] = $row['purchase_date'];
            $i++;
        }
        return $output;
    }
    
    public function getAnimalsByType_count($type)
    {
        $this->db->where('type',$type);
        return $this->db->get('animals')->num_rows();
    }
    
    // Getting Animal based on Type like Milk, Eid, Slaughter
    public function getAnimalsByType($type, $limit, $start ,&$i_size)
    {
        $this->db->limit($limit, $start); //to limit the no. of rows we need for current page
        $this->db->where('type',$type);
        $result = $this->db->get('animals');
        
        $output = Array();
        $i = 0;
        
        foreach($result->result_array() as $row)
        {
            $output['earTag'.$i] = $row['eartag_no'];
            $output['picPath'.$i] = $row['pic_path'];
            $output['purchasePrice'.$i] = $row['purchase_price'];
            $output['type'.$i] = $row['type'];
            $output['initialWeight'.$i] = $row['initial_weight'];
            $output['breed'.$i] = $row['breed'];
            $output['travelExpenses'.$i] = $row['travel_expenses'];
            $output['category'.$i] = $row['category'];
              $output['purchaseDate'.$i] = $row['purchase_date'];
            $i++;
        }
        $i_size =$i;
        return $output;
    }
    
    
    // Getting Animal Updates based on Eartag Number
    public function getAnimalUpdates($earTag)
    {
        $this->db->where('eartag_no',$earTag);
        $result = $this->db->get('updates');
        
        $output = Array();
        $i = 0;
        
        foreach($result->result_array() as $row)
        {
            $output['earTagNumber'.$i] = $row['eartag_no'];
            $output['date'.$i] = $row['date'];
            $output['vaccineExpenses'.$i] = $row['vaccine_expenses'];
            $output['feedExpenses'.$i] = $row['feed_expenses'];
            $output['currentWeight'.$i] = $row['current_weight'];
            $output['otherExpenses'.$i] = $row['other_expenses'];
            $i++;
        }
        return $output;
    }
    
     public function getAnimalsByCategory_count($category)
     {
         $this->db->where('category',$category);
         return $this->db->get('animals')->num_rows();
     }
    // Getting Animal based on Category like Cow, Goat
    public function getAnimalsByCategory($category, $limit, $start ,&$i_size)
    {
        $this->db->limit($limit, $start); //to limit the no. of rows we need for current page
        $this->db->where('category',$category);
        $result = $this->db->get('animals');
        
        $output = Array();
        $i = 0;
        
        foreach($result->result_array() as $row)
        {
            $output['earTag'.$i] = $row['eartag_no'];
            $output['picPath'.$i] = $row['pic_path'];
            $output['purchasePrice'.$i] = $row['purchase_price'];
            $output['type'.$i] = $row['type'];
            $output['initialWeight'.$i] = $row['initial_weight'];
            $output['breed'.$i] = $row['breed'];
            $output['travelExpenses'.$i] = $row['travel_expenses'];
            $output['category'.$i] = $row['category'];
            $output['purchaseDate'.$i] = $row['purchase_date'];
            $i++;
        }
        $i_size = $i;
        return $output;
    }
    
    public function getAnimalsByBreed_count($breed) {
        $this->db->where('breed',$breed);
        return $this->db->get('animals')->num_rows();
    }
    // Getting Animal based on Breed like Sahiwal
    public function getAnimalsByBreed($breed, $limit, $start ,&$i_size)
    {
        $this->db->limit($limit, $start); //to limit the no. of rows we need for current page
        $this->db->where('breed',$breed);
        $result = $this->db->get('animals');
        
        $output = Array();
        $i = 0;
        
        foreach($result->result_array() as $row)
        {
            $output['earTag'.$i] = $row['eartag_no'];
            $output['picPath'.$i] = $row['pic_path'];
            $output['purchasePrice'.$i] = $row['purchase_price'];
            $output['type'.$i] = $row['type'];
            $output['initialWeight'.$i] = $row['initial_weight'];
            $output['breed'.$i] = $row['breed'];
            $output['travelExpenses'.$i] = $row['travel_expenses'];
            $output['category'.$i] = $row['category'];
              $output['purchaseDate'.$i] = $row['purchase_date'];
            $i++;
        }
        $i_size = $i;
        return $output;
    }
    
    public function getFeedbackByDay_count($day,$month, $year)
    {
        $dt1 = "".$year."-".$month."-".$day."";
        $first = date($dt1);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `contact` WHERE DATE(`date`) = '$first'"); //problem may occur limt
        $i = 0;
        foreach($result->result_array() as $row)
        {
            $i++;
        }
        return $i;
    }
    
    // Getting Feedback by Day
    public function getFeedbackByDay($day,$month, $year ,$limit, $start ,&$i_size)
    {
        $dt1 = "".$year."-".$month."-".$day."";
        $first = date($dt1);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `contact` WHERE DATE(`date`) = '$first' LIMIT $start,$limit "); //problem may occur limt
        
        $output = Array();
        $i = 0;
        $flag = false;
        foreach($result->result_array() as $row)
        {
                $output['id'.$i] = $row['id'];
                $output['name'.$i] = $row['name'];
                $output['email'.$i] = $row['email'];
                $output['phone'.$i] = $row['phone'];
                $output['address'.$i] = $row['address'];
                $output['subject'.$i] = $row['subject'];
                $output['comment'.$i] = $row['comment'];
                $output['date'.$i] = $row['date'];
                $i++;
                $flag = true;
        }
        $i_size =$i;
        if($flag)
            return $output;
        else
            return false;
    }
    public function getFeedbackByMonth_count($month,$year)
    {
        $dt1 = "".$year."-".$month."-01";
        $first = date($dt1);
        $dt2 = "".$year."-".$month."-31";
        $second = date($dt2);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `contact` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second'");
        $i = 0;
        foreach($result->result_array() as $row)
        {
            $i++;
        }
        return $i;
    }
    // Getting Feedback By Month
    public function getFeedbackByMonth($month, $year ,$limit, $start ,&$i_size)
    { 
        $dt1 = "".$year."-".$month."-01";
        $first = date($dt1);
        $dt2 = "".$year."-".$month."-31";
        $second = date($dt2);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `contact` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second' LIMIT $start,$limit ");
        
        $i = 0;
        $flag = false;
        foreach($result->result_array() as $row)
        {
                $output['id'.$i] = $row['id'];
                $output['name'.$i] = $row['name'];
                $output['email'.$i] = $row['email'];
                $output['phone'.$i] = $row['phone'];
                $output['address'.$i] = $row['address'];
                $output['subject'.$i] = $row['subject'];
                $output['comment'.$i] = $row['comment'];
                $output['date'.$i] = $row['date'];
                $i++;
                $flag = true;
        }
        $i_size = $i;
        if($flag)
            return $output;
        else
            return false;       
     }
     
     public function getFeedbackByYear_count($year)
     {
         $dt1 = "".$year."-01-01";
        $first = date($dt1);
        $dt2 = "".$year."-12-31";
        $second = date($dt2);
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `contact` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second'");
        $i = 0;
        foreach($result->result_array() as $row)
        {
            $i++;
        }
        return $i;
     }
    
    // Getting Feedback By Year
    public function getFeedbackByYear($year,$limit, $start ,&$i_size)
    {
        $dt1 = "".$year."-01-01";
        $first = date($dt1);
        $dt2 = "".$year."-12-31";
        $second = date($dt2);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `contact` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second' LIMIT $start,$limit ");
        
        $output = Array();
        $i = 0;
        $flag = false;
        foreach($result->result_array() as $row)
        {
                $output['id'.$i] = $row['id'];
                $output['name'.$i] = $row['name'];
                $output['email'.$i] = $row['email'];
                $output['phone'.$i] = $row['phone'];
                $output['address'.$i] = $row['address'];
                $output['subject'.$i] = $row['subject'];
                $output['comment'.$i] = $row['comment'];
                $output['date'.$i] = $row['date'];
                $i++;
                $flag = true;
        }
        $i_size = $i;
        if($flag)
            return $output;
        else
            return false;       
    }
    
    public function getLogByDay_count($day,$month, $year)
    {
        $dt1 = "".$year."-".$month."-".$day."";
        $first = date($dt1);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) = '$first'"); //problem may occur limt
         $i = 0;
         
        foreach($result->result_array() as $row) //to conculde the assessments
        {
            $i++;
        }
        return $i;
    }
    
    // Getting Log By Day
    public function getLogByDay($day,$month, $year ,$limit, $start ,&$i_size)
    {
        $dt1 = "".$year."-".$month."-".$day."";
        $first = date($dt1);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) = '$first' LIMIT $start,$limit "); //problem may occur limt
        $result_assesments = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) = '$first' "); //problem may occur limt
  
        $output = Array();
        $i = 0;
        
        $output['addCount'] = 0;
        $output['deleteCount'] = 0;
        $output['updateProfileCount'] = 0;
        $output['updateDailyCount'] = 0;
        $output['addSalesCount'] = 0;
        $output['deleteSalesCount'] = 0;
        $flag=0;
        
        foreach($result_assesments->result_array() as $row) //to conculde the assessments
        {
                if($row['operation_type'] == "Add")
                    $output['addCount']++;
                else if($row['operation_type'] == "DeleteAnimal")
                    $output['deleteCount']++;
                else if($row['operation_type'] == "UpdateProfile")
                    $output['updateProfileCount']++;
                else if($row['operation_type'] == "UpdateDaily")
                    $output['updateDailyCount']++;
                else if($row['operation_type'] == "Sale")
                    $output['addSalesCount']++;
                else if($row['operation_type'] == "DeleteSale")
                    $output['deleteSalesCount']++;
        }
        foreach($result->result_array() as $row)    //to get the log rows
        {
                $output['logId'.$i] = $row['log_id'];
                $output['operationType'.$i] = $row['operation_type'];
                $output['description'.$i] = $row['description'];
                $output['date'.$i] = $row['date'];
                $i++;
                $flag=1;
        }
        $i_size=$i;
        if($flag==1)
            return $output;
        else
            return false;
    }
    
    public function getLogByMonth_count($month, $year)
    {
        $dt1 = "".$year."-".$month."-01";
        $first = date($dt1);
        $dt2 = "".$year."-".$month."-31";
        $second = date($dt2);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second' ");
        $i = 0;
        foreach($result->result_array() as $row)
        {
            $i++;
        }
        return $i;
    }
    
   // Getting Log By Month
    public function getLogByMonth($month, $year ,$limit, $start ,&$i_size)
    { 
        $dt1 = "".$year."-".$month."-01";
        $first = date($dt1);
        $dt2 = "".$year."-".$month."-31";
        $second = date($dt2);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second' LIMIT $start,$limit ");
        
        $result_assesments = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second'");

        $output = Array();
        $i = 0;
          $flag=0;
        $output['addCount'] = 0;
        $output['deleteCount'] = 0;
        $output['updateProfileCount'] = 0;
        $output['updateDailyCount'] = 0;
          $output['addSalesCount'] = 0;
        $output['deleteSalesCount'] = 0;
        foreach($result_assesments->result_array() as $row) //to conculde the assessments
        {
                if($row['operation_type'] == "Add")
                    $output['addCount']++;
                else if($row['operation_type'] == "DeleteAnimal")
                    $output['deleteCount']++;
                else if($row['operation_type'] == "UpdateProfile")
                    $output['updateProfileCount']++;
                else if($row['operation_type'] == "UpdateDaily")
                    $output['updateDailyCount']++;
                else if($row['operation_type'] == "Sale")
                    $output['addSalesCount']++;
                else if($row['operation_type'] == "DeleteSale")
                    $output['deleteSalesCount']++;
        }
        foreach($result->result_array() as $row)    //to get the log rows
        {
                $output['logId'.$i] = $row['log_id'];
                $output['operationType'.$i] = $row['operation_type'];
                $output['description'.$i] = $row['description'];
                $output['date'.$i] = $row['date'];
                $i++;
                  $flag=1;
        }
        $i_size = $i;
         if($flag==1)
        return $output;
        else
            return false;
    }
    
    public function getLogByYear_count($year)
    {
        $dt1 = "".$year."-01-01";
        $first = date($dt1);
        $dt2 = "".$year."-12-31";
        $second = date($dt2);
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second' ");
        $i = 0;
        foreach($result->result_array() as $row)
        {
            $i++;
        }
        return $i;
    }
    
    // Getting Log By Year
    public function getLogByYear($year ,$limit, $start ,&$i_size)
    {
        $dt1 = "".$year."-01-01";
        $first = date($dt1);
        $dt2 = "".$year."-12-31";
        $second = date($dt2);
        
        $this->load->database();
        $result = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second' LIMIT $start,$limit ");
        $result_assesments = $this->db->query("SELECT * FROM `logs` WHERE DATE(`date`) >= '$first' && DATE(`date`) <= '$second'");

        $output = Array();
        $i = 0;
        $flag=0;
        
        $output['addCount'] = 0;
        $output['deleteCount'] = 0;
        $output['updateProfileCount'] = 0;
        $output['updateDailyCount'] = 0;
         $output['addSalesCount'] = 0;
        $output['deleteSalesCount'] = 0;
        foreach($result_assesments->result_array() as $row) //to conculde the assessments
        {
                if($row['operation_type'] == "Add")
                    $output['addCount']++;
                else if($row['operation_type'] == "DeleteAnimal")
                    $output['deleteCount']++;
                else if($row['operation_type'] == "UpdateProfile")
                    $output['updateProfileCount']++;
                else if($row['operation_type'] == "UpdateDaily")
                    $output['updateDailyCount']++;
                else if($row['operation_type'] == "Sale")
                    $output['addSalesCount']++;
                else if($row['operation_type'] == "DeleteSale")
                    $output['deleteSalesCount']++;
        }
        foreach($result->result_array() as $row)    //to get the log rows
        {
                $output['logId'.$i] = $row['log_id'];
                $output['operationType'.$i] = $row['operation_type'];
                $output['description'.$i] = $row['description'];
                $output['date'.$i] = $row['date'];
                $i++;
                $flag=1;
        }
        $i_size = $i;
         if($flag==1)
        return $output;
        else
            return false;
    }
    
    // Getting Ajax Results of Animals
    public function getAjaxSearchAnimals($searchQuery)
    {
        $this->db->like('eartag_no',$searchQuery,'after'); 
        $this->db->or_like('category',$searchQuery,'after');
        $this->db->or_like('breed',$searchQuery,'after');
        $this->db->or_like('type',$searchQuery,'after');
        $result = $this->db->get('animals');
            
        $array = Array();
        $i = 0;
        foreach ($result->result_array() as $row)
        {    
            $output['earTag'.$i] = $row['eartag_no'];
            $output['picPath'.$i] = $row['pic_path'];
            $output['purchasePrice'.$i] = $row['purchase_price'];
            $output['type'.$i] = $row['type'];
            $output['initialWeight'.$i] = $row['initial_weight'];
            $output['breed'.$i] = $row['breed'];
            $output['travelExpenses'.$i] = $row['travel_expenses'];
            $output['category'.$i] = $row['category'];
            $output['purchaseDate'.$i] = $row['purchase_date'];
            $i++;            
        }
        return $array;
    }  
}  
?>