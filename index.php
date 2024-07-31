<?php
require_once"./resources/config.php";

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" integrity="sha384-eoTu3+HydHRBIjnCVwsFyCpUDZHZSFKEJD0mc3ZqSBSb6YhZzRHeiomAUWCstIWo" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
  <link rel="stylesheet" href="/style.css">
  <title>
     <?php echo $siteName?>
  </title>
     <style>
 
             </style>
    </head>
  
  <body>
     <nav class =" navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
         <div class ="container">
         <img src="./resources/logo.png" height=50 width=50>
             <a href ="./index.php" class="navbar-brand text-warning">  <?php echo $siteName?> </a>
             
             <button class="navbar-toggler" type ="button" data-bs-toggle="collapse" data-bs-target="#navmenu"> <span class="navbar-toggler-icon"></span> </button>
             <div class="collapse navbar-collapse" id="navmenu">
                 <ul class="navbar-nav ms-auto gap-2">
                     <li class ="nav-item">
                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#started">Login</button>
                     </li>
                        <li class ="nav-item">
                        <button type="button" class="btn btn-warning joinbtn">Join Us Now</button>
                     </li>
                        
                     </ul>
                     
                  </div>
         </div>
         
     </nav>
     
     <!-- showcase -->
     <section class="bg-dark text-light p-md-5 pt-lg-3 pt-5 text-center text-sm-start">
    <div class="container mt-5">
        <div class="row align-items-center justify-content-between">
            <div class="col-sm-12 col-md-6 order-sm-2 my-md-4">
                <div>
                    <h2>Unlock Your Skills with SkillsPrint <br> <span class="text-warning h3">Empower Your Learning Journey</span></h2>  
                    <p class="lead my-4">Our top categories include:- Programming, Design, Marketing, Business, and Many others</p>
                    <button class="btn btn-warning btn-lg joinbtn">Join Us Now</button>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 order-sm-1">
                <img class="img-fluid" src="./resources/image1.jpg" alt="SkillsPrint Image" style="width:100%; height: 500px;">
            </div>
        </div>
    </div>
</section>



    

     
<section id="learn" class="p-md-5 bg-dark">
    <div class="container">
        <div class="row align-items-center text-light justify-content-between">
            <div class="col-md p-3">
                <h2>Explore New Horizons, Share Your Skills.</h2>
                <p class="lead text-light">
                    Immerse yourself in the diverse world of SkillsPrint, where volunteering meets passion.
                    Our platform offers a curated selection of skill-sharing opportunities, crafted to perfection.
                    Experience the magic that transforms every collaboration into a memorable learning journey.
                    Take advantage of our empowering environment, ensuring you contribute your skills
                    and empower others on this unbeatable platform.
                </p>
                <a type="button" class="btn btn-warning mt-3 joinbtn"><i class="bi bi-chevron-right"></i> Join Us Now</a>
            </div>

            <div class="col-md">
                <img src="./resources/skill2.jpg" class="img-fluid" alt="SkillsPrint Moments Image"/>
            </div>
        </div>
    </div>
</section>



<section id="categories" class="p-md-5 p-sm-3 bg-dark">
    <div class="container border-top border-secondary">
        <h2 class="text-center mt-3 text-light">Explore Our Top Categories</h2>
        <p class="lead text-center text-light mb-3">
            Discover a world of skills in various categories.
        </p>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <img src="./resources/programmer.jpg" style="max-width:150px; height:200px;" class="mb-3" alt="Programming Icon"/>
                        <h3 class="card-title mb-3">Programming</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <img src="./resources/design.jpg" style="max-width:150px; height:200px;"  class="mb-3" alt="Design Icon"/>
                        <h3 class="card-title mb-3">Design</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <img src="./resources/marketing.jpg" style="max-width:150px; height:200px;"  class="rounded-circle mb-3" alt="Marketing Icon"/>
                        <h3 class="card-title mb-3">Marketing</h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="card bg-light">
                    <div class="card-body text-center">
                        <img src="./resources/business.png" class="rounded-circle mb-3" style="max-width:150px; height:200px;"  alt="Business Icon"/>
                        <h3 class="card-title mb-3">Business</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id="volunteer-promise" class="p-md-5 bg-dark">
    <div class="container">
        <div class="row align-items-center text-light justify-content-between">
            <div class="col-md p-3">
                <h2>Our Commitment to Volunteering</h2>
                <p class="lead text-light">
                    Impactful volunteer opportunities<br>
                    Timely project delivery commitment<br>
                    Volunteer satisfaction guarantee<br>
                    Privacy and security policy<br>
                    Collaborative and inclusive environment commitment<br>
                </p>
            </div>
            <div class="col-md">
                <img src="./resources/image1.jpg" class="img-fluid" alt="Volunteer Promise Image"/>
            </div>
        </div>
    </div>
</section>

<section id="faq" class="p-3 bg-dark">
    <div class="container border-top border-secondary">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>

        <div class="accordion accordion-flush" id="questions">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question1"> Why Choose SkillsPrint</button>
                </h2>
                <div id="question1" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        At SkillsPrint, we are committed to empowering individuals through impactful volunteer opportunities.
                        Our focus is on creating a positive and collaborative environment for skill development and community impact.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question2"> Do We Provide Offers?</button>
                </h2>
                <div id="question2" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        Yes, SkillsPrint offers a variety of opportunities and occasional events for volunteers, ensuring a rewarding and fulfilling experience.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question3"> What Information Do We Store?</button>
                </h2>
                <div id="question3" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        SkillsPrint prioritizes privacy and does not store sensitive volunteer information. Your data security is our top concern.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question4"> How Long Has SkillsPrint Been Operating?</button>
                </h2>
                <div id="question4" class="accordion-collapse collapse" data-bs-parent="#questions">
                    <div class="accordion-body">
                        SkillsPrint has been making a positive impact since its inception in [Year]. We are dedicated to fostering skills and community development.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

     
    
     
    
<section class="p-md-5 bg-dark pt-5" id="contact">
    <div class="container">
        <div class="row g-4 bg-dark border-top border-secondary">
            <div class="col-md bg-dark text-light mt-5">
                <h2 class="text-center mb-4">Contact Us</h2>

                <ul class="list-group list-group-flush lead">
                    <li class="list-group-item bg-dark text-light">
                        <span class="fw-bold">Main Phone: +1937 793 7489</span>
                    </li>
                    <li class="list-group-item bg-dark text-light">
                        <span class="fw-bold">Main Email: info@skillsprint.org</span>
                    </li>
                    <li class="list-group-item bg-dark text-light">
                        <span class="fw-bold">Customer Care: customercare@skillsprint.org</span>
                    </li>
                </ul>
            </div>
            <div class="col-md">
                <img src="./resources/contact.png" class="img-fluid" alt="SkillsPrint Contact Image"/>
            </div>
        </div>
    </div>
</section>

     <footer class="p-5 bg-dark text-white text-center position-relative">
         <div class="container">
             <p class="lead text-light">Copyright &copy; <?php echo $siteName?></p>
             
             <a href="#" class="position-absolute bottom-0 end-0 p-5"><i class="bi bi-arrow-up-circle h1"></i></a>
         </div>
     </footer>
     
     <div class="modal fade" id="started" tabindex="-1" aria-labelledby="startedLabel" aria-hidden="true">
         
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="startedLabel">Login To your account</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    
                 </div>
                 <div class="modal-body">
                     <form class="loginForm" method="POST">
                         <div class="mb-3">
                             <input type="text" id="" class="form-control email" name="email" placeholder="enter email">
                                   </div>
                             <div class="mb-3">
                             <input type="password" id="userpassword" name="loginpassword" class="form-control loginpassword" placeholder="enter password" aria-describedby="passwordHelpInline">
                          </div>
                     
                      <p class="loginstat text-center" value=""></p>
                 </div>
                 
                 <div class="modal-footer justify-content-between">
                       <p><a href="#" role="button" class="btn tooltip-test text-primary" title="createAccount" data-bs-toggle="modal" data-bs-target="#createAccount">Create Account</a></p>
                    <div>
                     <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" >Login</button>
                 </div></div>
                 </form>
                 
             </div>
         </div>
     </div>
     
     <!--create account modal -->
       <div class="modal fade createAccountModal" id="createAccount" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Create your account</h5>
                     <button class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                    
                 </div>
                 <div class="modal-body">
                     <form class="createAccountForm" method="POST">
                         <div class="mb-3">
                             <input type="text" id="" class="form-control email" placeholder=" Email" required name="email" required>
                                   </div>
                                   <div class="mb-3">
                             <input type="text" id="" class="form-control firstname" placeholder="First Name" name="firstname" required>
                                   </div>
                                   <div class="mb-3">
                             <input type="text" id="" class="form-control lastname" placeholder="Last Name" name="lastname" required>
                                   </div>
            
                             <input type="password" id="userpassword" class="form-control password" placeholder="enter password" aria-describedby="passwordHelpInline" name="password" required>
                          </div>
                          <div class="mb-3">
                            <p class="createstat text-center" value=""></p>
                            </div>
                 
                                         <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary createAccountBtn">Create Account</button>
                          </div>
                  </form>
             </div>
         </div>
     </div>
     
     <script src="./resources/jquery-3.6.0.js"></script>
     <script >
         $(document).ready(function(){
           
             $(".createAccountForm").submit(function(e){
                 e.preventDefault();
                 var formData=new FormData(this)
                $.ajax({
                    url:"./scripts/createAccount.php",
                    method:"POST",
                   data:formData,
           processData: false,
            contentType: false,
           beforeSend:function(){
               $(".createstat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){
         if(data==1){
              $(".createstat").html('<p class="text-center text-info">account created and you are loggined</p>')
              setTimeout(Accstat,2000);
            
             function Accstat(){
                 $(".createstat").html("")
                   //$(".createAccountModal").hide();
                     window.location="./scripts/userHome.php";
             }
         }
            
         else{
              $(".createstat").html('<p class="text-center text-danger">error please try again</p>')
             
         }
           },
           error:function(){
            $(".createstat").html('<p class="text-center text-danger">error connecting please try again</p>')
             
           }
          })//end of ajax call
                    
               
                
             })
             
             $('.loginForm').submit(function(e){
                 e.preventDefault();
               var formData=new FormData(this)
               $.ajax({
                   url:"./scripts/loginner.php",
                   method:"POST",
                   data:formData,
                   processData: false,
            contentType: false,
           beforeSend:function(){
               $(".loginstat").html('<p class="text-center text-info">loading</p>')
           },
           success:function(data){
          if(data==1){
               $(".loginstat").html('<p class="text-center text-info">Customer logged in successfully</p>')
              setTimeout(Logstat,2000);
            
             function Logstat(){
                 $(".loginstat").html("")
                 $(".close").click();
                 
                window.location="./scripts/userHome.php";
             }
          }
          else {
              $(".loginstat").html('<p class="text-center text-danger">incorrect details, try again</p>')
              $('.loginpassword').val('');
              
          }
               
           },
           error:function(){
                  $(".loginstat").html('<p class="text-center text-danger">error connecting please try again</p>')
           }
               })
               
             })



             $('.joinbtn').click(function(){
                // trigger modal show
                $('#createAccount').modal('show');
             })

               //handling history
         window.history.replaceState('','',window.location.href)
         })
       
     </script>
     <script>
  
</script>
     </body>  
</html>
