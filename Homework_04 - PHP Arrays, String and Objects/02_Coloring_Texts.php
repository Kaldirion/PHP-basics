<!DOCTYPE html>
<html>
<head>
    <title>coloring text</title>
    <style></style>
</head>
<body>
<form method="post" id="input_form">
    <input type="text" name="input_text"/>
    <input type="submit" name="submit" value="Color text"/>
</form>
<?php
if(isset($_POST['input_text'])){
    $inputStr = str_replace(' ','',$_POST['input_text']);
    $inputArr = str_split($inputStr);
    $resultStr = "";
    for($i=0;$i<count($inputArr);$i++){
        if(ord($inputArr[$i])%2==0){
            $resultStr = $resultStr. "<font color='red'>".$inputArr[$i]."</font>";
        }
        else {
            $resultStr = $resultStr. "<font color='blue'>".$inputArr[$i]."</font>";
        }
    }
    echo "<br/>". $resultStr;
}
?>
</body>
</html>