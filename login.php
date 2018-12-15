<?php 

include "koneksi/database_connection.php";

if(isset($_SESSION['level']))
{
    header("location:index.php?halaman=dashboard");
}

$message = '';

if(isset($_POST["login"])) 
{
    $query = "
    SELECT * 
    FROM karyawan 
    WHERE username = :username
    ";
    $statement = $connect->prepare($query);
    $statement->execute(
        array(':username' => $_POST["username"] )
    );
    $count = $statement->rowCount();
    if ($count>0) 
    {
        $result = $statement->fetchAll();
        foreach ($result as $row) 
        {
            if(password_verify($_POST["password"], $row["password"])) 
            {
                $_SESSION['id_karyawan'] = $row['id_karyawan'];
                $_SESSION['nm_karyawan'] = $row['nm_karyawan'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['level'] = $row['level'];
                header("location:index.php?halaman=dashboard");
            }
            else
            {
                $message = "<label>Password Anda Salah</label>";
            }
        }
    }
    else
    {
        $message = "<label> Username Anda Salah </label>";
    }
}

 ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Miliz Clinic Skin Care</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="template/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/assets/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="template/assets/css/style.css">

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                
                <div class="login-form">
                    <div class="login-logo">
                        <a>
                            <img class="align-content" src="images/logo2.png" alt="">
                        </a>
                    </div>
                    <form method="post">
                        <?php echo $message; ?>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" name="login" value="Login" class="btn btn-success btn-flat m-b-30 m-t-30">Login</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    
    <script src="template/assets/js/popper.min.js"></script>
    <script src="template/assets/js/plugins.js"></script>
    <script src="template/assets/js/main.js"></script>

</body>
</html>
