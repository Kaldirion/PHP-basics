<!DOCTYPE html>
<html>
<head>
    <title>Annual Expences</title>
    <style>
        table{
            table-layout: fixed;
            width: 85%;
            border:1px solid black;
        }
        table thead tr th{
            border:1px solid black;
        }
        table tbody tr td{
            border:1px solid black;
        }
        #year{
            width:40px;
        }
    </style>
</head>
<body>
    <form method="Post">
        Enter number of years
        <input type = "number" name="years"/>
        <input type = "submit" value="Show Costs"/>
    </form>
    <?php
    $month = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");
        if (isset($_POST["years"])){
            $input = $_POST["years"];
    ?>
        <table>
            <thead>
                <tr>
                    <th id="year">Year</th>
                    <?php
                    for($j=0;$j<count($month);$j++){
                        ?>
                        <th><?=$month[$j]?></th>
                    <?php
                    }
                    ?>
                    <th>Total:</th>
                </tr>
            </thead>
            <tbody>
            <?php
            for($i=(int)date('Y')-$input;$i<=(int)date('Y');$i++){
                $total = 0;
            ?>
                <tr>
                    <td><?=$i ?></td>
                <?php
                for($j=0;$j<count($month);$j++){
                    $currentExpens = rand(1,999);
                    $total = $total + $currentExpens;
                ?>
                    <td><?=$currentExpens?></td>
                <?php
                }
                ?>
                    <td><?=$total?></td>
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