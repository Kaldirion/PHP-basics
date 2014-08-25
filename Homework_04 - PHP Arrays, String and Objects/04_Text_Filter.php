<!DOCTYPE html>
<html>
<head>
    <title>Text Filter</title>
    <style>
        #output{
            width:350px;
            border:1px solid black;
        }
    </style>
</head>
<body>
<form method="post" id="input_form">
    <textarea type="text" name="input_text" id="text_input"></textarea><br/>
    <input type="text" name="ban_list"/>
    <input type="submit" name="submit" value="Clear text"/>
</form>
<?php
if(isset($_POST['input_text']) && isset($_POST['ban_list'])){
    $banArr=explode(", ",$_POST['ban_list']);
    $resultStr=$_POST['input_text'];
    for($i=0;$i<count($banArr);$i++){
        $resultStr = str_replace($banArr[$i],str_repeat('*',strlen($banArr[$i])),$resultStr);
    }
?>
    <div id="output">
        <?=$resultStr?>
    </div>
<?php
}
?>
</body>
</html>