<html>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            select archivo to upload:
            <input type="submit" value="upload archivo" name="submit">
        </form>
    </body>
</html>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOK = 1;
$archivoFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//check if archivo file is a actual archivo or fake archivo
if(isset($_POST["submit"])){
    if ($check !== false){
        echo "File is an arichvo - " . $check["mime"]. ".";
        $uploadOK = 1;
    } else{
        echo "File is not an archivo.";
        $uploadOK = 0;
    }
}
//check if file already exists
if (file_exists($target_file)){
    echo "sorry, file already exists.";
    $uploadOK = 0;
}
//check file size
if ($_FILES["fileTOUpload"]["size"]>5000){
    echo "Sorry, your file is too large.";
    $uploadOK = 0;
}
//allow certain file formats
if($archivoFileType != "txt" && $archivoFileType != "word" && $archivoFileType != "pptx"){
    echo "Sorry, only txt, word, & pptx files are allowed.";
    $uploadOK = 0;
}
//check if $uploadOK is set to 0 by an error
if($uploadOK == 0){
    echo "sorry, your file was not uploaded.";
    //if everything is ok, try to upload file 
} else{
    if (move_uploaded_file($_FILES["fileToUpolad"]["tmp_name"], $target_file)){
        echo "the file". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). "has been uploaded."; 
    }
    else{
        echo "sorry, there was an error uploading your file.";
    }
}
?>