<!DOCTYPE html>
<html>
<head>
    <title>Word Mapping</title>
    <style>
        table {
            border:1px solid black;
        }
        table tbody tr td{
            border:1px solid black;
        }
        table thead tr th{
            border:1px solid black;
        }
    </style>
</head>
<body>
<form method="post" id="input_form">
    <input type="text" name="input_text"/><br/>
    <input type="submit" name="submit" value="Count Words"/>
</form>
<?php
if (isset($_POST['input_text'])){
    echo $_POST['input_text'];
    echo "<br/>";
    $inputArr = preg_split('/\W+/', strtolower($_POST['input_text']), -1, PREG_SPLIT_NO_EMPTY);
    var_dump($inputArr);
    $resultArr = array_count_values($inputArr);
?>
    <table>
        <thead>
            <tr>
                <th>Word</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
<?php
        foreach ($resultArr as $key => $value) {
?>
          <tr>
              <td><?=$key?></td>
              <td><?=$value?></td>
          </tr>
<?php
        }
?>
        </tbody>
    </table>
<?php
}
?>
</body>
</html>