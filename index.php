<?php
require_once 'components/boot.php';
require_once 'config/db_connect.php';


//Write query for all media
   $sql = 'SELECT * FROM Media';
 
   //make query && get results
   $result = mysqli_query($conn,$sql);
    
$tbody=''; //this variable will hold the body for the table
if(mysqli_num_rows($result)>0) {   
    //  row with the help og mysqli_fetch_array($result, MYSQLI_ASSOC) turns the object from result into Associative array 
   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){        
       $tbody .= "<tr>
                   <td>".$row['title']."</td>
                   <td>".$row['author_first_name'].' '.$row['author_last_name']."</td>
                   <td><a href='config/update.php?id=" .$row['id']."'><button class='btn        btn-primary btn-sm' type='button'>Edit</button></a>
                   <a href='delete.php?id=" .$row['id']."'><button class='btn btn-danger btn-sm' type='button'>Delete</button></a></td>
                </tr>";
               
   };
} else {
   $tbody =  "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}
// Closing the connection is optional although recommended as it frees PHP and MYSQL resources (good practise reference)
 $conn->close();
  


?>
<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php') ?>
<?php require_once 'components/boot.php' ?>
       <style type= "text/css">
           .manageProduct {          
               margin: auto;
           }
           .img-thumbnail {
               width: 70px !important;
                height: 70px !important;
           }
           td {          
               text-align: left;
               vertical-align: middle;

            }
           tr {
               text-align: center;
           }
       </style>

<table class='table table-striped'>
<thead class='table-success' >
<tr>
<th>Picture</th>
<th>Title</th>
<th>Action</th>


</tr>
</thead>
<tbody>
<?= $tbody;?>
</tbody>
</table>

<?php include('templates/footer.php') ?>

</html>


