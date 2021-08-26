<?php
include('./PlantTypeContorller.php');
if(isset($_GET['plants'] )){
    header("location:./plants.php?id=".$_GET['plants']);
    die;
}
if(isset($_POST['create'])) {
    store();
    header("location:./");
    die;
}
if(isset($_GET['edit'])){
    $plant = find($_GET['edit']);
}
if(isset($_POST['update'])) {
    update();
    header("location:./");
       die;
   }
if(isset($_POST['delete'])){
    destroy();
    header("location:./");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <form action="" method="post" >
<input type="text" name="name" value="<?= (isset($plant))? $plant['name'] : "" ?>">
<input type="text" name="is_yearling" value="<?= (isset($plant))? $plant['is_yearling'] : "" ?>">
<input type="text" name="quantity" value="<?= (isset($plant))? $plant['quantity'] : "" ?>">
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
            <th>Rusis</th>
            <th>Vienmetis</th>
            <th>kiekis</th>
            <th>augalai</th>
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
        <?php foreach (all() as $plant) { ?>
            <tr>
            <td><?= $plant['id']?> </td>
            <td><?= $plant['name']?> </td>
            <td><?= $plant['is_yearling']?></td>
            <td><?= $plant['quantity']?></td>
            <td>
            <a href="?plants=<?=$plant['id']?>" class="btn btn-success">Augalai</a>
        </td>
            <td>
            <a href="?edit=<?=$plant['id']?>" class="btn btn-warning">Edit</a>
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