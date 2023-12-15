<?php
// Define variables and initialize with empty values
$username = $password = $repeatPassword = $firstName = $lastName = $address1 = $address2 = $city = $state = $zipCode = $phoneNumber = $email = $gender = $maritalStatus = $dob = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form submitted!";
    // Validate Username
    if (empty($_POST["Username"])) {
        $errors["Username"] = "Username is required";
    } else {
        $username = test_input($_POST["Username"]);
        // Perform additional username validation if needed
    }

    // Validate Password
    if (empty($_POST["Password"])) {
        $errors["Password"] = "Password is required";
    } else {
        $password = test_input($_POST["Password"]);
        // Perform additional password validation if needed
    }

    // Validate Repeat Password
    if (empty($_POST["Repeat_Password"]) || $_POST["Repeat_Password"] !== $_POST["Password"]) {
        $errors["Repeat_Password"] = "Passwords must match";
    } else {
        $repeatPassword = test_input($_POST["Repeat_Password"]);
    }

    // Validate First Name
    if (empty($_POST["First_Name"])) {
        $errors["First_Name"] = "First Name is required";
    } else {
        $firstName = test_input($_POST["First_Name"]);
        // Perform additional validation if needed
    }

    // Validate Last Name
    if (empty($_POST["Last_Name"])) {
        $errors["Last_Name"] = "Last Name is required";
    } else {
        $lastName = test_input($_POST["Last_Name"]);
        // Perform additional validation if needed
    }

    // Validate Address
    if (empty($_POST["Address1"])) {
        $errors["Address1"] = "Address is required";
    } else {
        $address1 = test_input($_POST["Address1"]);
        // Perform additional validation if needed
    }

    // Validate City
    if (empty($_POST["City"])) {
        $errors["City"] = "City is required";
    } else {
        $city = test_input($_POST["City"]);
        // Perform additional validation if needed
    }

    // Validate State
    if ($_POST["state"] == "na") {
        $errors["State"] = "Please select a State";
    } else {
        $state = test_input($_POST["state"]);
    }

    // Validate Zip Code
    if (empty($_POST["Zip_Code"]) || !preg_match("/^\d{5}(-\d{4})?$/", $_POST["Zip_Code"])) {
        $errors["Zip_Code"] = "Zipcode must be a valid format (e.g., 12345 or 12345-6789)";
    } else {
        $zipCode = test_input($_POST["Zip_Code"]);
    }

    // Validate Phone Number
    if (empty($_POST["Phone_Number"]) || !preg_match("/^\d{10}$/", $_POST["Phone_Number"])) {
        $errors["Phone_Number"] = "Phone Number must be 10 digits with no punctuation";
    } else {
        $phoneNumber = test_input($_POST["Phone_Number"]);
    }

    // Validate Email
    if (empty($_POST["Email"]) || !filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
        $errors["Email"] = "Please enter a valid Email address";
    } else {
        $email = test_input($_POST["Email"]);
    }

    // Validate Gender
    if (empty($_POST["Gender"])) {
        $errors["Gender"] = "Please select a Gender";
    } else {
        $gender = test_input($_POST["Gender"]);
    }

    // Validate Marital Status
    if (empty($_POST["Marital_Status"])) {
        $errors["Marital_Status"] = "Please select Marital Status";
    } else {
        $maritalStatus = test_input($_POST["Marital_Status"]);
    }

    // Validate Date of Birth
    if (empty($_POST["DOB"])) {
        $errors["DOB"] = "Please enter your date of birth";
    } else {
        $dob = test_input($_POST["DOB"]);
    }

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drifters of Forza Registration</title>
  <meta name="description" content="Adam is making a website, WooHoo!">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="css/normalize.css"> -->
  <link rel="stylesheet" href="css/main.css">
  <meta name="theme-color" content="#faaafa">
 <!-- <script src="js/validation.js" defer></script> -->
</head>
<body>
<div id="container">
  <header>
    <h1>Drifters of Forza</h1>
    <h2>Registration</h2>
  </header>

  <div class="maincontainer">

    <nav>
      <p>Page Navigation</p>
      <a href="index.html">Home</a>
      <a href="registration.php">Registration</a>
      <a href="Animations.html">Animations</a>
    </nav>


    <main>
      <div class="container">
      <p>Fill out to become a Drifter of Forza!</p>
<!-- see page 73 in the book for best practices -->
          <?php if (!empty($errors)): ?>
              <div class="error-container">
                  <p>Please fix the following errors:</p>
                  <ul>
                      <?php foreach ($errors as $error): ?>
                          <li><?php echo $error; ?></li>
                      <?php endforeach; ?>
                  </ul>
              </div>
          <?php endif; ?>
      <form id="theForm" action="/registration.php" method="POST">
        <label for="Username">Username:
          <input type="text" id="Username" name="Username" placeholder="Username Here"></label>
          <label class="e" id="U"> Username must be between 6 and 50 characters  </label>
          <br>

        <label for="Password">Password:
        <input type="password" id=Password name="Password" placeholder="Password Here"></label>
        <label class="e" id="P"> Password must be between 8 and 50 characters  </label>

        <br>

        <label for="Repeat_Password">Repeat Password:
        <input type="password" id=Repeat_Password name="Repeat Password" placeholder="Password Again Here"></label>
        <label class="e" id="PR"> Passwords must match                          </label>
        <br>

        <label for="First_Name">First Name:
        <input type="text" id=First_Name name="First Name" placeholder="First Name Here"></label>
        <label class="e" id="FN"> First Name Required. Must be between less than 50 characters</label>
        <br>

        <label for="Last_Name">Last Name:
        <input type="text" id=Last_Name name="Last Name" placeholder="Last Name Here"></label>
        <label class="e" id="LN"> Last Name Required. Must be less than 50 characters </label>
        <br>

        <label for="Address1">Address:
        <input type="text" id=Address1 name="Address1" placeholder="Address Line 1 Here"></label>
        <label class="e" id="A"> Address Required. Must be less than 100 characters  </label>
        <br>

        <label for="Address2">
        <input type="text" id=Address2 name="Address2" placeholder="Address Line 2 Here"></label>
        <label class="e" id="A2"> Must be less than 100 characters                     </label>
        <br>

        <label for="City">City:
        <input type="text" id=City name="City" placeholder="City Name Here"></label>
        <label class="e" id="C"> City Name Required. Must be less than 50 characters </label>
        <br>

        <label for="State">State:
        <select name="state" id="State">
          <option value="na" selected="selected">Select a State</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District Of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </select></label>
        <label class="e" id="S"> State Name Required </label>

        <br>

        <label for="Zip_Code">Zip Code:
        <input type="text" id=Zip_Code name="Zip Code" placeholder="Zip Code Here"></label>
        <label class="e" id="Z"> Zipcode must be between 5 and 9 numbers</label>
        <br>

        <label for="Phone_Number">Phone Number:
        <input type="text" id=Phone_Number name="Phone Number" placeholder="Phone Number Here"></label>
        <label class="e" id="PN"> Phone Number must 10 digits with no punctuation.       </label>
        <br>


        <label for="Email">Email:
        <input type="text" id=Email name="Email" placeholder="Email Here"></label>
        <label class="e" id="E"> Please enter a valid Email address</label>
        <br>

                <label>Gender:
                <input type="radio" id=male name="Gender">male
                <input type="radio" id=female name="Gender">female
                <input type="radio" id=other name="Gender" >other</label>
        <label class="e" id="G"> Please select one      </label>
                <br>

                <label>Marital Status:
                <input type="radio" id=single name="Marital Status"><label for="single">Single</label>
                <input type="radio" id=married name="Marital Status"><label for="married">Married</label></label>
        <label class="e" id="M"> Please select one </label>
                <br>


        <label for="DOB">Date of Birth:
        <input type="date" id=DOB name="DOB" placeholder="Calendar popup Here"></label>
        <label class="e" id="D"> Please enter your date of birth  </label>
        <br>

        <button type="submit" id="submitButton">Submit</button> <button type="reset">Clear</button>

      </form>
    </div>
    </main>

  </div>

  <footer>
    <p>External Links</p>
    <a href="https://forza.net/" target = "blank">Forza Homepage</a>
    <a href="https://www.youtube.com/@formuladrift" target = "blank">Formula Drift's YouTube Page</a>
  </footer>

</div>
</body>
</html>
