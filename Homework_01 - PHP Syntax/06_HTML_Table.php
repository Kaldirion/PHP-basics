<!DOCTYPE html>
<html>
<head>
    <title>HTML Table</title>
    <style>
        table {
            text-indent: 5px;
        }
        table, th, td {
            border: 1px solid black;
        }
        table th, table td {
            width: 105px;
            line-height: 25px;
        }
        table th {
            text-align: left;
            background: #FFA100;
        }
        table td {
            text-align: right;
        }
    </style>
</head>
<body>
    <?php
    $name = "Gosho";
    $phoneNumber = "0882-321-423";
    $age = 24;
    $adress = "Hadji Dimitar";
    ?>
    <table>
        <tbody>
            <tr>
                <th>Name</th>
                <td><?=$name?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?=$phoneNumber?></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><?=$age?></td>
            </tr>
            <tr>
                <th>Adress</th>
                <td><?=$adress?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
