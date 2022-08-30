<?php
function loadTextData($loadDataQuery){
    global $DBConn;
    $loadDataQueryResult = mysqli_query($DBConn ,$loadDataQuery);
    if($loadDataQueryResult === FALSE){
        echo "<p>Error code: " . mysqli_errno($DBConn) . " : " . 
        mysqli_error($DBConn) . "</p>";
    }
}

//      **      SIGNUP FUNCTIONS    **      //

function isEmpty($Fname, $Lname, $studNum, $username, $pwd, $confPwd){
    if(empty($Fname) || empty($Lname) || empty($studNum) || empty($username) || empty($pwd) || empty($confPwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidStudNum($studentNum){
    $studentNum = strtoupper($studentNum);
    if(!preg_match("/^ST/", $studentNum) && !StrLen($studentNum) <= 10){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function invalidUsername($username){
    if(!preg_match("/^[a-zA-Z0-9]*$\/", $username)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function samePassword($password, $confPassword){
    if($password !== $confPassword){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function passwordLength($password){
    if(strlen($password) !== 8){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}


function studNumExists($DBConn, $studentNum){
    $sqlQuery = "SELECT * FROM tblUser WHERE studNum = ?;";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../Web_pages/Signup.php?error=statementFailed");
        exit();

    }
    mysqli_stmt_bind_param($stmt, "s", $studentNum);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;    
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function usernameExists($DBConn, $username){
    $sqlQuery = "SELECT * FROM tblUser WHERE username = ?;";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../html-files/create-account.html?error=usernamestatementFailed");
        exit();

    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;    
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($DBConn, $name, $surname, $studentNum, $username, $email, $password){
    $sqlQuery = "INSERT INTO tblUser (fName, lName, studNum, username, userEmail, pwd ) VALUES (?, ?, ?, ?, ?, ?) ;";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../html-files/create-account.html?error=createstmntFailed");
        exit();
    }
    else{
        $hashedPWD = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $surname, $studentNum, $username, $email, $hashedPWD);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../html-files/create-account.html?error=nothing");
        exit();  
    }
    
}