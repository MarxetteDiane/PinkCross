<html>
<head>
    <title>Donor Registration</title>
    <link rel="stylesheet"href="loginstyle.css">
</head>
<body>
<div class="header">
    <form action= "DonorsPage.php">
        <button class="left" style="color: black"><i class="fa fa-arrow-left"></i></button>
    </form>
</div>
<?php

$firstName = $lastName = $middleName = "--";
$fname = $mname = $lname = $age = $gender = $birthday = $nmbr = $email = $loc = "";
$bloodtype = $weight = $ftdonor = $lbloodd = $pregnant = $tattoo = "";
$fnameE = $mnameE = $lnameE = $ageE = $nmbrE = $genderE = $birthdayE = $nmbrE = $emailE = $locE = "";
$bloodtypeE = $weightE = $ftdonorE = $lblooddE = $pregnantE = $tattooE = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnameE = "* First name is required.";
    } else {
        $fname = test_input($_POST["fname"]);
    }

    if (empty($_POST["mname"])) {
        $mnameE = "* Middle name is required.";
    } else {
        $mname = test_input($_POST["mname"]);
    }

    if (empty($_POST["lname"])) {
        $lnameE = "* Last name is required.";
    } else {
        $lname = test_input($_POST["lname"]);
    }

    if (empty($_POST["age"])) {
        $ageE = "* Age is required.";
    } else {
        $age = test_input($_POST["age"]);
    }

    if (empty($_POST["gender"])) {
        $genderE = "* Gender is required.";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["birthday"])) {
        $birthdayE = "* Birthday is required.";
    } else {
        $birthday = test_input($_POST["birthday"]);
    }

    if (empty($_POST["nmbr"])) {
        $nmbrE = "* Contact number is required.";
    } else {
        $nmbr = test_input($_POST["nmbr"]);
    }

    if (empty($_POST["email"])) {
        $emailE = "* Email is required.";
    } else {
        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["loc"])) {
        $locE = "* Address is required.";
    } else {
        $loc = test_input($_POST["loc"]);
    }

    if (empty($_POST["bloodtype"])) {
        $bloodtypeE = "* Blood type is required.";
    } else {
        $bloodtype = test_input($_POST["bloodtype"]);
    }

    if (empty($_POST["weight"])) {
        $weightE = "* Weight is required.";
    } else {
        $weight = test_input($_POST["weight"]);
    }

    if (empty($_POST["ftdonor"])) {
        $ftdonorE = "* Answer is required.";
    } else {
        $ftdonor = test_input($_POST["ftdonor"]);
    }

    if (empty($_POST["lbloodd"])) {
        $lblooddE = "* Answer is required.";
    } else {
        $lbloodd = test_input($_POST["lbloodd"]);
    }

    if (empty($_POST["pregnant"])) {
        $pregnantE = "* Answer is required.";
    } else {
        $pregnant = test_input($_POST["pregnant"]);
    }

    if (empty($_POST["tattoo"])) {
        $tattooE = "* Answer is required.";
    } else {
        $tattoo = test_input($_POST["tattoo"]);
    }
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<div class="formBox">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <h2>Donor Basic Information <br></h2>
    <table>
        <tr>
            <td>First Name <br></td>
            <td><input type="text" name="fname"/>
                <span class="error"><?php echo $fnameE;?><br></td>
        </tr>
        <tr><td>Middle Name <br></td>
            <td><input type="text" name="mname"/>
                <span class="error"><?php echo $mnameE;?><br></td></tr>
        <tr><td>Last Name<br></td>
            <td><input type="text" name="lname"/>
                <span class="error"><?php echo $lnameE;?><br></td></tr>
        <tr><td>Age<br></td>
            <td><input type="text" name="age"/>
                <span class="error"><?php echo $ageE;?><br></td></tr>
        <tr><td>Gender<br></td>
            <td><input type="radio" name="gender" value="Female">Female
                <input type="radio" name="gender" value="Male">Male
                <span class="error"><?php echo $genderE;?><br></td></tr>
        <tr><td>Birthday (MM/DD/YYYY)<br></td>
            <td><input type="date" name="birthday"/>
                <span class="error"><?php echo $birthdayE;?><br></td></tr>
        <tr><td>Contact Number<br></td>
            <td><input type="text" name="nmbr"/>
                <span class="error"><?php echo $nmbrE;?><br></td></tr>
        <tr><td>Email<br></td>
            <td><input type="text" name="email"/>
                <span class="error"><?php echo $emailE;?><br></td></tr>
        <tr><td>Address<br></td>
            <td><input type="text" name="loc"/>
                <span class="error"><?php echo $locE;?><br></td></tr>
        <tr><td>Blood Type<br></td>
            <td><select name="bloodtype">
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
            </select><span class="error"><?php echo $bloodtypeE;?><br></td></tr></table>

    <h2>Donor Medical Information <br></h2>
    <table><tr><td>Weight <br></td>
            <td><input type="number" name="weight" style="width: 70px"/> kg
                <span class="error"><?php echo $weightE;?><br></td></tr>
        <tr><td>Check which applies: <br></td></tr>
        <tr><td>First-Time Donor <br></td>
            <td><input type="radio" name="ftdonor" value="Yes">Yes
                <input type="radio" name="ftdonor" value="No">No
                <span class="error"><?php echo $ftdonorE;?><br></td></tr>
        <tr><td>Donated blood for the past 3 months<br></td>
            <td><input type="radio" name="lbloodd" value="Yes">Yes
                <input type="radio" name="lbloodd" value="No">No
                <span class="error"><?php echo $lblooddE;?><br></td></tr>
        <tr><td>Pregnant<br></td>
            <td><input type="radio" name="pregnant" value="Yes">Yes
                <input type="radio" name="pregnant" value="No">No
                <span class="error"><?php echo $pregnantE;?><br></td></tr>
        <tr><td>Had tattoo/piercing for the past 3 months <br></td>
            <td><input type="radio" name="tattoo" value="Yes">Yes
                <input type="radio" name="tattoo" value="No">No
                <span class="error"><?php echo $tattooE;?><br></td></tr>
    </table>
    <br><input type="submit"/>
</form>
</div>

<?php

$sqlConnect = mysqli_connect('localhost', 'root', '');
if(!$sqlConnect){
    die();
}

$selectDB = mysqli_select_db($sqlConnect, "DB5");
if(!$selectDB){
    die("Failed to connect to database.".mysqli_error());
}

$result_out = mysqli_query($sqlConnect,"select * from tab1 where lname = '$lname' and mname = '$mname' and fname = '$fname'");
while($VD=mysqli_fetch_array($result_out)) {
    $firstName = $VD["fname"];
    $lastName = $VD["lname"];
    $middleName = $VD["mname"];
}

if(!empty($fname) && !empty($mname) && !empty($lname) && !empty($age) && !empty($gender) && !empty($birthday) && !empty($nmbr) && !empty($email) && !empty($loc) && !empty($bloodtype) && !empty($ftdonor) && !empty($lbloodd) && !empty($pregnant) && !empty($tattoo)){
    if (($fname == $firstName) && ($lname == $lastName) and ($mname == $middleName)) {
        ?><p><span class="error3">* Name is already in database.</span></p><?php
    } else {
        $sqltab1 = "insert into tab1(fname, mname, lname, age, gender, birthday, nmbr, email, address, bloodtype)
	values('$_POST[fname]', '$_POST[mname]', '$_POST[lname]', '$_POST[age]', '$_POST[gender]', '$_POST[birthday]', '$_POST[nmbr]', '$_POST[email]', '$_POST[loc]', '$_POST[bloodtype]')";
        mysqli_query($sqlConnect, $sqltab1);

        $sqltab2 = "insert into tab2(fname, lname, bloodtype, weight, ftdonor, lbloodd, pregnant, tattoo)
	values('$_POST[fname]', '$_POST[lname]', '$_POST[bloodtype]', '$_POST[weight]', '$_POST[ftdonor]', '$_POST[lbloodd]', '$_POST[pregnant]', '$_POST[tattoo]')";
        mysqli_query($sqlConnect, $sqltab2);

        echo '<script type="text/javascript">';
        echo 'alert("Your registration is sent to Pink Cross. We will contact you for further details.");';
        echo '</script>';
        header("Location:DonorsPage.php");
    }
}

mysqli_close($sqlConnect);

?>
</body>
</html>