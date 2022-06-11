<?php
 @include 'conn.php';
 session_start();
 if (isset($_REQUEST['update_profile'])) {
    
      $nom = $_POST['nom'];
      $fac = $_POST['fac'];
       $dep = $_POST['dep']; 
      $tel= $_POST['tel'];
       $prop = $_POST['about'];
       $id=$_POST['id'];
       $pass=$_POST['nmp'];
   
       $update_data = "UPDATE `ens` SET `nom`='$nom',`fac`='$fac',`dep`='$dep',`propos`='$prop',`tel`='$tel',`mpass`='$pass' WHERE `id`='$id'";
       $msg="<p style='color:green;'>Record Modified successfuly</p>";
       $upload = mysqli_query($sql, $update_data);
  
        //if ($upload) {
        //header("location:profil.php?msg=success");
       // header("location:edit-profil.php?msg=danger");
     //}
 };
 ?>
<!DOCTYPE html>
<html lang="en">
<head><?php
if (isset($_SESSION['user'])) :{?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page </title>
    <link rel="stylesheet" href="edit-profile.css">
</head>
<body>
<?php if (isset($_REQUEST['msg'])) : ?>
      <div class="notification is-<?php echo $_REQUEST['msg']?>">
         <button class="delete"></button>
         <?php if ($_REQUEST['msg'] ==='success'):?>
            <p>Your Registration is valid </p>
         <?php elseif ($_REQUEST['msg'] ==='danger'):?>  
            <p>Your Registration is invalid </p>

         <?php endif ?>
      </div>
   <?php endif ?>
 <div class="logout">
     <a href="logout.html"><img src="./assets/img/logout.png" alt="Logout icon"></a>
    </div>
    <div class="container">
        <div class="sidebar">
            <div class="user">
                <img src="./assets/img/user .png" alt="user profile picture" class="img">
            </div>
            <div class="action">
                <center>
                    <a href="profil.php" class="edit-btn">Profile</a>
                </center>
            </div>
        </div>
    <div class="page">
        <div class="header">
            <img src="./assets/img/user .png" alt="LOGO">
        </div>
        <?php
      
      //$select = mysqli_query($sql, "SELECT * FROM ens WHERE id = '$id'");
      //while($row = mysqli_fetch_assoc($select)){

       ?>
        <div class="page-inner">      
             <h3>Modifier Profile</h3>
            <form action="edit-profile.php" method="POST" class="form" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">NOM :</label>
                    <input type="text" value= "<?php echo $_SESSION['user']['username']?>" id="title" name="nom">
                </div>
                <div class="form-group">
                    <label for="title">FACULTE :</label>
                    <input type="text" value= "<?php echo $_SESSION['user']['fac'] ?>" id="title" name="fac">
                </div>
                <div class="form-group">
                    <label for="title">DEPARTEMENT :</label>
                    <input type="text" value= "<?php echo  $_SESSION['user']['dep']?>" id="title" name="dep">
                </div>
                <div class="form-group">
                    <label for="skills">TELEFONE  :</label>
                    <input type="text" id="skills" value="<?php echo $_SESSION['user']['tel'] ?>" name="tel">
                </div>
                <div class="form-group">
                    <label for="email">NOUVEAU MOT DE PASS :</label>
                    <input type="password" id="email" value="<?php echo $_SESSION['user']['password'] ?>" name="nmp">
                </div>
                <!--<div class="form-group">
                    <label for="email">CONFIRMER MOT DE PASS :</label>
                    <input type="password" id="email" value="<?php echo $_SESSION['user']['password'] ?>" name="cmp">
                </div>-->
                <div class="form-group">
                <input type="hidden" id="<?php  echo $_SESSION['user']['id']?>" name="id" value="">
                    
                </div>
                <div class="form-group">
                    <label for="about">A PROPOS :</label>
                    <textarea name="about" id="about" cols="30" rows="10"><?php echo $_SESSION['user']['propos'] ?></textarea>
                </div>
                <button class="button is-link" name="">update_profile</button>
          </form>
   
                
          
            </form>
        </div>
    </div>
    <?php } ?> 
    <?php endif?> 
</div>
