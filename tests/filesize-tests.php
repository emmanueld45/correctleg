<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="image">
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        print_r($_FILES['image']);
        echo $_FILES['image']['size'];
    }
    ?>

</body>

</html>