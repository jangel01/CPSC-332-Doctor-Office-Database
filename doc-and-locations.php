<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>

    <main style = "min-height: calc(100vh - 128px - 104px);">
    <h1 class="font-semibold leading-tight text-5xl mt-0 mb-2 text-grey-600 bold text-center mt-10">Find Doctors and Locations</h1>

        <div class="flex items-center justify-center mb-10 scale-125">
            <div class = "border-2 border-black bg-slate-900 basis-3/12 text-white rounded-lg mt-10 px-10 py-3">
                <p>Enter your city name to find avaiable doctors. Leave text field empty if you wish to view all doctors in every location.</p> 
            </div>
        </div> 

        <form action = "doc-and-locations.php" method = "post"> 
        <div class="flex justify-center scale-110 mb-10">
          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >City</label
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
              name = "city"
              placeholder=""
            />
          </div>
        </div>
        
        <div class="flex space-x-2 justify-center">
            <input type = "submit" name = "submit" value = "submit" class = "inline-block px-10 py-2.5 mb-10 bg-slate-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
        </div>
        </form>
        
        <?php
            $result = NULL;
            $result2 = NULL;

            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'docOffice';
            $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

            if(isset($_POST['city'])) {

            $location = $_POST['city'];

            $sql2 = "select distinct Doctor.First_Name, doctor.Last_Name, Doctor.Specialty, Patient.City, Patient.State, Doctor.Phone_Number
            from Appointment, Doctor, Patient
            where Doctor.first_name = Appointment.Doctor_Name
            order by Patient.City asc";

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
                                                print "Specialty";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "City";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "State";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Phone Number";
                                            print "</th>";
                                        print "</tr>";
                                    print "</thead class='border-b'>";

                                    print "<tbody>";
                                        $i = 0;
                                        $result = mysqli_query($connection, $sql2);

                                        while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
                                        {
                                            if($row['City'] == $location) {
                                                $i++;

                                                print "<tr class='bg-white border-b'>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[First_Name]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Last_Name]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Specialty]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[City]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[State]</td>";
                                                    print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Phone_Number]</td>";
                                                print "</tr class='bg-white border-b'>";
                                            }
                                        }
                                        
                                        if ($i == 0) {
                                            $result = mysqli_query($connection, $sql2);

                                            while($row = mysqli_fetch_array($result, MYSQLI_BOTH))
                                            {
                                                
                                                    print "<tr class='bg-white border-b'>";
                                                        print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[First_Name]</td>";
                                                        print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Last_Name]</td>";
                                                        print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Specialty]</td>";
                                                        print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[City]</td>";
                                                        print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[State]</td>";
                                                        print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Phone_Number]</td>";
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
