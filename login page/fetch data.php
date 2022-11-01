<?php
$servername="localhost";
$username="root";
$password="";
$database="db_school";

$conn=new mysqli($servername,$username,$password,$database);

if($conn->connect_error){
    die("Connection error :".$conn->connect_error);
}

$tb_student=array();

$sqlQry="SELECT * FROM tb_student;";

$stmt=$conn->prepare($sqlQry);

$stmt->execute();

$stmt->bind_result($username,$password);

while($stmt->fetch()){
    $temp=[
        'username'=>$username,
        'password'=>$password,
    ];

    array_push($tb_student, $temp);
}
echo json_encode($tb_student);
?>
