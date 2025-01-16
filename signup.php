<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<?php
include 'dbconn.php';
include 'process.php';
?>

<body>
    <section class="vh-100 bg-image"
      style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
      <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                  <h2 class="text-uppercase text-center mb-5">Sign Up</h2>
                  <form action="process.php" method="POST">
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="text" id="form3Example1cg" name="name" class="form-control form-control-lg" required />
                      <label class="form-label" for="form3Example1cg">Your Name</label>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="email" id="form3Example3cg" name="email" class="form-control form-control-lg" required />
                      <label class="form-label" for="form3Example3cg">Your Email</label>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" required />
                      <label class="form-label" for="form3Example4cg">Password</label>
                    </div>
                    <div data-mdb-input-init class="form-outline mb-4">
                      <input type="password" id="form3Example4cdg" name="confirm_password" class="form-control form-control-lg" required />
                      <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                    </div>
                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" name="terms" id="form2Example3cg" required />
                      <label class="form-check-label" for="form2Example3g">
                        I agree to all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                      </label>
                    </div>
                    <div class="d-flex justify-content-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                    </div>
                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                        class="fw-bold text-body"><u>Login here</u></a></p>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</body>
</html>
