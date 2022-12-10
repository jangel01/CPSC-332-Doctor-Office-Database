<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<main style="min-height: calc(100vh - 176px - 104px);">
    <h1 class="font-semibold leading-tight text-5xl mt-0 mb-2 text-grey-600 bold text-center mt-10">Prescriptions</h1>

    <div class="flex items-center justify-center mb-10 scale-125">
        <div class="border-2 border-black bg-slate-900 basis-3/12 text-white rounded-lg mt-10 px-10 py-3">
            <p>Below is a list of information on prescriptions prescribed to patients by doctors.</p>
        </div>
    </div>

    <?php
        $result = NULL;

        $server = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'docOffice';
        $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

        $sql = "select Patient.First_Name, Patient.Last_Name, Prescription.Drug_Name, Drug.Dosage, Doctor_Prescribe.Date_Prescribed, Doctor.First_Name as Dr_Fname, Doctor.Last_Name as Dr_Lname, Doctor.Phone_Number as Dr_PhoneNum
                    from Patient, Prescription, Doctor, Doctor_Prescribe, Drug
                    where Prescription.Patient_SSN = Patient.SSN and Doctor_Prescribe.Prescribed_by = Doctor.DoctorID
                    AND Prescription.Drug_Name = Drug.Drug_Name
                    AND Prescription.Prescription_ID = Doctor_Prescribe.Prescription_ID
                    order by Patient.First_Name asc";

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
        print "Drug Name";
        print "</th>";
        print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
        print "Dosage";
        print "</th>";
        print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
        print "Date Prescribed";
        print "</th>";
        print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
        print "Dr. First Name";
        print "</th>";
        print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
        print "Dr. Last Name";
        print "</th>";
        print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
        print "Dr. Phone Number";
        print "</th>";
        print "</tr>";
        print "</thead class='border-b'>";

        print "<tbody>";
        while ($row = mysqli_fetch_array($result)) {
            print "<tr class='bg-white border-b'>";
            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[First_Name]</td>";
            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Last_Name]</td>";
            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Drug_Name]</td>";
            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Dosage]</td>";
            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Date_Prescribed]</td>";
            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Dr_Fname]</td>";
            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Dr_Lname]</td>";
            print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Dr_PhoneNum]</td>";
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

        if ($result != NULL) {
            mysqli_free_result($result);
        }

        mysqli_close($connection);
    ?>
</main>
<?php include('footer.php'); ?>

</html>