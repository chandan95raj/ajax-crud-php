<?php
include("config.php");
$query = "SELECT * FROM users ORDER BY id DESC";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
if($total)
{ 
?>
<div class="table-responsive">
<table class="table table-hover">
<thead>
    <tr>
    <th>s/n.</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Date & Time</th>
    <th>Action</th>
    </tr>
</thead>
<tbody>
    <?php
    for($i=1; $result = mysqli_fetch_assoc($data); $i++)
    {
      $original_date = $result['current_dateTime'];
      $timestamp = strtotime($original_date);
      $new_date = date("d-m-Y - h:i A", $timestamp);
    ?>
    <tr>
    <th><?php echo $i; ?> .</th>
    <td><?php echo $result['name'];?></td>
    <td><?php echo $result['email'];?></td>
    <td><?php echo $new_date ?></td>
    <td>
      <button class="btn btn-info badge text-white edit-btn" data-eid="<?php echo $result['id']?>"><i class="fa fa-edit"></i></button>
      <button class="btn btn-danger badge text-white delete-btn" data-id="<?php echo $result['id']?>" ><i class="fa fa-trash"></i></button>
    </td>
    </tr>
    <?php } ?>
    
</table>
</div>
<?php   
}
else{
?>
  <h1 class="text-center display-4 text-danger animate__animated animate__bounce">No Records Found !</h1>
<?php   
}

?>