<?php

function getPost()
{
    if(!empty($_POST))
    {
        // when using application/x-www-form-urlencoded or multipart/form-data as the HTTP Content-Type in the request
        return $_POST;
    }
    // when using application/json as the HTTP Content-Type in the request 
    $post = json_decode(file_get_contents('php://input'), true);
    if(json_last_error() == JSON_ERROR_NONE)
    {
        return $post;
    }
    return [];
}

$post = getPost();
$operation = $post['operation'];
$result = $post['result'];

$link = mysqli_connect('localhost:3306', 'prakash', 'prakash', 'xelp_project');
//if connection is not successful you will see text error
if (!$link) {
    die('Could not connect: ');
}
//if connection is successfully you will see message below
$q = mysqli_query ($link, 'insert into calcOperations values ("'.$operation.'","'.$result.'")');

header("Content-Type: application/json; charset=UTF-8");
echo json_encode('insert:"success"');
mysqli_close($link);

?>

