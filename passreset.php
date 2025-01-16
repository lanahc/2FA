<?php
session_start();
require 'vendor/autoload.php';
$page_title = "Pass Reset Form";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Link to custom CSS -->
  <link rel="stylesheet" href="styles.css">
  <!-- MDB UI Kit -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>
  <section class="vh-100 gradient-custom-3">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <div class="mb-md-5 mt-md-4 pb-5">

                <h2 class="fw-bold mb-2 text-uppercase">Reset Password</h2>
                <p class="text-white-50 mb-5">Enter your email to reset your password.</p>

                <?php
                  if(isset($_SESSION['status']))
                  {
                    ?>
                    <div class = "alert alert-success">
                        <h3><?=$_SESSION['status']; ?></h3>
                  </div>
                  <?php
                  unset($_SESSION['status']);
                  }
                ?>

                <form action="pass-reset-code.php" method="POST">
                  <div data-mdb-input-init class="form-outline form-white mb-4">
                    <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" required />
                    <label class="form-label" for="typeEmailX">Email</label>
                  </div>

                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg gradient-custom-4 text-body px-5"  name = "password_reset_link" type="submit">Send Reset Link</button>
                </form>

              </div>

              <div>
                <p class="mb-0">Back to <a href="login.php" class="text-white-50 fw-bold">Login</a></p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MDB UI Kit JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
  </section>
</body>
</html>
