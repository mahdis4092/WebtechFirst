<!DOCTYPE html>
<html>
<head>
      <style>
     .error {color: #FF0000;}

      header {
  background-color: #b2beb5;
  padding: 20px;
  text-align: right;
  font-size: 20px;
  color: green;

}
  footer {
  background-color: #777;
  padding: 10px;
  text-align:center;
  color: white;
}
     </style>
</head>
<body style="background-color:powderblue;">

  <header>
  <h2>X company</h2>
  <h1 ></h1>

  <div class="topnav">
  <a  href="Home.html" > Home </a>
  <a href="Login.php">Login </a>
  <a href="Store.php">Registration </a>

</div>
</header>

    <?php
    $nameErr = $passwordErr = "" ;
    $name = $password = "" ;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["name"])) {
    $nameErr = "Name is required and must be from letters, dashes, spaces and must not start with dash";
  }
  elseif(strlen($name)<= 2) {
     $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
    $nameErr = "Name must be from letters, dashes, spaces and must not start with dash";

}
  }
 if(!empty($_POST["password"])) {
    $password = test_input($_POST["password"]);

    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Your Password Must Contain At Least 8 Characters!";
    }

     elseif (!preg_match("/\W/",$password )) {
      $passwordErr = "Password must contain At Least 1 special charecter!";
    }

}
else {
     $passwordErr = "Please enter password   ";
}


}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

    ?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <fieldset>
        <legend> <b> <font size="5px">Login  </font> </b> </legend>
        <table>
            <tr>
                <td > User Name   </td>
                <span class="error"><?php echo $nameErr;?></span>

                <td><input type="text" name="name"/></td>
            </tr>

            <tr>
                <td>Password </td>
        <br><span class="error"><?php echo $passwordErr;?></span>
                <td><input type="password" name="password"/></td> <br>

            </tr>

        </table>
        <hr>
        <input type="checkbox" name="rm">Remember Me
        <br><br>
        <input type="submit" name="submit" value="Submit"> <a href=""> Forgot Password?</a>
    </fieldset>

</form>
<?php
echo "<br>";
echo "OUPUT : ";
echo "<br>";
echo $name;
echo "<br>";
echo $password;
 ?>

<footer>
  <p>Copyright <span>&#169;</span>Mahdi Hasan shuvo</p>
</footer>

</body>
</html>
