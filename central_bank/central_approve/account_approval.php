<?php
@require "../central_database.php";

$sql = "SELECT * FROM bank_applications WHERE approved = 0";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Approve Bank Applications</title>
    <link rel="stylesheet" href="styles.css"> <!-- Make sure this path is correct -->
</head>
<body>
    <div class="container">
        <h2>Pending Bank Applications</h2>
        <table>
            <tr>
                <th>Bank Name</th>
                <th>Owner Name</th>
                <th>Action</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['bank_name']; ?></td>
                <td><?php echo $row['owner_name']; ?></td>
                <td>
                <form method="post" action="approval.php">
                    <input type="hidden" name="approve_id" value="<?php echo $row['id']; ?>">
                    <input type="number" name="initial_balance" placeholder="Initial Balance">
                    <button type="submit" name="approve">Approve</button>
                    <button type="submit" name="reject">Reject</button>
                </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>


<?php
$conn->close();
?>
