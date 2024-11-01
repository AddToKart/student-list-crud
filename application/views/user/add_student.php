<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>
<body>
    <div class="container">
        <h1>Add Student</h1>

        <?php if (isset($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="<?php echo site_url('HomeController/add_student'); ?>" method="post" class="form">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>

            <div class="form-group">
                <label for="student_number">Student Number:</label>
                <input type="text" id="student_number" name="student_number" required>
            </div>

            <div class="form-group">
                <label for="strand">Strand:</label>
                <input type="text" id="strand" name="strand" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Add Student" class="button">
            </div>
        </form>

        <br>
        <a href="<?php echo site_url('HomeController/welcome'); ?>" class="button">Back to Welcome</a>
    </div>
</body>
</html>
