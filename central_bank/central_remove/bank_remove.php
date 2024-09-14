<?php
@require "../central_database.php";

$sql = "SELECT * FROM banks";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Remove Banks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Remove Banks</h2>
        <table>
            <tr>
                <th>Bank Name</th>
                <th>Account Number</th>
                <th>Action</th>
            </tr>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['bank_name']; ?></td>
                        <td><?php echo $row['account_number']; ?></td>
                        <td>
                            <form method="post" action="delete_bank.php">
                                <input type="hidden" name="bank_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No banks found.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
