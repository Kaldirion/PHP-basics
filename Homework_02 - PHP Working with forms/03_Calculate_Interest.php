<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Problem 3 - Calculate Interest</title>
</head>
<body>
<section>
    <form method="post" action="">
        <label for="amount">Enter Amount </label><input type="number" name="amount" id="amount">
        <br />
        <input type="radio" name="currency" value="USD" id="USD">
        <label for="USD">USD</label>
        <input type="radio" name="currency" value="EUR" id="EUR">
        <label for="EUR">EUR</label>
        <input type="radio" name="currency" value="BGN" id="BGN">
        <label for="BGN">BGN</label>
        <br />
        <label for="interest">Compound Interest Amount </label><input type="number" name="interest" id="interest">
        <br />
        <select name="period">
            <option value="6 months" selected>6 Months</option>
            <option value="12 months">1 Year</option>
            <option value="24 months">2 Years</option>
            <option value="60 months">5 Years</option>
        </select>
        <input type="submit" name="calculate" value="Calculate">
    </form>
</section>
</body>
</html>
<?php
if (isset($_POST['amount']) && isset($_POST['currency']) && isset($_POST['interest']) && isset($_POST['calculate'])) {
    $amount = htmlentities($_POST['amount']);
    $currency = htmlentities($_POST['currency']);
    $interest = htmlentities($_POST['interest']);
    $period = htmlentities($_POST['period']);
    $period = preg_replace('/[^0-9]/', '', $period);
    $sum = $amount;
    for ($i = 1; $i <= $period; $i++) {
        $sum *= (1 + ($interest / 12) / 100);
    }
    $currencySymbol = '';
    switch ($currency) {
        case 'USD': $currencySymbol = "\$ ";
            echo $currencySymbol . number_format($sum, 2, '.', '');
            break;
        case 'EUR': $currencySymbol = '€ ';
            echo $currencySymbol . number_format($sum, 2, '.', '');
            break;
        case 'BGN': $currencySymbol = ' лв.';
            echo number_format($sum, 2, '.', '') . $currencySymbol;
            break;
        default:
            break;
    }
}
elseif ((!isset($_POST['amount']) || !isset($_POST['currency']) || !isset($_POST['interest'])) && isset($_POST['calculate'])) {
    echo 'Not all needed data was entered. Please try again.';
}
?>