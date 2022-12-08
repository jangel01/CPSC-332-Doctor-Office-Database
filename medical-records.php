<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>

    <main style = "min-height: calc(100vh - 128px - 104px);">
    <h1 class="font-semibold leading-tight text-5xl mt-0 mb-2 text-grey-600 bold text-center mt-10">Medical Records</h1>

    <div class="flex items-center justify-center mb-10 scale-125">
            <div class = "border-2 border-black bg-slate-900 basis-3/12 text-white rounded-lg mt-10 px-10 py-3">
                <p>Enter your SSN to look up all your medical records.</p> 
            </div>
        </div> 

        <form action = "medical-records.php" method = "post"> 
        <div class="flex justify-center scale-110 mb-10">
          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >Patient SSN</label
            >
            <input
              type="text"
              class="
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
              "
              name = "ssn"
              placeholder=""
            />
          </div>
        </div>
        
        <div class="flex space-x-2 justify-center">
            <input type = "submit" name = "submit" value = "submit" class = "inline-block px-10 py-2.5 mb-10 bg-slate-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
        </div>
        </form>

        <?php
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'docOffice';
            $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

            if(isset($_POST['ssn'])) {

            $ssn = $_POST['ssn'];

            $sql = "select Medical_Test.Test_ID, Patient.First_Name, Patient.Last_Name,Patient.SSN, Medical_Test.Test_Type, Medical_Test.Result, Doctor.First_Name as Dr_Fname, Doctor.Last_Name as Dr_Lname, Medical_Test.Date_Given
            from Medical_Test, Doctor, Patient
            where Patient.SSN = Medical_Test.Patient_SSN and Medical_Test.Doctor_Name = Doctor.First_Name 
            order by Medical_Test.Test_ID asc";


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
                                                print "Test ID";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "First Name";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Last Name";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "SSN";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Test Type";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Result";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Doctor First Name";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Doctor Last Name";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Date Given";
                                            print "</th>";
                                        print "</tr>";
                                    print "</thead class='border-b'>";

                                    print "<tbody>";
                                        while($row = mysqli_fetch_array($result))
                                        {
                                            if($row['SSN'] == $ssn) {
                                                                                                
                                                print "<tr class='bg-white border-b'>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Test_ID]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[First_Name]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Last_Name]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[SSN]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Test_Type]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Result]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Dr_Fname]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Dr_Lname]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Date_Given]</td>";

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

            mysqli_free_result($result);
            }

            mysqli_close($connection);
        ?>


    </main>
    <?php include('footer.php'); ?>
</html>
