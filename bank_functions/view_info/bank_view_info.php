<?php

@require '../connectserver.php';
$accountNumber=$_POST['info'];

$sql = "SELECT * FROM customer WHERE account_number = '$accountNumber'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $email = $row["email"];
        $balance= $row["balance"];
        $nid= $row["nid"];
        $birth =$row["date_of_birth"];
        $join= $row["joining_date"];
        echo "<h2>Account holder name: $name<br></h2>";
        echo "<h2>Account holder email: $email <br></h2>";
        echo "<h2>Account holder nid: $nid <br></h2>";
        echo "<h2>Account holder birth date: $birth <br></h2>";
        echo "<h2>Account Balance : $balance<br></h2>";
    }

echo"<form action='../bank_stuff.php' method='post'>
<input type='hidden' name='id_number' value='234'>
<input type='hidden' name='password' value='securepassword123'>
<button>Home</button>
</form>";
?>