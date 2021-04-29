<!DOCTYPE html>
<html>
<head>
	<title>view</title>
</head>
<body>

         <a href="index.php">&#8592;</a>

         <?php

            $sql = "SELECT * FROM images ORDER BY id DESC";
            $RES = mysqli_query($conn,$sql);

            if (mysqli_num_rows($RES) > 0 ) {
            while($images = mysqli_fetch_assoc($RES)){ ?>

                 <div class="alb">

                 	<img src="uploasds/<?=$images['image_url']?>">
                 </div>

           <?php	} }?>
</body>
</html>