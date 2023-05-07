<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Project-Details</title>
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
  <?php 
    require_once("connection.php");
    $query = " SELECT * FROM project";
    $result = mysqli_query($con,$query);
  ?>
    <section id="hero" class="d-flex flex-column justify-content-center align-items-center">
      
        <div class="hero-container" data-aos="fade-in">
          
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="card-title m-b-0">List of All Approved Projects</h5>
                        </div>
                            <div class="table-responsive">
                              <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        
                                        <th scope="col">Project ID</th>
                                        <th scope="col">Project Title</th>
                                        <th scope="col">Days Required</th>
                                        <th scope="col">Project Guide</th>
                                        <th scope="col">Guide Email</th>
                                        
                                       
  
                                    </tr>
                                    
  
                                </thead>
                                <tbody class="customtable">
                                <?php 
                                      while($row=mysqli_fetch_assoc($result))
                                      {
                                          $projectId = $row['projectid'];
                                          $projectTitle = $row['projecttitle']; 
                                          $workingDays = $row['workingdays'];
                                          $projectGuide = $row['guidename'];
                                          $guideEmail = $row['guideemail'];
                                         
                              ?>        
                              <?php 
                                        
                               ?>
                               
                               <?php 
                                      
                                          
                              ?>
                                      <tr>
                                          <td><?php echo $projectId ?></td>
                                          <td><?php echo $projectTitle ?></td>
                                          <td><?php echo $workingDays ?></td>
                                          <td><?php echo $projectGuide ?></td>
                                          <td><?php echo $guideEmail ?></td>
                                      </tr>        
                              <?php 
                                       } 
                               ?>
                                    
                                </tbody>
                            </table>
                            </div>
                    </div>

                    <div class="openBtn">
                        <button class="openButton" onclick="openForm()"><strong>Add More</strong></button>
                    </div>
                </div>
                <div class="loginPopup">
                  <div class="formPopup" id="popupForm">
                    <form action="insert.php" class="formContainer" method="post">
                      <h2>Add details</h2>
                      <label for="projectid">
                        <strong>Project ID:</strong>
                      </label>
                      <input type="text" id="projectid" placeholder="Project ID" name="projectid" required>
                      <label for="projecttitle">
                        <strong>Project Title:</strong>
                      </label>
                      <input type="text" id="projecttitle" placeholder="Project Title" name="projecttitle" required>
                      <label for="projectdescription">
                        <strong>Project Description:</strong>
                      </label>
                      <input type="text" id="projectdescription" placeholder="Project Description" name="projectdescription" required>
                      <label for="workingdays">
                        <strong>Days Required:</strong>
                      </label>
                      <input type="int" id="workingdays" placeholder="Days Required" name="workingdays" required>
                      <button type="submit" class="btn">Submit</button>
                      <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                    </form>
                  </div>
                </div>
            </div>

        </div>
      </section><!-- End Hero -->
  

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
    function openForm() {
      document.getElementById("popupForm").style.display = "block";
    }
    function closeForm() {
      document.getElementById("popupForm").style.display = "none";
    }
  </script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>