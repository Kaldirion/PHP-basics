<?php

$num = 145;
$Result = "";
if ($num < 102) {

?>
    <p> No </p>
<?php
}
else {
    if ($num > 999) {
        $maxNum = 999;
    }
    else {
        $maxNum = $num;
    }

    for ($i = 102;$i<=$maxNum;$i++){
        $first_Digit = (int)(($i - $i%100)/100) ;
        $second_Digit = (int)(($i%100 - $i%10)/10) ;
        $third_Digit = (int)($i%10);
        if ((($first_Digit != $second_Digit) && ($first_Digit != $third_Digit))) {
            if ($second_Digit != $third_Digit ){
                $Result = $Result . $i . ", ";
            }
        }
    }
?>
    <p><?=substr($Result, 0, -2)?></p>
<?php
}
?>