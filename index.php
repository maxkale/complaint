
<?php
include 'header.php';

?>
<div class="col-sm-9">
    <div class="well">
        <h4 class="text-center">Welcome Online Complaint System</h4>
    </div>
    <div class="row">
        <?php if($_SESSION['loggedInUser']['id']!=1){?><div class="col-sm-4" >
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Add Complaint
            </button>
        </div><?php }?>
        <div class="col-sm-8">
            <h4>Complaint List</h4>
        </div>
    </div>

    <table class="table table-reponsive table-bordered table-striped">
        <thead> 
            <tr> 
                <th width="5%">Sr.No</th>
                <th width="15%">Complaint By</th>
                <th width="15%">Subject</th>
                <th width="25%">Description</th>
                <th width="15%">Date</th>
				<th width="15%">Type</th>
                <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody id='complaintTable'> 
        </tbody>

    </table>



    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Complaint</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Complaint Subject</label>
                                    <span>
                                        <input type="text" name="subject" class="form-control">
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Complaint Description</label>
                                    <span>
                                        <textarea rows="5" name="description" class="form-control"></textarea>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group text-center">
                                    <span>
                                        <input class="btn btn-primary" type="submit" name="submit" value="Add">
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
</div>

<?php
include 'footer.php';
if (isset($_POST['submit'])) {
    if (!empty($_POST['subject']) && !empty($_POST['description'])) {
        addComplaint($_POST, $con);
    } else {
        ?>
        <script>
            alert('All Field is mandatory');
        </script><?php
    }
}

function addComplaint($data, $con) {
	$userId = $_SESSION['loggedInUser']['id'];
    $query = "insert into complaint(subject,decription,user_id,status)
	values(" . "'" . $data['subject'] . "'" . "," . "'" . $data['description'] . "'" . ",".$userId.",1)";
    $sql = mysqli_query($con, $query);
    if ($sql) {
        echo "<script>alert('Add Successfully');
		getComplaint();
		
		</script>";
    } else {
        echo "<script>alert('Something wents wrong')</script>";
    }
}
?>
            
