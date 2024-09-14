<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Application</title>
    <link rel="stylesheet" href="styles.css"> <!-- Adjust the path as needed -->
</head>
<body>
    <div class="container">
        <h2>Bank Application Form</h2>
        <form method="post" action="request.php">
            <label for="bank_name">Bank Name:</label>
            <input type="text" id="bank_name" name="bank_name" required>
            
            <label for="owner_name">Owner Name:</label>
            <input type="text" id="owner_name" name="owner_name" required>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
