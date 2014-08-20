<DOCTYPE! html>
<html>
<head>
    <title>Print Tags</title>
</head>
<body>
    <p>Please enter tags:</p>
    <form method="post">
        <input type="text" name="input"/>
        <br/>
        <input type="submit"/>
    </form>

    <?php
    if (isset($_POST['input'])){
        $Input = $_POST['input'];
        $InputArr = explode(", ",$Input);
        for ($i = 0;$i<sizeof($InputArr);$i++){
    ?>
        <p><?=$i. " : ".$InputArr[$i] ?></p>
    <?php
        }
    }
    ?>
</body>
</html>

