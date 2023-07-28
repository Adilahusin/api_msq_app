<?php

include '../connection.php';

$sqlQuery = $connectNow->query("SELECT answer_choice FROM questions");
$resultOfQuery = array();

while($rowFound = $sqlQuery->fetch_assoc()) 
{
    $resultOfQuery[] = $rowFound;
}

echo json_encode($resultOfQuery);