<div class="users form">
    <?php echo $this->Session->flash('auth');?>
	<fieldset>
		<legend><?php echo __('Login'); ?></legend>
	<?php
		echo $this->Form->create('User');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
	?>
	</fieldset>
	<?php echo $this->Form->end('Login'); ?>
</div>