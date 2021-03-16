<head>
      <style>
     .error {color: #FF0000;}
     </style>
</head>
<body style="background-color:powderblue;">

    <?php
    $usernameErr = $passwordErr = "" ;
    $username = $password = "" ;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
 if (empty($_POST["username"])) {
    $usernameErr = "User Name can contain alpha numeric characters, period, dash or
underscore only";
  }
  elseif(strlen($username)<= 2) {
     $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
    $usernameErr = "User Name must contain at least two (2) characters";

}
  }
 if(!empty($_POST["password"])) {
    $password = test_input($_POST["password"]);

    if (strlen($_POST["password"]) <= '8') {
        $passwordErr = "Password Must Contain At Least 8 Characters!";
    }

     elseif (!preg_match("/^[a-zA-Z-' ]*$/",$password )) {
      $passwordErr = "Must Contain At Least One of the Special Charecter!";
    }

}
else {
     $passwordErr = "Password can not be empty";
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
                <span class="error"><?php echo $usernameErr;?></span>

                <td><input type="text" username="username"/></td>
            </tr>

            <tr>
                <td>Password </td>
        <br><span class="error"><?php echo $passwordErr;?></span>
                <td><input type="password" name="password"/></td> <br>

            </tr>

        </table>
        <hr>
        <input type="checkbox" username="rm">Remember Me
        <br><br>
        <input type="submit" username="submit" value="Submit"> <a href=""> Forgot Password?</a>
    </fieldset>

</form>
<?php
echo "<br>";
echo "OUPUT : ";
echo "<br>";
echo $username;
echo "<br>";
echo $password;
 ?>


</body>
</html>
