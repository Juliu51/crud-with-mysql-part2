<?php
include('./UniquePlantController.php');

$plantType = findType($_GET['id']);


if(isset($_POST['create'] )){
    store();
    header("location:./plants.php?id=".$_GET['id']);
    die;
}

if(isset($_POST['update'] )){
    update();
    header("location:./plants.php?id=".$_GET['id']);
    die;
}

if(isset($_POST['delete'] )){
    destroy($_POST['delete']);
    header("location:./plants.php?id=".$_GET['id']);
    die; 
}

$action = 'create';

if(isset($_GET['edit'] )){
        $plant = find($_GET['edit']);
        $action = 'update';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<a href="./index.php" class="nav">HOME</a>
<span><?= $plantType['name']  ?></span>
<span><?= $plantType['is_yearling']  ?></span>
<span><?= $plantType['quantity']  ?></span>
<form action="" method="post" >
<input type="text" placeholder="amzius" name="age" value="<?= (isset($plant))? $plant['age'] : "" ?>">
<input type="text" placeholder="aukstis" name="height" value="<?= (isset($plant))? $plant['height'] : "" ?>">
<input type="text" placeholder="sveikata" name="health" value="<?= (isset($plant))? $plant['health'] : "" ?>">
<?php 
if(isset($plant)){
    echo '<button type="submit" name="update" value="'.$plant['id'].'" class="btn btn-dark"> Pakeist </button>';
} else {
    echo '<button type="submit" name="create"  class="btn btn-dark"> Ivesti </button>';
} ?>
    </form>
    <table class="table">
   
        <tr>
            <th>ID</th>
            <th>amzius</th>
            <th>aukstis</th>
            <th>sveikata 0-100%</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php foreach (all() as $plant) { ?>
            <tr>
            <td><?= $plant['id'] ?> </td>
            <td><?= $plant['age'] ?> </td>
            <td><?= $plant['height'] ?> </td>
            <td><?= $plant['health'] ?></td>
            <td>
            <a href="?id=<?=$_GET['id']?>&edit=<?= $plant['id']?>" class="btn btn-warning">Edit</a>
        </td>
        <td>
            <form action="" method="post">
            <button class="btn btn-danger" type="submit" name="delete" value="<?=$plant['id']?>">Delete</button>
            </form>
        </td>
        </tr>
        <?php }?>
</body>
</html>