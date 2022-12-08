<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>

    <main style = "min-height: calc(100vh - 128px - 104px);">
    <h1 class="font-semibold leading-tight text-5xl mt-0 mb-2 text-grey-600 bold text-center mt-10">Doctor Robert's Patients</h1>

    <div class="flex items-center justify-center mb-10 scale-125">
            <div class = "border-2 border-black bg-slate-900 basis-3/12 text-white rounded-lg mt-10 px-10 py-3">
                <p>Below is a list of Doctor Robert's patient information</p> 
            </div>
        </div> 

<?php
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'docOffice';
            $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

            $sql = "SELECT Patient.First_Name, Patient.Last_Name, Patient.PhoneNumber
            FROM ((Patient
            INNER JOIN Appointment ON Patient.SSN = Appointment.Patient_SSN AND Appointment.DoctorID = 'RS5678')
            INNER JOIN Medical_Test ON Patient.SSN = Medical_Test.Patient_SSN AND Medical_Test.DoctorID = 'RS5678');";

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
                                            print "First Name";
                                        print "</th>";
                                        print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                            print "Last Name";
                                        print "</th>";
                                        print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                            print "Phone Number";
                                        print "</th>";
                                    print "</tr>";
                                print "</thead class='border-b'>";

                                print "<tbody>";
                                    while($row = mysqli_fetch_array($result))
                                    {
                                        print "<tr class='bg-white border-b'>";
                                            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[First_Name]</td>";
                                            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Last_Name]</td>";
                                            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[PhoneNumber]</td>";
                                        print "</tr class='bg-white border-b'>";
                                    }
                                print "</tbody>";
                            print "</tbody>";
                            print "</table>";
                        print "</div>";
                    print "</div>";
                print "</div>";
            print "</div>";
        print "</div>";
            

            


?>
    </main>
    <?php include('footer.php'); ?>
</html>
