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
   <header >
     <?php
      include 'moderatorHeader.php';
     ?>
   </header>

   <main>
     <div id="section1">
       <h3>Dashboard</h3>
       <nav>
         <ui>
           <li>
             <a href="instructorRegistered.php">Instructor's Information</a>
           </li>
           <li>
             <a href="studentRegistered.php">Student's Information</a>
           </li>
           <li>
             <a href="moderatorProfile.php">Profile</a>
           </li>
           <li>
             <a href="index.php">Sign out</a>
           </li>
         </ui>
       </nav>

     </div>


   </main> <br>

   <footer>
     <?php
      include 'footer.php';
     ?>
   </footer>

 </body>

</html>
