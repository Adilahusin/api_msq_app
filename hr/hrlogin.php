<?php

//counselor is not working

include '../connection.php';

//POST = send/save data to mysql database
//GET = retrieve data from database

$userHrNo = $_POST['hr_no'];
$userHrPassword = ($_POST['hr_password']);

$sqlQuery = "SELECT * FROM hr_table 
WHERE hr_no = '$userHrNo' AND hr_password = '$userHrPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) // allow hr to login
{
    $userHrRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc()) // fetch_assoc for fetch a row
    {
        $userHrRecord[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "userHrData"=>$userHrRecord[0],
        ),
    );
}

else // hr cannot login
{
    echo json_encode(array("success"=>false));
}