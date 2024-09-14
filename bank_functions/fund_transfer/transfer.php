<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transfer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Fund Transfer</h1>
    <form action="bank_fundtransfer.php" method="POST">
        <div class="form-group">
            <label for="from_account">Sending Account Number:</label>
            <input type="number" id="from_account" name="from_account" required>
        </div>
        <div class="form-group">
            <label for="to_account">Receiving Account Number:</label>
            <input type="number" id="to_account" name="to_account" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount to Transfer:</label>
            <input type="number" id="amount" name="amount" required>
        </div>
        <button type="submit">Transfer</button>
    </form>
</body>
</html>
