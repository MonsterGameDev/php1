<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
            <a href="/" class="navbar-brand">PH´s PHP-site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="./1.php" class="nav-link">Side 1</a>
                    </li>
                    <li class="nav-item">
                        <a href="./phpinof.php" class="nav-link">PHP INFO</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <main class="container" style="margin-top: 75px">
    <?php 
        $ok = false;
        if(isset($_POST["submit"])) {
            $ok = true;

            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $jobtitle = $_POST["jobtitle"];
            $email  = $_POST["email"];
            $phone = $_POST["phone"];
            $street = $_POST["street"];
            $city = $_POST["city"];
            $country = $_POST["country"];

            echo printf("You entered: <br>
                Firstname: %s <br>
                Lastname: %s <br>
                Jobtitle: %s <br>
                Email: %s <br>
                Phone: %s <br>
                Street: %s <br>
                City: %s <br>
                Country: %s
                ", $firstname, $lastname,$jobtitle, $email, $phone, $street, $city, $country);
        
                foreach ($_SERVER as $key => $value) {
                    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
                        continue;
                    }
                    
                    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
                    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
                    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
                    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
                
                
                }
                
                $link = mysqli_connect($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword,'users');
                



            
                $sql = sprintf("INSERT INTO  contactinfo (firstname, lastname, jobtitle, email, phone, street, city, country) VALUES ('%s',' %s', '%s', '%s', '%s', '%s', '%s', '%s')",
                    mysqli_real_escape_string($link, $firstname),
                    mysqli_real_escape_string($link, $lastname),
                    mysqli_real_escape_string($link, $jobtitle),
                    mysqli_real_escape_string($link, $email),
                    mysqli_real_escape_string($link, $phone),
                    mysqli_real_escape_string($link, $street),
                    mysqli_real_escape_string($link, $city),
                    mysqli_real_escape_string($link, $country)

                );
    
                echo $sql;
                
                mysqli_query($link, $sql);
                
                mysqli_close($link);
        
        
            }


    ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input id="firstname" name="firstname" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input id="lastname" name="lastname" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="jobtitle">Jobtitle</label>
                <input id="jobtitle" name="jobtitle" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input id="phone" name="phone" class="form-control" type="text">
            </div>
            <h3>Address:</h3>
            
                <div class="form-group">
                    <label for="street">Street</label>
                    <input id="street" name="street" class="form-control" type="text">
                </div>
                <div class="row">
                <div class="form-group col-md-6">
                    <label for="city">City</label>
                    <input id="city" name="city" class="form-control" type="text">
                </div>
                <div class="form-group  col-md-6">
                    <label for="country">Country</label>
                    <input id="country" name="country" class="form-control" type="text">
                </div>
            </div>
            <div class="form-check form-check-inline mb-4">
                <input id="tc" class="form-check-input" type="checkbox">
                <label for="tc" class="form-check-label">Accept Terms and Conditions</label>
                
            </div>
            <div class="btn-group" style="display:block">
                    <button class="btn btn-primary" name="submit" type="submit">Sign up</button>
                    <button class="btn btn-secondary" name="cancel) type="button">Reset</button>

            </div>
        </form>
    </main>
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>



</body>

</html>