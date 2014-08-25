<!DOCTYPE html>
<html>
<head>
    <title>sidebar builder</title>
    <style>
        div {
            background: #455A71;
            border: 1px solid black;
            border-radius: 15px;
            margin: 5px 0;
            padding: 0 10px;
            width: 200px;
        }
        .header{
            font-family: Verdana;
            font-size: 20px;
            font-weight:800;
            text-align: center;
        }
        .items a{
            text-decoration: none;
            color:white;
        }
    </style>
</head>
<body>
<form method="post" id="input_form">
    <label for="Categories_field">Categories: </label>
    <input type="text" name="categories" id="Categories_field"/><br/>
    <label for="Tags_field">Tags: </label>
    <input type="text" name="tags" id="Tags_field"/><br/>
    <label for="Months_field">Months: </label>
    <input type="text" name="months" id="Months_field"/><br/>
    <input type="submit" name="submit" value="Generate"/>
</form>
<?php
if (isset($_POST['categories'])){
$categoriesArr = explode(", ",$_POST['categories']);
?>
<div id="categories">
    <p class="header">Categories</p>
    <ul>
        <?php
        for($i=0;$i<count($categoriesArr);$i++){
            ?>
            <li class="items"><a href="#"><?=$categoriesArr[$i]?></a></li>
        <?php
        }
        ?>
    </ul>
</div>
<?php
}
if (isset($_POST['tags'])){
$tagsArr = explode(", ",$_POST['tags']);
?>
<div id="tags">
    <p class="header">Tags</p>
    <ul>
        <?php
        for($i=0;$i<count($tagsArr);$i++){
            ?>
            <li class="items"><a href="#"><?=$tagsArr[$i]?></a></li>
        <?php
        }
        ?>
    </ul>
</div>
<?php
}
if (isset($_POST['months'])){
$monthsArr = explode(", ",$_POST['months']);
?>
<div id="months">
    <p class="header">Months</p>
    <ul>
        <?php
        for($i=0;$i<count($monthsArr);$i++){
            ?>
            <li class="items"><a href="#"><?=$monthsArr[$i]?></a></li>
        <?php
        }
        ?>
    </ul>
</div>
<?php
}
?>
</body>
</html>