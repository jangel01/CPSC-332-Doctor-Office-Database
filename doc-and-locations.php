<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>

    <main style = "min-height: calc(100vh - 128px - 56px);">
        
        
        <form action = "doc-and-locations.php" method = "get">
	        City: <input type = "text" name = "city">
	        <input type = "submit">
        </form>
        
        <?php
            $result = NULL;
            $result2 = NULL;

            $server = 'localhost';
            $username = 'root';
            $password = 'Sql1121990112233';
            $database = 'docOffice';
            $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

            if(isset($_GET['city'])) {

            $location = $_GET['city'];

            $sql2 = "select distinct Doctor.First_Name, doctor.Last_Name, Doctor.Specialty, Patient.City, Patient.State, Doctor.Phone_Number
            from Appointment, Doctor, Patient
            where Doctor.first_name = Appointment.Doctor_Name
            order by Patient.City asc";

            $result2 = mysqli_query($connection, $sql2);

            print "<pre>";
            print "<table border = 1>
            <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Specialty</th>
            <th>City</th>
            <th>State</th>
            <th>Phone Number</th>
            </tr>";

                while($row = mysqli_fetch_array($result2, MYSQLI_BOTH))
                    {
                    if($row['City'] == $location) {
                    print "<tr>";
                    print "<td>$row[First_Name] </td>";
                    print "<td>$row[Last_Name] </td>";
                    print "<td>$row[Specialty] </td>";
                    print "<td>$row[City] </td>";
                    print "<td>$row[State] </td>";
                    print "<td>$row[Phone_Number] </td>";
                    print "</tr>";
                    }
                }
                
                print "</pre>";
                print "</table>";
            } else {
                $sql = "select distinct Doctor.First_Name, doctor.Last_Name, Doctor.Specialty, Patient.City, Patient.State, Doctor.Phone_Number
                from Appointment, Doctor, Patient
                where Doctor.first_name = Appointment.Doctor_Name
                order by Patient.City asc";

                $result = mysqli_query($connection, $sql);
                print "<pre>";
                print "<table border = 1>
                <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Specialty</th>
                <th>City</th>
                <th>State</th>
                <th>Phone Number</th>
                </tr>";

                while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
                    {
                    print "<tr>";
                    print "<td>".$row['First_Name']."</td>";
                    print "<td>".$row['Last_Name']."</td>";
                    print "<td>".$row['Specialty']."</td>";
                    print "<td>".$row['City']."</td>";
                    print "<td>".$row['State']."</td>";
                    print "<td>".$row['Phone_Number']."</td>";
                    }
                print "</pre>";
		print "</table>";
                }

            if ($result != NULL) {
                mysqli_free_result($result);
            }

            if ($result2 != NULL ) {
                mysqli_free_result($result2);
            }
            mysqli_close($connection);
        ?>
        
    </main>
    <?php include('footer.php'); ?>
</html>
