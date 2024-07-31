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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css"
    rel="stylesheet">
   <!-- Quill -->

   <script src="../resources/jquery-3.6.0.js"></script>
   <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
   <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>

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
      <div class="text-center text-light py-0 h4">Create New Content</div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span
          class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navmenu">
        <ul class="navbar-nav gap-2 gap-md-5 pb-2">
        </ul>
        <ul class="navbar-nav ms-auto gap-2 gap-md-5">
          
          <li class="nav-item">
            <button type="button" style="width:100px;" class="btn btn-warning login logout "> Logout </button>
          </li>

        </ul>

      </div>
    </div>

  </nav>
  <div class="container bg-dark mt-5">
    <!-- fetching categories from the db -->
    <section id="accounts" class="bg-dark  p-md-5 pt-lg-3 pt-5  text-center text-sm-start">
      <div class="container border-top border-secondary mt-5">
        <div class="row homepanel">
        <div class="container mt-5 px-0 mb-1">
        <div class="row">
            <div class="col-md-8 ">
                <textarea class="form-control" id="title" name="title" rows="3" style="height:60px;
                 resize:none;" placeholder="Title"></textarea>
            </div>
            <div class="col-md-4">
                <select class="skilladdcategoryselect w-100" style="height:60px">
                <option value="" disabled selected> Select Your Skill</option>
                <?php
                $mySkills = fetchMySkills($conn, $userID);
                foreach ($mySkills as $skill) {
                    echo '<option value="' . $skill['ID'] . '">' . $skill['SKILLNAME'] . ' </option>';
                } ?>
                </select>
            </div>
        </div>
    </div>

         <!-- quil text editor -->
         <div class="bg-light">
        <div id="editor" style="height: 200px"></div>
          </div>
        </div>
     </div>
     <div class="d-flex justify-content-center align-items-center py-4">
        <button class="savepost btn btn-primary text-light rounded border border-light"  
        style="min-width:100px">Post</button>
     </div>
    </section>
      </div>

     

   

    <script>
      $(document).ready(function () {
        var quill = new Quill('#editor', {
         theme: 'snow'
      });
      window.userID = $(".body").data('userid')

      $('.savepost').click(function () {
        $('.savepost').html('<i class="fa fa-spinner fa-spin"></i>').prop('disabled', true);
            var title = $('#title').val();
            var content = quill.root.innerHTML;;
            console.log(content)
            var skillid = $('.skilladdcategoryselect').val();
            // Check if title, content, and skillid are not empty
            if (title.trim() === '' || content.trim() === '' || skillid =="") {
                alert('Please fill in all fields.');
                return;
            }
            $.ajax({
                type: 'POST',
                url: 'saveContent.php',
                data: {
                    title: title,
                    content: content,
                    skillid: skillid,
                    userID:userID
                },
                success: function (response) {
                    $('.savepost').html('Post').prop('disabled', false);
                    if(response==1){ alert('Content saved successfully!'); 
                      $('#title').val("");
                        $('#editor').html("");   
                    }else{
                        alert('Error Saving Content!');   
                    }
                                },
                error: function () {
                    alert('An error occurred while saving the content.');
                }
            });
        });

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


      })//end of ready function

    </script>
</body>

</html>