<?php
if (isset($_GET['list']) && isset($_GET['maxSize'])){
    $maxSize = $_GET['maxSize'];
    $inputArr = explode("\n", str_replace("\r", "",  htmlspecialchars($_GET['list'])));
    $finalArr = [];
    //var_dump($inputArr);
    for($i = 0;$i<count($inputArr);$i++){
        //$s = html_entity_decode(trim($inputArr[$i]));
        //$sub = substr($s, 0, 50);
        //echo htmlentities($sub)."<br/>";
        if ($inputArr[$i] <> ""){
            if (strlen(trim($inputArr[$i])) > $maxSize){
                $tempStr = html_entity_decode(trim($inputArr[$i]));
                $tempStr = substr($tempStr,0,$maxSize);
                $tempStr = htmlentities($tempStr)."...";
                array_push($finalArr,$tempStr);
            }else {
                array_push($finalArr,trim($inputArr[$i]));
            }
        }
    }
    echo "<ul>";
    for($i=0;$i<count($finalArr);$i++){
        echo "<li>".$finalArr[$i]."</li>";
    }
    echo"</ul>";
}