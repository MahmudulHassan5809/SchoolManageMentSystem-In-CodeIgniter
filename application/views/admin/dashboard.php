
<div class="container">
	<h1 class="text-center">Admin Dashboard</h1>
	<?php $username = $this->session->userdata('username') ?>
	<h5>Welcome <?php echo $username; ?></h5>

	<?php
		$msg=$this->session->flashdata('success');
		$msg2=$this->session->flashdata('error');
		if($msg){ ?>
       <div class="alert alert-info alert-dismissible fade show" role="alert">
			<?php echo $msg; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
			</button>

		</div>
	<?php } ?>

	<div class="row">
		<?php
		echo anchor('colleges/addCollege', 'Add College', ['class' => 'btn btn-primary mr-2']);
		?>

		<?php
			echo anchor('admin/addCoAdmin', 'Add CoAdmin', ['class' => 'btn btn-primary mr-2']);
		?>

		<?php
			echo anchor('students/addStudent', 'Add Student', ['class' => 'btn btn-primary']);
		?>
	</div>

	<div class="row mt-3">
		<table class="table table-striped table-inverse table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>College Name</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Gender</th>
					<th>Branch</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if (count($collegeUsers)): ?>
					<?php foreach ($collegeUsers as $value): ?>
						<tr>
							<td><?php echo $value->cid; ?></td>
							<td><?php echo $value->collegename; ?></td>
							<td><?php echo $value->username; ?></td>
							<td><?php echo $value->email; ?></td>
							<td><?php echo $value->role; ?></td>
							<td><?php echo $value->gender; ?></td>
							<td><?php echo $value->branch; ?></td>
							<td><?php echo anchor('students/viewStudents/'.$value->cid, 'View Students', []); ?></td>
						</tr>
					<?php endforeach ?>
				<?php else: ?>
					<tr>
						<td>No Data Found!</td>
					</tr>
				<?php endif ?>

			</tbody>
		</table>
	</div>
</div>
