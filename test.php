<?php
/**
 * Created by PhpStorm.
 * User: yenhtt
 * Date: 9/21/2017
 * Time: 9:20 AM
 */

$var = '20/04/2012';
echo $var;
$date = str_replace('/', '-', $var);
var_dump( date('Y-m-d', strtotime($date)));

$time = strtotime("2011/05/21");

// (2) getDate() returns an associative array containing the date
// information of the timestamp, or the current local time if
// no timestamp is given
$date = getDate($time);

var_dump($date);

include "connect.php";




if (isset($_GET["reg"])) {
    $bday = $_GET["bdate"];
    $date = str_replace('/', '-', $bday);
    $rdate =  date('Y-m-d', strtotime($date));

    $signup = date_create();
    $signup = date_format($signup, "d/m/Y");
    $signup = str_replace('/', '-', $signup);
    $signup =  date('Y-m-d', strtotime($signup));

    $query = "INSERT INTO `users`(`birthday`, `signup_date`) 
	                  VALUES ('$rdate','$signup')";
    $conn->query($query);

    $query_user = "select user_name,email from users";
    $res_user = $conn->query($query_user);
    while ($row = $res_user->fetch_assoc()) {

            echo $row["user_name"];

    }
}
?>
<html>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET" >
    <input type="text" name="bdate">
    <input type="submit" name="reg" value="submit">
</form>
</html>
