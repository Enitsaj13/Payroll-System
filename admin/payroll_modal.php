<?php
        
		// adding the value of rate per position 
		$position = $row['position'];
        $rateEncoder = 1300;
        $rateProgrammer = 2000;
        $rateDesigner = 1750;
        $rateProjectManager = 3200;
        $rateDbAdmin = 2500;
        $rateJuniorAccountant = 3300;
        $rateHeadAccountant = 2000;
        $rateSalesRep = 1800;
        $rateSalesMan = 3500;
        $rateDepSec = 1300;
        $rateOfficeClerk = 1000;
        $rateLiaison = 1800;
        

        if ($position == "Encoder")
        {
            $rate = $position;
            $rate = $rateEncoder;
        }
        else if ($position == "Programmer")
        {
            $rate = $position;
            $rate = $rateProgrammer;
        }
        else if ($position == "Designer")
        {
            $rate = $position;
            $rate = $rateDesigner;
        }
        else if ($position == "Project Manager")
        {
            $rate = $position;
            $rate = $rateProjectManager;
        }
        else if ($position == "DB Admin")
        {
            $rate = $position;
            $rate = $rateDbAdmin;
        }
        else if ($position == "Junior Accountant")
        {
            $rate = $position;
            $rate = $rateJuniorAccountant;
        }
        else if ($position == "Head Accountant")
        {
            $rate = $position;
            $rate = $rateHeadAccountant;
        }
        else if ($position == "Sales Representative")
        {
            $rate = $position;
            $rate = $rateSalesRep;
        }
        else if ($position == "Sales Manager")
        {
            $rate = $position;
            $rate = $rateSalesMan;
        }
        else if ($position == "Department Secretary")
        {
            $rate = $position;
            $rate = $rateDepSec;
        }
        else if ($position == "Office Clerk")
        {
            $rate = $position;
            $rate = $rateOfficeClerk;
        }
        else if ($position == "Liaison")
        {
            $rate = $position;
            $rate = $rateLiaison;
        }

        $_POST['rate'] = $rate;


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
						<label class="control-label modal-label mt-1">Assigned Depart: </label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control-input" value="<?php echo $row['department']; ?>" name="department" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Position: </label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control-input" value="<?php echo $row['position']; ?>" name="position" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Rate: </label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control-input" value="<?php echo $_POST['rate']; ?>" name="rate" readonly>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Days Work: </label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control-input" name="day_work">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Overtime: </label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control-input" name="overtime">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Late: </label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control-input" name="late">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Leave: </label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control-input" name="leave_number">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Absence: </label>
					</div>
					<div class="col-sm-10">
                        <input type="number" class="form-control-input" name="absence">
                        <input type="hidden" class="form-control-input" name="deductions">
                        <input type="hidden" class="form-control-input" name="grosspay">
                        <input type="hidden" class="form-control-input" name="netpay">
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

