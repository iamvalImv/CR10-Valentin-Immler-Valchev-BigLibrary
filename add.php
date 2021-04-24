<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('templates/header.php') ?>
        <?php require_once 'components/boot.php'?>
        <title>PHP CRUD  |  Add A Book</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }
            body, html {
            height: 100%;
}
</style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Add A Book</legend>
            <form action="config/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="title" placeholder="Book Name"/></td>
                    </tr>    
                    <tr>
                        <th>Author First Name</th>
                        <td><input class='form-control' type="text" name="author_first_name" placeholder="Author First Name" step="any"/></td>
                    </tr>
                    <tr>
                        <th>Author Last Name</th>
                        <td><input class='form-control' type="text" name="author_last_name" placeholder="Author Last Name" step="any"/></td>
                    </tr>
                    <tr>
                        <th>Publisher</th>
                        <td><input class='form-control' type="text" name="publisher_name" placeholder="Publishing Company" step="any"/></td>
                    </tr>
                    <tr>
                        <th>Published</th>
                        <td><input class='form-control' type="text" name="published_at" placeholder="Published Date" step="any"/></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture"/></td>
                    </tr>
                    <tr>
                        <td><button class='btn btn-success' type="submit">Submit</button></td>
                        <td><a href="index.php"><button class='btn btn-warning' type="button">Home</button></a></td>
                    </tr>
                </table>
            </form>
        </fieldset>
        <?php include('templates/footer.php') ?>
    </body>
</html>



