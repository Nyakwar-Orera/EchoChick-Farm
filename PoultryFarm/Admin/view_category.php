<?php
session_start();
error_reporting(1);
include('../includes/dbconnect.php');
?>
<div class="card-body">
  <h3><?php  echo $_POST['edit_id'];?></h3>
  <?php
  $eid=$_POST['edit_id5'];
  $sql="SELECT category.id,category.CategoryName,category.CategoryCode,category.PostingDate from category  where category.id=:eid";
  $query = $pdo -> prepare($sql);
  $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
  $query->execute();
  $results=$query->fetchAll(PDO::FETCH_OBJ);
  if($query->rowCount() > 0)
  {
    foreach($results as $row)
      {?>

        <h4 style="color: blue">Category Information</h4>
        <table border="1" class="table table-bordered">
          <tr>
            <th>Category Name</th>
            <td><?php  echo $row->CategoryName;?></td>
          </tr>
          <tr>
            <th>Category Code</th>
            <td><?php  echo $row->CategoryCode;?></td>
          </tr>
          <tr>
            <th>Posting Date</th>
            <td><?php  echo $row->PostingDate;?></td>
          </tr>
        </table> 
        <?php 
      }
    } ?>
  </div>