<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SkyTech Automotive</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <style>
    .ok-message {
      color: greenyellow;
    }
  </style>

</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="contact_nav">
            <a href="">
              <i class="fa fa-phone" aria-hidden="true"></i>
              <span>
                Call : +968 91111111
              </span>
            </a>
            <a href="">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <span>
                Email : demo@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              <span>
                <img src="./images/logo.png" style="height: 50px;" alt="">
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="schedule.php">schedule an appointment</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="funpage.html">funpage</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.html">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Questionnairepage.php">Questionnaire page</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="bestworker.php">best worker</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="billCalculator.html">Bill Calculator</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- contact section -->
  <?php
    // insert to db table.
    $ok = false;// for send message
    if (isset($_POST["name"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST['phone'];
        $car_brand = $_POST['car_brand'];
        $car_name = $_POST['car_name'];
        $car_model = $_POST['car_model'];
        $message = $_POST['message'];


        $server_name = "ulsq0qqx999wqz84.chr7pe7iynqr.eu-west-1.rds.amazonaws.com"; $username = "xe2ge1qqbdrgxdx6";
        $password = "inio92922tfakvh4"; $dbname = "seklrqnnhsqij64j";
        $conn = mysqli_connect($server_name, $username, $password, $dbname);
        if (!$conn) {
        die("Connection failed: ". 
            mysqli_connect_error());
        }


        $sql = "INSERT INTO `appointments` 
        (`name`, `phone`, `email`, `car_brand`, `car_name`, `car_model`, `message`)
        VALUES
        ('{$name}', '{$phone}', '{$email}', '{$car_brand}', '{$car_name}', {$car_model}, '{$message}')";
        $result = mysqli_query($conn, $sql);
        $ok = true;
    }
?>
  <section class="contact_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2 style="text-align: center;">
            schedule an appointment
        </h2>
      </div>
      <div class="">
        <div class="">
          <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
            <div>
              <input style="color: black;" type="text" placeholder="Name" name="name" required/>
            </div>
            <div>
              <input style="color: black;" type="text" placeholder="Phone Number" name="phone" required/>
            </div>
            <div>
              <input style="color: black;" type="email" placeholder="Email" name="email" required/>
            </div>
            <div>
                <input style="color: black;" type="text" placeholder="Car brand" name="car_brand" required/>
              </div>
              <div>
                <input style="color: black;" type="text" placeholder="Car name" name="car_name" required/>
              </div>
              <div>
                <input style="color: black;" type="text" placeholder="Car model" name="car_model" required/>
              </div>
              <div>
                <input style="color: black;" type="text" class="message-box" placeholder="what the services you want" name="message" required/>
              </div>
            <div class="d-flex ">
              <button type="submit">
                SEND
              </button>
            </div>
            <div class="ok-message">
              <?php
              if ($ok) {
                echo "Appointment has been scheduled!";
              }
              ?>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->


  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <h4>
        Get In Touch
      </h4>
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <div class="info_items">
            <div class="row">
              <div class="col-md-4">
                <a href="">
                  <div class="item ">
                    <div class="img-box ">
                      <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <p>
                      6Th alkhod, Al seeb, Muscat
                    </p>
                  </div>
                </a>
              </div>
              <div class="col-md-4">
                <a href="">
                  <div class="item ">
                    <div class="img-box ">
                      <i class="fa fa-phone" aria-hidden="true"></i>
                    </div>
                    <p>
                      +968 91111111
                    </p>
                  </div>
                </a>
              </div>
              <div class="col-md-4">
                <a href="">
                  <div class="item ">
                    <div class="img-box">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <p>
                        s136382@student.squ.edu.om
                    </p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="social-box">
      <h4>
        Follow Us
      </h4>
      <div class="box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
      </div>
    </div>
  </section>



  <!-- end info_section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        &copy; <span id="displayDateYear"></span> SkyTech 2023 C
        
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <!-- End Google Map -->


</body>

</html>