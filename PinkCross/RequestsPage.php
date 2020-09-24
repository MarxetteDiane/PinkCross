<?php
//open the connection
$sqlConnect = mysqli_connect("localhost","root","");
if(!$sqlConnect) {
    die();
}

// First Database (Available Blood)
$selectDB = mysqli_select_db($sqlConnect,'DB6');
if(!$selectDB) {
    die("Can't find the database!".mysqli_error());
}

$sort = "";
$query = "select * from basic";
$result_out = mysqli_query($sqlConnect,$query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sort = test_input($_POST["sort"]);
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<html>
<head>
    <title>Pink Cross</title>
    <link rel="stylesheet"href="loginstyle.css">
</head>
<body>
<div class="header">
    <form action= "RequestRegistration.php">
        <button class="btn2" style="color: black"><i class="fa fa-user-plus"></i></button>
    </form>
    <form action= "Mainpage.php">
        <button class="left" style="color: black"><i class="fa fa-arrow-left"></i></button>
    </form>
</div>
<div class="SelectedPage">
    <h3 style="margin-left: 15px">List of Blood Requests</h3>
    <i class="fa fa-search" style="margin-left: 80px"></i> <input type="search">
    <div style="float: right; margin-right: 80px;">
        <form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <select name="sort">
                <option value="all">Show All</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
            <button type="submit" name="sortButton"><i class="fa fa-sort" aria-hidden="true"></i></button></form>
    </div>
    <table class="content-table" style="margin-left:auto;margin-right:auto;">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Birth Date</th>
            <th>Contact Number</th>
            <th>Location</th>
            <th>Blood Type</th>
        </tr>
        </thead>
        <tbody>
</div>

<?php
if (isset($_POST['sortButton'])) {
    $result_out = mysqli_query($sqlConnect,"select * from basic where bloodtype = '$sort'");
}

while($VD=mysqli_fetch_array($result_out)) {
    $fname = $VD["fname"];
    $mname = $VD["mname"];
    $lname = $VD["lname"];
    $age = $VD["age"];
    $gender = $VD["gender"];
    $birthday = $VD["birthday"];
    $nmbr = $VD["nmbr"];
    $email = $VD["loc"];
    $bloodtype = $VD["bloodtype"];
    echo "<tr><td>".$fname."</td><td>".$mname."</td><td>".$lname."</td><td>".$age."</td><td>";
    echo $gender."</td><td>".$birthday."</td><td>".$nmbr."</td><td>".$email."</td><td>".$bloodtype."</td></tr>";
}
echo "</tbody></table>";

if(!$result_out) {
    die();
}
?>

</body>
</html>

<?php
mysqli_close($sqlConnect);
?>