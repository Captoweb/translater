<style>
    body{background: #ccc; padding: 30px; font-size: 18px}
    td{border-bottom: 1px solid black; padding: 5px}
</style>
<?php
error_reporting(0); // чтоб не вылазили в инпуте ошибки

$pdo = new PDO("mysql:host=localhost;dbname=test;charset=utf8", "root","");

$number = ($_POST['id']);

$sql = "SELECT * FROM words where id = $number";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$all = $stmt->fetchAll();


if(isset($_POST['submit'])) {
//получить id текущий и прибавить к нему 1
 $number = ($_POST['id']);
  $number++; 
}

$sql = "SELECT * FROM words where id = $number";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$all = $stmt->fetchAll();

?>

<br>
<h3>table</h3>
<table>
<tr>
	<td>id</td>
	<td>eng</td>
	<td>rus</td>
	<td>pic</td>
</tr>
<?php foreach($all as $w):?>
<tr>
	<td><?= $w['id'];?></td>
	<td><?= $w['english'];?></td>
	<td><?= $w['russian'];?></td>
	<td><?= $w['picture'];?></td>
</tr>
<?php endforeach;?>
</table>
<br>

<form action="index.php" method="post">
	<input type="text" value="<?= $w['id'];?>" name="id" class="hidden">
	<input type="submit" name="submit" value="submit">
	<br>
</form>

    