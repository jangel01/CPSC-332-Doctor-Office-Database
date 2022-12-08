<!DOCTYPE html>
<html lang="en">
    <?php include('header.php'); ?>

    <main style = "min-height: calc(100vh - 128px - 56px);">

    <div class="flex items-center justify-center mb-10 scale-125">
            <div class = "border-2 border-black bg-slate-900 basis-3/12 text-white rounded-lg mt-10 mb-10 px-10 py-3">
                <p>Enter your city name to find avaiable doctors. Leave text field empty if you wish to view all doctors in every location.</p> 
            </div>
        </div> 


        <form action = "family-member.php" method = "request"> 
        <div class="flex flex-col justify-center items-center scale-110 mb-10">
          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >SSN</label
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
              name = "SSN"
              placeholder=""
            />
          </div>

          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >Insurance ID</label
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
              name = "Insurance_ID"
              placeholder=""
            />
          </div>

          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >First Name</label
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
              name = "First_Name"
              placeholder=""
            />
          </div>

          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >Last Name</label
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
              name = "Last_Name"
              placeholder=""
            />
          </div>

          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >Phone Number</label
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
              name = "PhoneNumber"
              placeholder=""
            />
          </div>

          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >State</label
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
              name = "State"
              placeholder=""
            />
          </div>

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
              name = "City"
              placeholder=""
            />
          </div>

          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >Zip Code</label
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
              name = "Zip_Code"
              placeholder=""
            />
          </div>

          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >Street Number</label
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
              name = "Street Number"
              placeholder=""
            />
          </div>

          <div class="mb-3 xl:w-96">
            <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700"
              >Street Name</label
            >
            <input
              type="text"
              class="
                mb-10
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
              name = "Street_Name"
              placeholder=""
            />
          </div>
        </div>
        
        <div class="flex space-x-2 justify-center">
            <input type = "submit" name = "submit" value = "submit" class = "inline-block px-10 py-2.5 mb-10 bg-slate-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
        </div>
        </form>

<?php
            $server = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'docOffice';
            $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

    $sql2 = "select * from Patient";
    $result2 = mysqli_query($connection, $sql2);

            print "<div class = 'flex items-center justify-center'>";
                print "<div class='flex flex-ol'>";
                    print "<div class='overflow-x-auto sm:-mx-6 lg:-mx-8'>";
                        print "<div class='py-4 inline-block min-w-full sm:px-6 lg:px-8'>";
                            print "<div class='overflow-hidden'>";
                                print "<table class='min-w-full text-center'>";
                                    print "<thead class='border-b bg-gray-800'>";
                                        print "<tr>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "SSN";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Insurance ID";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "First Name";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Last Name";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Phone Number";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "State";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "City";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Zip Code";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Street Number";
                                            print "</th>";
                                            print "<th scope='col' class='text-sm font-medium text-white px-6 py-4'>";
                                                print "Street Name";
                                            print "</th>";
                            
                                        print "</tr>";
                                    print "</thead class='border-b'>";
                                    
                                    print "<tbody>";

                                    while($row = mysqli_fetch_array($result2))
                                        {
                                            print "<tr class='bg-white border-b'>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[SSN]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Insurance_ID]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[First_Name]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Last_Name]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[PhoneNumber]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[State]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[City]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Zip_Code]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Street_Number]</td>";
                                                print "<td class='text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap'>$row[Street_Name]</td>";
                                            print "</tr class='bg-white border-b'>";
                                        }
                                    
                                    print "</tbody>";
                                print "</table>";
                             print "</div>";
                        print "</div>";
                    print "</div>";
                print "</div>";
             print "</div>";



    if (isset($_REQUEST['SSN']))
    {

        $ssn = mysqli_real_escape_string($connection, $_REQUEST['SSN']);
        $insurance_id = mysqli_real_escape_string($connection, $_REQUEST['Insurance_ID']);
        $fname = mysqli_real_escape_string($connection, $_REQUEST['First_Name']);
        $lname = mysqli_real_escape_string($connection, $_REQUEST['Last_Name']);
        $phone = mysqli_real_escape_string($connection, $_REQUEST['PhoneNumber']);
        $state = mysqli_real_escape_string($connection, $_REQUEST['State']);
        $city = mysqli_real_escape_string($connection, $_REQUEST['City']);
        $zip_code = mysqli_real_escape_string($connection, $_REQUEST['Zip_Code']);
        $street_number = mysqli_real_escape_string($connection, $_REQUEST['Street_Number']);
        $street_name = mysqli_real_escape_string($connection, $_REQUEST['Street_Name']);


        $sql = "Insert into Patient 
        values ('$ssn', '$lname', '$phone', '$street_name', '$street_number', '$city', '$state', '$zip_code', '$fname', '$insurance_id')";
	//where not exists (select SSN, PhoneNumber where SSN = $ssn or PhoneNumber = $phone";

        if(mysqli_query($connection, $sql))
        {
            echo "added successfully";
        } else {
		echo "already exists";
	}
    }


?>
    </main>
    <?php include('footer.php'); ?>
</html>
