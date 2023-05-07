<?php
session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
    $username = $_SESSION["username"];
    session_write_close();
} else {
    // since the username is not set in session, the user is not-logged-in
    // he is trying to access this page unauthorized
    // so let's clear all session variables and redirect him to index
    session_unset();
    session_write_close();
    $url = "./index.php";
    header("Location: $url");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Staff DashBoard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <?php 

  require_once("connection.php");
  $query = " SELECT * FROM project,team,staff WHERE project.projectid=team.projectid and staff.email=project.guideemail and team.guidename='$username'";
  $query2 = " SELECT * FROM logs WHERE guideemail='$email'";
  $result = mysqli_query($con,$query);
  $result2 = mysqli_query($con,$query2);

  ?>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <div class="profile">
        <img src="assets/img/CMRIT logo.png">
        <h1 class="text-light"><?php echo $username;?></h1>
        
      </div>

      <nav id="navbar" class="nav-menu navbar" style=" padding-top: 30px;margin: 0;">
        <ul>
          <li><a href="../index.php" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>

          <li><a href="project-details.php" onclick="#endForm()" class="nav-link scrollto"><i class="bi bi-graph-up"></i> <span> Submit Project Titles</span></a></li>

          <li><a href="#" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li><br><br>

          <li style="font-size:20px;padding-left:14px; padding-top:10px;color:white;"><p>🔔 Notice !!!
              </p><br>
              <p style="font-size:15px;">
                <?php
                $sn = 1;
                while($row=mysqli_fetch_assoc($result2))
                {
                  $project_title = $row['projecttitle'];
                  echo $sn++.". Project ".$project_title." is rejected.\n";
                }
                ?>
              </p>
          </li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="hero-container" data-aos="fade-in">
      <h1>Hi!</h1>
      <p>Scroll the page <span class="typed" data-typed-items=" for updating project status !, to assign marks !, check on students !"></span></p>
      <p>Review 1 is scheduled on 13/05/2023 !</p>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="container">
                      
                                
          <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-body text-center">
                      <h5 class="card-title m-b-0">DETAILS OF YOUR CHOOSEN MINI PROJECT</h5>
                  </div>
                      <div class="table-responsive">
                          <table class="table">
                              <thead class="thead-light">
                                  <tr>
                                      
                                      <th scope="col">Project ID</th>
                                      <th scope="col">Project Title</th>
                                      <th scope="col">Team No</th>
                                      <th scope="col">Team Lead</th>
                                      <th scope="col"><button onclick="openForm1()" style="background-color:#d7f1f7; border-radius: 5%;">Review 1 Marks</button></th>
                                      <th scope="col"><button onclick="openAnotherForm1()" style="background-color:#d7f1f7; border-radius: 5%;">Review 1 Date</button></th>
                                      <th scope="col"><button onclick="openForm2()" style="background-color:#d7f1f7; border-radius: 5%;">Review 2 Marks</button></th>
                                      <th scope="col"><button onclick="openAnotherForm2()" style="background-color:#d7f1f7; border-radius: 5%;">Review 2 Date</button></th>
                                      <th scope="col"><button onclick="openForm3()" style="background-color:#d7f1f7; border-radius: 5%;">Review 3 Marks</button></th>
                                      <th scope="col">Final Marks </th>
                                      <th scope='col'>PI </th>
                                      <th scope="col">Report URL </th>
                                     

                                  </tr>
                                  

                              </thead>
                              <tbody class="customtable">
                              <?php 
                                    $review1deadline=13;
                                    $review2deadline=14;
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $projectId = $row['projectid'];
                                        $projectTitle = $row['projecttitle'];
                                        $projectDescription = $row['projectdescription']; 
                                        $teamNo = $row['teamno'];
                                        $teamLead = $row['leadname'];
                                        $review1 = $row['review1'];
                                        $review2 = $row['review2'];
                                        $review3 = $row['review3'];
                                        $review1date = $row['review1date'];
                                        $review2date = $row['review2date'];
                                        

                                        if ($review1!=0 AND $review2!=0 AND $review3!=0) {
                                          $total = ceil(($review1+$review2+$review3)/3);
                                        } else {
                                          $total = 'TBD';
                                        }
                                        $report = $row['report'];

                                        if($review1date !=0 AND $review2date!=0){
                                          $pi = (($review1date-$review1deadline)+($review2date-$review2deadline))*0.049;
                                        } else if($review1date !=0 AND $review2==0){
                                          $pi = ($review1date-$review1deadline)*0.098;
                                        } else {
                                          $pi = 'TBD';
                                        }

                                        if($pi>0.5){
                                           $bgColor = '#fc304b';
                                        }else{
                                           $bgColor = '#2ce660';
                                        }
                                        
                                       
                            ?>        
                            <?php 
                                      
                             ?>
                             
                             <?php 
                                    
                                        
                            ?>
                                    <tr style="background-color: <?php echo $bgColor; ?>">
                                        <td><?php echo $projectId ?></td>
                                        <td><?php echo $projectTitle ?></td>
                                        <td><?php echo $teamNo ?></td>
                                        <td><?php echo $teamLead ?></td>
                                        <td><?php echo $review1 ?></td>
                                        <td><?php echo $review1date ?></td>
                                        <td><?php echo $review2 ?></td>
                                        <td><?php echo $review2date ?></td>
                                        <td><?php echo $review3 ?></td>
                                        <td><?php echo $total ?></td>
                                        <td><?php echo $pi ?></td>
                                        <td><a href="<?php echo $report ?>"><?php echo "Team-".$teamNo." Report" ?> </a></td>
                                    </tr>        
                            <?php 
                                     } 
                             ?>
                                  
                              </tbody>
                          </table>
                          
                      </div>
                      
              </div>
          </div>
         <!-- <button onclick="openForm()" style="width:300px; margin-left:400px; margin-top:20px"><strong>Add Review Marks</strong></button>
          <div class="loginPopup">
                  <div class="formPopup" id="popupForm">
                    <form action="insert2.php" class="formContainer" method="post">
                      <h2>Add details</h2>
                      <label for="projectid">
                        <strong>Project ID:</strong>
                      </label>
                      <input type="text" id="projectid" placeholder="Project ID" name="projectid" required>
                      <label for="review1">
                        <strong>Review1 Marks:</strong>
                      </label>
                      <input type="int" id="review1" placeholder="Review1 Marks" name="review1" required>
                      <label for="review2">
                        <strong>Review2 Marks:</strong>
                      </label>
                      <input type="int" id="review2" placeholder="Review2 Marks" name="review2" required>
                      <label for="review3">
                        <strong>Review3 Marks:</strong>
                      </label>
                      <input type="int" id="review3" placeholder="Review3 Marks" name="review3" required>
                      <button type="submit" class="btn">Submit</button>
                      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                  </div>
                </div>

                <button onclick="openAnotherForm()" style="width:300px; margin-left:400px; margin-top:20px"><strong>Add Review Dates</strong></button>
          <div class="loginPopup">
                  <div class="formPopup" id="popupForm1">
                    <form action="insert4.php" class="formContainer" method="post">
                      <h2>Add details</h2>
                      <label for="projectid">
                        <strong>Project ID:</strong>
                      </label>
                      <input type="text" id="projectid" placeholder="Project ID" name="projectid" required>
                      <label for="review1date">
                        <strong>Review1 Date:</strong>
                      </label>
                      <input type="int" id="review1date" placeholder="Review1 Date" name="review1date" required>
                      <label for="review2date">
                        <strong>Review2 Date:</strong>
                      </label>
                      <input type="int" id="review2date" placeholder="Review2 Date" name="review2date" required>
                      <button type="submit" class="btn">Submit</button>
                      <button type="button" class="btn cancel" onclick="closeAnotherForm()">Close</button>
                    </form>
                  </div>
                </div>-->

      </div>
      
         </div> 

         <div class="loginPopup">
                  <div class="formPopup" id="popupForm1">
                    <form action="insert21.php" class="formContainer" method="post">
                      <h2>Add details</h2>
                      <label for="projectid">
                        <strong>Project ID:</strong>
                      </label>
                      <input type="text" id="projectid" placeholder="Project ID" name="projectid" required>
                      <label for="reviewMarks">
                        <strong>Enter Review 1 Marks:</strong>
                      </label>
                      <input type="int" id="review1" placeholder="Review 1 Marks" name="review1" required>
                      <button type="submit" class="btn">Submit</button>
                      <button type="button" class="btn cancel" onclick="closeForm1()">Close</button>
                    </form>
                  </div>
                </div>

                <div class="loginPopup">
                  <div class="formPopup" id="popupForm2">
                    <form action="insert22.php" class="formContainer" method="post">
                      <h2>Add details</h2>
                      <label for="projectid">
                        <strong>Project ID:</strong>
                      </label>
                      <input type="text" id="projectid" placeholder="Project ID" name="projectid" required>
                      <label for="reviewMarks">
                        <strong>Enter Review 2 Marks:</strong>
                      </label>
                      <input type="int" id="review2" placeholder="Review 2 Marks" name="review2" required>
                      <button type="submit" class="btn">Submit</button>
                      <button type="button" class="btn cancel" onclick="closeForm2()">Close</button>
                    </form>
                  </div>
                </div>

                <div class="loginPopup">
                  <div class="formPopup" id="popupForm3">
                    <form action="insert23.php" class="formContainer" method="post">
                      <h2>Add details</h2>
                      <label for="projectid">
                        <strong>Project ID:</strong>
                      </label>
                      <input type="text" id="projectid" placeholder="Project ID" name="projectid" required>
                      <label for="reviewMarks">
                        <strong>Enter Review 3 Marks:</strong>
                      </label>
                      <input type="int" id="review3" placeholder="Review 3 Marks" name="review3" required>
                      <button type="submit" class="btn">Submit</button>
                      <button type="button" class="btn cancel" onclick="closeForm3()">Close</button>
                    </form>
                  </div>
                </div>

                <div class="loginPopup">
                  <div class="formPopup" id="popupForm4">
                    <form action="insert41.php" class="formContainer" method="post">
                      <h2>Add details</h2>
                      <label for="projectid">
                        <strong>Project ID:</strong>
                      </label>
                      <input type="text" id="projectid" placeholder="Project ID" name="projectid" required>
                      <label for="review1date">
                        <strong>Enter Review 1 Date:</strong>
                      </label>
                      <input type="int" id="review1date" placeholder="Review 1 Date" name="review1date" required>
                      
                      <button type="submit" class="btn">Submit</button>
                      <button type="button" class="btn cancel" onclick="closeAnotherForm1()">Close</button>
                    </form>
                  </div>
                </div>

                <div class="loginPopup">
                  <div class="formPopup" id="popupForm5">
                    <form action="insert42.php" class="formContainer" method="post">
                      <h2>Add details</h2>
                      <label for="projectid">
                        <strong>Project ID:</strong>
                      </label>
                      <input type="text" id="projectid" placeholder="Project ID" name="projectid" required>
                      <label for="review2date">
                        <strong>Enter Review 2 Date:</strong>
                      </label>
                      <input type="int" id="review2date" placeholder="Review 2 Date" name="review2date" required>
                      
                      <button type="submit" class="btn">Submit</button>
                      <button type="button" class="btn cancel" onclick="closeAnotherForm2()">Close</button>
                    </form>
                  </div>
                </div>

        

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CMRIT</span></strong>
      </div>
      <div class="credits">
        
        Designed by Sreya Reddy N</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script>
    function openForm1() {
      document.getElementById("popupForm1").style.display = "block";
    }
    function openForm2() {
      document.getElementById("popupForm2").style.display = "block";
    }
    function openForm3() {
      document.getElementById("popupForm3").style.display = "block";
    }
    function closeForm1() {
      document.getElementById("popupForm1").style.display = "none";
    }
    function closeForm2() {
      document.getElementById("popupForm2").style.display = "none";
    }
    function closeForm3() {
      document.getElementById("popupForm3").style.display = "none";
    }
    function openAnotherForm1() {
      document.getElementById("popupForm4").style.display = "block";
    }
    function openAnotherForm2() {
      document.getElementById("popupForm5").style.display = "block";
    }
    function closeAnotherForm1() {
      document.getElementById("popupForm4").style.display = "none";
    }
    function closeAnotherForm2() {
      document.getElementById("popupForm5").style.display = "none";
    }
    function endForm() {
      alert("You cannot Submit the projects anymore!!!")
    }
    
  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>