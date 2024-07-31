<?php
session_start();
require_once "../resources/config.php";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['userID'])) {
  $loggedin = true;
  // get the category name
  if (!isset($_GET['skill']) || !isset($_GET['id'])) {
    header("location:userHome.php");
    exit;
  }
  // get the category name
  $id = clean($_GET['id']);
  $skill_id = clean($_GET['skill']);
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
    <!-- fetching categories from the db -->
    <?php
    $userDetails = getUserDetails($conn, $id);
    $skill = getSkill($conn, $skill_id);
    // Get user content in the skill
    $userContent = getUserContentInSkill($conn, $id, $skill_id);
    ?>
    <section id="accounts" class="bg-dark text-light p-md-5 pt-lg-3 pt-5  text-center text-sm-start">
      <div class="container border-top border-secondary mt-5">
        <h2 class="text-center mt-3 text-light">
          Content by
          <?php echo strtoupper($userDetails['FIRST_NAME']) . ' 
            ' . strtoupper($userDetails['LAST_NAME']) . ' in ' . $skill['SKILLNAME'] ?>
        </h2>

        <?php
        if (empty($userContent)) {
          echo '<div class=" d-flex justify-content-center align-items-center text-warning border border-warning"
             style="min-height: 300px;">
             <p class="h3 text-warning text-muted">Sorry! No content from ' . strtoupper($userDetails['FIRST_NAME']) . '
             </p></div>';
        } else {
          ?>
          <div class="row g-4 homepanel">
            <?php
            foreach ($userContent as $content) {
              echo '<div class="col-12">';
              echo '<div class="card  bg-light" style="min-height:200px;" data-name="' . $content['CONTENTID'] . '">';
              echo '<div class="card-header  h4 text-dark  fw-bold text-center">' . $content['TITLE'] . '</div>';
              echo '<div class="card-body px-3 text-dark">' . html_entity_decode(($content['CONTENT'])) . '</div>';
              echo '<div class="card-footer text-center">';
              echo '<p class="card-text text-muted fw-bold"> Shared on ' . $content['POSTED_DATE'] . '</p>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
            ?>
          </div>
          <?php
        }
        ?>
      </div>
    </section>
  </div>
  <script src="../resources/jquery-3.6.0.js"></script>
  <script>
    $(document).ready(function () {
      window.userID = $(".body").data('userid')
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
    })//end of ready function

  </script>
</body>

</html>