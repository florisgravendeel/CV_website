<?php //echo $_GET["projectname"]; ?> <br>
<?php //echo $_GET["description_short"]; ?>
<?php
if(isset($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "assets/img/" . $file_name);
        echo "Success";
    } else {
        print_r($errors);
    }
}
?>
<html>
<body>

<form action="" method="POST" enctype="multipart/form-data">
    <div>
        <label class="form-group" for="formUploadProject7">Logo:</label>
        <div class="custom-file">
            <input type="file" NAME="image" class="custom-file-input" id="formUploadProject8" required>
            <label class="custom-file-label" for="formUploadProject8">Upload het logo van je project!</label>
            <input type="submit"/>
        </div>
    </div>
</form>

</body>
</html>