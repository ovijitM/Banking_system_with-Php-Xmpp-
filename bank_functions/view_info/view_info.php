<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Info</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>View Account Information</h1>
    <form action="bank_view_info.php" method="post">
        <h2>Check your account info by entering your account number</h2>
        <div class="form-group">
            <label for="info">Account Number:</label>
            <input type="number" id="info" name="info" required>
        </div>
        <button type="submit">Search</button>
    </form>
</body>
</html>
