<?php
include('./DB.php');
// reprezentuoja unique_plants table

function find($id){
    $conn = connect();
    $sql = 'SELECT * from `unique_plants` where id ='.$id;
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_assoc();
}
function findType($id){
    $conn = connect();
    $sql = 'SELECT * from `plants` where id ='.$id;
    $result = $conn->query($sql);
    $conn->close();
    return $result->fetch_assoc();
}

function all(){
    $conn = connect();
    $sql = 'SELECT * from `unique_plants` where plant_id ='.$_GET['id'];
    $result = $conn->query($sql);
    $conn->close();
    return  $result;

}

function store(){
    
    $conn = connect();
    
    // $sql = 'INSERT INTO `unique_plants` (`id`, `age`, `height`, `health`, `plant_id`) 
    // VALUES (NULL, '".$_POST['age']."',  '".$_POST['height']."',  '".$_POST['health']."', '".$_POST['plant_id']."');';
     $sql = "INSERT INTO `unique_plants`(`id`, `age`, `height`, `health` , `plant_id`) 
     VALUES (NULL,'".$_POST['age']."','".$_POST['height']."','".$_POST['health']."' , '".$_GET['id']."');" ;
    $conn = connect();
       $conn -> query($sql);
    $conn->close();
}


function update(){
    $conn = connect();
    $sql ='UPDATE `unique_plants` SET `age` = "'.$_POST['age'].'", `height` = "'.$_POST['height'].'", `health` = "'.$_POST['health'].'" WHERE `unique_plants`.`id` ='.$_POST['update'];
    $conn->query($sql);
    $conn->close();
}

function destroy($id){
    $conn = connect();
    $sql = "DELETE FROM `unique_plants` WHERE id=".$id;
    $conn->query($sql);
    $conn->close();
}
?>