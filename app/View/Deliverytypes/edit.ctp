<div class="deliverytypes form">
<?php echo $this->Form->create('Deliverytype'); ?>
	<fieldset>
		<legend><?php echo __('Edit Deliverytype'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Deliverytype.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Deliverytype.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Deliverytypes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Milestones'), array('controller' => 'milestones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Milestone'), array('controller' => 'milestones', 'action' => 'add')); ?> </li>
	</ul>
</div>
