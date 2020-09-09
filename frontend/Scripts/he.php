<?php
//Get values passed from loginpage form
$userId = $_POST['user'];
$password = $_POST['password'];

//To prevent sql injection
$userId = stripslashes($userId);
$password = stripslashes($password);
$userId = mysql_real_escape_string($userId);
$password = mysql_real_escape_string($password);

mysql_connect("localhost", "prakash", "prakash");
mysql_db_name("xelp_project");

$result = mysql_query('select * from users where userId = "prakash" or email="as" and password = "pcpc";') or die("Failed operation".mysql_error());

$row = mysql_fetch_array($result);

$loginStatus->success = false;

if($row['userId'] == $userId && $row['password'] == $password){
    $loginStatus->success = true;
}
return json_encode($loginStatus);
?>


<?php
require_once __DIR__ . '/connection.php';

class API {
    function Select(){
        $db = new Connect;
        $users = array();
        $data = $db->prepare('select * from users');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $users[0] = array(
                'userId' => $OutputData['userId'],
                'name' => $OutputData['name']
            );
        }
        return json_encode($users);
    }
}

$API = new API;
header('Content-Typr: application/json');
echo $API->Select();
?>



<?php
$link = mysqli_connect('localhost:3306', 'prakash', 'prakash', 'sachin');
//if connection is not successful you will see text error
if (!$link) {
       die('Could not connect: ');
}
//if connection is successfully you will see message below
echo 'Connected successfully';
echo "<br>"; $q = mysqli_query ($link, "SELECT DISTINCT `alert_group` FROM `call_processed`;");
 if (mysqli_num_rows($q) > 0)
 { // output data of each row
    while($row = mysqli_fetch_assoc($q))
    {
    echo "<option value = ".$row["alert_group"].">";
    echo $row["alert_group"];
    echo "</option>";
    }
  }
  else
  {
     echo "0 results";
  }
    mysqli_close($link);
?>






<!-- 



<?php
require_once __DIR__ . '/connection.php';

class API {
    function Login($userId, $password){
        $db = new Connect;
        $users = array();        
        $data = $db->prepare('select * from users where userId = "'.$userId.'" or email = "'.$userId.'" and password = "'.$password.'";');
        $data->execute();
        while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
            $users[0] = array(
                'userId' => $OutputData['userId'],
                'name' => $OutputData['name']
            );
        }
        return json_encode($users);
    }
}

$userId = $_POST['userId'];
$password = $_POST['password'];

$API = new API;
header('Content-Typr: application/json');
echo $API->Login($userId, $password);
?>
 -->


 <?php
// require_once __DIR__ . '/connection.php';

// class API {
//     function Login($userId, $password){
//         $db = new Connect;
//         $users = array();        
//         $data = $db->prepare('select * from users where (userId = "'.$userId.'" or email = "'.$userId.'") and password = "'.$password.'";');
//         $data->execute();
//         while($OutputData = $data->fetch(PDO::FETCH_ASSOC)){
//             $users[0] = array(
//                 'userId' => $OutputData['userId'],
//                 'name' => $OutputData['name']
//             );
//         }
//         return json_encode($users);
//     }
// }

// $userId = $_POST['userId'];
// $password = $_POST['password'];
// $API = new API;
// header('Content-Typr: application/json');
// echo $API->Login($userId, $password);
?>
