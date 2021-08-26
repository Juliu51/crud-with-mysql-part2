<?php 
include('./DB.php');


function all() {
    $conn = connect();
    $sql = "SELECT * FROM `plants`";
    $result = $conn -> query($sql);
    $conn->close();
       return $result;
}


function store() {
    $conn = connect();
    $sql = "INSERT INTO `plants`(`id`, `name`, `is_yearling`, `quantity`) 
    VALUES (NULL,'".$_POST['name']."','".$_POST['is_yearling']."','".$_POST['quantity']."');";
      $conn = connect();
     $conn -> query($sql);
     $conn->close();
   }

   function update() {
    $sql = "UPDATE `plants`
     SET `name`=\"".$_POST['name']."\", 
    `is_yearling`=\"".$_POST['is_yearling']."\", 
    `quantity`=\"".$_POST['quantity']."\"
        WHERE `plants`.`id` = \"".$_POST['update']."\";";
    $conn = connect();
    $conn -> query($sql);
    $conn->close();
}

   function find($id) {
    $sql = 'SELECT * FROM plants where id = "'.$id.'"';
    $conn = connect();
    $car = $conn -> query($sql);
    $conn->close();
    return (array) $car->fetch_assoc();
}

function destroy() {
    $sql = 'DELETE FROM `plants` WHERE `plants`.`id` = '.$_POST['delete'];
    $conn=connect();
    $conn->query($sql);
    // $conn-close();
}


?>






























