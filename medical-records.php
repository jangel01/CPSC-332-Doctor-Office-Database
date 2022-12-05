<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>

    <main style = "min-height: calc(100vh - 128px - 56px);">

<form action = "medical-records.php" method = "get">
   Patient SSN: <input type = "text" name = "ssn">
    <input type = "submit">
</form>
        <?php
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'docOffice';
            $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

            if(isset($_GET['ssn'])) {

            $ssn = $_GET['ssn'];

            $sql = "select Medical_Test.Test_ID, Patient.First_Name, Patient.Last_Name,Patient.SSN, Medical_Test.Test_Type, Medical_Test.Result, Doctor.First_Name as Dr_Fname, Doctor.Last_Name as Dr_Lname, Medical_Test.Date_Given
            from Medical_Test, Doctor, Patient
            where Patient.SSN = Medical_Test.Patient_SSN and Medical_Test.Doctor_Name = Doctor.First_Name 
            order by Medical_Test.Test_ID asc";


            $result = mysqli_query($connection, $sql);

            echo "<pre>";
            echo "<table border = 1>
            <tr>
            <th>Test_ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>SSN
            <th>Test_Type</th>
            <th>Result</th>
            <th>Dr_Fname</th>
            <th>Dr_Lname</th>
            <th>Date Given</th>
            </tr>";

                while($row = mysqli_fetch_array($result))
                {
                    if($row['SSN'] == $ssn) {
                    echo "<tr>";
                    echo "<td>".$row['Test_ID']."</td>";
                    echo "<td>".$row['First_Name']."</td>";
                    echo "<td>".$row['Last_Name']."</td>";
                    echo "<td>".$row['SSN']."</td>";
                    echo "<td>".$row['Test_Type']."</td>";
                    echo "<td>".$row['Result']."</td>";
                    echo "<td>".$row['Dr_Fname']."</td>";
                    echo "<td>".$row['Dr_Lname']."</td>";
                    echo "<td>".$row['Date_Given']."</td>";
                }
            echo "</table>";
            echo "</pre>";
            }
            mysqli_free_result($result);
            }
            if(empty($_GET['ssn'])) {

            $sql2 = "select Medical_Test.Test_ID, Patient.First_Name, Patient.Last_Name,Patient.SSN, Medical_Test.Test_Type, Medical_Test.Result, Doctor.First_Name as Dr_Fname, Doctor.Last_Name as Dr_Lname, Medical_Test.Date_Given
            from Medical_Test, Doctor, Patient
            where Patient.SSN = Medical_Test.Patient_SSN and Medical_Test.Doctor_Name = Doctor.First_Name 
            order by Medical_Test.Test_ID asc";


            $result2 = mysqli_query($connection, $sql2);

            echo "<pre>";
            echo "<table border = 1>
            <tr>
            <th>Test_ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>SSN
            <th>Test_Type</th>
            <th>Result</th>
            <th>Dr_Fname</th>
            <th>Dr_Lname</th>
            <th>Date Given</th>
            </tr>";

                while($row = mysqli_fetch_array($result2))
                {
                    echo "<tr>";
                    echo "<td>".$row['Test_ID']."</td>";
                    echo "<td>".$row['First_Name']."</td>";
                    echo "<td>".$row['Last_Name']."</td>";
                    echo "<td>".$row['SSN']."</td>";
                    echo "<td>".$row['Test_Type']."</td>";
                    echo "<td>".$row['Result']."</td>";
                    echo "<td>".$row['Dr_Fname']."</td>";
                    echo "<td>".$row['Dr_Lname']."</td>";
                    echo "<td>".$row['Date_Given']."</td>";

                }
            echo "</table>";
            echo "</pre>";
            mysqli_free_result($result2);
            }

            mysqli_close($connection);
        ?>


    </main>
    <?php include('footer.php'); ?>
</html>
