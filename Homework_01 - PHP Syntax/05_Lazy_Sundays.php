<?php
$currentDay = date('dS F, Y', time());
$currentMonth = date('m', time());
$lastDay = date('t',strtotime('today'));

for ($i=1;$i<=$lastDay;$i++) {
    $tempDate = date($i."S F Y");

    $day_of_week = date('N', strtotime($tempDate));
    if ($day_of_week == 7){
?>
    <p><?=$tempDate?></p>
<?php
    }
}
?>