<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>

    <main style = "min-height: calc(100vh - 128px - 56px);">


<?php
            $server = 'localhost';
            $username = 'root';
            $password = 'Lee20704!';
            $database = 'docOffice';
            $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");
?>

    <form action = "family-member.php" method = "post">
    <p>
    <label for = "ssn"> SSN:</label>
    <input type = "text" name = "ssn">
    </p>
    <p>
    <label for = "First_Name"> First Name:</label>
    <input type = "text" name = "First_Name">
    </p>
    <p>
    <label for = "Last_Name"> Last Name:</label>
    <input type = "text" name = "Last_Name">
    </p>
    <p>
    <label for = "PhoneNumber"> Phone Number:</label>
    <input type = "text" name = "PhoneNumber">
    </p>
    <input type = "submit">

    </form>
<?php

    $sql2 = "select Patient.SSN, Patient.First_Name, Patient.Last_Name, Patient.PhoneNumber from Patient";
    $result2 = mysqli_query($connection, $sql2);
    echo "<pre>";
    echo "<table border = 1>
    <tr>
    <th> Patient SSN </th>
    <th> First Name </th>
    <th> Last Name </th>
    <th> Phone Number </th>
    </tr>";
    while($row = mysqli_fetch_array($result2))
        {
            echo "<tr>";
            echo "<td>".$row['SSN']."</td>";
            echo "<td>".$row['First_Name']."</td>";
            echo "<td>".$row['Last_Name']."</td>";
            echo "<td>".$row['PhoneNumber']."</td>";
        }
    echo "</table>";
    echo "</pre>";


    if (isset($_REQUEST['ssn']))
    {

        $ssn = mysqli_real_escape_string($connection, $_REQUEST['ssn']);
        $fname = mysqli_real_escape_string($connection, $_REQUEST['First_Name']);
        $lname = mysqli_real_escape_string($connection, $_REQUEST['Last_Name']);
        $phone = mysqli_real_escape_string($connection, $_REQUEST['PhoneNumber']);

        $sql = "Insert into Patient (SSN, First_Name, Last_Name, PhoneNumber)
        values ('$ssn', '$fname', '$lname', '$phone')";
	//where not exists (select SSN, PhoneNumber where SSN = $ssn or PhoneNumber = $phone";

        if(mysqli_query($connection, $sql))
        {
            echo "added successfully";
        } else {
		echo "already exists";
	}
    }


?>
    </main>
    <?php include('footer.php'); ?>
</html>
