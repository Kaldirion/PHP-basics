<!DOCTYPE html>
<html>
<head>
    <title>Primes</title>
</head>
<body>
    <form method="post" id="inputForm">
        <label for="firstNum" form="inputForm">Starting index:</label>
        <input type="number" name="firstNum"/>
        <label for="secondNum" form="inputForm">End:</label>
        <input type="number" name="secondNum"/>
        <input type="submit" name="submit" value="Submit"/>
    </form>

    <?php
    if (isset($_POST["firstNum"]) && isset($_POST["secondNum"])){
        $firstNum = $_POST["firstNum"];
        $secondNum = $_POST["secondNum"];
    ?>
        <div id="output">
    <?php
        $ResultString = "";
        for($i=$firstNum;$i<=$secondNum;$i++){
            if (isPrime($i)){
                $ResultString = $ResultString . "<strong>".$i."</strong>, ";
            }
            else {
                $ResultString = $ResultString . $i.", ";
            }
        }
    ?>
        <?=substr($ResultString,0,-2)?>
        </div>
    <?php
    }
    function isPrime($number)
    {
        if ($number <= 1) {
            return false;
        } elseif ($number == 2) {
            return true;
        } else if ($number % 2 == 0) {
            return false;
        } else {
            for ($i = 3; $i <= ceil(sqrt($number)); $i += 2) {
                if ($number % $i == 0) {
                    return false;
                }
            }
            return true;
        }
    }
    ?>
</body>
</html>