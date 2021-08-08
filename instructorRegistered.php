<?php
$error = '';

$name = $email = $number = $age = $gender = $ins = "";
$nameErr = $emailErr = $numberErr = $ageErr = $genderErr = $insErr = "";

$hasError = false;

if($_SERVER["REQUEST_METHOD"] == "POST")
{

    if(empty($_POST["name"]))
    {
        $nameErr = "Cannot be blank";
        $hasError = true;
    }
    else
    {
      $name = ($_POST["name"]);
    // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name))
      {
      $nameErr = "Only letters and white space allowed";
      $hasError = true;
      }
    }
  }


    if(empty((isset($_POST["gender"]))))
    {
        $genderErr="Gender Required !";
        $hasError = true;
    }
    else
    {
        $gender = $_POST["gender"];
    }

    if(empty($_POST["age"]))
    {
        $ageErr = "Cannot be blank";
        $hasError = true;
    }
    else
    {
        $age = $_POST["age"];
    }


    if(empty($_POST["email"]))
    {
        $emailErr = "Email Required";
        $hasError = true;
    }
    else
    {
      $email = ($_POST["email"]);
    // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $hasError = true;
    }

    if(empty($_POST["number"]))
    {
        $numberErr = "Cannot be blank";
        $hasError = true;
    }
    elseif(strlen($_POST["number"]) !=11)
    {
            $numberErr = "Phone Number Must be 11 Digits";
            $hasError = true;
    }
    elseif(is_numeric($_POST["number"]) == false)
    {
        $numberErr = "Phone Number Must be Numeric";
        $hasError = true;
    }
    else
    {
        $number = $_POST["number"];
    }

    if(empty($_POST["ins"]))
    {
        $insErr = "Cannot be blank";
        $hasError = true;
    }
    else
    {
        $ins = $_POST["ins"];
    }

  if(!$hasError)
  {
    if(file_exists('instData.json'))
    {
      $current_data = file_get_contents('instData.json');
      $array_data = json_decode($current_data, true);
      $extra = array
      (
        'Name'               =>     $_POST['name'],
        'E-mail'          =>     $_POST["email"],
        'Number'     =>     $_POST["number"],
        'Age'     =>     $_POST["age"],
        'Gender'     =>     $_POST["gender"],
        'Institute'     =>     $_POST["ins"]
      );
      $array_data[] = $extra;
      $final_data = json_encode($array_data);
      if(file_put_contents('instData.json', $final_data))
      {
          echo "Registration Successful";
      }
    }
    else
    {
      $error = 'No Data';
    }
  }
}

?>
<!DOCTYPE html>

<html>
 <head>
   <meta charset="UTF-8">
   <meta name="description" content="Study">
   <title>StudBud|Homework Buddy</title>
   <style type = "text/css">
     #section1
     {
       font-family: Courier New;
       font-size: 120%;
     }
   </style>
 </head>

 <body style="background-color:#f3f2f2">
   <?php
    include 'moderatorHeader.php';
   ?>
   </div>

   <main>
     <div id="section1" style="width:500px;">
       <div class="table-responsive">
         <legend><h3>Registered Accounts Lists</h3></legend>
         <table border="2">
           <tr>
             <th>Name</th>
             <th>E-mail</th>
             <th>Number</th>
             <th>Age</th>
             <th>Gender</th>
             <th>Institute</th>
           </tr>
           <?php
           $data = file_get_contents("instData.json");

           $data = json_decode($data, true);

           foreach($data as $row)
           {
             echo
             '<tr>
             <td>'.$row["Name"].'</td>
             <td>'.$row["E-mail"].'</td>
             <td>'.$row["Number"].'</td>
             <td>'.$row["Age"].'</td>
             <td>'.$row["Gender"].'</td>
             <td>'.$row["Institute"].'</td>
             </tr>';
           }
           ?>
         </table>
       </div>
     </div>

     <div id="section1">
       <fieldset>
         <p><span class="error">* required field</span></p>
         <legend><h3>Sign-Up Accounts</h3></legend>
         <table>
         <form align="left" action="" method="post">
           <tr>
             <td>Name:</td>
             <td><input type="text" name="name" value="<?php echo $name;?>" /></td>
             <td><span class="error">* <?php echo $nameErr;?></span><br /></td>
           </tr>

           <tr>
             <td>Age:</td>
             <td><input type="number" name="age" value="<?php echo $age;?>" /></td>
             <td><span class="error">* <?php echo $ageErr;?></span><br /></td>
           </tr>

           <tr>
             <td>Gender:</td>
             <td>
               <input type="radio" name="gender" value="male" />Male
               <input type="radio" name="gender" value="female" />Female
               <input type="radio" name="gender" value="otehr" />Other
             </td>
             <td><span class="error">* <?php echo $genderErr;?></span><br /></td>
           </tr>

           <tr>
             <td>Email:</td>
             <td>
               <input type="email" name="email" value="<?php echo $email;?>" />
             </td>
             <td><span class="error">* <?php echo $emailErr;?></span><br /></td>
           </tr>

           <tr>
             <td>Institute:</td>
             <td><input type="text" name="ins" value="<?php echo $ins;?>" /></td>
             <td><span class="error">* <?php echo $insErr;?></span><br /></td>
           </tr>

           <tr>
             <td>Phone Number:</td>
             <td>
               <input placeholder="" type="text" name="number" value="<?php echo $number;?>"/>
             </td>
             <td><span class="error">* <?php echo $numberErr;?></span><br /></td>
           </tr>

           <tr>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td><input type="submit" value="Submit"/></td>
           </tr>
         </form>
       </table>
       </fieldset>

     </div>


     <a href="moderatorAccount.php">Back</a>

   </main> <br>

   <footer>
     <?php
      include 'footer.php';
     ?>
   </footer>

 </body>

</html>
