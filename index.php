<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax CRUD php - Codes with Chandan</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script type="text/javascript" src="lib/jquery.min.js"></script>
    <script type="text/javascript" src="lib/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container">      
      <div class="row shadow-sm p-2">
        <div class="col-md-6">
          <h2>PHP & Ajax CRUD</h2>
        </div>
        <div class="col-md-6">
          <div id="search-bar">
            <input class="form-control" placeholder="search user" type="text" id="search" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4 card p-3 shadow">
          <h2>Add Data</h2>
          <hr />
          <form id="myform">    
            <div class="form-group">
              <label for="name">Full Name:</label>
              <input type="text" class="form-control text-capitalize" placeholder="Enter Name" id="fullname" required />
            </div>
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" placeholder="Enter email" id="email" required />
            </div>
            <input type="submit" class="btn btn-success" id='save-button' value="submit" />
          </form>  
          <h5 class="text-center text-success" id="successmsg"></h5>               
        </div>
        <div class="col-md-8 card p-2 shadow" >
          <h5 class="text-center text-danger updatemsg"></h5>
          <div id="table-data">            
          </div>
          <h5 class="text-center text-danger deletemsg"></h5>       
        </div>
      </div>
      <div id="edit-form-data"></div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){

        // Read / Fetch / Load Data

        function loadtable(){
          $.ajax({            
            url: "load-table.php",
            type: "POST",
            success: function(response) 
            {
             $("#table-data").html(response);
            }
          });
        }
        loadtable();

        // Insert / Create / Post Data

        $("#myform").submit(function(e){
          e.preventDefault();
          var fname = $("#fullname").val();
          var emaild = $("#email").val();
          $.ajax({            
            url: "insert-data.php",
            type: "POST",
            data: {full_name:fname, emaildata:emaild},
            success: function(data) 
            {
              if(data == 1){
                $("#myform").trigger("reset");
                $("#successmsg").html("Data Inserted Successfully").fadeOut(5000);
                loadtable();
              }
              else{
                $("failedmsg").removeClass("d-none");
              }
            }
          });
        })

        // Delete Data

        $(document).on("click",".delete-btn", function(){
          if(confirm("Are you sure to delete!"))
          {
            var userid = $(this).data("id");
            $.ajax({
            url:"delete-data.php",
            type:'POST',
            data:{id: userid},
            success:function(response)
            {              
              $(".deletemsg").html(response).fadeOut(5000);
              loadtable();
            }
            });
          }          
        });

        // Edit Form Load

        $(document).on("click",".edit-btn", function(){
          $("#modal").show();
          var userid = $(this).data("eid");     
          $.ajax({
            url:"load-update-form.php",
            type:'POST',
            data:{id: userid},
            success:function(response)
            {
              $("#edit-form-data").html(response);       
            }
            });
        });

        // Update Form Data

        $(document).on("click","#update-form", function(){         
            var editFname = $("#edit-fullname").val();
            var editEmailid = $("#edit-email").val();
            var editId = $("#edit-id").val();
            $.ajax({
            url:"update-form.php",
            type:'POST',
            data:{id: editId, fullname: editFname, email: editEmailid},
            success:function(response)
            {  
              $("#modal").fadeOut();
              $(".updatemsg").html(response);                             
              loadtable();
            }
            });          
        });

        // Live Search
          $("#search").on("keyup",function(){
            var search_term = $(this).val();
            $.ajax({
              url: "ajax-live-search.php",
              type: "POST",
              data : {search:search_term },
              success: function(data) {
                $("#table-data").html(data);
              }
            });
          });

        // Modal Hide

        $(document).on("click",".close-btn", function(){
            $("#modal").fadeOut();
        });

      }); 
    </script>
  </body>
</html>