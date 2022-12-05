<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>

    <main style = "min-height: calc(100vh - 128px - 56px);">
        
        
        <form action = "doc-and-locations.php" method = "get">
	        City: <input type = "text" name = "city">
	        <input type = "submit">
        </form>
        
        <?php
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'docOffice';
            $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

            if($_GET['city'] !== null) {

            $location = $_GET['city'];

            $sql2 = "select distinct Doctor.First_Name, doctor.Last_Name, Doctor.Specialty, Patient.City, Patient.State, Doctor.Phone_Number
            from Appointment, Doctor, Patient
            where Doctor.first_name = Appointment.Doctor_Name
            order by Patient.City asc";

            $result2 = mysqli_query($connection, $sql2);

            echo "<pre>";
            echo "<table border = 1>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th>City</th>
            <th>State</th>
            <th>Phone Number</th>
            </tr>";

                while($row = mysqli_fetch_array($result2))
                    {
                    if($row['City'] == $location) {
                    echo "<tr>";
                    echo "<td>".$row['First_Name']."</td>";
                    echo "<td>".$row['Last_Name']."</td>";
                    echo "<td>".$row['Specialty']."</td>";
                    echo "<td>".$row['City']."</td>";
                    echo "<td>".$row['State']."</td>";
                    echo "<td>".$row['Phone_Number']."</td>";
                    }
	    echo "</table>";
	    echo"</pre>";
                }
            } else {
                $sql = "select distinct Doctor.First_Name, doctor.Last_Name, Doctor.Specialty, Patient.City, Patient.State, Doctor.Phone_Number
                from Appointment, Doctor, Patient
                where Doctor.first_name = Appointment.Doctor_Name
                order by Patient.City asc";

                $result = mysqli_query($connection, $sql);
                echo "<pre>";
                echo "<table border = 1>
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Specialty</th>
                <th>City</th>
                <th>State</th>
                <th>Phone Number</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>".$row['First_Name']."</td>";
                    echo "<td>".$row['Last_Name']."</td>";
                    echo "<td>".$row['Specialty']."</td>";
                    echo "<td>".$row['City']."</td>";
                    echo "<td>".$row['State']."</td>";
                    echo "<td>".$row['Phone_Number']."</td>";
                    }
		echo "</table>";
		echo "</pre>";
                }

            echo $location;

            mysqli_free_result($result2);
            mysqli_close($connection);
        ?>
        
    </main>
    <?php include('footer.php'); ?>
</html>
