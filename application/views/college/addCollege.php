
<div class="container">
	<h2 class="text-center">Add College</h2>
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
					$value['collegename']='';
					$value['branch']='';
		        }
            ?>
			<?php echo form_open('colleges/createCollege'); ?>
				<div class="form-group">
					<label>College Name:</label>
					<input type="text" value="<?php echo $value['collegename']; ?>" class="form-control" name="collegename">
					<span class="text-danger"><?php echo form_error('collegename'); ?></span>
				</div>

				<div class="form-group">
					<label>Branch:</label>
					<input type="text" class="form-control" name="branch">
					<span class="text-danger"><?php echo form_error('branch'); ?></span>
				</div>

				<div class="form-group">
					<input type="submit" value="Create College" class="btn btn-info btn-block">
				</div>
			<?php echo form_close(); ?>
		</div>

	</div>
</div>
