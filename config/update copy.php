<?php
require_once 'db_connect.php';

if  ($_GET['id']) {
   $id = $_GET['id'];
   $sql = "SELECT * FROM Media WHERE id = {$id}";
   $result = $conn->query($sql);
   if ($result->num_rows == 1) {
       $data = $result->fetch_assoc();
       $title = $data['title'];
       $authorFirst = $data['author_first_name'];
       $authorLast = $data['author_last_name'];
       $published_at = $data['published_at'];
       $publisher_name = $data['publisher_name'];
       $picture = $data['Picture'];
   } else {
       header( "location: error.php");
   }
   $conn->close();
} else {
   header("location: error.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
       <title> Edit Product </title>
       <?php require_once  '../components/boot.php'?>
       <style type= "text/css">
           fieldset {
               margin: auto;
               margin-top: 100px;
               width: 60% ;
           }  
           .img-thumbnail{
               width: 70px !important;
                height: 70px !important;
           }    
       </style>
   </head>
   <body>
       <fieldset>
           <legend class='h2'> Update request <img class='img-thumbnail rounded-circle'  src='../pictures/<?php echo $picture ?>' alt="<?php echo $title ?>"></legend >
           <form action ="a_update.php"  method="post"  enctype="multipart/form-data">
           <table class='table'>
                    <tr>
                        <th>Book Name</th>
                        <td><input class='form-control' type="text" name="title"  placeholder="Book Name"/></td>
                    </tr>
                    <tr>
                        <th>Author First Name</th>
                        <td><input class='form-control' type="text" name= "author_first_name" placeholder="Author First Name" step="any"/></td>
                    </tr>
                    <tr>
                        <th>Author Last Name</th>
                        <td><input class='form-control' type="text" name= "author_last_name" placeholder="Author Last Name" step="any"/></td>
                    </tr>
                    <tr>
                        <th>Published at</th>
                        <td><input class='form-control' type="text" name= "published_at" placeholder="Published at" step="any"/></td>
                    </tr>
                    <tr>
                        <th>Publisher</th>
                        <td><input class='form-control' type="text" name= "publisher_name" placeholder="Publishing Company" step="any"/></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture"/></td>
                    </tr>
                    <tr>
                       <input type= "hidden"  name= "id"  value= "<?php echo $data['id'] ?>" />
                       <input type= "hidden"  name= "picture"  value= "<?php echo $data['picture'] ?>"/>
                       <td><button class ="btn btn-success" type = "submit">Save Changes</button></td>
                       <td><a href= "../index.php" ><button class ="btn btn-warning" type ="button">Back </button></a ></td>
                   </tr>
               </table>
           </form>
       </fieldset>
   </body>
</html>

