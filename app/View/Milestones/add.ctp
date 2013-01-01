<div class="milestones form">
<?php echo $this->Form->create('Milestone'); ?>
	<fieldset>
		<legend><?php echo __('Add Milestone'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('due_date');
		echo $this->Form->input('description');
		echo $this->Form->input('deliverytype_id');
		echo $this->Form->input('project_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Milestones'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Deliverytypes'), array('controller' => 'deliverytypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Deliverytype'), array('controller' => 'deliverytypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
	</ul>
</div>
