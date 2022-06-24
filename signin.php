<?php
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'partials/_dbconnect.php';
    $user = $_POST["username"];
    $password = $_POST["password"];
    $sql = "Select * FROM users WHERE UserName='$user' AND Password='$password'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if($num == 1){
        session_start();
        $_SESSION['UserName'] = $user;
        header("location: index.html");
    }
    else{
        $showError = true;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
            body{
                margin: 0;
                padding: 0;
                background-image: url('img2.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
            }
            .center{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 400px;
                background: white;
                border-radius: 20px;
            }
            .center h1{
                text-align: center;
                padding: 0 0 20px 0;
                border-bottom: 1px solid silver;
            }
            .center{
                padding: 20px 40px;
                box-sizing: border-box;
                background: rgba(132, 82, 60, 0.7);
            }

            form .txt_field{
                position: relative;
                border-bottom: 2px solid silver;
                margin: 40px 10px;
            }
            .txt_field input{
                width: 100%;
                padding: 5px 10px;
                display: inline-block;
                border: none;
                outline: none;
                border-radius: 10px;
            }
            .txt_field label{
                position: relative;
                color: black;
                font-weight: bold;
                font-size: 16px;
            }

            .pass{
                margin: 5px 0 20px 5px;
                color: black;
                font-weight: bold;
                cursor: pointer;
            }
            .pass:hover{
                text-decoration: underline;
            }
            button{
                width: 100%;
                height: 30px;
                border: 1px solid;
                background: rgb(55, 33, 18);
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
        <title>Sign_in</title>
    </head>
    <body>
        <?php
            if($showError){
                echo '<script>alert("User doen not exist kindly sign-in first!!");</script>';
                header("location: signin.php");
            }
        ?>
        <div class="center">
            <h1>Log in</h1>
        <form name = "myform" action="/project/signin.php" onsubmit = "return validationForm()" method="POST" >
            <div class="txt_field">
                <label>User-Name</label>
                <input type="text" name="username" id="username"><br>
            </div>
            <div class="txt_field">
                <label>Password</label>
                
                <input type="password" name="password" id ="password">
            </div>

            <div class = "txt-field"><button type = "submit">Log-in</button></div>
            <div class = "signup_link">
                Not a member? 
                <a href="signup.php">Signup</a>
            </div>
        </form>
        </div>

        <script>
            function validationForm(){
                let x = document.forms["myform"]["username"].value;
                let y = document.forms["myform"]["password"].value;
                if(x == ""){
                    alert("You forget one of the required fields. Please try again.");
                    return false;
                }
                if(y == ""){
                    alert("You forget one of the required fields. Please try again.");
                   return false;
                }
            }
        </script>
    </body>
</html>