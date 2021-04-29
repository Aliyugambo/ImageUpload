<!DOCTYPE html>
<html lang="en">
<?php
include "connection.php";
if(isset($_POST['submit']) && isset($_FILES['my_image']))
{ 

 $img_name = $_FILES['my_image']['name'];
 $img_size =  $_FILES['my_image']['size'];
$tmp_name =  $_FILES['my_image']['tmp_name'];
 $error =  $_FILES['my_image']['error'];
if($error ===0 ){

                     if($img_size >1250000){

                          echo "Sorry, your file is to large.";
                          // header("Location: add-students.php?error=$em");

                     }else{
                       $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                       $img_ex_lc = strtolower($img_ex);

                       $allowed_exs = array("jpg","jpeg","png");

                       if(in_array( $img_ex_lc, $allowed_exs)){

                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = 'uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);
                        


                        // inserting Image into DATEBASE
                          $sql = "INSERT INTO images(image_url) VALUES($new_img_name)";
                          mysqli_query($conn, $sql);
                          echo "successfully uploaded";

                    }else{
                     echo "You cant Upload file of this type";
                       }
                }
            }else{
                echo "No file is Selected";
             }

}
  
?>
<head>
<TITLE>jQuery Dependent Image Uploading File</TITLE>
<head>
<link href="./assets/css/style.css" rel="stylesheet" type="text/css" />
<script src="./vendor/jquery/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/ajax-handler.js" type="text/javascript"></script>
</head>
<body>
  <center>
     <form method="POST" enctype="multipart/form-data">
    <div class="frmDronpDown">
        <div class="row">
         
            <label>Image Upload:</label><br /> 
            <input type="file" name="my_image" >
             <input type="submit" name="submit" value="upload">
           
        </div>
       
           
        
    </div>
      </form>
  </center>
</body>
</html>