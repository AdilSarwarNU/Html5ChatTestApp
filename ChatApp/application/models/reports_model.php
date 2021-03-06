 <?php
class reports_model extends CI_Model {  
  
    function reports_model()
    {  
        // Call the Model constructor  
        parent::__construct(); 
        $this->load->helper('date');
        $this->load->library('Image_lib');
    }
    
    public function animalExpenses($earTag, &$profileResult)
    {
        $this->db->where('eartag_no',$earTag);
        $animalResult = $this->db->get('animals');
        $profileResult = Array();
        $i = 0;
        
        if($animalResult->row())
        {
            $animRow = $animalResult->row();
            
            // Getting Basic Info
            $profileResult['earTag'.$i] = $animRow->eartag_no;
            $profileResult['picPath'.$i] = $animRow->pic_path;
            $profileResult['purchasePrice'.$i] = $animRow->purchase_price;
            $profileResult['type'.$i] = $animRow->type;
            $profileResult['initialWeight'.$i] = $animRow->initial_weight;
            $profileResult['breed'.$i] = $animRow->breed;
            $profileResult['travelExpenses'.$i] = $animRow->travel_expenses;
            $profileResult['category'.$i] = $animRow->category;
            $profileResult['purchaseDate'.$i] = $animRow->purchase_date;
            
            $this->db->where('eartag_no',$earTag);
            $updatResult = $this->db->get('updates');
            
            // Getting Animal Update Expenses Info
            $updatesResult = Array();
            $j = 0;
            $total_expenses = 0;
            $currentExpense = 0;
            
            if(!$updatResult->result_array())
            {
                $updatesResult['date'.$j] = '---';
                $updatesResult['vaccine_expenses'.$j] = 0;
                $updatesResult['feed_expenses'.$j] = 0;
                $updatesResult['other_expenses'.$j] = 0;
                $updatesResult['current_change'.$j] = 0;
                $updatesResult['current_expense'.$j] = 0;   
            }
            
            foreach($updatResult->result_array() as $row)
            {
                $updatesResult['date'.$j] = $row['date'];
                
                $updatesResult['vaccine_expenses'.$j] = $row['vaccine_expenses'];
                $currentExpense = $currentExpense + $row['vaccine_expenses'];
                $total_expenses = $total_expenses + $row['vaccine_expenses'];
                
                $updatesResult['feed_expenses'.$j] = $row['feed_expenses'];
                $currentExpense = $currentExpense + $row['feed_expenses'];
                $total_expenses = $total_expenses + $row['feed_expenses'];
                
                $updatesResult['other_expenses'.$j] = $row['other_expenses'];
                $currentExpense = $currentExpense + $row['other_expenses'];
                $total_expenses = $total_expenses + $row['other_expenses'];
                
                
                $updatesResult['current_change'.$j] = $row['current_weight'];
                $updatesResult['current_expense'.$j] = $currentExpense;
                $currentExpense = 0;
                $j++;
            }
            
            // Total of Daily Expenses
            $profileResult['totalExpenses'.$i] = $total_expenses;
            
            // Grand Total of Daily Expenses, purchase price, travel expenses
            $profileResult['GrandTotalExpenses'.$i] = $total_expenses + $animRow->purchase_price + $animRow->travel_expenses;
            
            return $updatesResult;
        }
        else
            return null;
    }
    
    // Getting Specific Animal Profit
    public function animalProfit($earTag)
    {
        $this->db->where('eartag_no',$earTag);
        $animalProfit = $this->db->get('sales');
        if($animalProfit)
        {
            $animRow = $animalProfit->row();
            if($animRow)
            {
                $profitResult = Array();
                $i = 0;
                foreach($animalProfit->result_array() as $row)
                {
                    $profitResult['earTag'.$i] = $row['eartag_no'];
                    $profitResult['picPath'.$i] = $row['pic_path'];
                    $profitResult['purchasePrice'.$i] = $row['purchase_price'];
                    $profitResult['salePrice'.$i] = $row['sale_price'];
                    $profitResult['type'.$i] = $row['type'];
                    $profitResult['initialWeight'.$i] = $row['initial_weight'];
                    $profitResult['finalWeight'.$i] = $row['final_weight'];
                    $profitResult['purchaseDate'.$i] = $row['purchase_date'];
                    $profitResult['saleDate'.$i] = $row['sale_date'];
                    $profitResult['totalExpenses'.$i] = $row['total_expenses'];
                    $profitResult['profit'.$i] = $row['sale_price'] - ($row['total_expenses'] + $row['purchase_price']);
                    $i++;
                }
                return $profitResult;
            }
            else
                return null;
        }
        else
            return null;
    }
    
    // Daily Profit
    public function dailyProfit($day, &$profit)
    {
        $dailyresult = $this->db->get('sales');
        $profit = 0;
        if($dailyresult)
        {
            $output = Array();
            $i = 0;
            $j = 0;
            foreach($dailyresult->result_array() as $row)
            {
                if($row['sale_date'] == $day)
                {
                    $output['earTagNum'.$i] = $row['eartag_no'];
                    $res = $this->animalProfit($row['eartag_no']);
                    $output['animalProfit'.$i] = $res['profit'.$j];
                    $profit =  $profit + $res['profit'.$j];
                    $i++;
                }
            }
            return $output;
        }
        else
            return null;
    }
    
    // Monthly Profit
    public function monthlyProfit($month, $year, &$profit)
    {
        $monthlyresult = $this->db->get('sales');
        $profit = 0;
        if($monthlyresult)
        {
            $output = Array();
            $i = 0;
            $j = 0;
            foreach($monthlyresult->result_array() as $row)
            {
                $date_array = date_parse_from_format("Y-m-d H:i:s", $row['sale_date']);
                if($date_array['month'] == $month && $date_array['year'] == $year)
                {
                    $output['earTagNum'.$i] = $row['eartag_no'];
                    $res = $this->animalProfit($row['eartag_no']);
                    $output['animalProfit'.$i] = $res['profit'.$j];
                    $profit =  $profit + $res['profit'.$j];
                    $i++;
                }
            }
            return $output;
        }
        else
            return null;
    }
    
    // Yearly Profit
    public function yearlyProfit($year, &$profit)
    {
        $yearlyresult = $this->db->get('sales');
        $profit = 0;
        if($yearlyresult)
        {
            $output = Array();
            $i = 0;
            $j = 0;
            foreach($yearlyresult->result_array() as $row)
            {
                $date_array = date_parse_from_format("Y-m-d H:i:s", $row['sale_date']);
                if($date_array['year'] == $year)
                {
                    $output['earTagNum'.$i] = $row['eartag_no'];
                    $res = $this->animalProfit($row['eartag_no']);
                    $output['animalProfit'.$i] = $res['profit'.$j];
                    $profit =  $profit + $res['profit'.$j];
                    $i++;
                }
            }
            return $output;
        }
        else
            return null;
    }
    
    // Daily Expense
    public function dailyExpense($day, &$expense)
    {
        $dailyresult = $this->db->get('animals');
        $expense = 0;
        $output = Array();
        $i = 0;
        $j = 0;
        $localExpense = 0;
        $updateresult = $this->db->get('updates');
        
        if($dailyresult)
        {
            foreach($dailyresult->result_array() as $row)
            {
                if($row['purchase_date'] == $day)
                {
                    $output['earTagNum'.$i] = $row['eartag_no'];
                    if($updateresult)
                    {
                        foreach($updateresult->result_array() as $row1)
                        {
                            if($row['eartag_no'] == $row1['eartag_no'])
                            {
                                if($row1['date'] == $day)
                                    $localExpense = $localExpense + $row1['vaccine_expenses'] + $row1['feed_expenses'] + $row1['other_expenses'];
                            }
                        }
                        $localExpense = $localExpense + $row['purchase_price'] + $row['travel_expenses'];
                    }
                    else
                        $localExpense = $localExpense + $row['purchase_price'] + $row['travel_expenses'];
                    
                    $output['animalExpenses'.$i] = $localExpense;
                    $expense =  $expense + $localExpense;
                    $i++;
                    $localExpense = 0;
                }
            }
            
            if($updateresult)
            {
                foreach($updateresult->result_array() as $row1)
                {
                   if($row1['date'] == $day)
                   { 
                       if(!in_array($row1['eartag_no'], $output))
                       {
                            $output['earTagNum'.$i] = $row1['eartag_no'];
                            $profileResult;
                            $res = $this->animalExpenses($row1['eartag_no'], $profileResult);
                            $output['animalExpenses'.$i] = $profileResult['totalExpenses'.$j];
                            $expense =  $expense + $profileResult['totalExpenses'.$j];
                            $i++;
                       }
                   }
                }
             }
            return $output;
        }
        else
            return null;
    }
    
    // Monthly Expense
    public function monthlyExpense($month, $year, &$expense)
    {   
        $monthresult = $this->db->get('animals');
        $expense = 0;
        $output = Array();
        $i = 0;
        $j = 0;
        $localExpense = 0;
        $updateresult = $this->db->get('updates');
        
        if($monthresult)
        {
            foreach($monthresult->result_array() as $row)
            {
                $date_array = date_parse_from_format("Y-m-d H:i:s", $row['purchase_date']);
                if($date_array['month'] == $month && $date_array['year'] == $year)
                {
                    $output['earTagNum'.$i] = $row['eartag_no'];
                    if($updateresult)
                    {
                        foreach($updateresult->result_array() as $row1)
                        {
                            if($row['eartag_no'] == $row1['eartag_no'])
                            {
                                $date_array = date_parse_from_format("Y-m-d H:i:s", $row1['date']);
                                if($date_array['month'] == $month && $date_array['year'] == $year)
                                    $localExpense = $localExpense + $row1['vaccine_expenses'] + $row1['feed_expenses'] + $row1['other_expenses'];
                            }
                        }
                        $localExpense = $localExpense + $row['purchase_price'] + $row['travel_expenses'];
                    }
                    else
                        $localExpense = $localExpense + $row['purchase_price'] + $row['travel_expenses'];
                    
                    $output['animalExpenses'.$i] = $localExpense;
                    $expense =  $expense + $localExpense;
                    $i++;
                    $localExpense = 0;
                }
            }
            
            if($updateresult)
            {
                foreach($updateresult->result_array() as $row1)
                {
                   $date_array = date_parse_from_format("Y-m-d H:i:s", $row1['date']);
                   if($date_array['month'] == $month && $date_array['year'] == $year)
                   { 
                       if(!in_array($row1['eartag_no'], $output))
                       {
                            $output['earTagNum'.$i] = $row1['eartag_no'];
                            $profileResult;
                            $res = $this->animalExpenses($row1['eartag_no'], $profileResult);
                            $output['animalExpenses'.$i] = $profileResult['totalExpenses'.$j];
                            $expense =  $expense + $profileResult['totalExpenses'.$j];
                            $i++;
                       }
                   }
                }
             }
            return $output;
        }
        else
            return null;
    }
    
    // Yearly Expense
    public function yearlyExpense($year, &$expense)
    {
        $yearresult = $this->db->get('animals');
        $expense = 0;
        $output = Array();
        $i = 0;
        $j = 0;
        $localExpense = 0;
        $updateresult = $this->db->get('updates');
        
        if($yearresult)
        {
            foreach($yearresult->result_array() as $row)
            {
                $date_array = date_parse_from_format("Y-m-d H:i:s", $row['purchase_date']);
                if($date_array['year'] == $year)
                {
                    $output['earTagNum'.$i] = $row['eartag_no'];
                    if($updateresult)
                    {
                        foreach($updateresult->result_array() as $row1)
                        {
                            if($row['eartag_no'] == $row1['eartag_no'])
                            {
                                $date_array = date_parse_from_format("Y-m-d H:i:s", $row1['date']);
                                if($date_array['year'] == $year)
                                    $localExpense = $localExpense + $row1['vaccine_expenses'] + $row1['feed_expenses'] + $row1['other_expenses'];
                            }
                        }
                        $localExpense = $localExpense + $row['purchase_price'] + $row['travel_expenses'];
                    }
                    else
                        $localExpense = $localExpense + $row['purchase_price'] + $row['travel_expenses'];
                    
                    $output['animalExpenses'.$i] = $localExpense;
                    $expense =  $expense + $localExpense;
                    $i++;
                    $localExpense = 0;
                }
            }
            
            if($updateresult)
            {
                foreach($updateresult->result_array() as $row1)
                {
                   if($row1['date'] == $year)
                   { 
                       if(!in_array($row1['eartag_no'], $output))
                       {
                            $output['earTagNum'.$i] = $row1['eartag_no'];
                            $profileResult;
                            $res = $this->animalExpenses($row1['eartag_no'], $profileResult);
                            $output['animalExpenses'.$i] = $profileResult['totalExpenses'.$j];
                            $expense =  $expense + $profileResult['totalExpenses'.$j];
                            $i++;
                       }
                   }
                }
             }
            return $output;
        }
        else
            return null;
    }
}