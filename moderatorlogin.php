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
   <header>
     <?php
      include 'header.php';
     ?>
   </header>
   <main>
     <?php
       $usernameMDlog = $passwordMD = "";
       $usernameMDlogErr = $passwordMDErr = "";
       $sampleUser = "Hasib";

       $hasError = false;
       if($_SERVER["REQUEST_METHOD"] == "POST")
       {
         if(empty($_POST["usernameMDlog"]))
         {
           $usernameMDlogErr = "This field cannot be empty! ";
           $hasError = true;
         }
         elseif(strcmp($_POST["usernameMDlog"], $sampleUser) != 0)
         {
           $usernameMDlogErr = "No such Username exist!";
           $hasError = true;
         }
         else
         {
           $usernameMDlog = $_POST["usernameMDlog"];
         }

         if(empty($_POST["passwordMD"]))
         {
           $passwordMDErr = "This field cannot be empty! ";
           $hasError = true;
         }
         elseif($_POST["passwordMD"] != "12345")
         {
           $passwordMDErr = "Password Incorrect";
           $hasError = true;
         }
         else
         {
           $passwordMD = $_POST["passwordMD"];
         }
       }

       if(!$hasError and empty($_POST["passwordMD"]) != true)
       {
         $action = "moderatorAccount.php";
         echo $action;
        }
        else
        {
          $action = "";
          echo $action."";
        }
     ?>
   </main>

   <fieldset>
     <legend>
       <h1><b>Moderater Login</b></h1>
     </legend>


     <p><span class="error">* required field</span></p>
    <form align="left" action="<?php echo$action;?>" method="POST">
      <div id="section1">
        <table>
          <tr>
            <br><br>
            <td>Username:</td>
            <td><input type="text" name="usernameMDlog" value="<?php echo $usernameMDlog;?>"></td>
            <td><span class="error">* <?php echo $usernameMDlogErr;?></span><br /></td>

          </tr>

          <tr>
            <td>Password:</td>
            <td><input type="password" name="passwordMD" value="<?php echo $passwordMD;?>"></td>
            <td><span class="error">* <?php echo $passwordMDErr;?></span><br /></td>
          </tr>
          <tr><td><br><br><br></td></tr>
          <tr>
            <td>Do not have an account? <a href="contact.php"> Contact Support </a></td>
          </tr>
          <tr>
            <td><input type="submit" value = "Log In"></td>
          </tr>
        </table>
      </form>
    </fieldset>

    <br>
    <p>Sample Username: Hasib</p>
    <p>Sample Password: 12345</p>
    </div>

   <footer>
     <?php
      include 'footer.php';
     ?>
   </footer>

 </body>

</html>
