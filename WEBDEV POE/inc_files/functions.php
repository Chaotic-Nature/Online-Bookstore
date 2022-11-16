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
function bookExists($DBConn, $bookID)
{
    $sqlQuery = "SELECT * FROM tblBooks WHERE bookID = ?;";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../Web_pages/Login.php?error=bookstatementFailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $bookID);
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
    $verified = 'n';
    $sqlQuery = "INSERT INTO tblUser (fName, lName, studNum, username, email, pwd, verified) VALUES (?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../Web_pages/Login.php?error=createstmntFailed");
        exit();
    }
    else{
        $hashedPWD = password_hash($pwd, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sssssss", $Fname, $Lname, $studNum, $username, $email, $hashedPWD, $verified);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $myfile = fopen("../text_files/userData.txt", "a") or die("Unable to open file!");
        fwrite($myfile, "\n ,$Fname,$Lname,$studNum,$username,$email,$hashedPWD,");
        fclose($myfile);
        header("location: ../Web_pages/Message.php?message=AccountCreationSuccessful");
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
        header("llocation: ../Web_pages/Message.php?message=incorrectLogin");
        exit();
    }
    $pwdHashed = $userExists["pwd"];
    $passwordCheck = password_verify($password, $pwdHashed);
    if($passwordCheck === FALSE){
        header("location: ../Web_pages/Message.php?message=passwordMismatch");
        exit();
    }
    else if($passwordCheck === TRUE){
        if($userExists['verify'] == 'n')
        {
            header("location: ../Web_pages/Message.php?message=unverified");
        }
        else
        {
            
            header("location: ../Index.php?");
            session_start();
            $_SESSION['name'] = $userExists['fName'];
            $_SESSION['surname'] = $userExists['lName'];
            $_SESSION['studentNumber'] = $userExists['studNum'];
            exit();
        }
        
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
        header("location: ../Web_pages/Message.php?message=incorrectAdminLogin");
        exit();
    }
    $pwdHashed = $adminExists["AD_pwd"];
    $passwordCheck = password_verify($password, $pwdHashed);
    if($passwordCheck === FALSE){
        header("location: ../Web_pages/Message.php?message=passwordMismatch");
        exit();
    }
    else if($passwordCheck === TRUE){
        session_start();
        $_SESSION['ADusername'] = $adminExists['AD_username'];
        $_SESSION['ADFname'] = $adminExists['AD_fName'];
        header("location: ../Web_pages/admindash.php");
        exit();
    }
}
function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("location:../index.php");
}

// SELL BOOKS PAGE FUNCTIONS //
function CleanInput($input, $fieldName){
    
    if((is_string($input) == TRUE) OR (is_numeric($input) == TRUE))
    {
        $input = trim($input);
        $input = stripslashes($input);

    }
    else
    {
        echo "<p>Please enter a proper value for " . $fieldName . ".</p>";
        $input = "";
    }
    return $input;
}

function CreateBookAd($DBConn, $title, $author, $edition, $genre, $description, $image, $price, $condition, $seller)
{

    $userExists = studNumExists($DBConn, $seller);
    if($userExists === FALSE){
        header("location: ../Web_pages/Message.php?message==userDontExist");
        exit();
    }
    /*$query = "SELECT userID FROM tblUser WHERE studNum = '$seller'";
    $queryres = mysqli_query($DBConn, $query);
    if($queryres === FALSE){
        echo "<p>Error code: " . mysqli_errno($DBConn) . " : " . 
        mysqli_error($DBConn) . "</p>";
    }
    $row = mysqli_fetch_assoc($queryres);
    $seller = $row['userID'];*/


    $sqlQuery = "INSERT INTO tblBooks (title, author, ed, genre, descript, img1, price, cond, seller) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($DBConn);
    if(!mysqli_stmt_prepare($stmt, $sqlQuery)){
        header("location: ../Web_pages/Message.php?message=bookEntryError");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "sssssssss", $title, $author, $edition, $genre, $description, $image, $price, $condition, $seller);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $myfile = fopen("../text_files/bookData.txt", "a") or die("Unable to open file!");
        fwrite($myfile, " ,,$title,,$author,,$edition,,$genre,,$description,,$image,,$price,,$condition,,$seller,,\n");
        fclose($myfile);
        header("location: ../Web_pages/Message.php?message=SuccessfullyAddedBook");
        exit();  
    }
    
}

        

