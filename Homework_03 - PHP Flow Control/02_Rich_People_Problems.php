<!DOCTYPE html>
<html>
<head>
    <title>Rich People Problems</title>
    <style>
        table {
            border: 1px solid black;
        }
        table thead {
            font-weight: 800;
        }
        table tbody tr td, table thead td {
            border : 1px solid black;
        }
    </style>
</head>
<body>
    <form method = "post">
        Enter cars :
        <input type="text" name="cars"/>
        <input type="submit" name="submit" value="Show Results"/>
    </form>
    <?php
        $color = array("white", "yellow", "blue", "red", "black");
        $count = array("1","2","3","4","5");
        if (isset($_POST["cars"])){
            $input = explode(", ",$_POST["cars"]);
    ?>
          <table>
              <thead>
                <td>Car</td>
                <td>Color</td>
                <td>Count</td>
              </thead>
              <tbody>
    <?php
            for ($i=0;$i<count($input);$i++){
    ?>
                <tr>
                    <td><?php echo $input[$i]?></td>
                    <td><?php echo $color[rand(1,5)-1]?></td>
                    <td><?php echo $count[rand(1,5)-1]?></td>
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