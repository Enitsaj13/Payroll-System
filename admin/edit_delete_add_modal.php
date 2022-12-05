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
        <h5 id="modal-title" class="modal-title text-light">Edit the Employee Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
			<form method="GET" id="form<?php echo $row['id']; ?>" action="update.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<!-- newly added field -->
						<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
						<label class="control-label modal-label mt-1">Name: </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control-input" value="<?php echo $row['name']; ?>" name="name">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Email: </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control-input" value="<?php echo $row['email']; ?>" name="email">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Contact: </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control-input" value="<?php echo $row['contact']; ?>" name="contact">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Address: </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control-input" value="<?php echo $row['address']; ?>" name="address">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Date Hired: </label>
					</div>
					<div class="col-sm-10">
						<input type="date" class="form-control-input" value="<?php echo $row['date_hired']; ?>" name="date_hired">
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Assigned Depart: </label>
					</div>
					<div class="col-sm-10">
						<select name="department" id="department">
                            <option value="<?php echo $row['department']; ?>" readonly><?php echo $row['department']; ?></option>
                            <option value="IT Department">IT Department</option>
                            <option value="Accountant">Accountant</option>
                            <option value="Sales">Sales</option>
                            <option value="Head Office">Head Office</option>
                        </select>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Position: </label>
					</div>
					<div class="col-sm-10">
						<select name="position" id="position">
                            <option value="<?php echo $row['position']; ?>" readonly><?php echo $row['position']; ?></option>
                            <option value="Programmer">Programmer</option>
                            <option value="Encoder">Encoder</option>
                            <option value="Designer">Designer</option>
                            <option value="Project Manager">Project Manager</option>
                            <option value="DB Admin">DB Admin</option>
                            <option value="Junior Accountant">Junior Accountant</option>
                            <option value="Head Accountant">Head Accountant</option>
                            <option value="Sales Representative">Sales Representative</option>
                            <option value="Sales Manager">Sales Manager</option>
                            <option value="Department Secretary">Department Secretary</option>
                            <option value="Office Clerk">Office Clerk</option>
                            <option value="Liaison">Liaison</option>

                        </select>
					</div>
				</div>
                <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Employee Type: </label>
					</div>
					<div class="col-sm-10">
						<select name="employee_type">
                            <option value="<?php echo $row['employee_type']; ?>" readonly><?php echo $row['employee_type']; ?></option>
                            <option value="Regular">Regular</option>
                        </select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label mt-1">Password: </label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control-input" value="<?php echo $row['password']; ?>" name="password">
					</div>
				</div>
			</div>
		</div>
			<div class="modal-footer d-flex align-items-center justify-content-center">
				<button type="button" class="btn btn-light" data-dismiss="modal"><i class='bx bx-window-close'></i> Cancel</button>
				<button type="submit" name="update" class="btn btn-info"><i class='bx bx-save'></i> Update</button>
			</div>
		</form>
    </div>
  </div>
</div>


<!-- Modal for the delete button -->

<div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
					<h5 id="title-delete" class="modal-title text-light" id="myModalLabel">Delete Member</h5>
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
