<?php
session_start();
error_reporting(1);
include('../includes/dbconnect.php');
if(isset($_GET['restoreid']))
{
    $rid=intval($_GET['restoreid']);
    $sql="update customer set role='customer' where Id='$rid'";
    $query=$dbh->prepare($sql);
    $query->bindParam(':rid',$rid,PDO::PARAM_STR);
    $query->execute();
    if ($query->execute()){
        echo "<script>alert('User Restored');</script>"; 
        echo "<script>window.location.href = '../register.php'</script>";
    }else{
        echo '<script>alert("update failed! try again later")</script>';
    }
    
}
?>
<div class="card-body table-responsive p-3">
    <h4 class="card-title">Manage Users</h4>
    <table class="table align-items-center table-flush table-hover" id="dataTableHover">
        <thead>
            <tr>
                <th class="text-center"></th>
                <th class="">Name</th>
                <th class="">Mobile Number</th>
                <th class="">Email</th>
                <th class="">Registered Users</th>
                <th class="" style="width: 15%;">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql="SELECT * from customer ";
            $query = $pdo -> prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
                foreach($results as $row)
                {    
                    ?>
                    <tr>
                        <td class="text-center"><?php echo htmlentities($cnt);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->FirstNameName);?></td>
                        <td class="font-w600">0<?php  echo htmlentities($row->Telephone);?></td>
                        <td class="font-w600"><?php  echo htmlentities($row->Email);?></td>
                        <td class="font-w600">
                            <span class="badge badge-primary"><?php  echo htmlentities($row->CustomerRegdate);?></span>
                        </td>
                        <td class=""><a href="deleted_users.php?restoreid=<?php echo ($row->CustomerId);?>" onclick="return confirm('Do you really want to Restore user ?');" title="Restore this User">restore</i></a> </td>
                    </tr>
                    <?php $cnt=$cnt+1;
                }
            } ?>
        </tbody>
    </table>
</div>