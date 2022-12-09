<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<main style="min-height: calc(100vh - 176px - 104px);">
    <h1 class="font-semibold leading-tight text-5xl mt-0 mb-2 text-grey-600 bold text-center mt-10">Appointments</h1>

    <div class="flex items-center justify-center mb-10 scale-125">
        <div class="border-2 border-black bg-slate-900 basis-3/12 text-white rounded-lg mt-10 px-10 py-3">
            <p>Enter your appointment number below to view the corresponding information for your appointment.</p>
        </div>
    </div>

    <form action="appointments.php" method="post">
        <div class="flex justify-center scale-110 mb-10">
            <div class="mb-3 xl:w-96">
                <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Appointment
                    Number</label>
                <input type="text" class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none
              " name="num" placeholder="" />
            </div>
        </div>

        <div class="flex space-x-2 justify-center">
            <input type="submit" name="submit" value="submit"
                class="inline-block px-10 py-2.5 mb-10 bg-slate-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
        </div>
    </form>

    <?php
        $server = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'docOffice';
        $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");


        $result = NULL;

        if (isset($_POST['num'])) {

            $num = $_POST['num'];

            $sql = "select Appointment.Appointment_Number, Appointment.Date, Appointment.Time, Appointment.Doctor_Name, Doctor.Phone_Number, Specialty.Specialty, Patient.First_Name, Patient.Last_Name, Appointment.Room_Number
                    from Appointment, Doctor, Patient, Specialty
                    where Patient.SSN = Appointment.Patient_SSN and Appointment.Doctor_Name = Doctor.First_Name
                    AND Doctor.DoctorID = Specialty.DoctorID
                    order by Appointment.Appointment_Number asc;
        ";

            $result = mysqli_query($connection, $sql);

            print "<div class = 'flex items-center justify-center'>";
            print "<div class='flex flex-ol'>";
            print "<div class='overflow-x-auto sm:-mx-6 lg:-mx-8'>";
            print "<div class='py-4 inline-block min-w-full sm:px-6 lg:px-8'>";
            print "<div class='overflow-hidden'>";
            print "<table class='min-w-full text-center'>";
            print "<thead class='border-b bg-gray-800'>";
            print "<tr>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Appointment #";
            print "</th>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Appointment Date";
            print "</th>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Appointment Time";
            print "</th>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Doctor Name";
            print "</th>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Doctor Phone Number";
            print "</th>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Speciality";
            print "</th>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Patient First Name";
            print "</th>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Patient Last Name";
            print "</th>";
            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
            print "Room Number";
            print "</th>";
            print "</tr>";
            print "</thead class='border-b'>";

            print "<tbody>";

            while ($row = mysqli_fetch_array($result)) {
                if ($row['Appointment_Number'] == $num) {
                    print "<tr class='bg-white border-b'>";

                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Appointment_Number]</td>";
                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Date]</td>";
                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Time]</td>";
                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Doctor_Name]</td>";
                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Phone_Number]</td>";
                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Specialty]</td>";
                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[First_Name]</td>";
                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Last_Name]</td>";
                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Room_Number]</td>";

                    print "</tr class='bg-white border-b'>";
                }
            }
            print "</tbody>";
            print "</table>";
            print "</div>";
            print "</div>";
            print "</div>";
            print "</div>";
            print "</div>";



        }

        if ($result != NULL) {
            mysqli_free_result($result);
        }
        mysqli_close($connection);
    ?>

</main>
<?php include('footer.php'); ?>

</html>