<?php
// Start the session to access user data
session_start();

// Check if the user is logged in by verifying session variables
if (isset($_SESSION['user_id'])) {
    // User is logged in, retrieve their name
    $user_name = $_SESSION['user_name'];
} else {
    // Redirect to login page if the user is not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Link to custom CSS -->
  <link rel="stylesheet" href="styles.css">
  <!-- MDB UI Kit -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">
</head>
<body>

  <section class="vh-100 gradient-custom-4">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <h2 class="fw-bold mb-4 text-uppercase">Welcome, <?php echo htmlspecialchars($user_name); ?>!</h2>
              <p class="mb-4">You are logged in to the dashboard.</p>
              
              <a href="logout.php" class="btn btn-danger btn-lg">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MDB UI Kit JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
</body>
</html>
