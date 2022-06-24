<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    include 'partials/_dbconnect.php';
    $date = $_POST["date"];
    $add = $_POST["address"];
    $user = $_SESSION['UserName'];
    $sql = "UPDATE `users` SET Address = '$add' , Date = '$date' WHERE UserName = '$user'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo '<script>alert("Appontment Successsfully Booked!! THANK YOU");</script>';
        // header("location: index.html");
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
                background-image: url('img7.jpg');
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
                background: rgba(132, 82, 60, 0.9);
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
            .txt_field #password{
                width: 80%;
            }
            .radio{
                padding: 20px 0 10px 10px;
                font-family: cursive;
            }
            .radio input{
                padding: 10px 5px;
                font-size: 14px;
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
        <title>Appointment</title>
    </head>
    <body>
        <div class="center">
            <h1>Appointment</h1>
        <form name = "myform" action="appointment.php" onsubmit = "return validationForm()" method="POST" >
        <div class="txt_field">
            <label for="address">Address</label><br>
            <textarea name="address" id="address" cols="38" rows="3"></textarea>
        </div>
            <div class="txt_field">
                <label>Expected date for visit</label>
                
                <input type="date" name="date" id ="date">
            </div>
            <div class = "txt-field"><button type = "submit">Book An Appointment</button></div>
            </div>
            </div>
        </form>

        <script>
            function validationForm(){
                let x = document.forms["myform"]["depart"].value;
                let y = document.forms["myform"]["date"].value;
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