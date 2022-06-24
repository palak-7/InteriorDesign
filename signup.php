<?php
$showPassError = false;
$showExistError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    //to check unique username
    $existSql = "SELECT * FROM `users` WHERE UserName='$username'";
    $result = mysqli_query($conn, $existSql);
    $numxistRows = mysqli_num_rows($result);
    if($numxistRows > 0){
        $showExistError = true;
    }

    //to check unique email
    $showExistError = false;
    $existSql = "SELECT * FROM `users` WHERE EMail='$email'";
    $result = mysqli_query($conn, $existSql);
    $numxistRows = mysqli_num_rows($result);
    if($numxistRows > 0){
        $showExistError = true;
    }

    //to check if passwords match
    if(($password == $cpassword)){
        $sql = "INSERT INTO `users` (`UserName`, `EMail`, `Password`) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        header("location: signin.php");
    }
    else{
        $showPassError = true;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>sign_up</title> 
        <style>
            body{
                margin: 0;
                padding: 0;
                background-image: url('interior2.png');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            img{
                border-radius: 50%;
                transform: translate(20%, 50%);
            }
            .center{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(40%, -50%);
                width: 400px;
                height: 600px;
                background: rgba(106, 115, 112, 0.5);
                border-radius: 20px;
            }
            .center h1{
                text-align: center;
                padding: 0 0 20px 0;
                border-bottom: 1px solid silver;
            }
            .center{
                padding: 10px 40px;
                box-sizing: border-box;
            }

            form .txt_field{
                position: relative;
                border-bottom: 2px solid silver;
                margin: 30px 10px;
            }
            .txt_field input{
                width: 100%;
                padding: 5px 5px;
                display: inline-block;
                border: none;
                outline: none;
                border-radius: 10px;
            }
            .txt_field label{
                position: relative;
                color: rgb(68, 77, 87);
                font-size: 16px;
            }
            .pass{
                margin: 5px 0 20px 5px;
                color: black;
                font: bolder;
                cursor: pointer;
            }
            .pass:hover{
                text-decoration: underline;
            }
            button{
                width: 100%;
                height: 30px;
                border: 1px solid;
                background: rgb(32, 62, 70);
                border-radius: 25px;
                font-size: 18px;
                color: white;
                font-weight: 700;
                cursor: pointer;
            }
            button:hover{
                border-color: rgb(7, 185, 126);
                transition: .5s;
            }
            .signup_link{
                margin: 5px 0;
                text-align: center;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <?php
            if($showExistError){
                echo '<script>alert("Username or Email already exists");</script>';
            }
            if($showPassError){
                echo '<script>alert("Passwords do not match!!");</script>';
            }
        ?>
        <div class="center">
            <h1>Create Account</h1>
        <form name = "myform" action="/project/signup.php" onsubmit = "return validationForm()" method="POST" >
            <div class="txt_field">
                <label>User-name</label>
                <input type="text" maxlength = "15" name="username" id="username">
            </div>
            <div class="txt_field">
                <label>E-Mail</label>
                <input type="email" name="email">
            </div>
            <div class="txt_field">
                <label>Password</label>
                <input type="password" maxlength = "20" name="password" id ="password">
            </div>
            <div class="txt_field">
                <label>Confirm-Password</label>
                <input type="password" name="cpassword" id ="cpassword">
            </div>
            <div class = "txt-field"></div><button type = "submit">Submit</button>
            
            </div>
        </form>

        <!-- javascript validation -->
        <script>
            function validationForm(){
                let x = document.forms["myform"]["username"].value;
                let y = document.forms["myform"]["password"].value;
                let z = document.forms["myform"]["email"].value;
                let r = document.forms["myform"]["cpassword"].value;
                if(x == ""){
                    alert("You forget one of the required fields. Please try again.");
                    return false;
                }
                if(y == ""){
                    alert("You forget one of the required fields. Please try again.");
                   return false;
                }
                if(z == ""){
                    alert("You forget one of the required fields. Please try again.");
                   return false;
                }
                if(r == ""){
                    alert("You forget one of the required fields. Please try again.");
                   return false;
                }
            }
        </script>
    </body>
</html>