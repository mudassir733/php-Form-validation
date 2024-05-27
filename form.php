<?php
// Variables
$firstNameErr = $lastNameErr = $emailErr = $passwordErr = $websiteErr = $commentErr = $cityErr = $countaryErr = $zipErr = "";
$firstName = $lastName = $email = $password = $website = $comment = $city = $countary = $zip = "";




// Error handling variables
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["firstName"])) {
        $firstNameErr = "First Name is Required!";
    } else {
        $firstName = test_input($_POST["firstName"]);
    }
    if (empty($_POST["lastName"])) {
        $lastNameErr = "";
    } else {
        $lastName = test_input(($_POST["lastName"]));
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email is Required!";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["password"])) {
        $passwordErr = "Password is Required!";
    } else {
        $password = test_input($_POST["password"]);
    }
    if (empty($_POST["website"])) {
        $websiteErr = "";
    } else {
        $website = test_input($_POST["website"]);
    }

    if (empty($_POST["comment"])) {
        $commentErr = "";
    } else {
        $comment = test_input($_POST["comment"]);
    }
    if (empty($_POST["city"])) {
        $cityErr = "City is Required!";
    } else {
        $city = test_input($_POST["city"]);
    }
    if (empty($_POST["countary"])) {
        $countaryErr = "Countary is Required!";
    } else {
        $countary = test_input($_POST["countary"]);
    }
    if (empty($_POST["zip"])) {
        $zipErr = "Zip is Required!";
    } else {
        $zip = test_input($_POST["zip"]);
    }

}



// Check if the HTTP request method is "POST"
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Retrieve the values of the form fields and assign them to the corresponding PHP variables
//     $firstName = test_input($_POST["firstName"]);
//     $lastName = test_input($_POST["lastName"]);
//     $email = test_input($_POST["email"]);
//     $password = test_input($_POST["password"]);
//     $website = test_input($_POST["website"]);
//     $comment = test_input($_POST["comment"]);
//     $city = test_input($_POST["city"]);
//     $countary = test_input($_POST["countary"]);
//     $zip = test_input($_POST["zip"]);
// }

// function for reusing 
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="main_section">
        <div class="container">
            <form class="row g-3" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="col-md-6">
                    <label for="inputFirstName4" class="form-label">First Name</label>
                    <span class="error_message"><?php echo $firstNameErr ?></span>
                    <input type="text" class="form-control" id="inputFirstName4" name="firstName">

                </div>
                <div class="col-md-6">
                    <label for="inputLastName4" class="form-label">Last Name</label>
                    <span class="error_message"><?php echo $lastNameErr ?></span>
                    <input type="text" class="form-control" id="inputLastName4" name="lastName">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <span class="error_message"><?php echo $emailErr ?></span>
                    <input type="email" class="form-control" id="inputEmail4" name="email">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <span class="error_message"><?php echo $passwordErr ?></span>
                    <input type="password" class="form-control" id="inputPassword4" name="password">
                </div>
                <div class="col-12">
                    <label for="inputWebsite" class="form-label">Website</label>
                    <span class="error_message"><?php echo $websiteErr ?></span>
                    <input type="text" class="form-control" id="inputWebsite" placeholder="https://" name="website">
                </div>
                <div class="col-12 d-flex" style="flex-direction: column;">
                    <label for="comment" class="form-label">Comment</label>
                    <span class="error_message"><?php echo $commentErr ?></span>
                    <textarea class="form-control" name="comment" id="comment" cols="40" rows="6"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <span class="error_message"><?php echo $cityErr ?></span>
                    <input type="text" class="form-control" id="inputCity" name="city">
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <span class="error_message"><?php echo $countaryErr ?></span>
                    <select id="inputState" class="form-select" name="countary">
                        <option selected>Choose...</option>
                        <option>Pakistan</option>
                        <option>Hindustan</option>
                        <option>USA</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <span class="error_message"><?php echo $zipErr ?></span>
                    <input type="text" class="form-control" id="inputZip" name="zip">
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="submit" class="btn btn-primary"></input>
                </div>
            </form>
        </div>


    </section>
    <div class="out_put text-center">
        <h1>Here is the out put</h1>
        <?php
        echo $firstName;
        echo " ";
        echo $lastName;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $password;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $city;
        echo "<br>";
        echo $countary;
        echo "<br>";
        echo $zip;

        ?>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>