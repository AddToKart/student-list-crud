<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>Edit Student</h1>

        <form action="<?php echo site_url('HomeController/edit_student/' . $student->id); ?>" method="post" class="form">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $student->first_name; ?>" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $student->last_name; ?>" required>
            </div>

            <div class="form-group">
                <label for="student_number">Student Number:</label>
                <input type="text" id="student_number" name="student_number" value="<?php echo $student->student_number; ?>" required>
            </div>

            <div class="form-group">
                <label for="strand">Strand:</label>
                <input type="text" id="strand" name="strand" value="<?php echo $student->strand; ?>" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Update Student" class="button">
            </div>
        </form>

        <br>
        <a href="<?php echo site_url('HomeController/welcome'); ?>" class="button">Back to Welcome</a>
    </div>
</body>
</html>
