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
<form action = "appointments.php" method = "get">
Appointment number: <input type = "text" name = "num">
<input type = "submit">
</form>

<?php

        $result = NULL;
        $result2 = NULL;

        if(isset($_GET['num'])) {

            $num = $_GET['num'];

            $sql = "select Appointment.Appointment_Number, Appointment.Date, Appointment.Time, Appointment.Doctor_Name, Doctor.Phone_Number, Doctor.Specialty, Patient.First_Name, Patient.Last_Name, Appointment.Room_Number
            from Appointment, Doctor, Patient
            where Patient.SSN = Appointment.Patient_SSN and Appointment.Doctor_Name = Doctor.First_Name
            order by Appointment.Appointment_Number asc";

            $result = mysqli_query($connection, $sql);
            echo "<pre>";
            echo "<table border = 1>
            <tr>
            <th> Appointment #</th>
            <th> Appointment Date</th>
            <th> Appointment Time</th>
            <th> Doctor Name</th>
            <th> Doctor Phone Number</th>
            <th> Specialty </th>
            <th> Patient First Name</th>
            <th> Patient Last Name</th>
            <th> Room Number </th>
            </tr>";

                while($row = mysqli_fetch_array($result))
                {
                    if($row['Appointment_Number'] == $num) {
                    echo "<tr>";
                    echo "<td>".$row['Appointment_Number']."</td>";
                    echo "<td>".$row['Date']."</td>";
                    echo "<td>".$row['Time']."</td>";
                    echo "<td>".$row['Doctor_Name']."</td>";
                    echo "<td>".$row['Phone_Number']."</td>";
                    echo "<td>".$row['Specialty']."</td>";
                    echo "<td>".$row['First_Name']."</td>";
                    echo "<td>".$row['Last_Name']."</td>";
                    echo "<td>".$row['Room_Number']."</td>";
                }
            }
        echo "</pre>";
        echo "</table>";
            
        } else {

            $sql2 = "select Appointment.Appointment_Number, Appointment.Date, Appointment.Time, Appointment.Doctor_Name, Doctor.Phone_Number, Doctor.Specialty, Patient.First_Name, Patient.Last_Name, Appointment.Room_Number
            from Appointment, Doctor, Patient
            where Patient.SSN = Appointment.Patient_SSN and Appointment.Doctor_Name = Doctor.First_Name
            order by Appointment.Appointment_Number asc";

            $result2 = mysqli_query($connection, $sql2);
            echo "<pre>";
            echo "<table border = 1>
            <tr>
            <th> Appointment #</th>
            <th> Appointment Date</th>
            <th> Appointment Time</th>
            <th> Doctor Name</th>
            <th> Doctor Phone Number</th>
            <th> Specialty </th>
            <th> Patient First Name</th>
            <th> Patient Last Name</th>
            <th> Room Number </th>
            </tr>";

            while($row = mysqli_fetch_array($result2))
                {
                    echo "<tr>";
                    echo "<td>".$row['Appointment_Number']."</td>";
                    echo "<td>".$row['Date']."</td>";
                    echo "<td>".$row['Time']."</td>";
                    echo "<td>".$row['Doctor_Name']."</td>";
                    echo "<td>".$row['Phone_Number']."</td>";
                    echo "<td>".$row['Specialty']."</td>";
                    echo "<td>".$row['First_Name']."</td>";
                    echo "<td>".$row['Last_Name']."</td>";
                    echo "<td>".$row['Room_Number']."</td>";
                }
                echo "</pre>";
                echo "</table>";
            }

            if($result != NULL) {
            mysqli_free_result($result);
            }
            if($result2 != NULL) {
            mysqli_free_result($result2);
            }
            mysqli_close($connection);



?>


        
    </main>
    <?php include('footer.php'); ?>
</html>
