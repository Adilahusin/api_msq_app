<?php

//counselor is not working

include '../connection.php';

//POST = send/save data to mysql database
//GET = retrieve data from database

$userCsNo = $_POST['cs_no'];
$userCsPassword = md5($_POST['cs_password']);

$sqlQuery = "SELECT * FROM cs_table 
WHERE cs_no = '$userCsNo' AND cs_password = '$userCsPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) // allow counselor to login
{
    $userCsRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc()) // fetch_assoc for fetch a row
    {
        $userCsRecord[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "userCsData"=>$userCsRecord[0],
        ),
    );
}

else // counselor cannot login
{
    echo json_encode(array("success"=>false));
}