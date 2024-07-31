<?php
//adding the user to the database
	$serverhost="localhost";
	$dbusername="root";
	$dbpassword="";
	$dbasename="SKILLSPRINT";
	$siteName="SKILLS PRINT";

	//establishing db conn
  try{
  	$conn=new PDO("mysql:host=$serverhost;dbname=$dbasename",$dbusername,$dbpassword);
	$conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo $e->getMessage();
  }
   //MAKING A FUNCTION TO CLEAN THE USER INPUT
    function clean($data){
        $data=trim($data);
        $data=implode("",explode("\\",$data));//remove all slashes
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

   
// fetching available categories
function fetchCategories($conn){
  $categories=[];
  $query="select * from  CATEGORIES order by NAME ASC";
  $st=$conn->prepare($query);
  $st->execute([]);
  while( $ou=$st->fetch(PDO::FETCH_ASSOC)){
    $categories[]=$ou;
  }
return $categories;
}

// Fetching my skills with category information
function fetchMySkills($conn, $userID) {
  $skills = [];
  $query = "SELECT SKILLS.SKILLNAME,SKILLS.ID, CATEGORIES.NAME
            FROM USERSKILLS
            INNER JOIN SKILLS ON USERSKILLS.SKILL_ID = SKILLS.ID
            INNER JOIN CATEGORIES ON SKILLS.CATEGORYID = CATEGORIES.ID
            WHERE USERSKILLS.USERID = ?
            ORDER BY USERSKILLS.SKILL_ID ASC";
  $st = $conn->prepare($query);
  $st->execute([$userID]);
  while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
      $skills[] = $row;
  }
  return $skills;
}




function getSkillsFromCategory($conn, $categoryName) {
  $skills = [];
  // Fetch skills from the specified category
  $query = "SELECT SKILLS.ID as skill_id, SKILLS.SKILLNAME
            FROM SKILLS
            INNER JOIN CATEGORIES ON SKILLS.CATEGORYID = CATEGORIES.ID
            WHERE CATEGORIES.NAME = ?";
  $stmt = $conn->prepare($query);
  $stmt->execute([$categoryName]);
  // Fetch the results into an associative array
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $skills[] = $row;
  }
  return $skills;
}

function fetchAllSkills($conn){
  $skills=[];
  // / Fetch users with the specified skill
  $query = "SELECT * FROM SKILLS order by SKILLNAME ASC ";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  // Fetch the results into an associative array
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $skills[] = $row;
  }
  return $skills;
}

function getUsersInSkill($conn, $skillID) {
  $users = [];
  // Fetch users with the specified skill
  $query = "SELECT USERS.ID, USERS.FIRST_NAME, USERS.LAST_NAME
            FROM USERS
            INNER JOIN USERSKILLS ON USERS.ID = USERSKILLS.USERID
            WHERE USERSKILLS.SKILL_ID = ?";
  $stmt = $conn->prepare($query);
  $stmt->execute([$skillID]);
  // Fetch the results into an associative array
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $users[] = [
          'id' => $row['ID'],
          'first_name' => $row['FIRST_NAME'],
          'last_name' => $row['LAST_NAME'],
      ];
  }

  return $users;
}

function getUserContentInSkill($conn, $userID, $skillid){
    $content = [];
    // Fetch user content in a given skill
    $query = "SELECT * FROM CONTENT where USERID = ? AND SKILLID = ?
              ORDER BY POSTED_DATE DESC";
    $stmt = $conn->prepare($query);
    $stmt->execute([$userID, $skillid]);
    // Fetch the results into an associative array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $content[] = $row;
    }
    return $content;
}


// Function to get SKILL DETAILS
function getSkill($conn, $skill_id) {
  $query = "SELECT * FROM SKILLS WHERE ID = ?";
  $st = $conn->prepare($query);
  $st->execute([$skill_id]);
  $row = $st->fetch(PDO::FETCH_ASSOC);
  return $row;
}

// Function to get user details
function getUserDetails($conn, $userID) {
  $query = "SELECT * FROM USERS WHERE ID = ?";
  $st = $conn->prepare($query);
  $st->execute([$userID]);
  $row = $st->fetch(PDO::FETCH_ASSOC);
  return $row;
}
