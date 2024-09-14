<!DOCTYPE html>
<html lang="en">
<head>
    <title>Deposit</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Deposit Funds</h1>
    <form action="bank_deposit.php" method="post">
        <div class="form-group">
            <label for="account_to_deposite">Account Number:</label>
            <input type="number" id="account_to_deposite" name="account_to_deposite" required>
        </div>
        <div class="form-group">
            <label for="amount">Deposit Amount:</label>
            <input type="number" id="amount" name="amount" required>
        </div>
        <button type="submit">Deposit</button>
    </form>
</body>
</html>
