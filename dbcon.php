<?php 
// session_start();
    // Connect with DB
    function Connect(){
        $conn = mysqli_connect('localhost', 'root', '', 'blog');
        return $conn;
    }
    //Execute Query
    function dbQuery($sql){
        $result = mysqli_query(Connect(), $sql);
        return $result;
    }
    //Store the returned result index in array
    function dbFetchArray($result, $resultType='MYSQLI=NUM'){
        return mysqli_fetch_array($result);
    }
    //Store the returned result column name in array
    function dbFetchAssoc($result){
        return mysqli_fetch_assoc($result);
    }
    // Return No of Records in Table
    function dbNumberRows($result){
        return mysqli_num_rows($result);
    }

    function DoLogin(){
        $errormessage = "";
        $username = ""; 
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($email == '' && $password == ''){
            $errormessage = "Pleas Enter User Name Or Password";
        }
        else{
            $sql = "SELECT `id`, `user-name` FROM `users-tbl` WHERE `email`='$email' and `password`='$password'";
            $res = dbQuery($sql);
            if(dbNumberRows($res) > 0){
                $row = dbFetchAssoc($res);
                $username = $row['user-name'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $email;
                $_SESSION['user-name'] = $username;
                header('location:index.php');
            }
            else{
                $errormessage = "Pleas Enter Correct Email Or password";
            }
        }
        return $errormessage;
    }

    function checkUser(){
        if(!isset($_SESSION['id'])){
            header('location:login.php');
        }
    }
?>