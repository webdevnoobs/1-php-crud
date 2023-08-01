<?php
include('connect.php');
// retrieving the data to be deleted by id
$id = $_GET['id'];
// deleting the data
$sql = "DELETE FROM contacts WHERE id= ?";
$row = $connection->prepare($sql);
$row->execute([$id]);

// redirect to index
echo '<script> alert("Contact deleted"); window.location="index.php" </script>';
?>