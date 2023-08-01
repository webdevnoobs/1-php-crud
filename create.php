<?php 
include('connect.php');
include('head.php');

// if form is not empty
if(!empty($_POST)){
    // retrieving data from form
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
    
    // if valid, add the data
    if ($valid) {
        $sql = 'INSERT INTO contacts (name,email,phone,notes) VALUES (?,?,?,?)';
        $row = $connection->prepare($sql);
        $row->execute([$name, $email, $phone, $notes]);

        // redirect to index
        echo '<script> alert("Contact added"); window.location="index.php" </script>';
    }
}

?>

<h1>Add Contact</h1>

<!-- after form is submitted, will be redirected to the same page and the code at the top will be executed 
resulting in data added and redirected to index page -->
<form action="create.php" method="post">
    <label for="name">Name</label>
    <input type="text" name="name" placeholder="John Doe" id="name" require> <br>
    <!-- by choosing email type, a simple validation will be made by html to check if the input is in email format -->
    <label for="email">Email</label>
    <input type="email" name="email" placeholder="johndoe@email.com" id="email" require> <br>
    <label for="phone">Phone</label>
    <input type="tel" name="phone" placeholder="928174823" id="phone"> <br>
    <label for="notes">Notes</label>
    <input type="text" name="notes" placeholder="My Friend" id="notes"> <br>
    <input type="submit" value="Create">
</form>

<?php include('foot.php') ?>