<?php
include ('../database/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/adminothers.css">
</head>
<body>
    
</body>
</html>

<!-- Modal for the edit button -->

<div class="modal fade" id="update<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 id="modal-title" class="modal-title text-light">Payroll Information Field</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
      <form method="GET" action="payroll_process.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<!-- newly added field -->
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<label class="control-label modal-label mt-1">Name: </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control-input" value="<?php echo $row['name']; ?>" name="name" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Rate: </label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control-input" value="<?php echo $row['rate']; ?>" name="rate" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Days Work: </label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control-input" value="<?php echo $row['day_work']; ?>" name="day_work" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Overtime: </label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control-input" value="<?php echo $row['overtime']; ?>" name="overtime" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Late: </label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control-input" value="<?php echo $row['late']; ?>" name="late" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Leave: </label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control-input" value="<?php echo $row['leave_number']; ?>" name="leave_number" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Absence: </label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control-input" value="<?php echo $row['overtime']; ?>" name="absence" readonly>
					</div>
				</div>
            </div>
        </div>
				
			<div class="modal-footer d-flex align-items-center justify-content-center">
				<button type="button" class="btn btn-light" data-dismiss="modal"><i class='bx bx-window-close'></i> Cancel</button>
				<button type="submit" name="save" class="btn btn-info"><i class='bx bx-save'></i> Save</button>
			</div>
		</form>
      </div>
    </div>
  </div>
</div>


<!-- Modal for the delete button -->

<div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">	
					<h5 id="title-delete" class="modal-title text-light" id="myModalLabel">Delete Payroll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to delete</p>
				<h2 class="text-center"><?php echo $row['name']; ?> ?</h2>
			</div>
            <div class="modal-footer d-flex align-items-center justify-content-center">
                <button type="button" class="btn btn-light" data-dismiss="modal"><i class='bx bx-window-close'></i> Cancel</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><i class='bx bxs-trash-alt'></i> Yes</a>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="view<?php echo $row['id']; ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 id="modal-title" class="modal-title text-light"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">

			<strong>Name:</strong> <?php echo $row['name']; ?> <br>
			<strong>Rate:</strong> <?php echo $row['rate']; ?> <br>
			<strong>Days Work:</strong> <?php echo $row['day_work']; ?> <br>
			<strong>Overtime:</strong> <?php echo $row['overtime']; ?> <br>
			<strong>Late:</strong> <?php echo $row['late']; ?> <br>
			<strong>Leave:</strong> <?php echo $row['leave_number']; ?> <br>
			<strong>Absence:</strong> <?php echo $row['absence']; ?> <br>
			<strong>Gross Pay:</strong> <?php echo $row['grosspay']; ?> <br>
			<strong>Deductions:</strong> <?php echo $row['deductions']; ?> <br>
			<strong>Net Pay:</strong> <?php echo $row['netpay']; ?> <br>
			
      </div>
    </div>
  </div>
</div>
