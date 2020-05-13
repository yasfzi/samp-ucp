<?php
$conn = mysqli_connect("localhost","root","","scrp");
session_start();

if(isset($_POST['login'])){
	
	$username = $_POST['Username'];
	$password = $_POST['Password'];

	$select = "SELECT * FROM accounts WHERE Username = '$username' AND Password = '$password' AND Status = 'Active'";

    $selects = "SELECT * FROM accounts WHERE Username = '$username' AND Password = '$password' AND Status = 'Inactive'";
    
	$result = mysqli_query($conn,$select);
    $results = mysqli_query($conn,$selects);
	
    if(mysqli_fetch_assoc($result)){
        $_SESSION['User'] = $_POST['Username'];
        header('location:index.php');
    }
    else if(mysqli_num_rows($results) > 0){
    ?>    
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/sweetalert2.all.min.js"></script>
        <script>
            Swal.fire("Opss..","Please Activate Account On Your Email.!","warning");
            e.preventDefault();
        </script>
    <?php
    }
}
?>
    <div class="main" style="margin-top: -10%;">
        <!-- Sing in  Form -->
        <section class="sign-in" style="margin-bottom: -95%;">
        <style>
        .container{
            max-width: 800px;
        }
        img{
            padding-left: 20px;
        }
        </style>
                <div class="container">
                    <div class="signin-content">
                        <div class="signin-image">
                            <figure><img src="images/yas.png" alt="sing up image"></figure>
                        </div>

                        <div class="signin-form">
                            <h1 class="form-title">Sign in</h1>
                            <form method="POST" class="register-form" id="login-form">
                                <div class="form-group">
                                    <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="Username" id="username" placeholder="Username"/>
                                </div>
                                <div class="form-group">
                                    <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="password" name="Password" id="password" placeholder="Password"/>
                                </div>
                                <div class="form-group" style="margin-top: -5%;">
                                    <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                    <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                                </div>
                                <div class="form-group form-button" style="margin-left: 25%; margin-top: -8%;">
                                </div>
                                <button type="Submit" name="login" id="tombollogin">Login</button>
                                <a href="register.php" style="margin-left: 52%; margin-top: -5%; color: black;">Belum Punya Akun?</a>
                            </form>
                        <script src="js/jquery-3.4.1.min.js"></script>
                        <script src="js/sweetalert2.all.min.js"></script>
                        <script> 
                        $("#tombollogin").click(function(e){
                        var username = $("#username").val();
                        var password = $("#password").val();

                        if(username == '' && password == ''){
                            Swal.fire("Opss..","Please Input Your Data!","warning");
                            e.preventDefault();
                        }
                        else if(username == ''){
                            Swal.fire("Opss..","Your Username Is Empty!","warning");
                            e.preventDefault();
                        }
                        else if(password == ''){
                            Swal.fire("Opss..","Your Password Is Empty!","warning");
                            e.preventDefault();
                        }
                    })
                        </script>
                        </div>
                    </div>
                </div>
            </section>
    </div>