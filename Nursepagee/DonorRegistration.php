<?php
session_start();
include("../connection/connection.php"); // assumes $con is created here
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Donor</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
  <div class="bg-white shadow-2xl rounded-2xl w-full max-w-4xl p-10">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-3xl font-bold text-blue-600">Register Donor</h2>
      
      
    </div>
    <form method="post" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <div>
        <label class="block text-gray-700">ID Number:</label>
        <input type="text" name="bdid" required class="input-field" />
      </div>
      <div>
        <label class="block text-gray-700">First Name:</label>
        <input type="text" name="fname" required class="input-field" />
      </div>
      <div>
        <label class="block text-gray-700">Last Name:</label>
        <input type="text" name="lname" required class="input-field" />
      </div>
      <div>
        <label class="block text-gray-700">Email:</label>
        <input type="email" name="email" required class="input-field" />
      </div>
      <div>
        <label class="block text-gray-700">Occupation:</label>
        <input type="text" name="occp" required class="input-field" />
      </div>
      <div>
        <label class="block text-gray-700">Date of Birth:</label>
        <input type="date" name="dbdate" required class="input-field" />
      </div>
      <div>
        <label class="block text-gray-700">Age:</label>
        <input type="number" name="dage" min="18" max="65" required class="input-field" />
      </div>
      <div>
        <label class="block text-gray-700">Sex:</label>
        <select name="dsex" required class="input-field">
          <option value="">Select</option>
          <option>Male</option>
          <option>Female</option>
        </select>
      </div>
      <div>
        <label class="block text-gray-700">City:</label>
        <input type="text" name="city" class="input-field" />
      </div>
      <div>
        <label class="block text-gray-700">Region:</label>
        <input type="text" name="region" required class="input-field" />
      </div>
      <div class="col-span-2">
        <label class="block text-gray-700">Photo (JPEG only):</label>
        <input type="file" name="photo" accept="image/jpeg" required class="block w-full mt-1" />
      </div>
      <div class="col-span-2 flex gap-4 justify-end mt-4">
        <input type="submit" name="register" value="Register" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700" />
        <input type="reset" value="Reset" class="bg-gray-300 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-400" />
      </div>
    </form>

    <div class="mt-4">
    <?php
    if (isset($_POST['register'])) {
        $bdid = mysqli_real_escape_string($con, $_POST["bdid"]);
        $fname = mysqli_real_escape_string($con, $_POST["fname"]);
        $lname = mysqli_real_escape_string($con, $_POST["lname"]);
        $email = mysqli_real_escape_string($con, $_POST["email"]);
        $occp = mysqli_real_escape_string($con, $_POST["occp"]);
        $dbdate = $_POST["dbdate"];
        $dsex = $_POST["dsex"];
        $dage = (int)$_POST["dage"];
        $city = mysqli_real_escape_string($con, $_POST["city"]);
        $region = mysqli_real_escape_string($con, $_POST["region"]);
        $status = "Noaccount";

        $photo_tmp = $_FILES["photo"]["tmp_name"];
        $photo_name = $_FILES["photo"]["name"];
        $photo_size = $_FILES["photo"]["size"];
        $photo_type = $_FILES["photo"]["type"];

        if ($con) {
            if ($photo_size <= 900000 && $photo_type === "image/jpeg") {
                $photo_path = "../images/" . basename($photo_name);
                if (!file_exists("images")) {
                    mkdir("images");
                }

                if (move_uploaded_file($photo_tmp, $photo_path)) {
                    $sql1 = "INSERT INTO blooddonor 
                        (did, fname, lname, email, occp, dbdate, dsex, dage, city, region, UserPhoto, dstatus)
                        VALUES ('$bdid', '$fname', '$lname', '$email', '$occp', '$dbdate', '$dsex', '$dage', '$city', '$region', '$photo_path', '$status')";

                    $sql2 = "INSERT INTO user 
                        (uid, FName, LName, Uemail, UesrSex, Userage, UserPhoto)
                        VALUES ('$bdid', '$fname', '$lname', '$email', '$dsex', '$dage', '$photo_path')";

                    $insert1 = mysqli_query($con, $sql1);
                    $insert2 = mysqli_query($con, $sql2);

                    if ($insert1 && $insert2) {
                        echo "<p class='text-green-600 font-semibold'>✅ Donor registered successfully!</p>";
                    } else {
                        echo "<p class='text-red-600 font-semibold'>❌ Error: " . mysqli_error($con) . "</p>";
                    }
                } else {
                    echo "<p class='text-red-600 font-semibold'>❌ Unable to upload photo!</p>";
                }
            } else {
                echo "<p class='text-red-600 font-semibold'>❌ Photo must be JPEG and less than 900KB!</p>";
            }
        } else {
            echo "<p class='text-red-600 font-semibold'>❌ Connection failed: " . mysqli_connect_error() . "</p>";
        }
    }
    ?>
    </div>
  </div>

  <style>
    .input-field {
      @apply mt-1 w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200;
    }
  </style>
</body>
</html>
