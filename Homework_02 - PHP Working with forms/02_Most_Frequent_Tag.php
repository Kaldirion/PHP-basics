<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Most Frequent Tag</title>
</head>
<body>
<form method="post">
    <label for="tags">Enter tags:</label><br/>
    <input type="text" name="tags" id="tags"/>
    <input type="submit" name="submit"><br/><br/>
    <?php
    if ($_POST && isset($_POST["submit"])) {
        $tags = explode(", ", $_POST["tags"]);
        $tagCounts = array();
        foreach ($tags as $tag) {
            if (!isset($tagCounts[$tag])) {
                $tagCounts[$tag] = 1;
            } else {
                $tagCounts[$tag]++;
            }
        }
        arsort($tagCounts);
        echo "<div id=\"result\">";
        foreach ($tagCounts as $key => $value) {
            echo $key . " : " . $value . " time" . ($value == 1 ? "" : "s") . "<br />";
        }
        echo "Most frequent tag is: " . array_keys($tagCounts)[0];
        echo "</div>";
    }
    ?>
</form>
</body>