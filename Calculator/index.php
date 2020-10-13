<?php

declare(strict_types=1);

require_once 'Calculator.php';

if (isset ($_POST['amount'], $_POST['years'], $_POST['percentage'])) {
    $money = $_POST['amount'];
    $years = $_POST['years'];
    $percentage = $_POST['percentage'];

    $calculator = new Calculator((int)$money, (int)$years, (int)$percentage);
    $sum = $calculator->getResult();
    echo 'The amount you will have after ' . $years . ' years: ' . round($sum);
}

?>

<html>
<body>
<br><br>
<hr>
<br><br>
<form action="/" method="post">
    <label for="investment">Amount</label>
    <input type="number" id="investment" name="amount"/>

    <label for="investment">Years</label>
    <input type="number" id="investment" name="years"/>

    <label for="investment">Percentage</label>
    <input type="number" id="investment" name="percentage"/>

    <button type="Submit">
        Calculate
    </button>
</form>
</body>
</html>