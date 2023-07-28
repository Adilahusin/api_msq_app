<?php

include '../connection.php';

$userStaffNo = $_POST['staff_no'];

$sqlQuery = "SELECT * FROM users_table WHERE staff_no = '$userStaffNo'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0)
{
    // num rows length == 1 -- someone already use the staff no
    echo json_encode(array("staffnoFound"=>true));
}
else
{
    // num rows length == 0 -- staff no is available to use
    echo json_encode(array("staffnoFound"=>false));
}
