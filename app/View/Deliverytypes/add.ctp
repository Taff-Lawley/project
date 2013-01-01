<div class="deliverytypes form">
<?php echo $this->Form->create('Deliverytype'); ?>
	<fieldset>
		<legend><?php echo __('Add Deliverytype'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Deliverytypes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('controller' => 'milestones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestone'), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
	</ul>
</div>
