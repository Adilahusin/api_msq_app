<?php

include '../connection.php';

$userCsNo = $_POST['cs_no'];

$sqlQuery = "SELECT * FROM cs_table WHERE cs_no = '$userCsNo'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0)
{
    // num rows length == 1 -- someone already use the staff no
    echo json_encode(array("csnoFound"=>true));
}
else
{
    // num rows length == 0 -- staff no is available to use
    echo json_encode(array("csnoFound"=>false));
}
