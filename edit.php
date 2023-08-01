<?php 
include('connect.php');
include('head.php');

// if form is not empty
if(!empty($_POST)){
    // retrieving data from form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $notes = $_POST['notes'];
        
    // validating the data is not empty
    $valid = true;
    if (!$name) {
        echo '<script> alert("Please enter valid name"); </script>';
        $valid = false;
    }
    if (!$email) {
        echo '<script> alert("Please enter valid email"); </script>';
        $valid = false;
    }

    // if valid, edit the data based on id
    if ($valid) {
        $sql = 'UPDATE contacts SET name=?, email=?, phone=?, notes=? WHERE id=?';
        $row = $connection->prepare($sql);
        $row->execute([$name, $email, $phone, $notes, $id]);
        
        // redirect to index
        echo '<script> alert("Contact edited"); window.location="index.php" </script>';
    }
}

// retrieving the data by id
$id_get = $_GET['id'];
$sql = "SELECT * FROM contacts WHERE id=?";
$row = $connection->prepare($sql);
$row->execute([$id_get]);
$contact = $row->fetch();

?>

<h1>Edit Contact - <?php echo $contact['name'];?></h1>

<!-- the form is prefilled with the data retrieved -->
<form action="edit.php?id=<?php echo $contact['id'];?>" method="post">
    <input type="hidden" name="id" id="id" value="<?php echo $contact['id'];?>">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="John Doe" id="name" value="<?php echo $contact['name'];?>"> <br>
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="johndoe@email.com" id="email" value="<?php echo $contact['email'];?>"> <br>
    <label for="phone">Phone</label>
    <input type="tel" name="phone" placeholder="928174823" id="phone" value="<?php echo $contact['phone'];?>"> <br>
    <label for="notes">Notes</label>
    <input type="text" name="notes" placeholder="My Friend" id="notes" value="<?php echo $contact['notes'];?>"> <br>
    <input type="submit" value="Update">
</form>

<?php include('foot.php') ?>