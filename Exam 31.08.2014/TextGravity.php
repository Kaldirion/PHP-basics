<?php
if (isset($_GET['text']) && isset($_GET['lineLength'])){
$lineLength = htmlspecialchars($_GET['lineLength']);
$inputArr = str_split($_GET['text']);
$matrix = [[]];
$maxRow = ceil(count($inputArr)/$lineLength);
$maxCol = $lineLength;
$i=0;
//fill the table correctly
for ($row = 0;$row<$maxRow;$row++){
    for ($col=0;$col<$maxCol;$col++){
        if ($i < count($inputArr)){
            $matrix[$row][$col] = $inputArr[$i];
            $i++;
        }else {
            $matrix[$row][$col] = " ";
        }
    }
}

while (ColumnCheck($matrix,$maxRow,$maxCol) == "Yes"){
    for ($row = $maxRow-1;$row >=0;$row--){
        for ($col=0;$col<$maxCol;$col++){
            if ($row == 0){
                if ($matrix[$row+1][$col] == " "){
                    $matrix[$row+1][$col] = $matrix[$row][$col];
                    $matrix[$row][$col] = " ";
                }
            }else {
                if ($matrix[$row][$col] == " "){
                    $matrix[$row][$col] = $matrix[$row-1][$col];
                    $matrix[$row-1][$col] = " ";
                }
            }
        }
    }
}


    // print the table
    echo "<table>";
    for ($row = 0;$row<$maxRow;$row++){
        echo "<tr>";
        for ($col=0;$col<$maxCol;$col++){
            echo "<td>".htmlspecialchars($matrix[$row][$col])."</td>";
        }
        echo "</tr>";
    }
    echo "<table>";

}

function ColumnCheck($matrix,$maxRow,$maxCol){
    for ($row = $maxRow-1;$row >=0;$row--){
        for ($col=0;$col<$maxCol;$col++){
            if ($row == 0){
                if ($matrix[$row+1][$col] == " " && $matrix[$row][$col] <> " "){
                    return "Yes";
                }
            }else {
                if ($matrix[$row][$col] == " " && $matrix[$row-1][$col] <> " "){
                    return "Yes";
                }
            }
        }
    }
}
