<?php
require 'vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
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

                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                <p class="text-white-50 mb-5">Please enter your email and password!</p>

                <!-- Update form to point to process-login.php and use POST method -->
                <form action="process-l.php" method="POST">
                  <div data-mdb-input-init class="form-outline form-white mb-4">
                    <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" required />
                    <label class="form-label" for="typeEmailX">Email</label>
                  </div>

                  <div data-mdb-input-init class="form-outline form-white mb-4">
                    <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" required />
                    <label class="form-label" for="typePasswordX">Password</label>
                  </div>

                  <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="passreset.php">Forgot password?</a></p>

                  <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg gradient-custom-4 text-body px-5" type="submit">Login</button>
                </form>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>

              </div>

              <div>
                <p class="mb-0">Don't have an account? <a href="signup.php" class="text-white-50 fw-bold">Sign Up</a>
                </p>
              </div>
              <p class="text-white-50 mb-5">Did not receive your Verification Email? 
                <a href="resend-email-verification.php">Resend</a>
              </p>
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