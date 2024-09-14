<!DOCTYPE html>
<html lang="en">
<head>
    <title>Withdraw</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Withdraw Funds</h1>
    <form action="bank_withdraw.php" method="post">
        <div class="form-group">
            <label for="from_account">Account Number:</label>
            <input type="number" id="from_account" name="from_account" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount to Withdraw:</label>
            <input type="number" id="amount" name="amount" required>
        </div>
        <button type="submit">Withdraw</button>
    </form>
</body>
</html>
