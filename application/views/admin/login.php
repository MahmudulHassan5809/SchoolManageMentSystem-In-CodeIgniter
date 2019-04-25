
<div class="container">
	<h2 class="text-center">Admin Login</h2>
	<hr>
	<div class="row">
		<div class="col-md-6 mx-auto">

			<?php
				$msg=$this->session->flashdata('error');
				$msg2=$this->session->flashdata('success');
		        if($msg){ ?>
		           <div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?php echo $msg; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>

					</div>
		    <?php  }else if($msg2){ ?>
					<div class="alert alert-info alert-dismissible fade show" role="alert">
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
		        }
            ?>
			<?php echo form_open('admin/login'); ?>
				<div class="form-group">
					<label>Email:</label>
					<input type="text" value="<?php echo $value['email']; ?>" class="form-control" name="email">
					<span class="text-danger"><?php echo form_error('email'); ?></span>
				</div>

				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" name="password">
					<span class="text-danger"><?php echo form_error('password'); ?></span>
				</div>

				<div class="form-group">
					<input type="submit" value="Login" class="btn btn-info btn-block">
				</div>
			<?php echo form_close(); ?>
		</div>

	</div>
</div>
