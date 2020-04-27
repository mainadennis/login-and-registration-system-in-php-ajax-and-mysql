<?php
	// connect to database
    $db = mysqli_connect('localhost', 'root', '', 'news');
    session_start();
    
// register new user
if (isset($_POST['username'],$_POST['password'],$_POST['password1'],$_POST['email'],$_POST['fname'],$_POST['lname'])) {
    $username  =  e($_POST['username']);
    $fname    =  e($_POST['fname']);
    $lname    =  e($_POST['lname']);
    $mail = e($_POST['email']);
    $email = filter_var($mail, FILTER_SANITIZE_EMAIL);
    $password_1  =  e($_POST['password']);
    $password_2  =  e($_POST['password1']);
    $sql = "SELECT * FROM users WHERE username='$username' ";
    $res = mysqli_query($db, $sql);
    $sql1 = "SELECT * FROM users WHERE email='$email'"; //check if email is already used
    $results1 = mysqli_query($db, $sql1);
    $password = sha1($password_1);

    if (mysqli_num_rows($res) > 0){
        echo 'used';
        }
    else if (mysqli_num_rows($results1) > 0) {
        echo 'used1';
        }else{
            
            if ($password_1 != $password_2) {
                echo 'pass';
            }else{
            $query = "INSERT INTO users (username,first_name,last_name, email, password) VALUES('$username','$fname','$lname','$email', '$password')";
            $ins = mysqli_query($db, $query);
            // get id of the created user
            $logged_in_user_id = mysqli_insert_id($db);       
            $_SESSION['mumwe'] = getUserById($logged_in_user_id); 
            if ($ins){
            echo 'success';
            }else {echo 'fail';}
            }
            
        }		


}
// login users
if(isset($_POST['usernamel'],$_POST['passwordl'])){
    $username1 = preg_replace("/[^a-zA-Z0-9\s]/"," ",$_POST['usernamel']);
    $username = e($username1);
    $password = e($_POST['passwordl']);

    $password = sha1($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) { 
        $logged_in_user = mysqli_fetch_assoc($results);
            $_SESSION['mumwe'] = $logged_in_user;
            echo 'success';
        
    }else {
        echo 'wrong';
    }
}
// return user array from their id
function getUserById($id){
    global $db;
    $query = "SELECT * FROM users WHERE id=" . $id;
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);
    return $user;
}

// escape string
function e($val){
    global $db;
    return mysqli_real_escape_string($db, trim($val));
}
?>