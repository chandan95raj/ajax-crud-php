<?php
include("config.php");
$Id = $_POST['id'];
$query = "SELECT * FROM users WHERE id = '$Id'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
if($data)
{ 
?>
<div id="modal" style="width:80%;position: absolute;top: 20px;">
    <div class="modal-dialog shadow-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit User</h5>
            <button type="button" class="btn btn-danger rounded-circle close-btn">
            <span >&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="updateform">    
            <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control text-capitalize" value="<?php echo $result['name'];?>" id="edit-fullname" />
            <input type="hidden" class="form-control text-capitalize" value="<?php echo $result['id'];?>" id="edit-id" />
            </div>
            <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="edit-email" value="<?php echo $result['email'];?>" />
            </div>             
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-success px-4" id='update-form' value="Save" />
            <button type="button" class="btn btn-warning close-btn px-3" >Cancel</button>              
        </form>
        </div>
        </div>
    </div>
    </div>
<?php   
}
else{
?>
  <h1 class="text-center display-4 text-danger animate__animated animate__bounce">No Records Found !</h1>
<?php   
}

?>