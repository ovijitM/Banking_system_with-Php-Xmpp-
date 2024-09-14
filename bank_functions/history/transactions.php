<!DOCTYPE html>
<html lang="en">
<head>
    <title>Transaction History</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>View Transaction History</h1>
    <form action="transactionhistory.php" method="post">
        <div class="form-group">
            <label for="account">Account Number:</label>
            <input type="number" id="account" name="account_number" required>
        </div>
        <button type="submit">Show</button>
    </form>
</body>
</html>
