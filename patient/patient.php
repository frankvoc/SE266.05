<?php
  include __DIR__ . '/model/model_patient.php';
  include __DIR__ . '/functions.php';
//checks if the request is a "POST" so it confirms we have a submitted form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //then retrieves the form data
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $married = $_POST["married"];
    $birthDate = $_POST["birthDate"];   
    $height = floatval($_POST["height"]);
    $weight = floatval($_POST["weight"]);

    //validation array to collect errors
    $errors = array();
    //validation checks for every field, if validation fails an error message is added to error array
    if (empty($firstName)) {
        $errors[] = "First name cannot be empty.";
    }

    if (empty($lastName)) {
        $errors[] = "Last name cannot be empty.";
    }

    if (empty($married)) {
        $errors[] = "Married Status cannot be empty.";
    }

    if (!strtotime($birthDate)) {
        $errors[] = "Invalid birth date. Cannot be empty";
    }

    if ($height <= 0 || $height > 300) {
        $errors[] = "Please enter a valid height in centimeters. Cannot be empty.";
    }

    if ($weight <= 0 || $weight > 500) {
        $errors[] = "Please enter a valid weight in kilograms. Cannot be empty.";
    }

    if (empty($errors)) {
        //age and BMI check
        $today = new DateTime();//$today is created as a DateTime Obj
        $birthDateC = new DateTime($birthDate); //$birthDateObj is also created as a DateTime obj
        $age = $today->diff($birthDateC)->y; //"diff" method is used to calculate the difference bewteen current date and birthdate,then $age is created and uses value from the DateTime obj
        $bmi = number_format($weight / (($height / 100) ** 2), 1);//BMI calculation

        //determine BMI based on "helpful information" in canvas
        if ($bmi < 18.5) {
            $classification = "Underweight";
        } elseif ($bmi < 24.9) {
            $classification = "Normal Weight";
        } elseif ($bmi < 29.9) {
            $classification = "Overweight";
        } else {
            $classification = "Obese";
        }

        //if we get here with no errors, then we move to confirm.php where we display the results
        include("confirm.php"); // Create a confirmation page
    } else {
        //if any errors are added to the error array, then we display them here before moving to confirm
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
