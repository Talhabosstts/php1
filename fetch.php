<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Users Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container">
<div class="row">
<div class="col-8 mx-auto">

<h3 class="text-center mt-3">User Records</h3>

<table class="table table-bordered table-hover table-striped">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>Address</th>
<th colspan="2" class="text-center">Action</th>
</tr>

<?php
include 'connection.php';

$query = mysqli_query($con,"SELECT * FROM register");

foreach($query as $value){
?>

<tr>

<td><?php echo $value['id']; ?></td>
<td><?php echo $value['name']; ?></td>
<td><?php echo $value['email']; ?></td>
<td><?php echo $value['password']; ?></td>
<td><?php echo $value['address']; ?></td>

<td>

<button class="btn btn-warning"
data-bs-toggle="modal"
data-bs-target="#edit<?php echo $value['id']; ?>">
Edit
</button>

</td>

<td>

<button class="btn btn-danger"
data-bs-toggle="modal"
data-bs-target="#delete<?php echo $value['id']; ?>">
Delete
</button>

</td>

</tr>


<!-- EDIT MODAL -->

<div class="modal fade" id="edit<?php echo $value['id']; ?>" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Update Record</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<form action="code.php" method="post">

<div class="modal-body">

<input type="hidden" name="id" value="<?php echo $value['id']; ?>">

<input type="text"
class="form-control mt-2"
name="name"
value="<?php echo $value['name']; ?>"
placeholder="Enter Name">

<input type="email"
class="form-control mt-2"
name="email"
value="<?php echo $value['email']; ?>"
placeholder="Enter Email">

<input type="password"
class="form-control mt-2"
name="pass"
value="<?php echo $value['password']; ?>"
placeholder="Enter Password">

<input type="text"
class="form-control mt-2"
name="address"
value="<?php echo $value['address']; ?>"
placeholder="Enter Address">

</div>

<div class="modal-footer">
<button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary" name="update">Update</button>
</div>

</form>

</div>
</div>
</div>


<!-- DELETE MODAL -->

<div class="modal fade" id="delete<?php echo $value['id']; ?>" tabindex="-1">
<div class="modal-dialog">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title">Delete Record</h5>
<button class="btn-close" data-bs-dismiss="modal"></button>
</div>

<form action="code.php" method="post">

<div class="modal-body">

<p>Do you really want to delete this record?</p>

<input type="hidden" name="id" value="<?php echo $value['id']; ?>">

</div>

<div class="modal-footer">
<button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-danger" name="delete">Delete</button>
</div>

</form>

</div>
</div>
</div>

<?php } ?>

</table>

</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>