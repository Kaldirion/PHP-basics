<!DOCTYPE html>
<html>
<head>
    <title>Modify String</title>
</head>
<body>
    <form method="post" id="inputForm">
        <input type="text" name="input"/>
        <input type="radio" name="operation" value="palindrome" id="palindrome-button"/>
        <label for="palindrome-button">Check Palindrome</label>
        <input type="radio" name="operation" value="reverse" id="reverse-button"/>
        <label for="reverse-button">Reverse String</label>
        <input type="radio" name="operation" value="split" id="split-button"/>
        <label for="split-button">Split</label>
        <input type="radio" name="operation" value="hash" id="hash-button"/>
        <label for="hash-button">Hash String</label>
        <input type="radio" name="operation" value="shuffle" id="shuffle-button"/>
        <label for="shuffle-button">Shuffle String</label>
        <input type="submit" name="submitOperation" value="Submit"/>
    </form>

    <?php

    if (isset($_POST['operation'])) {
        if ($_POST['operation'] == "palindrome" ){
            echo is_palindrome($_POST['input']);
        } elseif ($_POST['operation'] == "reverse" ) {
            echo reverse_string($_POST['input']);
        } elseif ($_POST['operation'] == "split" ) {
            echo split_string($_POST['input']);
        } elseif ($_POST['operation'] == "hash" ) {
            echo hash_string($_POST['input']);
        } elseif ($_POST['operation'] == "shuffle" ) {
            echo shuffle_string($_POST['input']);
        }

    }
    ?>

    <?php
        function is_palindrome($string)
        {
            $result = strtolower(preg_replace("/[^A-Za-z0-9]/","",$string));
            if ($result==strrev($result)){
                return $string. " is palindrome";
            }
            else {
                return $string. " is not palindrome";
            }
        }

        function reverse_string($string){
            return strrev($string);
        }

        function split_string($string){
            $tempVal = strtolower(preg_replace("/[^A-Za-z0-9]/","",$string));
            $splitArr = str_split($tempVal);
            $result = "";
            for ($i = 0;$i<count($splitArr);$i++){
                $result = $result. " " .$splitArr[$i];
            }
            return $result;
        }

        function hash_string($string){
            return crypt($string);
        }

        function shuffle_string($string){
            return str_shuffle($string);
        }
    ?>
</body>
</html>