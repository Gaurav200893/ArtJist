@extends('layouts.app')

@section('content')
<h1>about</h1>


<?php
//Fake Data:begin
    $arr = array();
for($i=0;$i<2;$i++){

$arr[$i]['empid'] = 'id_'.rand(10,100);
$arr[$i]['Code'] = 'ELOP'.rand(10,100);
$arr[$i]['type'] = 'a';
$arr[$i]['ssn'] = '014789932';
$arr[$i]['date'] = '01/04/2019';
$arr[$i]['p_type'] = 'd';

$arr[$i]['E_amt'] = '24';
$arr[$i]['s_amt'] = '14';


$arr[$i]['ADB_emp'] = 'emp100'.rand(10,100);
$arr[$i]['ADB_spouse'] = 'sp10'.rand(10,100);

$arr[$i]['c_amt_1'] = '14';
$arr[$i]['ADB_child_1'] = 'ch2'.rand(10,100);
$arr[$i]['c_amt_2'] = '14';
$arr[$i]['ADB_child_2'] = 'ch2'.rand(10,100);

$arr[$i]['adult_count'] = '2';
$arr[$i]['child_count'] = '2';
}

//Fake Data:end


//Horizontal table:begin
$tbl = '<table class="table"><tr>
    <th>empid</th>
    <th>Code</th> 
    <th>type</th>
    <th>ssn</th>
    <th>date</th> 
    <th>p_type</th>
    <th>E_amt</th>
    <th>s_amt</th> 
    <th>ADB_emp</th>
    <th>ADB_spouse</th>
    <th>ADB_child</th>
  </tr>';
foreach($arr as $key => $item){

  
  $tbl .= "<tr>
     <td>
       ".$item['empid']."
     </td>
     <td>
       ".$item['Code']."
     </td>
          <td>
       ".$item['type']."
     </td>
          <td>
      ". $item['ssn']."
     </td>
          <td>
       ".$item['date']."
     </td>
          <td>
      ". $item['p_type']."
     </td>
          <td>
      ". $item['E_amt']."
     </td>
          <td>
      ". $item['s_amt']."
     </td>
          <td>
       ".$item['ADB_emp']."
     </td>
           </td>
          <td>
      ". $item['ADB_spouse']."
     </td>
          
    
  </tr>";

}

$tbl .= '</table>';

echo $tbl;

//Horizontal table:end


//Split the emp rows acording to house hold people:begin
$global_household_row = array();
foreach ($arr as $key => $items) {

    for($i=1;$i<=$items['adult_count']; $i++){

        $global_household_row[$key][$i]['empid'] = $items['empid'];
        $global_household_row[$key][$i]['Code'] = $items['Code'];
        $global_household_row[$key][$i]['type'] = $items['type'] ;
        $global_household_row[$key][$i]['ssn'] = $items['ssn'] ;
        $global_household_row[$key][$i]['date'] = $items['date'] ;
        $global_household_row[$key][$i]['p_type'] = $items['p_type'];
        $global_household_row[$key][$i]['is_adult'] = 1;
        if($i==1){
            $global_household_row[$key][$i]['amt'] = $items['E_amt'];
            $global_household_row[$key][$i]['ADB'] = $items['ADB_emp'];
        }
        if($i==2){
            $global_household_row[$key][$i]['amt'] = $items['s_amt'];
            $global_household_row[$key][$i]['ADB'] = $items['ADB_spouse'];
        }

    }


    for($j=1;$j<=$items['child_count']; $j++){

        $global_household_row[$key][$i]['empid'] = $items['empid'];
        $global_household_row[$key][$i]['Code'] = $items['Code'];
        $global_household_row[$key][$i]['type'] = $items['type'] ;
        $global_household_row[$key][$i]['ssn'] = $items['ssn'] ;
        $global_household_row[$key][$i]['date'] = $items['date'] ;
        $global_household_row[$key][$i]['p_type'] = $items['p_type'];
        $global_household_row[$key][$i]['is_adult'] = 0;
        
        $global_household_row[$key][$i]['amt'] = $items['c_amt_'.$j];
        $global_household_row[$key][$i]['ADB'] = $items['ADB_child_'.$j];
        $i++;
    }
}

//Split the emp rows acording to house hold people:end

//New table


    $tbl = '<table class="table"><tr>
    <th>empid</th>
    <th>Code</th> 
    <th>type</th>
    <th>ssn</th>
    <th>date</th> 
    <th>p_type</th>
    <th>amt</th>
    <th>ADB</th> 
  
  </tr>';

    foreach ($global_household_row as $key => $household) {
        

        foreach ($household as $key => $item) {
            $tbl .= "<tr>
     <td>
       ".$item['empid']."
     </td>
     <td>
       ".$item['Code']."
     </td>
          <td>
       ".$item['type']."
     </td>
          <td>
      ". $item['ssn']."
     </td>
          <td>
       ".$item['date']."
     </td>
          <td>
      ". $item['p_type']."
     </td>
          <td>
      ". $item['amt']."
     </td>
         
    <td>
       ".$item['ADB']."
     </td>
    
          
          
    
  </tr>";
        }
    }

    $tbl .="</html>";

    echo $tbl;






?>
@endsection
