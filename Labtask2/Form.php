
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $dateofbirthErr = $degreeErr = $bloodgroupErr = "";
$name = $email = $gender = $dateofbirth = $degree = $bloodgroup = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["degree"])) {
    $degreeErr = "Degree is required";
  } else {
    $degree = test_input($_POST["degree"]);
  }


  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["bloodgroup"])) {
    $bloodgroupErr = "bloodgroup is required";
  } else {
    $bloodgroup = test_input($_POST["bloodgroup"]);
  }
  if (empty($_POST["dateofbirth"])) {
    $dateofbirthErr = "dateofbirth is required";
  } else {
    $dateofbirth = test_input($_POST["dateofbirth"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Degree:
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="ssc") echo "checked";?> value="ssc">SSC
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="hsc") echo "checked";?> value="hsc">HSC
  <input type="checkbox" name="degree" <?php if (isset($degree) && $degree=="bsc") echo "checked";?> value="bsc">BSc
  <span class="error">* <?php echo $degreeErr;?></span>
    <br><br>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  Blood Group:
  <select name="bloodgroup" id="bloodgroup">
  <option value="A+">A+</option>
  <option value="A-">A-</option>
  <option value="B+">B+</option>
  <option value="B-">B-</option>
  <option value="AB+">AB+</option>
  <option value="AB-">AB-</option>
  <option value="O+">O+</option>
  <option value="O-">O-</option>
</select>
<span class="error">* <?php echo $bloodgroupErr;?></span>
<br><br>
Date Of Birth:
<input type="date" id="date" name="date"
       value="1983-01-01"
       min="1953-01-01" max="1998-12-31">
       <span class="error">* <?php echo $dateofbirth?></span>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $degree;
echo "<br>";
echo $gender;
echo "<br>";
echo $bloodgroup;
echo "<br>";
echo $dateofbirth;
?>

</body>
</html>
