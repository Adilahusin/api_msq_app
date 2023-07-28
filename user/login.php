<?php

include '../connection.php';

//POST = send/save data to mysql database
//GET = retrieve data from database

$userStaffNo = $_POST['staff_no'];
$userPassword = md5($_POST['user_password']);

$sqlQuery = "SELECT * FROM users_table 
WHERE staff_no = '$userStaffNo' AND user_password = '$userPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) // allow user to login
{
    $userRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc()) // fetch_assoc for fetch a row
    {
        $userRecord[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "userData"=>$userRecord[0],
        ),
    );
}

else // user cannot login
{
    echo json_encode(array("success"=>false));
}