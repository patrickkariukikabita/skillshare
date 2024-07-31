<?php
session_start();
require_once "../resources/config.php";
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['userID'])) {
  $userID = $_SESSION['userID'];
  $loggedin = true;

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

<body class="body bg-dark" data-loggedin="<?php echo $loggedin ?>" data-userid="<?php echo $userID ?>"
  >
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
            <button type="button" style="width:100px; " class="btn btn-warning myskills"><i class="fa  fa-book"> </i>
              Skills</button>
          </li>
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
    <section id="accounts" class="bg-dark text-light p-md-5 pt-lg-3 pt-5  text-center text-sm-start">
      <div class="container border-top border-secondary mt-5">
        <h2 class="text-center mt-3 text-light">Select Category To View Skills</h2>
        <div class="row g-4 homepanel">
          <!-- Static card for adding a new category -->
          <div class="col-3 col-md-6 col-lg-4 col-12">
            <div class="card bg-light" style="min-height:200px; max-height:200px;">
              <div class="card-header text-dark text-center">Create New Category</div>
              <div class="card-body ">
                <!-- Form for adding a new category -->
                <form action="add_category.php" id="newCategoryForm" method="post" class="mt-0 pt-0">
                  <div class="mb-1 pt-0">
                    <input type="text" class="form-control" id="categoryName" name="categoryName"
                      placeholder="Category Name" required>
                  </div>
                  <div class="mt-1">
                    <textarea class="form-control" id="categoryDescription" name="categoryDescription"
                      style="max-height:60px; resize:none;" placeholder="Category Description" required></textarea>
                  </div>
                  <div class="mt-1 text-center">
                    <button type="submit" class="btn btn-secondary submitcategorybtn">Add</button>
                  </div>

                </form>
              </div>
            </div>
          </div>

          <?php
          $categories = fetchCategories($conn);
          foreach ($categories as $category) {
            echo '<div class="col-3 col-md-6 col-lg-4 col-12 " style="cursor:pointer;">';
            echo '<div class="card categoryCard bg-light " style="min-height:200px;" data-name="' . $category['NAME'] . '">';
            echo '<div class="card-header text-dark text-center">' . $category['NAME'] . '</div>';
            echo '<div class="card-body text-center">';
            echo '<p class="card-text text-dark">' . $category['DESCRIPTION'] . '</p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
          }
          ?>
        </div>
      </div>
    </section>

    <!--my skills modal -->
    <div class="modal fade myskillsmodal" id="myskillsmodal" tabindex="-1" aria-labelledby="createLabel"
      aria-hidden="true">
      <div class="modal-dialog bg-dark modal-fullscreen">
        <div class="modal-content bg-dark w-100">
        <div class="modal-header bg-dark">
              <div class="d-flex justify-content-between align-items-center w-100 ">
                <div class="d-flex ">
                  <span class="text-light h2" id="createLabel">My Skills</span>
                </div>
                  <div class="d-flex justify-content-start align-items-center pe-4">
                      <button class="createSkillbtn btn mx-2 bg-warning"><i class="fa  fa-plus"> </i> Create Skill</button>
                      <button class="selectskillformtriggerbtn btn mx-2 bg-warning"><i class="fa  fa-link"> </i> Link Skill</button>
                  </div>
              </div>
          </div>

          <div class="modal-body bg-dark">
            <div class="container  border-secondary mt-5">
              <div class="row g-4 skillspanel">


                <!-- Static card for adding a new category -->
                <div class="col-3 col-md-6 col-lg-4 col-12 d-none firstcard">
                  <div class="card bg-light" style="min-height:250px; max-height:200px;">
                    <div class="card-header text-dark text-center cardlabel">Create A New Skill</div>
                    <div class="card-body ">
                      <!-- Form for adding a new SKILL -->
                      <form action="add_skill.php" id="createSkillForm" method="post" class="mt-0 pt-0 d-none">
                      <div class="mt-1 text-center">
                      <input type="text" class="form-control" id="skillName" name="skillName"
                      placeholder="Skill Name" style="height:60px" required>
                        </div>
                        <div class="mt-1 text-center">
                          <select class="skilladdcategoryselect w-100" style="height:60px">
                            <option value="" disabled selected> Select Category</option>
                            <?php
                            $categories = fetchCategories($conn);
                            foreach ($categories as $category) {
                              echo '<option value="' . $category['ID'] . '">' . $category['NAME'] . ' </option>';
                            } ?>
                          </select>
                        </div>
                        <div class="mt-2 text-center">
                          <button type="submit" class="btn btn-secondary submitCreateskillbtn">Create New Skill</button>
                        </div>
                      </form>


                      <!-- selecting a skill -->
                      <form action="add_skill.php" id="selectSkillForm" method="post" class="mt-0 pt-0 d-none">
                      <div class="mt-1 text-center">
                          <select class="skillselect w-100" style="height:60px">
                            <option value="" disabled selected> Select Skill</option>
                            <?php
                            $allskills = fetchAllSkills($conn);
                            foreach ($allskills as $skill) {
                              echo '<option value="' . $skill['ID'] . '">' . $skill['SKILLNAME'] . ' </option>';
                            } ?>
                          </select>
                        </div>
                        <div class="mt-2 text-center">
                          <button type="submit" class="btn btn-secondary submitSelectskillbtn">Link To Profile</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>
                <?php
                $mySkills = fetchMySkills($conn, $userID);
                foreach ($mySkills as $skill) {
                  echo '<div class="col-3 col-md-6 col-lg-4 col-12">';
                  echo '<div class="card bg-light" style="min-height:250px;" data-name="' . $skill['SKILLNAME'] . '">';
                  echo '<div class="card-header text-dark text-center">' . $skill['SKILLNAME'] . '</div>';
                  echo '<div class="card-body text-center">' . $skill['NAME'] . '</div>';
                  echo '</div>';
                  echo '</div>';
                }


                ?>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-end">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
          </div>
        </div>

      </div>

      <!-- end of -->
    </div>

  </div>


    <script src="../resources/jquery-3.6.0.js"></script>
    <script>
      $(document).ready(function () {

        window.userID = $(".body").data('userid')

        // creating a new category
        $('#newCategoryForm').submit(function (e) {
          e.preventDefault();
          var form = $(this);
          var name = $('#categoryName').val().trim().toUpperCase();
          var desc = $('#categoryDescription').val().trim();
          $('.submitcategorybtn').html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);

          $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: { name: name, desc: desc },
            success: function (response) {
              if (response == 1) {
                // Append a new card after the "Add New Category" card
                var newCardHtml = '<div class="col-3 col-md-6 col-lg-4 col-12">' +
                  '<div class="card bg-light categoryCard" style="min-height:200px;" data-name="' + name + '">' +
                  '<div class="card-header text-dark text-center">' + name + '</div>' +
                  '<div class="card-body text-center">' +
                  '<p class="card-text text-dark">' + desc + '</p>' +
                  '</div>' +
                  '</div>' +
                  '</div>';
                $('.homepanel').find('.col-3.col-md-6.col-lg-4.col-12:first').after(newCardHtml);
                // Reset form and enable the button
                form.trigger('reset');
                $('.submitcategorybtn').html('Add').prop('disabled', false);
              } else if (response == 2) {
                form.trigger('reset');
                $('.submitcategorybtn').html('Add').prop('disabled', false);
                alert("Error: Category Exists");
              } else {
                alert("Error adding category");
              }
            },
            error: function (xhr, status, error) {
              // Show error popup
              alert('Error: ' + error);
            }
          });
        });




        // selecting an existing skill
$('.selectskillformtriggerbtn').click(function () {
    // populate the new card with info on creating new card 
    $('#createSkillForm').removeClass("d-block").addClass("d-none");
    $('#selectSkillForm,.firstcard').removeClass("d-none").addClass("d-block");
    $(".cardlabel").html("Add Skill To Profile")
});

// send ajax 
$("#selectSkillForm").submit(function (e) {
    e.preventDefault();
    var form = $(this); // Capture the form reference here

    var existing_skill_id = $('.skillselect').val().trim();
    $('.submitSelectskillbtn').html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);

    $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: { existing_skill_id: existing_skill_id, userID: userID },
        success: function (response) {
          if(response==1){
            form.trigger('reset'); // Reset the form using form.trigger('reset')
            $('.submitSelectskillbtn').html('Link To Profile').prop('disabled', false);
            alert("Skill added to profile: Page will refresh to reflect Skill");
            window.location.reload()
          }else{
            form.trigger('reset'); // Reset the form using form.trigger('reset')
            $('.submitSelectskillbtn').html('Link To Profile').prop('disabled', false);
            alert("Error adding skill to profile");
          }
        },
        error: function () {
            alert("Error adding skill");
        }
    });
});



        // adding a new Skill
        $('.createSkillbtn').click(function(){
          // populae the new card with info on creating new card 
            $('#createSkillForm,.firstcard').removeClass("d-none").addClass("d-block")
            $('#selectSkillForm').removeClass("d-block").addClass("d-none")
            $(".cardlabel").html("Create A Skill")
          })
        // Submit form using AJAX
        $('#createSkillForm').submit(function (e) {
          e.preventDefault();
          var form = $(this);
          var name = $('#skillName').val().trim();
          var category_id = $('.skilladdcategoryselect').val();
          $('.submitCreateskillbtn').html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);

          $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: { name: name, category_id: category_id, userID: userID },
            success: function (response) {
              var parsedResponse = JSON.parse(response);
              var stat = parsedResponse.stat;
              var skillid = parsedResponse.skill_id;
              if (stat== 1) {
                $('.skillselect').append('<option value="'+skillid+'">'+name+'</option>')
                form.trigger('reset');
                $('.submitCreateskillbtn').html('Create New Skill').prop('disabled', false);
                alert("Alert Skill Succesfully Added");
                 window.location.reload()
              } else if (stat == 2) {
                form.trigger('reset');
                $('.submitCreateskillbtn').html('Create New Skill').prop('disabled', false);
                alert("Error: Skill Exists");
              } else {
                alert("Error adding Skill");
              }
            },
            error: function (xhr, status, error) {
              // Show error popup
              alert('Error: ' + error);
            }
          });
        });
     


        // handling card click
        $(document).on("click", ".categoryCard", function () {
          var name = $(this).data('name')
          window.location = "./categorySkills.php?category=" + name;
        })


        // useradding skills
        $('.myskills').click(function () {
          // trigger modal show
          $('#myskillsmodal').modal('show');
        })


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