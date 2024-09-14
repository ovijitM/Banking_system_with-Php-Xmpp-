<?php
@require "../central_database.php";

$sql = "SELECT * FROM banks";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Banks</title>
    <link rel="stylesheet" href="styles.css"> <!-- Adjust the path as needed -->
</head>
<body>
    <div class="container">
        <h2>Approved Banks</h2>
        <table>
            <tr>
                <th>Bank Name</th>
                <th>Account Number</th>
                <th>Balance</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['bank_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['account_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['balance']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No approved banks found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
