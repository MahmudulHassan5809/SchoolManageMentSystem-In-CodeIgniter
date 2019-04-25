<div class="container">
	<h2 class="text-center">View All Students</h2>
	<div class="row mt-3">
		<div class="col md-12">
			<table class="table table-striped table-inverse table-hover">
			<thead>
				<tr>
					<th>Student Name</th>
					<th>College Name</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Course</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $value): ?>
					<td><?php echo $value->studentname; ?></td>
					<td><?php echo $value->collegename ?></td>
					<td><?php echo $value->gender ?></td>
					<td><?php echo $value->email ?></td>
					<td><?php echo $value->course ?></td>
					<td>
						<td>
							<?php echo anchor('students/editStudent/'.$value->sid, 'View', []); ?>
							--
							<?php echo anchor('students/removeStudent/'.$value->sid, 'Remove',['onclick' => "return confirm('Are You Sure')"]); ?>
						</td>
					</td>
				<?php endforeach ?>
			</tbody>
		</table>
		</div>
	</div>
</div>
