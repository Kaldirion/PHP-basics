<!DOCTYPE html>
<html>
<head>
    <title>Sum Of Digits</title>
    <style>
        table{
            table-layout: fixed;
            width: 30%;
            border:1px solid black;
        }
        table tbody tr td{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form method="post" id="inputForm">
        <label for="inputString" form="inputForm">Input string: </label>
        <input type="text" name="inputString"/>
        <input type="submit" name="submit" value="Submit"/>
    </form>
<?php
    if (isset($_POST["inputString"])){
        $inputArr = explode(", ",$_POST["inputString"]);
?>
    <table>
        <tbody>
<?php
        for($i = 0;$i<count($inputArr);$i++){
?>
        <tr>
            <td><?=$inputArr[$i]?></td>
            <td><?=digitSum($inputArr[$i])?></td>
        </tr>
<?php
        }
    }
?>
        </tbody>
    </table>
    <?php
    function digitSum($input){
        if (intval($input)){
            $sum = 0;
            $digitArr = str_split($input);
            for ($i = 0; $i<count($digitArr);$i++){
                $sum = $sum + $digitArr[$i];
            }
            return $sum;
        }
        else {
            return "I cannot sum that";
        }
    }
    ?>
</body>
</html>