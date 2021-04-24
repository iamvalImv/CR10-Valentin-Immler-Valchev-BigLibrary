<?php
require_once 'db_connect.php';
require_once  'file_upload.php';

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

if ($_POST) {  
    $title = $_POST['title'];
    $authorFirst = $_POST['author_first_name'];
    $authorLast = $_POST['author_last_name'];
    $published_at = $_POST['published_at'];
    $publisher_name = $_POST['publisher_name'];
   $uploadError = '';
//    this function exists in the service file upload.
   $picture = $_FILES['picture']['name'];  
 
    $sql = "INSERT INTO Media (title, author_first_name, author_last_name, published_at, publisher_name, Picture)
    VALUES ('$title', '$authorFirst', '$authorLast', NOW(), '$publisher_name', '$picture');";

    if ($conn->query($sql) === true) {
       $class = "success";
       $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $title </td>
            <td> $authorFirst </td>
            <td> $authorLast </td>
            <td> $published_at </td>
            <td> $publisher_name </td>
            <td> $picture </td>
            </tr></table><hr>";
   } else {
       $class = "danger";
       $message = "Error while creating record. Try again: <br>" . $conn->error;
       $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
   }
   $conn->close();
} else {
   header("location: ../error.php");
}
?>
<!DOCTYPE html>
<html lang= "en">
   <head>
       <meta charset="UTF-8">
       <title>Update</title>
       <?php require_once '../components/boot.php' ?>
   </head>
   <body>
       <div class="container">
           <div class="mt-3 mb-3" >
               <h1>Create request response</h1>
           </div>
            <div class="alert alert-<?=$class;?>" role="alert">
               <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary"  type='button'>Home</button></a>
           </div>
       </div>
   </body>
</html>