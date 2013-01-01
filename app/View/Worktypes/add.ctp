<div class="worktypes form">
<?php echo $this->Form->create('Worktype'); ?>
	<fieldset>
		<legend><?php echo __('Add Worktype'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Worktypes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks Users'), array('controller' => 'tasks_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tasks User'), array('controller' => 'tasks_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
