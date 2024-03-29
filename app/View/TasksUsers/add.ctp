<div class="tasksUsers form">
<?php echo $this->Form->create('TasksUser'); ?>
	<fieldset>
		<legend><?php echo __('Add Tasks User'); ?></legend>
	<?php
		echo $this->Form->input('task_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('worktype_id');
		echo $this->Form->input('time');
		echo $this->Form->input('description');
		echo $this->Form->input('date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Tasks Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Worktypes'), array('controller' => 'worktypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worktype'), array('controller' => 'worktypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
