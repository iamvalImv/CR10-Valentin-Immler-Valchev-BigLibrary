<?php 
require_once 'config/db_connect.php';
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Media WHERE id = {$id}" ;
    $result = $conn->query($sql);
    $data = $result->fetch_assoc();

    if ($data != null) {
        $name = $data['title'];
        $authorFirst = $data['author_first_name'];
        $authorLast = $data['author_last_name'];
        $published_at = $data['published_at'];
        $publisher_name = $data['publisher_name'];
        // $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    $conn->close();
} else {
    header("location: error.php");
}  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Product</title>
        <?php require_once 'components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 70% ;
            }     
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }    
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2 mb-3'>Delete request <img class='img-thumbnail rounded-circle' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>"></legend>
            <h5>You have selected the data below:</h5>
            <table class="table w-75 mt-3">
                <tr>
                <td>Name</td>
                    <td><?php echo $name?></td>
                </tr>
                <tr>
                <td>Author First Name</td>
                    <td><?php echo $authorFirst?></td>
                </tr>
                <tr>
                <td>Author Last Name</td>
                    <td><?php echo $authorLast?></td>
                </tr>
                <tr>
                <td>Published at</td>
                    <td><?php echo $published_at?></td>
                </tr>
                <tr>
                <td>Publisher name</td>
                    <td><?php echo $publisher_name?></td>
                </tr>
            </table>

            <h3 class="mb-4">Do you really want to delete this product?</h3>
            <form action ="config/a_delete.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                <button class="btn btn-danger" type="submit">Yes, delete it!</button>
                <a href="index.php"><button class="btn btn-warning" type="button">No, go back!</button></a>
            </form>
        </fieldset>
    </body>
</html>