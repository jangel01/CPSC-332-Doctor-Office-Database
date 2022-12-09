<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<main style="min-height: calc(100vh - 176px - 104px);">
  <h1 class="font-semibold leading-tight text-5xl mt-0 mb-2 text-grey-600 bold text-center mt-10">Add a Family Member
  </h1>

  <div class="flex items-center justify-center mb-10 scale-125">
    <div class="border-2 border-black bg-slate-900 basis-3/12 text-white rounded-lg mt-10 mb-10 px-10 py-3">
      <p>Enter the details below for the family member you would like to add to the patient list. Upon submission, you
        will be shown a list of your family members including any new additions.</p>
    </div>
  </div>


  <form action="family-member.php" method="post">
    <div class="flex flex-col justify-center items-center scale-110 mb-10">
      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">SSN*</label>
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
              " name="SSN" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Insurance ID</label>
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
              " name="Insurance_ID" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">First Name*</label>
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
              " name="First_Name" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Last Name*</label>
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
              " name="Last_Name" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Phone Number</label>
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
              " name="PhoneNumber" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">State</label>
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
              " name="State" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">City</label>
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
              " name="City" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Zip Code</label>
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
              " name="Zip_Code" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Street Number</label>
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
              " name="Street Number" placeholder="" />
      </div>

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Street Name</label>
        <input type="text" class="
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
              " name="Street_Name" placeholder="" />
      </div>
    </div>

    <div class="flex space-x-2 justify-center">
      <input type="submit" name="submit" value="submit"
        class="inline-block px-10 py-2.5 mb-10 bg-slate-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
    </div>
  </form>

  <div class="flex items-center justify-center scale-125">
    <div class="border-2 border-black bg-slate-900 basis-3/12 text-white rounded-lg mt-10 mb-10 px-10 py-3">
      <p> Or simply enter your family's last name if you wish to view family members that are already a patient.</p>
    </div>
  </div>

  <form action="family-member.php" method="post">

    <div class="flex flex-col justify-center items-center scale-110 mb-10">

      <div class="mb-3 xl:w-96">
        <label for="exampleFormControlInput1" class="form-label inline-block mb-2 text-gray-700">Last Name</label>
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
                " name="Last_Name2" placeholder="" />
      </div>
    </div>

    <div class="flex space-x-2 justify-center">
      <input type="submit" name="submit2" value="submit"
        class="inline-block px-10 py-2.5 mb-10 bg-slate-900 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-gray-700 hover:shadow-lg focus:bg-gray-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-gray-800 active:shadow-lg transition duration-150 ease-in-out">
    </div>
  </form>

  <?php
    function generateAddressID($length = 4)
    {
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $chr_length = strlen($characters);
      $random_str = '';

      for ($i = 0; $i < $length; $i++) {
        $random_str .= $characters[rand(0, $chr_length - 1)];
      }

      return $random_str;
    }

    function output($lname, &$connection, &$result)
    {
      $sql = "select Patient.SSN, Patient.First_Name, Insurance.Insurance_ID, Patient.Last_Name, Patient.PhoneNumber, Location.State, Location.City,
        Location.Zip_Code, Location.Street_Number, Location.Street_Name, Location.Address_ID
        FROM Patient, Location, Insurance
        WHERE Patient.Address_ID = Location.Address_ID
        AND Patient.First_Name = Insurance.First_Name;";
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

      while ($row = mysqli_fetch_array($result)) {
        if ($lname == $row['Last_Name']) {
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
      }

      print "</tbody>";
      print "</table>";
      print "</div>";
      print "</div>";
      print "</div>";
      print "</div>";
      print "</div>";
    }

    $result = NULL;

    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'docOffice';
    $connection = new mysqli($server, $username, $password, $database, 3306) or die("not connected");

    if (isset($_POST['submit'])) {

      $ssn = mysqli_real_escape_string($connection, $_POST['SSN']);
      $insurance_id = mysqli_real_escape_string($connection, $_POST['Insurance_ID']);
      $fname = mysqli_real_escape_string($connection, $_POST['First_Name']);
      $lname = mysqli_real_escape_string($connection, $_POST['Last_Name']);
      $phone = mysqli_real_escape_string($connection, $_POST['PhoneNumber']);
      $address_id = generateAddressID();
      $state = mysqli_real_escape_string($connection, $_POST['State']);
      $city = mysqli_real_escape_string($connection, $_POST['City']);
      $zip_code = mysqli_real_escape_string($connection, $_POST['Zip_Code']);
      $street_number = mysqli_real_escape_string($connection, $_POST['Street_Number']);
      $street_name = mysqli_real_escape_string($connection, $_POST['Street_Name']);



      $sql = "set autocommit = 0;
        
                drop procedure if exists sp_tran;

                CREATE PROCEDURE `sp_tran`()
                BEGIN
                  DECLARE `_rollback` BOOL DEFAULT 0;
                  DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET `_rollback` = 1;
                  START TRANSACTION;
                    insert into insurance
                    values ('" . $insurance_id . "', '" . $fname . "');
                      
                    insert into location
                    values ('" . $address_id . "', '" . $street_name . "', '" . $street_number . "', '" . $city . "', '" . $state . "', '" . $zip_code . "');
                      
                    insert into patient 
                    values('" . $ssn . "', '" . $lname . "', '" . $phone . "', '" . $fname . "', '" . $address_id . "');
            
                  IF `_rollback` THEN
                    ROLLBACK;
                  ELSE
                    COMMIT;
                  END IF;
                END;
                
                call sp_tran;
                ";


      mysqli_multi_query($connection, $sql) or die(mysqli_error($connection));

      mysqli_next_result($connection);
      mysqli_next_result($connection);
      mysqli_next_result($connection);

      if (!empty($lname) && !empty($fname) && !empty($ssn)) {
        output($lname, $connection, $result);
      }
    } else if (isset($_POST['submit2'])) {
      $lname = mysqli_real_escape_string($connection, $_POST['Last_Name2']);

      output($lname, $connection, $result);
    }

    if ($result != NULL) {
      mysqli_free_result($result);
    }


    mysqli_close($connection);
  ?>
</main>
<?php include('footer.php'); ?>

</html>