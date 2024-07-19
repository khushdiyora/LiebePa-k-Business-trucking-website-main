<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tracking_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if AWB number is submitted through POST
if (isset($_POST['awbNumber'])) {
    $awbNumber = $_POST['awbNumber'];

    // Prepare SQL query to retrieve shipment details
    $sql = "SELECT * FROM shipments WHERE awb_number=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $awbNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    // HTML start
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Shipment Details</title>
    <link rel="shortcut icon" href="img/logo.png" sizes="16x16 32x32" type="image/x-icon" />
    <link href="css/master.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color1.css" title="color1" media="all" data-default-color="true" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color2.css" title="color2" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color3.css" title="color3" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color4.css" title="color4" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color5.css" title="color5" media="all" />
    <link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/color6.css" title="color6" media="all" />
    <style>
        body {
            font-family:;
        }
        .tracking-container {
            margin: 20px auto;
            max-width: 800px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .tracking-header {
            font-size: 1.5em;
            margin-bottom: 20px;
            text-align: center;
        }
        .tracking-details {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .tracking-section {
            width: 48%;
            margin-bottom: 20px;
        }
        .tracking-label {
            font-weight: bold;
        }
        .status-container {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 4px;
        }
        .no-results {
            text-align: center;
            font-size: 1.2em;
            color: red;
        }
    </style>
</head>
<body data-scrolling-animations="true">
    <div class="sp-body">
      <!-- Loader Landing Page -->
      
      <!-- Loader end -->
      <header id="this-is-top">
        <div class="container-fluid">
          <div class="topmenu row">
            <nav
              class="col-sm-offset-3 col-md-offset-4 col-lg-offset-4 col-sm-6 col-md-5 col-lg-5"
            >
              <a href="company-profile.php">read company profile</a>
              <a href="whyus.html">WHY US</a>
              <a href="pricing/index.html">Pricing</a>
            </nav>
            <nav class="text-right col-sm-3 col-md-3 col-lg-3">
              <a href="tel:+919316890367"><i class="fas fa-phone-alt"></i></a>
                        <a href="mailto:khushdiyora55@gmail.com"><i class="fas fa-envelope"></i></a>
                        <a href="https://www.instagram.com/khushh.d" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100091433931474" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.linkedin.com/in/khushdiyora" target="_blank"><i class="fab fa-linkedin"></i></a>
                        
                        
                        
                        <a href="bussinesscard.html" target="_blank"><i class="fab fa-cc-visa"></i></a>




            </nav>
          </div>
          <div class="row header">
            <div class="col-sm-3 col-md-3 col-lg-3">
              
                <a href="index.html">
                  <img src="img/logo.png" alt="Logo" width="150px" height="150px">
              </a>
            </div>
            <div
              class="col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-sm-8 col-md-8 col-lg-8"
            >
              <div class="text-right header-padding">
                <div class="h-block">
                  <span>EMAIL US</span>LiebePa-Ktransport@gmail.com
                </div>
                <div class="h-block"><span>WORKING HOURS</span> 24 HOURS</div>
                <div class="h-block"><span>WORKING DAYS</span>Mon - Sun</div>
                
                <a class="btn btn-success" href="index.html"
                  >Home</a
                >
                <br>
                <br>
                <a class="btn btn-success" href="contact.html"
                  >CONTACT US TODAY</a
                >
                <br>
              </div>
            </div>
          </div>
          <div id="main-menu-bg"></div>
          <a id="menu-open" href="#"><i class="fa fa-bars"></i></a>
          <nav class="main-menu navbar-main-slide">
            <ul class="nav navbar-nav navbar-main">
              <li><a href="index.html">HOME</a></li>
              <li class="dropdown">
                <a
                  data-toggle="dropdown"
                  class="dropdown-toggle border-hover-color1"
                  href=""
                  >OUR SERVICES <i class="fa fa-angle-down"></i
                ></a>
                <ul class="dropdown-menu">
                  <li><a href="clearance.php">Clearance &amp; Forwading</a></li>
                  <li><a href="road-trucking.php">Road Trucking</a></li>
                  <li><a href="air-freight.php">Air freight</a></li>
                  <li><a href="goods.php">Import &amp; Export of goods</a></li>
                  <li><a href="warehousing.php">Warehousing</a></li>
                  <li>
                    <a href="Supply Chain Solutions.php">Supply Chain</a>
                  </li>
                </ul>
              </li>
              <li><a href="about-us.html">ABOUT US</a></li>

              <li><a href="contact.html">OUR CONTACTS</a></li>
              <li>
                <a class="btn_header_search" href="#"
                  ><i class="fa fa-search"></i
                ></a>
              </li>
            </ul>
            <div class="search-form-modal transition">
              <form class="navbar-form header_search_form">
                <i class="fa fa-times search-form_close"></i>
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search"
                  />
                </div>
                <button type="submit" class="btn btn_search customBgColor">
                  Search
                </button>
              </form>
            </div>
          </nav>
          <a id="menu-close" href="#"><i class="fa fa-times"></i></a>
        </div>
      </header>

        <div class="bg-image page-title">
            <div class="container-fluid">
                <a href="#"><h1>Shipment Details</h1></a>
                <div class="pull-right">
                    <a href="index.html"><i class="fa fa-home fa-lg"></i></a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Shipment Details</a>
                </div>
            </div>
        </div>

        <main>
            <div class="container-fluid block-content">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="tracking-container">
                            <div class="tracking-header">Tracking Result</div>';

    // Check if results are found
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="tracking-details">';
            // Booking Details
            echo '<div class="tracking-section">';
            echo '<p><span class="tracking-label">Booking Details</span></p>';
            echo '<p><span class="tracking-label">Docket No.:</span> ' . (isset($row["docket_no"]) ? htmlspecialchars($row["docket_no"]) : 'N/A') . '</p>';
            echo '<p><span class="tracking-label">From Center:</span><br>' . (isset($row["from_address"]) ? htmlspecialchars($row["from_address"]) : 'N/A') . '<br>' . (isset($row["from_phone"]) ? htmlspecialchars($row["from_phone"]) : 'N/A') . '</p>';
            echo '<p><span class="tracking-label">Booking Date:</span> ' . (isset($row["booking_date"]) ? date("d/m/y h:i A", strtotime($row["booking_date"])) : 'N/A') . '</p>';
            echo '</div>';
            
            // To Center Details
            echo '<div class="tracking-section">';
            echo '<p><span class="tracking-label">To Center</span></p>';
            echo '<p><span class="tracking-label">To Center:</span> ' . (isset($row["to_center"]) ? htmlspecialchars($row["to_center"]) : 'N/A') . '</p>';
            echo '<p><span class="tracking-label">To:</span><br>' . (isset($row["to_address"]) ? htmlspecialchars($row["to_address"]) : 'N/A') . '<br>IN -> ' . (isset($row["delivery_date"]) ? date("d/m/y", strtotime($row["delivery_date"])) : 'N/A') . ' -> ' . (isset($row["delivery_time"]) ? date("h:i A", strtotime($row["delivery_time"])) : 'N/A') . '</p>';
            echo '</div>';

            // Last Center Details
            echo '<div class="tracking-section">';
            echo '<p><span class="tracking-label">Last Center Details</span></p>';
            echo '<p><span class="tracking-label">Center:</span> ' . (isset($row["last_center"]) ? htmlspecialchars($row["last_center"]) : 'N/A') . '</p>';
            echo '<p><span class="tracking-label">Phone:</span> ' . (isset($row["center_phone"]) ? htmlspecialchars($row["center_phone"]) : 'N/A') . '</p>';
            echo '<p><span class="tracking-label">Contact:</span> ' . (isset($row["contact_name"]) ? htmlspecialchars($row["contact_name"]) . ', Mobile: ' . htmlspecialchars($row["contact_mobile"]) : 'N/A') . '</p>';
            echo '<p><span class="tracking-label">Mgr:</span> ' . (isset($row["manager_name"]) ? htmlspecialchars($row["manager_name"]) . ', Ph: ' . htmlspecialchars($row["manager_phone"]) : 'N/A') . '</p>';
            echo '</div>';

            // Status
            echo '<div class="tracking-section status-container">';
            echo '<p><span class="tracking-label">Status:</span> ' . (isset($row["status"]) ? htmlspecialchars($row["status"]) : 'N/A') . '</p>';
            echo '<p><span class="tracking-label">DELIVERED ON:</span> ' . (isset($row["delivery_date"]) ? date("d/m/y", strtotime($row["delivery_date"])) : 'N/A') . '</p>';
            echo '</div>';

            echo '</div>';
        }
    } else {
        echo '<div class="no-results">No results found</div>';
    }

    // HTML end
    echo '                  </div>
                    </div>
                </div>
            </div>
        </main>

        

    <footer>
        <div class="color-part2"></div>
        <div class="color-part"></div>
        <div class="container-fluid">
          <div class="row block-content">
            <div class="col-sm-4 wow zoomIn" data-wow-delay="0.3s">
              <a href="index.html">
                <img src="img/logo.png" alt="Logo" width="200px" height="200px">
            </a>
              <p>
                LiebePa-K Transport Inc. We provides comprehensive cargo care, cargo
                movement & project management
              </p>
              <div class="footer-icons">
                <a href="tel:+919316890367"><i class="fas fa-phone-alt"></i></a>
                        <a href="mailto:khushdiyora55@gmail.com"><i class="fas fa-envelope"></i></a>
                        <a href="https://www.instagram.com/khushh.d" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.facebook.com/profile.php?id=100091433931474" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.linkedin.com/in/khushdiyora" target="_blank"><i class="fab fa-linkedin"></i></a>
                        <a href="bussinesscard.html" target="_blank"><i class="fab fa-cc-visa"></i></a>
              </div>
              <a href="contact.html" class="btn btn-lg btn-danger"
                >CONTACT US TODAY</a
              >
            </div>
            <div class="col-sm-2 wow zoomIn" data-wow-delay="0.3s">
              <h4>WHAT WE OFFER</h4>
              <nav>
                <a href="clearance.php">Clearance &amp; Forwading</a>
                <a href="road-trucking.php">Road Trucking</a>
                <a href="air-freight.php">Air freight</a>
                <a href="goods.php">Import &amp; Export of goods</a>
                <a href="warehousing.php">Warehousing</a>
                
                  <a href="Supply Chain Solutions.php">Supply Chain</a>
                
              </nav>
            </div>
            <div class="col-sm-2 wow zoomIn" data-wow-delay="0.3s">
              <h4>MAIN LINKS</h4>
              <nav>
                <a href="index.html">Home</a>
                <a href="#">Our Services</a>
                <a href="about-us.html">About Us</a>

                <a href="contact.html">Contact</a>
              </nav>
            </div>
            <div class="col-sm-4 wow zoomIn" data-wow-delay="0.3s">
              <h4>CONTACT INFO</h4>
              Everyday is a new day for us and we work really hard to satisfy
              our customers everywhere.
              <div class="contact-info">
                <span
                  ><br><i class="fa fa-location-arrow"></i
                  ><strong>LiebePa-K Transport Inc.</strong><br />Address : 3032 south sg road unit P GIFT CITY 382426</span
                >
                <span
                  ><i class="fa fa-phone"></i>MC: 9316890367 | DOT : 8780497604
                </span>
                <span
                  > <a href="mailto:khushdiyora55@gmail.com"><i class="fas fa-envelope"></i>LiebePa-Ktransport@gmail.com</span
                ></a>
                <span><i class="fa fa-clock-o"></i>Mon - Sun 24 HOURS</span>
              </div>
            </div>
          </div>
          <div class="copy text-right">
            <a id="to-top" href="#this-is-top"
              ><i class="fa fa-chevron-up"></i></a
            >Created by <a href="#">#Khush</a> &copy; 2022 All rights
            reserved.
          </div>
        </div>
      </footer>
    </div>
    <!--Main-->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modernizr.custom.js"></script>

    <script src="assets/rendro-easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.easypiechart.min.js"></script>
    <!-- Loader -->
    <script src="assets/loader/js/classie.js"></script>
    <script src="assets/loader/js/pathLoader.js"></script>
    <script src="assets/loader/js/main.js"></script>
    <script src="js/classie.js"></script>
    <!--Switcher-->
    <script src="assets/switcher/js/switcher.js"></script>
    <!--Owl Carousel-->
    <script src="assets/owl-carousel/owl.carousel.min.js"></script>
    <!-- SCRIPTS -->
    <script
      type="text/javascript"
      src="assets/isotope/jquery.isotope.min.js"
    ></script>
    <!--Theme-->
    <script src="js/jquery.smooth-scroll.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/smoothscroll.min.js"></script>
    <script src="js/theme.js"></script>
  </body>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
</html>';

    $stmt->close();
} else {
    // Redirect to track.html if no AWB number is submitted
    header("Location: track.html");
    exit();
}

$conn->close();
?>