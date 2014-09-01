<?php
if (isset($_GET['students']) && isset($_GET['column']) && isset($_GET['order'])){
    $studentsArr = explode("\n", str_replace("\r", "",  trim(htmlspecialchars($_GET['students']))));

    $column = $_GET['column'];
    $order = $_GET['order'];

   $mainArr = [[]];
   for ($i = 0;$i<count($studentsArr);$i++){
       $mainArr[$i] = explode(', ',$studentsArr[$i]);
   }

   $FinalArr = [[]];
   for ($i = 0;$i<count($studentsArr);$i++){
       $FinalArr[$i]['Id'] = $i+1;
       $FinalArr[$i]['Username'] = $mainArr[$i][0];
       $FinalArr[$i]['Email'] = $mainArr[$i][1];
       $FinalArr[$i]['Type'] = $mainArr[$i][2];
       $FinalArr[$i]['Result'] = $mainArr[$i][3];
   }

    //create needed sub-arrays
    //ID sub-array:
    $ID = array();
    foreach ($FinalArr as $id) {
        $ID[] = $id['Id'];
    }
    //Username sub-array:
    $Username = array();
    foreach ($FinalArr as $user) {
        $Username[] = $user['Username'];
    }
    //Email sub-array:
    $Email = array();
    foreach ($FinalArr as $mail) {
        $Email[] = $mail['Email'];
    }
    //Type sub-array:
    $Type = array();
    foreach ($FinalArr as $atendance) {
        $Type[] = $atendance['Type'];
    }
    //Result sub-array:
    $Result = array();
    foreach ($FinalArr as $res) {
        $Result[] = $res['Result'];
    }

    if ($column == 'id'){
        if ($order == 'descending'){
            array_multisort($ID, SORT_DESC, $FinalArr);
        }elseif($order == 'ascending'){
            array_multisort($ID, SORT_ASC, $FinalArr);
        }
    }elseif ($column == 'username'){
        if ($order == 'descending'){
            $tempArr = array_unique($Username);
            if (count($tempArr) < count($studentsArr)){
                array_multisort($Username, SORT_DESC,$ID,SORT_DESC,$FinalArr);
            }else {
                array_multisort($Username, SORT_DESC,$FinalArr);
            }
        }elseif($order == 'ascending'){
            if (count($tempArr) < count($studentsArr)){
                array_multisort($Username, SORT_ASC,$ID,SORT_ASC,$FinalArr);
            }else {
                array_multisort($Username, SORT_ASC,$FinalArr);
            }
        }
    }elseif ($column == 'result'){
        if ($order == 'descending'){
            $tempArr = array_unique($Result);
            if (count($tempArr) < count($studentsArr)){
                array_multisort($Result, SORT_DESC,$ID,SORT_DESC,$FinalArr);
            }else {
                array_multisort($Result, SORT_DESC,$FinalArr);
            }
        }elseif($order == 'ascending'){
            $tempArr = array_unique($Result);
            if (count($tempArr) < count($studentsArr)){
                array_multisort($Result, SORT_ASC,$ID,SORT_ASC,$FinalArr);
            }else {
                array_multisort($Result, SORT_ASC,$FinalArr);
            }
        }
    }
}

//print table MainArr

echo "<table><thead><tr><th>Id</th><th>Username</th><th>Email</th><th>Type</th><th>Result</th></tr></thead>";
for ($row = 0;$row<count($studentsArr);$row++){
   echo "<tr>";
   echo "<td>".$FinalArr[$row]['Id']."</td>";
   echo "<td>".$FinalArr[$row]['Username']."</td>";
   echo "<td>".$FinalArr[$row]['Email']."</td>";
   echo "<td>".$FinalArr[$row]['Type']."</td>";
   echo "<td>".$FinalArr[$row]['Result']."</td>";
   echo "</tr>";
}
echo "</table>";


