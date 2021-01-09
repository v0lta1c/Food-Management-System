<?php
session_start();

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); //Redirecting to myrestaurant Page
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">


    <title>Home</title>
	
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/restaurantlist.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/theme.css">
	
    <!--<link rel="stylesheet" type = "text/css" href ="css/myrestaurant.css">-->
    <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
	<link rel="stylesheet" type = "text/css" href ="css/restaurantlist.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>



</head>
<body>

  <!--Back to top button..................................................................................-->
  <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  <!--Javacript for back to top button....................................................................-->
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Hungry Kya?</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>

          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
            <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li class="active" ><a href="foodlist.php"><span class="glyphicon glyphicon-cutlery"></span> Food Zone </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart  (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>) </a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> User Sign-up</a></li>
              <li> <a href="managersignup.php"> Manager Sign-up</a></li>
              <li> <a href="#"> Admin Sign-up</a></li>
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> User Login</a></li>
              <li> <a href="managerlogin.php"> Manager Login</a></li>
              <li> <a href="#"> Admin Login</a></li>
            </ul>
            </li>
          </ul>

<?php
}
?>


        </div>

      </div>
    </nav>



    <!--<section class="rest">-->
	
        
                <?php

                require 'connection.php';
                $conn = Connect();
				
				//Get images
				$rand_img = array("images/rand_img_1.jpg","images/rand_img_2.jpg","images/rand_img_3.jpg","images/rand_img_4.jpg","images/rand_img_5.jpg","images/rand_img_6.jpg","images/rand_img_7.jpg","images/rand_img_8.jpg","images/rand_img_9.jpg","images/rand_img_10.jpg","images/rand_img_11.jpg");
                $sql = "SELECT * FROM restaurants"; //Select all from restaurant table
                $result = mysqli_query($conn, $sql);
                $arr = [];
                $i = 0;
                if (mysqli_num_rows($result) > 0)
                {

                while($row = mysqli_fetch_assoc($result)){
					$index = rand(0,10);
                ?>
                <a href="foodlist.php?rid=<?php echo $row['R_ID'] ?>">
				<!--<img src="images/bullet-point-symbol.png" alt="" title="" width="50" height="50"><?php echo $row['name'] ?><br>-->
				
				<div class="container">
				  <img src="<?php echo $rand_img[$index] ?>" alt="<?php echo $index ?>" width="300" height="200">
				  <button class="btn"><?php echo $row['name'] ?></button>
				</div><br><br>
                <!--
				<div class="mbr-gallery-row" >
                    <div class="mbr-gallery-layout-default">
                        <div class="mbr-gallery-item">
                            <div><img src="images/bullet-point-symbol.png" alt="" title="" width="50" height="50"><span
                                    class="mbr-gallery-title mbr-fonts-style display-7"><?php echo $row['name'] ?><br>
                                    <!-- Rating 
                                    </div>
                        </div>
                    </div>
                </div>
				-->
            </a>
            <?php
}
}
    ?>
	<!--</div>-->
    <!--</section>-->


    <script src="js/jquery.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/gallery.js"></script>
    


</body>
<!--
  <footer class="container-fluid bg-4 text-center">
  <br>
  <p> HungryKya? 2020 | &copy All Rights Reserved </p>
  <br>
  </footer>
-->
</html>
