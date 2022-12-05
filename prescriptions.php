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

            $sql = "select Patient.First_Name, Patient.Last_Name, Prescription.Drug_Name, Prescription.Dosage, Prescription.Date_Prescribed, Doctor.First_Name as Dr_Fname, Doctor.Last_Name as Dr_Lname, Doctor.Phone_Number as Dr_PhoneNum
            from Patient, Prescription, Doctor
            where Prescription.Patient_SSN = Patient.SSN and Prescription.Prescribed_by = Doctor.DoctorID
            order by Patient.First_Name asc";

            $result = mysqli_query($connection, $sql);

            echo "<pre>";
            echo "<table border = 1>
            <tr>
            <th> First Name </th>
            <th> Last Name </th>
            <th> Drug Name </th>
            <th> Dosage </th>
            <th> Date Prescribed </th>
            <th> Dr.Fname </th>
            <th> Dr.Lname </th>
            <th> Dr.PhoneNum </th>
            </tr>";

            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>".$row['First_Name']."</td>";
                echo "<td>".$row['Last_Name']."</td>";
                echo "<td>".$row['Drug_Name']."</td>";
                echo "<td>".$row['Dosage']."</td>";
                echo "<td>".$row['Date_Prescribed']."</td>";
                echo "<td>".$row['Dr_Fname']."</td>";
                echo "<td>".$row['Dr_Lname']."</td>";
                echo "<td>".$row['Dr_PhoneNum']."</td>";
            }
            echo "</table>";
            echo "</pre>";


?>
    </main>
    <?php include('footer.php'); ?>
</html>
