<?php
 $message = '';
 $error = '';
 if(isset($_POST["submit"]))
 {
     if(empty($_POST["fullname"]))
      {
           $error = "<label class='text-danger'>Enter Your Name</label>";
      }
      else if(empty($_POST["email"]))
      {
           $error = "<label class='text-danger'>Enter E-mail</label>";
      }
      else if(empty($_POST["name"]))
      {
           $error = "<label class='text-danger'>Enter User Name</label>";
      }
      else if (empty($_POST["password"]))  {
        $error = "<label class='text-danger'>Enter Password</label>";
      }
      else if (empty($_POST["newPassword"]))  {
        $error = "<label class='text-danger'>Enter Confrim Password</label>";
      }
      else if(empty($_POST["gender"]))
      {
           $error = "<label class='text-danger'>Enter Gender</label>";
      }

      else if(empty($_POST["dob"]))
      {
           $error = "<label class='text-danger'>Enter Your Date of birth </label>";
      }
      else
      {
           if(file_exists('data.json'))
           {
                $current_data = file_get_contents('data.json');
                $array_data = json_decode($current_data, true);
                $extra = array(
                      'fullname' =>     $_POST['fullname'],
                      'email' =>     $_POST['email'],
                      'name'   =>     $_POST['name'],
                      'password' =>     $_POST['password'],
                      'newPassword' =>     $_POST['newPassword'],
                      'gender'    =>     $_POST["gender"],
                       'dob'     =>     $_POST["dob"]
                );
                $array_data[] = $extra;
                $final_data = json_encode($array_data);
                if(file_put_contents('info.json', $final_data))
                {
                     $message = "<label class='text-success'>File Appended Success fully</p>";
                }
           }
           else
           {
                $error = 'JSON File not exits';
           }
      }
 }
 ?>
<!DOCTYPE html>
 <html>
      <body style="background-color:powderblue;" >
           <br />
           <div >
                <h3 > Data to JSON File</h3><br />
                <form method="post">
                     <?php
                     if(isset($error))
                     {
                          echo $error;
                     }
                     ?>
                     <br />
                      <fieldset>
    <legend> <b> <font size="5px">Registration  </font> </b> </legend>
    <fieldset>

    <table>

      <tr >

        <td>Name</td>

        <td  ><input type="text" name="fullname"/></td>


      </tr>


      <tr>
        <td>Email</td>

        <td><input type="text" name="email"></td>

      </tr>
      <tr>
        <td > User Name   </td>


        <td><input type="text" name="name"/></td>

      </tr>

      <tr>
        <td>Password </td>

        <td><input type="password" name="password"/></td> <br>

      </tr>

      <tr>
        <td>Confrim Password </td>

        <td><input type="password" name="newPassword"/></td> <br>
      </tr>



    </table>
    </fieldset>
        <fieldset>
               <legend><b> Gender </b> </legend>
               <input type="radio" name="gender" value="Female">Female
               <input type="radio" name="gender" value="Male">Male
               <input type="radio" name="gender" value="Other">Other

            </fieldset>
    <hr>
    <fieldset>
        <legend> <b> Date Of Birth </b> </legend> <input type="date" name="dob"
        placeholder="dd-mm-yyyy" value=""
        min="1997-01-01" max="2030-12-31">

        </fieldset>
    <br>
    <table>
      <tr>
        <td>
          <input type="submit" name="submit" value="Submit">
     <input type="reset" value="Reset">
        </td>
      </tr>

    </table>

  </fieldset>
                     <?php
                     if(isset($message))
                     {
                          echo $message;
                     }
                     ?>

                </form>
           </div>
           <br />
      </body>
 </html>
