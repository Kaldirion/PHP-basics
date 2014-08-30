<?php
if(isset($_GET['list'])){
    $inputArr = explode(', ',$_GET['list']);
    $partCounts = array();
    foreach ($inputArr as $part) {
        if (!isset($partCounts[$part])) {
            $partCounts[$part] = 1;
        } else {
            $partCounts[$part]++;
        }
    }

   $assembled = Assemble($partCounts);
   $lastArr = explode(', ',leftovers($partCounts,$assembled));
   $leftParts = $lastArr[1];
   $gained = $lastArr[0];
    $finalSum = $assembled*420+$gained-initialCost($partCounts);
    if ($finalSum > 0){
        $gainStr = "Nakov gained $finalSum leva";
    }
    else {
        $gainStr = "Nakov lost $finalSum leva" ;
    }
   echo "<ul><li>$assembled computers assembled</li><li>$leftParts parts left</li></ul><p>$gainStr</p>";

}

function initialCost($inputArr){
    $cost=0;
    foreach($inputArr as $key => $val){
        if($inputArr[$key] >=  5){
            $cost = $cost + 0.5*(partCost($key)*$inputArr[$key]);
        }
        else {
            $cost = $cost + partCost($key)*$inputArr[$key];
        }
    }
    return $cost;
}

function partCost($input){
    if ($input == "CPU"){
        return 85;
    }elseif ($input == "ROM"){
        return 45;
    }elseif ($input == "RAM"){
        return 35;
    }elseif ($input == "VIA"){
        return 45;
    }
}

function Assemble($inputArr){
    $produced = 0;
    if (count($inputArr) < 4){
        return 0;
    }
    else {
       $produced = min(array_values($inputArr));
    }
    return $produced;
}

function leftovers($inputArr,$used){
    $cost=0;
    $leftParts = 0;
    foreach($inputArr as $key => $val){
        if($inputArr[$key] - $used > 0){
            $cost = $cost + 0.5*partCost($key)*($inputArr[$key] - $used );
            $leftParts = $leftParts + ($inputArr[$key] - $used );
        }
    }
    return $cost. ", ". $leftParts;
}





