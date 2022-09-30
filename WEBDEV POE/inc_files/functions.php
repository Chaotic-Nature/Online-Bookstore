<?php
function loadTextData($loadDataQuery)
{
    global $DBConn;
    $loadDataQueryResult = mysqli_query($DBConn ,$loadDataQuery);
    if($loadDataQueryResult === FALSE){
        echo "<p>Error code: " . mysqli_errno($DBConn) . " : " . 
        mysqli_error($DBConn) . "</p>";
    }
}

//      **SIGNUP FUNCTIONS**      //

function isEmpty($Fname, $Lname, $studNum, $username, $email, $pwd, $confPwd)
{
    if(empty($Fname) || empty($Lname) || empty($studNum) || empty($username) || empty($email) || empty($pwd) || empty($confPwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function samePassword($password, $confPassword)
{
    if($password !== $confPassword){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function passwordLength($password)
{
    if(strlen($password) !== 8){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function studNumExists($DBConn, $studentNum)
{
    $sqlQuery = "SELECT * FROM tblUser WHERE studNum = ?;";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../Web_pages/Login.php?error=statementFailed");
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

function usernameExists($DBConn, $username)
{
    $sqlQuery = "SELECT * FROM tblUser WHERE username = ?;";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../Web_pages/Login.php?error=usernamestatementFailed");
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

function invalidEmail($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function createUser($DBConn, $Fname, $Lname, $studNum, $username, $email, $pwd)
{
    $sqlQuery = "INSERT INTO tblUser (fName, lName, studNum, username, email, pwd) VALUES (?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../Web_pages/Login.php?error=createstmntFailed");
        exit();
    }
    else{
        $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssssss", $Fname, $Lname, $studNum, $username, $email, $hashedPWD);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $myfile = fopen("../text_files/userData.txt", "a") or die("Unable to open file!");
        fwrite($myfile, "\n ,$Fname,$Lname,$studNum,$username,$email,$hashedPWD,");
        fclose($myfile);
        header("location: ../Web_pages/Login.php?AccountCreationSuccessful");
        exit();  
    }
    
}

//      **USER LOGIN FUNCTIONS**        //

function isEmptyLogin($studentNum, $username, $password){
    if(empty($studentNum) || empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function loginUser($DBConn, $studentNum, $password){
    $userExists = studNumExists($DBConn, $studentNum);
    if($userExists === FALSE){
        header("location: ../Web_pages/Login.php?error=incorrectLogin");
        exit();
    }
    $pwdHashed = $userExists["pwd"];
    $passwordCheck = password_verify($password, $pwdHashed);
    if($passwordCheck === FALSE){
        header("location: ../Web_pages/Login.php?error=passwordsDontMatch");
        exit();
    }
    else if($passwordCheck === TRUE){
        session_start();
        $_SESSION['studNum'] = $userExists['studNum'];
        header("location: ../Index.php?UserLoginSuccessful");
        exit();
    }
}

//      **ADMIN LOGIN FUNCTIONS**        //
function isEmptyAdminLogin($username, $password){
    if(empty($username) || empty($password)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function adminExists($DBConn, $username)
{
    $sqlQuery = "SELECT * FROM tblAdmin WHERE AD_username = ?;";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../Web_pages/AdminLogin.php?error=statementFailed");
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

function loginAdmin($DBConn, $username, $password){
    $adminExists = adminExists($DBConn, $username);
    if($adminExists === FALSE){
        header("location: ../Web_pages/AdminLogin.php?error=incorrectLogin");
        exit();
    }
    $pwdHashed = $adminExists["AD_pwd"];
    $passwordCheck = password_verify($password, $pwdHashed);
    if($passwordCheck === FALSE){
        header("location: ../Web_pages/AdminLogin.php?error=passwordsDontMatch");
        exit();
    }
    else if($passwordCheck === TRUE){
        session_start();
        $_SESSION['AD_num'] = $adminExists['AD_num'];
        header("location: ../Index.php?LoggedInAsAdmin");
        exit();
    }
}