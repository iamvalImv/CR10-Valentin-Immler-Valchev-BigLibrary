<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

// Initializing the result outside the if statement

if ($_POST) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $authorFirst = $_POST['author_first_name'];
    $authorLast = $_POST['author_last_name'];
    $published_at = $_POST['published_at'];
    $publisher_name = $_POST['publisher_name'];
    // $picture = $_POST['Picture'];
    // //variable for upload pictures errors is initialized

    // $picture = file_upload($_FILES['Picture']);//file_upload() called  
    // if($picture->error===0){
    //     ($_POST["picture"]=="product.png")?: unlink("../pictures/$_POST[picture]");           
    //     $sql = "UPDATE Media SET name = '$title', author_first_name = '$authorFirst', author_last_name= '$authorLast', published_at='$published_at', publisher_name='$publisher_name',  picture = '$Picture->fileName' WHERE id = {$id}";
    // }else{
    //     $sql = "UPDATE Media SET name = 
    //     '$title', author_first_name = '$authorFirst' , author_last_name= '$authorLast', published_at='$published_at', publisher_name='$publisher_name',  picture = '$Picture->fileName' 
    //     WHERE id = {$id}";
    // }    
    $sql = "
    UPDATE Media
    SET
        title='$title',
        author_first_name='$authorFirst',
        author_last_name='$authorLast',
        published_at=NOW(),
        publisher_name='$publisher_name'
    WHERE id={$id};";
    if ($conn->query($sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        // $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . $conn->error;
        // $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    }
    $conn->close();    
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
        <?php require_once '../components/boot.php'?> 
    </head>
    <body>
    <p></p>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>