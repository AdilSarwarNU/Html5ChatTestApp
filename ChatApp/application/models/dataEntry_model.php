 <?php  
class dataEntry_model extends CI_Model {  
  
    function dataEntry_model()
    {  
        // Call the Model constructor  
        parent::__construct(); 
        $this->load->helper('date');
         $this->load->library('Image_lib');
         date_default_timezone_set("Asia/Karachi");
    }  
    public function checkExisting($earTag)
    {
        $this->db->where('eartag_no',$earTag);
        $query = $this->db->get('animals');
        if ($query->num_rows() > 0){
        return true;
        }
        else{
            return false;
        }
    }
    // Inserting Data into Animals Table
    public function insertData($earTag, $picPath, $purchasePrice, $type, $initialWeight, $breed, $travelExpenses, $category, $purchaseDate)
    {
        if(!$this->compareDates(date('Y-m-d H:i:s', time()), $purchaseDate))
            return false;
        // Preparing the Array to be inserted into Log Table
        $description = "Accountant Added the animal with Ear Tag: ". $earTag . ".<br/>Following are the details:<br/>";
        $description.= "Purchase Price: ". $purchasePrice;
        $description.= "<br/>Type: ".$type;
        $description.= "<br/>Initial Weight: ". $initialWeight;
        $description.= "<br/>Breed: ".$breed;
        $description.= "<br/>Travel Expense: ".$travelExpenses;
        $description.= "<br/>Category: ".$category;
        $description.= "<br/>Purchase Date: ".$purchaseDate;
        
        $config['upload_path'] = './assets/img/Uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '4194304';
        $config['max_width']  = '5000';
        $config['max_height']  = '5000';   
        
        $this->load->library('upload', $config);
        if ( !$this->upload->do_upload())
        {
            return false;
        }
        else
        {
            $image_data = $this->upload->data();
            $filename = $image_data['file_name'];
            
            // Preparing the Array to be inserted into Animal Table
            $animalData = array(
                'eartag_no' => $earTag,
                'pic_path' => $filename,
                'purchase_price' => $purchasePrice,
                'type' => $type,
                'initial_weight' => $initialWeight,
                'breed' => $breed,
                'travel_expenses' => $travelExpenses,
                'category' => $category,
                'purchase_date' => $purchaseDate
            );
            
            $logData = array(
                'operation_type' => "Add",
                'description' => $description,
                'date' => date('Y-m-d H:i:s', time())
            );
            $query = $this->db->insert('animals',$animalData);
            if($query)
            {
                $result = $this->db->insert('logs', $logData);
                if($result)
                    return true;
                else 
                    return false;
            }
            else
                return false;
        }
    }
    
    function compareDates($startSate, $endDate)
    {
        $sdate = date_parse_from_format("Y-m-d H:i:s", $startSate);
        $edate = date_parse_from_format("Y-m-d H:i:s", $endDate);

        if($sdate['year'] < $edate['year'])
            return false;
        else if($sdate['month'] < $edate['month'] && $sdate['year'] == $edate['year'])
            return false;
        else if($sdate['day'] < $edate['day'] && $sdate['month'] == $edate['month'] && $sdate['year'] == $edate['year'])
            return false;
        else 
            return true;

    }
    
    // Adding Sale of Animal
    public function saleAnimal($earTag, $salePrice, $finalWeight, $saleDate)
    {
        $this->db->where('eartag_no',$earTag);
        $animResult = $this->db->get('animals');
        if($animResult)
        {
            // Getting profile info from animal table
            $animRow = $animResult->row();       
            if($animRow)
            {
                if(!$this->compareDates($saleDate, $animRow->purchase_date))
                    return false;
                
                $picPath = $animRow->pic_path;
                $purchasePrice = $animRow->purchase_price;
                $type = $animRow->type;
                $purchaseDate = $animRow->purchase_date;
                $initialWeight = $animRow->initial_weight;
                $totalExpenses = $animRow->travel_expenses;
                
                // Getting Updates from update table
                $this->db->where('eartag_no',$earTag);
                $updateResult = $this->db->get('updates');
                if($updateResult)
                {
                    foreach($updateResult->result_array() as $updateRow)
                    {
                        $totalExpenses = $totalExpenses + $updateRow['vaccine_expenses'];
                        $totalExpenses = $totalExpenses + $updateRow['feed_expenses'];
                        $totalExpenses = $totalExpenses + $updateRow['other_expenses'];
                    }
                }
                
                // Preparing the Array to be inserted into Log Table
                $description = "Accountant Added Sale record of an animal with Ear Tag: ". $earTag . ".<br/>Following are the details:<br/>";
                $description.= "<br/>Type: ".$type;
                $description.= "<br/>Purchase Date: ".$purchaseDate;
                $description.= "Purchase Price: ". $purchasePrice;
                $description.= "<br/>Initial Weight: ". $initialWeight;
                $description.= "<br/>Final Weight: ".$finalWeight;
                $description.= "<br/>Sale Price: ".$salePrice;
                $description.= "<br/>Sale Date: ".$saleDate;
                
                // inserting into logs
                $logData = array(
                    'operation_type' => "Sale",
                    'description' => $description,
                    'date' => date('Y-m-d H:i:s', time())
                );
                
                // inserting into sales
                $saleData = array(
                    'eartag_no' => $earTag,
                    'pic_path' => $picPath,
                    'purchase_price' => $purchasePrice,
                    'type' => $type,
                    'initial_weight' => $initialWeight,
                    'sale_price' => $salePrice,
                    'sale_date' => $saleDate,
                    'total_expenses' => $totalExpenses,
                    'final_weight' => $finalWeight,
                    'purchase_date' => $purchaseDate
                );
                $saleResult = $this->db->insert('sales',$saleData);
                if($saleResult)
                {
                    // Deleting From Animal Table
                    $this->db->where('eartag_no', $earTag);
                    $deleteResult = $this->db->delete('animals');
                    
                    // Adding log
                    $logResult = $this->db->insert('logs', $logData);
                    
                    if($logResult && $saleResult && $deleteResult)
                        return true;
                    else
                        return false;
                }
                else 
                    return false;
            }
            else
                return false;
        }
        else
            return false;
    }
    
    // Deleting Animal from Database
    public function deleteAnimalFromSale($earTag)
    {
        $this->db->where('eartag_no', $earTag);
        $result = $this->db->get('sales');
        $row = $result->row();
        if($row)
        {
            // Preparing the Array to be inserted into Log Table
            $description = "Accountant Deleted animal Sale Record with Ear Tag: ". $earTag . ".<br/> Following are the details:<br/> ";
            $description.= "<br/>Type: ".$row->type;
            $description.= "Purchase Price: ". $row->purchase_price;
            $description.= "<br/>Purchase Date: ".$row->purchase_date;
            $description.= "<br/>Initial Weight: ". $row->initial_weight;
            $description.= "<br/>Final Weight: ". $row->final_weight;
            $description.= "<br/>Sale Price: ".$row->sale_price;
            $description.= "<br/>Sale Date: ".$row->sale_date;
            $description.= "<br/>Total Expenses: ".$row->total_expenses;

            $logData = array(
                'operation_type' => "DeleteSale",
                'description' => $description,
                'date' => date('Y-m-d H:i:s', time())
            );

            $this->db->where('eartag_no', $earTag);
            $ress = $this->db->delete('sales');

            if($ress)
            {
                $logResult = $this->db->insert('logs', $logData);
                return true;
            }
            else
                return false;
        }
        else 
            return false;
        
        
    }
    
    
    // Getting Animal based on Eartag
    public function getAnimal($earTag)
    {
        $this->db->where('eartag_no',$earTag);
        $result = $this->db->get('animals');
        return $result->row();
    }
    
    // Deleting Animal from Database
    public function deleteAnimal($earTag)
    {
        $this->db->where('eartag_no', $earTag);
        $row = $this->getAnimal($earTag);
        
        if($row)
        {
            // Preparing the Array to be inserted into Log Table
            $description = "Accountant Deleted the animal with Ear Tag: ". $earTag . ".<br/> Following are the details:<br/> ";
            $description.= "Purchase Price: ". $row->purchase_price;
            $description.= "<br/>Type: ".$row->type;
            $description.= "<br/>Initial Weight: ". $row->initial_weight;
            $description.= "<br/>Breed: ".$row->breed;
            $description.= "<br/>Travel Expense: ".$row->travel_expenses;
            $description.= "<br/>Category: ".$row->category;
            $description.= "<br/>Purchase Date: ".$row->purchase_date;

            $logData = array(
                'operation_type' => "DeleteAnimal",
                'description' => $description,
                'date' => date('Y-m-d H:i:s', time())
            );
            
            $this->db->where('eartag_no', $earTag);
            $ress = $this->db->delete('animals');

            if($ress)
            {
                $result = $this->db->insert('logs', $logData);
                return true;
            }
            else
                return false;
        }
        else
            return false;
    }
    
    // Update Animal Information
    public function updateAnimalProfile($earTag, $picPath, $picCheck, $purchasePrice, $type, $initialWeight, $breed, $travelExpenses, $category, $purchaseDate)
    {
        if(!$this->compareDates(date('Y-m-d H:i:s', time()), $purchaseDate))
            return false;
    
        //Adding LOG Details
        $this->db->where('eartag_no', $earTag);
        $row = $this->getAnimal($earTag);
        
        $description = "Accountant UPDATED the animal with Ear Tag: ". $earTag . ".<br/> Following are the details BEFORE the update:<br/> ";
        $description.= "Purchase Price: ". $row->purchase_price;
        $description.= "<br/>Type: ".$row->type;
        $description.= "<br/>Initial Weight: ". $row->initial_weight;
        $description.= "<br/>Breed: ".$row->breed;
        $description.= "<br/>Travel Expense: ".$row->travel_expenses;
        $description.= "<br/>Category: ".$row->category;
        $description.= "<br/>Purchase Date: ".$row->purchase_date;
        
        
        $description.= "<br/>Accountant UPDATED the animal with Ear Tag: ". $earTag . ".<br/> Following are the details AFTER the update:<br/> ";
        $description.= "Purchase Price: ". $purchasePrice;
        $description.= "<br/>Type: ".$type;
        $description.= "<br/>Initial Weight: ". $initialWeight;
        $description.= "<br/>Breed: ".$breed;
        $description.= "<br/>Travel Expense: ".$travelExpenses;
        $description.= "<br/>Category: ".$category;
        $description.= "<br/>Purchase Date: ".$row->purchase_date;
        
       if($picCheck=="")
       {
           $this->db->set('purchase_price',$purchasePrice);
            $this->db->set('type',$type);
            $this->db->set('initial_weight',$initialWeight);
            $this->db->set('breed',$breed);
            $this->db->set('travel_expenses',$travelExpenses);
            $this->db->set('category',$category);
            $this->db->where('eartag_no',$earTag);
            $this->db->where('purchase_date',$purchaseDate);
            $res = $this->db->update('animals');


            //Generating a LOG
            $op_type="UpdateProfile";

            $data = array(
                'operation_type'=>$op_type,
                'description'=>$description,
                'date'=>date('Y-m-d H:i:s',time())            
            );
            if($res)
            {
                $result = $this->db->insert('logs',$data);
                return true;
            }
            else
                return false;
       }
       else
       {
           
            $config['upload_path'] = './assets/img/Uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '4194304';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';   

            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload())
            {
                return false;
            }
            else
            {

                $image_data = $this->upload->data();
                $filename = $image_data['file_name'];

                //UPDATING
                $this->db->set('pic_path',$filename);

                $this->db->set('purchase_price',$purchasePrice);
                $this->db->set('type',$type);
                $this->db->set('initial_weight',$initialWeight);
                $this->db->set('breed',$breed);
                $this->db->set('travel_expenses',$travelExpenses);
                $this->db->set('category',$category);
                $this->db->where('eartag_no',$earTag);
                $this->db->where('purchase_date',$purchaseDate);
                $res = $this->db->update('animals');


                //Generating a LOG
                $op_type="UpdateProfile";

                $data = array(
                    'operation_type'=>$op_type,
                    'description'=>$description,
                    'date'=>date('Y-m-d H:i:s',time())            
                );
                if($res)
                {
                    $result = $this->db->insert('logs',$data);
                    return true;
                }
                else
                    return false;
            }
       }
    }
    
    // Daily Updating Animal
    public function dailyUpdateAnimal($earTag, $date, $vaccineExpenses, $feedExpenses, $currentWeight, $otherExpenses)
    {
        $this->db->where('eartag_no', $earTag);
        $row = $this->getAnimal($earTag);
        
        if(!$row)
            return false;
        
        if(!$this->compareDates(date('Y-m-d H:i:s', time()), $date))
            return false;
        
        if(!$this->compareDates($date, $row->purchase_date))
            return false;
        
        if(!$currentWeight)
        {
            $this->db->where('eartag_no', $earTag);
            $res = $this->db->get('updates');
            $size = count($res->result_array());
            if($size)
            {
                $out = $res->result_array();
                $currentWeight = $out[$size-1]['current_weight'];
            }
            else
                $currentWeight = $row->initial_weight;
        }
        
        if($row)
        {
            // Preparing the Array to be inserted into Animal Table
            $updateData = array(
                'eartag_no' => $earTag,
                'date' => $date,
                'vaccine_expenses' => $vaccineExpenses,
                'feed_expenses' => $feedExpenses,
                'current_weight' => $currentWeight,
                'other_expenses' => $otherExpenses
            );

            // Preparing the Array to be inserted into Log Table
            $description = "Accountant Updated the animal with Ear Tag: ". $earTag . ".<br/> Following are the details:<br/> ";
            $description.= "Date: ". $date;
            $description.= "<br/>Vaccine Expenses: ".$vaccineExpenses;
            $description.= "<br/>Feed Expenses: ".$feedExpenses;
            $description.= "<br/>Current Weight: ". $currentWeight;
            $description.= "<br/>Other Expenses: ".$otherExpenses;

            $logData = array(
                'operation_type' => "UpdateDaily",
                'description' => $description,
                'date' => date('Y-m-d H:i:s', time())
            );

            $query = $this->db->insert('updates',$updateData);

            if($query)
            {
                $result = $this->db->insert('logs', $logData);
                return true;
            }
            else
                return false;
        }
        else
            return false;
    }
    
    // Deleting Logs
    public function deleteLog($logId)
    {
        $this->db->where('log_id', $logId);
        $deleteResult = $this->db->delete('logs');
        if($deleteResult)
            return true;
        else
            return false;
    }
    
    // Deleting feedback
    public function deleteFeedback($id)
    {
        $this->db->where('id', $id);
      
        $deleteResult = $this->db->delete('contact');
        if($deleteResult)
            return true;
        else
            return false;
    }
}  
?>