<?php
$accountNumber = $_POST['account_number'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Money</title>
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>
    <div class="container">
        <form action="send_money.php" method="post">
            <input type="hidden" name="account_number" value="<?php echo $accountNumber; ?>">
            <label for="to_account">Type Account Number to Send</label>
            <input type="number" id="to_account" name="to_account" required><br>
            <label for="amount">Amount</label>
            <input type="number" id="amount" name="amount" required><br>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
