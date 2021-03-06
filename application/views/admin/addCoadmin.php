
<div class="container">
	<h2 class="text-center">Add Co Admin</h2>
	<hr>
	<div class="row">
		<div class="col-md-6 mx-auto">

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
		    <?php }elseif($msg2) { ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?php echo $msg2; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>

					</div>

		    <?php } ?>

			<?php
		        $formData=$this->session->flashdata('formData');
		        if($formData){
		            $value = $formData;
		        }else{
					$value['email']='';
		        	$value['username']='';
		        	$value['gender']='';
		        	$value['role']='';
		        	$value['collegename']='';
		        }
            ?>
			<?php echo form_open('admin/createCoAdmin'); ?>
				<div class="form-group">
					<label>Username:</label>
					<input type="text" value="<?php echo $value['username']; ?>" class="form-control" name="username">
					<span class="text-danger"><?php echo form_error('username'); ?></span>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<input type="text" value="<?php echo $value['email']; ?>" class="form-control" name="email">
					<span class="text-danger"><?php echo form_error('email'); ?></span>
				</div>
				<div class="form-group">
					<label>Gender</label>
					<select class="form-control" name="gender">
						<?php if ($value['gender'] === 'male'): ?>
							<option value="male" selected>Male</option>
							<option value="female">Female</option>
						<?php elseif ($value['gender'] === 'female'): ?>
							<option value="male">Male</option>
							<option value="female" selected>Female</option>
						<?php else: ?>
							<option value="" selected>Choose Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						<?php endif ?>

					</select>
					<span class="text-danger"><?php echo form_error('gender'); ?></span>
				</div>
				<div class="form-group">
					<label>Role</label>
					<select class="form-control" name="role">
						<option value="" selected>Choose Role</option>
						<?php if (count($roles)): ?>
							<?php foreach ($roles as $role): ?>
								<option value="<?php echo $role->id ;?>"><?php echo $role->role ;?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
					<span class="text-danger"><?php echo form_error('role'); ?></span>
				</div>
				<div class="form-group">
					<label>College Name</label>
					<select class="form-control" name="collegename">
						<option value="" selected>Choose College</option>
						<?php if (count($colleges)): ?>
							<?php foreach ($colleges as $college): ?>
								<option value="<?php echo $college->id ;?>"><?php echo $college->collegename ;?></option>
							<?php endforeach ?>
						<?php endif ?>
					</select>
					<span class="text-danger"><?php echo form_error('collegename'); ?></span>
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="password">
					<span class="text-danger"><?php echo form_error('password'); ?></span>
				</div>
				<div class="form-group">
					<label>Confirm Password:</label>
					<input type="password" class="form-control" name="confirm_password">
					<span class="text-danger"><?php echo form_error('confirm_password'); ?></span>
				</div>
				<div class="form-group">
					<input type="submit" value="Add CoAdmin" class="btn btn-info btn-block">
				</div>
			<?php echo form_close(); ?>
		</div>

	</div>
</div>
