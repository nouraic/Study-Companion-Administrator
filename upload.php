<html>
<body>

  <?php

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        //$target_file = $target_dir . basename($_FILES[_POST['fileToUpload']][$_POST['name']]);
        $uploadOk = 1;
        $excelFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
                header("Location: http://cs.merrimack.edu/~nouraic/Capstone/Admin.html?tab=upload&v=error"); /* Redirect browser */
                exit();
            }
            // Allow certain file formats
            if($excelFileType != "xlsx") {
                header("Location: http://cs.merrimack.edu/~nouraic/Capstone/Admin.html?tab=upload&v=xlsx");
                exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                header("Location: http://cs.merrimack.edu/~nouraic/Capstone/Admin.html?tab=upload&v=error"); /* Redirect browser */
                exit();
            } else {
            // if file upload successful
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } 
            else {      // otherwise error
                echo "Sorry, there was an error uploading your file.";
                header("Location: http://cs.merrimack.edu/~nouraic/Capstone/Admin.html?tab=upload&v=error"); /* Redirect browser */
                exit();
            }
        }
        header("Location: http://cs.merrimack.edu/~nouraic/Capstone/Admin.html?tab=upload&v=".$target_file); /* Redirect browser */
        exit();

    ?>

</body>
</html>
