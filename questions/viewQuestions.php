<?php

include '../connection.php';

$sqlQuery = $connectNow->query("SELECT * FROM questions");
$resultOfQuery = array();

while($rowFound = $sqlQuery->fetch_assoc()) 
{
    $resultOfQuery[] = $rowFound;
}

echo json_encode($resultOfQuery);