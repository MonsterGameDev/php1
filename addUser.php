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
   

    <h1>Abonnement</h1>
    <h4>Udfyld formularen herunder og send</h4>
        <form id="contactInfo">
            <div class="form-group">
                <label for="firstname">Firstnamre</label>
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

    <script>
        $('#contactInfo').submit(function($e) {
            var data = $('#contactInfo').serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});
            
            data = JSON.stringify(data);

             $.ajax({
                url: '/api/contactinfo/contactinfoCreate.php',
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    console.log("Data: " + data.message);
                },
                error: function(e) {
                    console.log('Error:' + e.messageText)
                },
                complete: function() {
                    console.log("done");
                },
                data: data
            })

            $e.preventDefault();
        });
    </script>

</body>

</html>