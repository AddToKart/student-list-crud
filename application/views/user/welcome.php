<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <h1>Welcome, <?php echo $this->session->userdata('username'); ?></h1> <!-- Display the username -->

    <h2>Students List</h2>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Student Number</th>
            <th>Strand</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student->first_name; ?></td>
            <td><?php echo $student->last_name; ?></td>
            <td><?php echo $student->student_number; ?></td>
            <td><?php echo $student->strand; ?></td>
            <td>
                <a href="<?php echo site_url('HomeController/edit_student/' . $student->id); ?>" class="button">Edit</a> |
                <a href="<?php echo site_url('HomeController/delete_student/' . $student->id); ?>" class="button" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="<?php echo site_url('HomeController/add_student'); ?>" class="button">Add New Student</a>
    <br>
    <a href="<?php echo site_url('HomeController/logout'); ?>" class="button">Logout</a>
</body>
</html>
