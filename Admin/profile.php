
  <?php
  require_once("../config.php");
  $adId = $_GET['id'];
  if(isset($_SESSION['username'])){
    $sql = "SELECT * FROM admin WHERE id =$adId";
    $sqlResult = $connection->query($sql);
    
    if($sqlResult){
      $row = $sqlResult->fetch_assoc();
          $userName = $row['name'];
          $email = $row['email'];
    }

  }
  else 
  header('location:../index.php');

?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="utf-8">
      <title>Admin Profile</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="\quiz_project\online-course.png">
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
  
  <div class="container">
      <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
              </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
              <div class="col-md-4 mb-3">
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                      <img src="<?php echo "../images/$photo";?>" alt="Admin" class="rounded-circle" width="300">
                      <div class="mt-3">
                        <h4><?php echo $userName; ?></h4>
                        <p class="text-secondary mb-1">Admin</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?php echo $userName ; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                      </div>
                      <div class="col-sm-9 text-secondary">
                      <?php echo $email; ?>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-sm-12">
                      <a class="btn btn-info "  href="editAdmin.php?id=<?php echo$adId; ?>">Edit</a>
                      </div>
                    </div>
                  </div>
                </div>
               </div>   
              </div>
            </div>
  
          </div>
      </div>
  
 