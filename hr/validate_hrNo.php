<?php

include '../connection.php';

$userHrNo = $_POST['hr_no'];

$sqlQuery = "SELECT * FROM hr_table WHERE hr_no = '$userHrNo'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0)
{
    // num rows length == 1 -- someone already use the staff no
    echo json_encode(array("hrnoFound"=>true));
}
else
{
    // num rows length == 0 -- staff no is available to use
    echo json_encode(array("henoFound"=>false));
}
