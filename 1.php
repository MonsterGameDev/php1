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

            $username = $_POST['username'];
            $gender = $_POST['gender'];
            $color = $_POST['color'];
            
        if($ok) {
            $db = mysqli_connect('localhost', 'root', '', 'ph-php');
            
            $sql = sprintf("INSERT INTO  users (name, gender, color) VALUES ('%s',' %s', '%s')",
                mysqli_real_escape_string($db, $username),
                mysqli_real_escape_string($db, $gender),
                mysqli_real_escape_string($db, $color)
            );

            echo $sql;
            
            mysqli_query($db, $sql);
            
            mysqli_close($db);

            echo "<p>User Added</p>";
        }
        
    }
    ?>
        <h1>User Form</h1>
        <hr>
        <form method="post" action="">
            <div class="form-group">
                <label for="my-username">UserName:</label>
                <input id="my-username" name="username" class="form-control" type="text">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input id="password" name="password" class="form-control" type="password">
            </div>
            <div class="form-group">
                <label>Gender</label>
                <input class="form-control" value="male" name="gender" type="radio">Male<br>
                <input class="form-control" value="female" name="gender" type="radio">Female
            </div>
            <div class="form-group">
                <label for="favouriteColor">Favourite Color</label>
                <select id="favouriteColor" name="color" class="form-control">
                    <option value="#f00">Red</option>
                    <option value="#0f0">Green</option>
                    <option value="#00f">Blue</option>
                </select>
            </div>
            <div class="form-group">
                <label for="language">Spoken Language</label>
                <select id="language" name="languages[]" multiple size="3" class="form-control">
                    <option value="en">English</option>
                    <option value="fr">Frensh</option>
                    <option value="da">Danish</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Comments">Comments</label>
                <textarea id="Comments" name="comments" class="form-control" rows="6"></textarea>
            </div>

            <div class="btn-group">
                <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                <input class="form-control" type="checkbox" name="tc" value="ok">I accept the T&C</button>
            </div>
        </form>
        
    </main>

    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.min.js"></script>



</body>

</html>