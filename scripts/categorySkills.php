<?php
session_start();
require_once "../resources/config.php";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
  $loggedin = true;
  // get the category name
  if (!isset($_GET['category'])) {
    header("location:userHome.php");
    exit;
  }
  // get the category name
  $category_name = clean($_GET['category']);

} else {
  $loggedin = false;
  $userID = "";
  header("location:../");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"
    integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
    rel="stylesheet">
  <link rel="stylesheet" href="/style.css">
  <title>
    <?php echo $siteName ?>
  </title>
  <style>
    .bg-muted {
      background-color: #1874cd;
    }
  </style>
</head>

<body class="body bg-dark" data-loggedin="<?php echo $loggedin ?>" data-userid="<?php echo $userID ?>">
  <nav class=" navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
    <div class="container">
      <img src="../resources/logo.png" height=50 width=50>
      <a href="../index.php" class="navbar-brand py-3 text-warning">
        <?php echo $siteName ?>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span
          class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav ms-auto gap-2 gap-md-5">
        <li class="nav-item">
            <button type="button" style=" " class="btn btn-warning createContent"><i class="fa  fa-plus"> </i>
              Create Content</button>
          </li>
          <li class="nav-item">
            <button type="button" style="width:100px;" class="btn btn-warning login logout "> Logout </button>
          </li>


        </ul>

      </div>
    </div>
  </nav>


  <div class="container bg-dark mt-5">
    <!-- fetching skills from the db -->
    <section id="skills" class="bg-dark text-light p-md-5 pt-lg-3 pt-5 text-center text-sm-start">
      <div class="container border-top border-secondary mt-5">
        <h2 class="text-center mt-3 text-light">Other Users With Skills In
          <?php echo $category_name ?>
        </h2>
        <div class="row g-4 homepanel">
          <?php
          $skills = getSkillsFromCategory($conn, $category_name);
          foreach ($skills as $skill) {
            // Fetch users with the current skill
            $usersWithSkill = getUsersInSkill($conn, $skill['skill_id']);
            // Display a Bootstrap card for each skill
            echo '<div class="col-md-6 col-12 mb-4">';
            echo '<div class="card bg-light" style="min-height:200px;">';
            echo '<div class="card-header text-dark text-center fw-bold "> Users With skill: [' . $skill['SKILLNAME'] . ']</div>';

            echo '<div class="card-body">';
            echo '<ul class="d-flex justify-content-evenly align-items-center list-unstyled">';
            foreach ($usersWithSkill as $user) {
              $output="";
              if ($user['id'] == $userID) {
                // Me
                $output = '<span class="fw-bold me-li text-muted">I have This Skill</span>';
                $html= '<li>
              <a href="userContent.php?id=' . $user['id'] . '&skill=' . $skill['skill_id'] . '" class="text-decoration-none" title="Read Content By' . $user['first_name'] . '">
                  <button class="user-oval-bg rounded-pill bg-secondary border border-2 border-secondary text-light px-3 py-2 d-flex align-items-center">
                      <img src="../resources/avatar.png" height=50 width=50>
                      <span class="fw-bold"> Me </span>
                  </button>
              </a>
          </li>';
              }else{
              $html= '<li>
                      <a href="userContent.php?id=' . $user['id'] . '&skill=' . $skill['skill_id'] . '" class="text-decoration-none" title="Read My Content">
                          <button class="user-oval-bg rounded-pill bg-muted border border-2 border-primary text-light px-3 py-2 d-flex align-items-center">
                              <img src="../resources/avatar.png" height=50 width=50>
                              <span class="fw-bold">' . $user['first_name'] . ' ' . $user['last_name'] . '</span>
                          </button>
                      </a>
                  </li>';
            }
            }
            echo $html;
            echo '</ul>';
            echo '</div>';
            echo '<div class="card-footer text-center text-dark bg-light">' . $output . '</div>';
            echo '</div>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </section>
    <!-- end of container -->
  </div>

  <script src="../resources/jquery-3.6.0.js"></script>
  <script src="../resources/timezone.js"></script>
  <script>
    $(document).ready(function () {

      //logging out
      $(".logout").click(function () {
        var logout = "yes";
        $.ajax({
          url: "../scripts/logout.php",
          method: "POST",
          data: { logout: logout },
          success: function (data, status) {
            //refresh the current page
            window.location = "../index.php";
          }
        })//end of ajax
      })//end of logout click


      $(".createContent").click(function(){
          window.location = "./createContent.php";
        })

      window.history.replaceState('', '', window.location.href)
    });
  </script>
</body>

</html>