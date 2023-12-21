
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Worker Management</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
      .error-message {
            color: red;
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
                    <li class="nav-item">
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
                    <li class="nav-item active">
                        <a class="nav-link" href="bestworker.php">best worker</a>
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="billCalculator.html">Bill Calculator</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="contact.html">Contact Us</a>
                    </li>
                  </ul>؛
                </div>
              </nav>
            </div>
          </div>
        </header>
        <!-- end header section -->
      </div>

<div style="padding-bottom: 2cm;" class="container mt-5">
<?php
  class Worker {
    public $name;
    public $pos;
    public $perf;
    public $review;
    function __construct($name, $pos, $perf, $review) {
      $this->name = $name;
      $this->pos = $pos;
      $this->perf = $perf;
      $this->review = $review;
    }
    function get_name() {
      return $this->name;
    }
    function get_pos() {
      return $this->pos;
    }
    function get_perf() {
      return $this->perf;
    }
    function get_review() {
      return $this->review;
    }
  }
?>

    <!-- Worker Table -->
    <table class="table table-bordered" id="workerTable">
        <thead class="thead-dark">
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Performance</th>
                <th>User Review</th> <!-- New Column for User Review -->
            </tr>
        </thead>
        <tbody id="workerTableBody" style="text-align: center;">
        <?php
          $server_name = "ulsq0qqx999wqz84.chr7pe7iynqr.eu-west-1.rds.amazonaws.com"; $username = "xe2ge1qqbdrgxdx6";
          $password = "inio92922tfakvh4"; $dbname = "seklrqnnhsqij64j";
          $conn = mysqli_connect($server_name, $username, $password, $dbname);
          if (!$conn) {
            die("Connection failed: ". 
                mysqli_connect_error());
          }
          $sql = "SELECT * FROM seklrqnnhsqij64j.workers";
          // if search for worker.
          if (isset($_POST["search"])) {
            if ($_POST["search"] != "") {
            $sql .= " where name='".$_POST["search"]."'";
          }}
          // end if search for worker.
          $workers = array();//array of Worker object.
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){ 
                // push worker objects to workers array
                array_push($workers, new Worker($row["name"], $row["position"], $row["performance"], $row["review"]));
             }
          }
          // add workers to the table
          foreach ($workers as $worker) {
            echo "<tr>".
                   "<td>". $worker->get_name() ."</td>".
                   "<td>". $worker->get_pos() ."</td>".
                   "<td>". $worker->get_perf() ."/10</td>".
                   "<td>". $worker->get_review() ."</td>".
                   "</tr>";
          }

         ?>
        </tbody>
    </table>

    <!-- Form for adding a worker -->
    <form id="addWorkerForm" method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <div class="form-group">
            <label for="workerName">Name:</label>
            <input type="text" class="form-control" id="workerName" name="name" required>
            <div class="error-message">
            <?php
            // name validation
            $isnamed = true;
            if (isset($_POST["name"])){
                if (strlen($_POST["name"]) > 25){
                    echo "name < 26";
                    $isnamed = false;
                }
            }
            ?>
            </div>

        </div>

        <div class="form-group">
            <label for="workerPosition">Position:</label>
            <input type="text" class="form-control" id="workerPosition" name="pos" required>
            <div class="error-message">
            <?php
            // Position validation
            $ispos = true;
            if (isset($_POST["pos"])){
                if (strlen($_POST["pos"]) > 25){
                    echo "Position < 26";
                    $ispos = false;
                }
            }
            ?>
            </div>
        </div>

        <div class="form-group">
            <label for="workerPerformance">Performance:</label>
            <input type="number" class="form-control" id="workerPerformance" name="perf" required>
            <div class="error-message">
            <?php
            // Performance validation
            $isperf = true;
            if (isset($_POST["perf"])){
                if (!is_numeric($_POST["perf"])){// if empty
                    echo "not valid";
                    $isperf = false;
                }
                //if out of range
                if (is_numeric($_POST["perf"]) and (0 > $_POST["perf"] or $_POST["perf"] > 10)){
                  echo "perforamne must in range 0-10";
                  $isperf = false;
                }
            }
            ?>
            </div>
        </div>

        <div class="form-group">
            <label for="userReview">User Review:</label>
            <textarea class="form-control" id="userReview" name="review" rows="2" required></textarea>
        </div>

        <input type="submit" class="btn btn-primary" value="Add Worker">
      </form>
    <?php
    // add new worker review
    if (!$isnamed or !$ispos or !$isperf){
      exit();
    }
    if (isset($_POST["name"])) {
      $worker = new Worker($_POST["name"], $_POST["pos"], $_POST['perf'], $_POST['review']);
      $sql = "insert into workers (name, position, performance, review) values
       (\"{$worker->get_name()}\", \"{$worker->get_pos()}\" , {$worker->get_perf()}, \"{$worker->get_review()}\")";
      $result = mysqli_query($conn, $sql);
      // end add new worker review
    } 
    ?>
    <!-- Form for searching for a worker -->
    <form id="searchWorkerForm"  method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <div class="form-group">
            <label for="searchName">Search by Name:</label>
            <input type="text" class="form-control" id="searchName" name="search">
        </div>
        <input  class="btn btn-info" type="submit" value="Search Worker">
    </form>
</div>
<section class="info_section">
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

<!-- Add Bootstrap JS and Popper.js scripts (required for some Bootstrap features) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    // Object type for a worker
    function Worker(name, position, performance, userReview) {
        this.name = name;
        this.position = position;
        this.performance = performance;
        this.userReview = userReview;
    }

    // Array to store worker information
    let workersArray = [];
    function before(){
        const tableBody = document.getElementById('workerTableBody');
        for (let i = 0; i < tableBody.rows.length; i++){
          const row = tableBody.rows[i].cells;
          let name = row[0].innerHTML;
          let pos = row[1].innerHTML;
          let strs = row[2].innerHTML;
          let message = row[3].innerHTML;
          workersArray.push(new Worker(name, pos, strs, message));
        }
      }
    before();

    // Function to dynamically display information in a table
    function displayTable(dataArray) {
        const tableBody = document.getElementById('workerTableBody');
        tableBody.innerHTML = ''; // Clear existing rows

        dataArray.forEach(worker => {
            const row = tableBody.insertRow();
            row.insertCell(0).textContent = worker.name;
            row.insertCell(1).textContent = worker.position;
            row.insertCell(2).textContent = worker.performance;
            row.insertCell(3).textContent = worker.userReview;
        });
    }

    // Function to add a worker to the array and update the table
    function addWorker() {
        const name = document.getElementById('workerName').value;
        const position = document.getElementById('workerPosition').value;
        const performance = document.getElementById('workerPerformance').value;
        const userReview = document.getElementById('userReview').value;
    
        const worker = new Worker(name, position, performance, userReview);
    
        workersArray.push(worker);
        displayTable(workersArray);
    
        // Reset the form
        document.getElementById('addWorkerForm').reset();
    }

    // Function to search for a worker by name
    function searchWorker() {
        const searchName = document.getElementById('searchName').value.toLowerCase();

        // Search in the array
        const foundWorker = workersArray.find(worker => worker.name.toLowerCase() === searchName);

        if (foundWorker) {
            displayTable([foundWorker]);
        } else {
            alert('Worker not found!');
        }
    }

</script>

</body>
</html>
