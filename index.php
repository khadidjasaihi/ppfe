<?php
   // import db
   require_once("./conn.php");
   
   // Craete Session
   session_start();
   
   
   
   // check if session is exists
   if (isset($_SESSION['user'])) {
      header("location:profil.php");
   }
   
   if (isset($_REQUEST['btnLogin'])) {
        
      $emailUser = $_REQUEST['email'];
      $passwordUser = $_REQUEST['password'];
   
      $req = "SELECT * FROM ens WHERE email='$emailUser'   LIMIT 1";
   
      $selectUser =  mysqli_query($sql, $req);
      $row = mysqli_fetch_assoc($selectUser);
   
   
      if (mysqli_num_rows($selectUser) > 0) {
       if ($passwordUser==$row['mpass']) { 
        $_SESSION['user']['id'] = $row['id'];
        $_SESSION['user']['username'] = $row['nom'];
        $_SESSION['user']['email'] = $row['email'];
        $_SESSION['user']['password'] = $row['mpass'];
        $_SESSION['user']['dep'] = $row['dep'];
        $_SESSION['user']['fac'] = $row['fac'];
        $_SESSION['user']['propos'] = $row['propos'];
        $_SESSION['user']['tel'] = $row['tel'];
        
       header('location:profil.php');
      }else{
       header('location:index.php?msg=danger');
      }}}
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="ind.css">
</head>
<body>
   
        <div class="conta">

           <form method="post">
            <div class="">
            <?php if (isset($_REQUEST['msg'])) : ?>
      <div class="notification is-<?php echo $_REQUEST['msg'] ?>">
         <button class="delete"></button>
         <?php if ($_REQUEST['msg'] === 'success') : ?>
            <p>Your Registration is valid </p>
         <?php elseif ($_REQUEST['msg'] === 'danger') : ?>
            <p>Your Registration is invalid </p>
         <?php endif ?>
      </div>
   <?php endif ?>
             <div class="relative bg-white pt-10 pb-8 px-10 shadow-xl mx-auto w-96 rounded-lg">
              <div class="divide-y divide-gray-300/50 w-full">
                <div class="space-y-6 py-8 text-base  text-gray-600">
                   <p class="text-xl font-medium leading-7"> Login System</p>
                    <div class="space-y-4 flex flex-col">
                        <input type="text"
                               name="email"
                               placeholder="Email"
                               class="border border-gray-300/50 p-1 rounded focus:outline-none"/>

                        <input type="password"
                               name="password"
                               placeholder="Password"
                               class="border border-gray-300/50 p-1 rounded focus:outline-none"/>
                    </div>
                </div>
                <div class="pt-8 text-base font-semibold leading-7">
                    <button name="btnLogin" type="submit" class="bg-sky-500 hover:bg-sky-600 px-4 py-1 text-white rounded">
                        Login
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
               
</div>
</body>
</html>
