<?php 
include('connect.php');
include('head.php');
?>

<h1>Contact Manager</h1>

<a href="create.php">Create New Contact</a>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Notes</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
        // retrieving data from database
        $sql = "SELECT * FROM contacts";
        $row = $connection->prepare($sql);
        $row->execute();
        $contacts = $row->fetchAll();
        // showing the data with a loop
        foreach($contacts as $contact){
    ?>
    <tr>
        <td><?php echo $contact['id']; ?></td>
        <td><?php echo $contact['name']; ?></td>
        <td><?php echo $contact['email']; ?></td>
        <td><?php echo $contact['phone']; ?></td>
        <td><?php echo $contact['notes']; ?></td>
        <td>
            <!-- redirecting to edit page with the id as identifier -->
            <a href="edit.php?id=<?php echo $contact['id'];?>">Edit</a>
            <!-- deleting a data with id as identifier -->
            <a onclick="return confirm('Delete this contact?')" href="delete.php?id=<?php echo $contact['id'];?>">Delete</a>
        </td>
    </tr>
    <?php
        }
    ?>
    </tbody>
</table>

<?php include('foot.php') ?>