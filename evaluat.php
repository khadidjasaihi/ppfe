<?php 
    
    include('conn.php');
    include('filelogic.php');
    
    $msg = "";
     session_start();  

    if(isset($_POST['valider'])){
       $rap = $_POST['rappor'];
        $cours = $_POST['ident'];
        $cheakyes = $_POST['yesplace'];
        $cheakno = $_POST['noplace'];
       $reserve = $_POST['reservation'];
       if($rap == "" && $cours==""&&($cheakyes == "" && $cheakno == "" )) {
            $msg = '<p style="color: red; text-align: center;">Invalid parameters</p>';
        }
        else {
             
            if($_POST['yesplace']=="yes"){
                $addUser = "UPDATE `cours` SET `rapport`='$rap',`valider`=' $cheakyes',`reservation`='$reserve' WHERE `id_cour`='$cours'";
            $result  = mysqli_query($sql, $addUser);
            
            }elseif($_POST['noplace']=="no"){
                $addUser = "UPDATE `cours` SET `rapport`='$rap',`valider`=' $cheakno',`reservation`='$reserve' WHERE `id_cour`='$cours'";
            $result  = mysqli_query($sql, $addUser);
            }
            
            if($result){
                $msg = "your evaluation has been sent";
            }else{
               $msg = "Something went wrong";
            }
        }
    }
    
        
    


?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />-->
    <title>evaluate</title>
    <link rel="stylesheet" href="evaluat.css">
</head>
<body>
    <div class="container">
        <div class="wrapper">
          <?php if (isset($_SESSION['eva'])) : ?>
           <h1>Evaluation</h1>
            <div class="nom">
                <h2>Le Cours:</h2>
                <a href="evaluat.php?file_id=<?php
            echo $_SESSION['eva']['id']?>">Download</a>
            </div>
             <div class="comment">
                <form  class="form"  method="POST" >
                    <form action="" class="form"method="POST">
                        <h3>Rapport :</h3>
                        <textarea   id="res" name="rappor" rows="4" cols="50"></textarea>
                    </form>
                </form>
           </div>
           <div class="validation">
                 <h3>Valider ce cours :</h3>
               <form action="" class="form" method="POST">
                    <input type="checkbox" id="vehicle1" name="yesplace" value="yes">
                    <label for="vehicle1"> OUI</label><br>
                    <input type="checkbox" id="vehicle2" name="noplace" value="no">
                    <label for="vehicle2"> NON</label><br>
                    <form action="evaluat.php" class="form"  method="POST" >
                        <form action="" class="form">
                            <h3>Réservation :</h3>
                            <textarea id="reserve" name="reservation" rows="4" cols="50"></textarea>

                            <center>
                                 <button  type="submit" name="valider"   >Valider</button>
                            </center>
                            <?php echo $msg;?>
                         </form>
                    </form>
               </form>      
           </div>           
       </div>
   </div>
   
  <?php endif ?>
</body>
</html>

                    
