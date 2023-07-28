<?php

include '../connection.php';

//POST = send/save data to mysql database
//GET = retrieve data from database

$userStaffNo = $_POST['staff_no'];
$userName = $_POST['user_name'];
$userEmail = $_POST['user_email'];
$userPassword = md5($_POST['user_password']);
$userPhoneNo = $_POST['phone_no'];

$sqlQuery = "INSERT INTO users_table SET staff_no = '$userStaffNo', user_name = '$userName',
user_email = '$userEmail', user_password = '$userPassword', phone_no =  '$userPhoneNo'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery)
{
    echo json_encode(array("success"=>true));
}
else
{
    echo json_encode(array("success"=>false));
}