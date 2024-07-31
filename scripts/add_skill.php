<?php
session_start();
require_once('../resources/config.php');

if (isset($_POST['name']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $skillname = ucwords(clean($_POST['name'])); 
    $category_id = clean($_POST['category_id']);
    $userID=clean($_POST['userID']);
    // Insert category data into the database
    $query = "INSERT INTO SKILLS (SKILLNAME, CATEGORYID) VALUES (?, ?)";
    $stt = $conn->prepare($query);
    if ($stt->execute([$skillname, $category_id])) {
        // insert into user skills
        $skill_id=$conn->lastInsertId();
        $q="insert into USERSKILLS (USERID,SKILL_ID)values(?,?)";
        $sttt=$conn->prepare($q);
        $sttt->execute([$userID,$skill_id]);
        $skill_id =$conn->lastInsertId();
        $response = ['stat' => 1, 'skill_id' => $skill_id];
    } else {
        $response = ['stat' => 0, 'skill_id' => 0];
    }

    // Output the JSON response
    echo json_encode($response);
    exit;
}


// user linking a skill
if(isset($_POST['existing_skill_id'])){
    $skill_id=clean($_POST['existing_skill_id']);
    $userID=clean($_POST['userID']);
    // check if user haas the skill
     $checkQuery = "SELECT * FROM USERSKILLS WHERE USERID = ? AND SKILL_ID = ?";
         $checkStmt = $conn->prepare($checkQuery);
         $checkStmt->execute([$userID,$skill_id]);;
         $result = $checkStmt->fetch(PDO::FETCH_ASSOC);
         if ($result) {
             // User already has the skill
             echo 2;
         } else {
             // Add the skill to user's skills
             $addSkillQuery = "INSERT INTO USERSKILLS (USERID, SKILL_ID) VALUES (?,?)";
             $addSkillStmt = $conn->prepare($addSkillQuery);
             $addSkillStmt->execute([$userID,$skill_id]);
             echo 1;
         }
        }

?>
