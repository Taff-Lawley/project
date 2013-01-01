<div class="contactpeople form">
<?php echo $this->Form->create('Contactperson'); ?>
	<fieldset>
		<legend><?php echo __('Add Contactperson'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('environment_id');
		echo $this->Form->input('telephone');
		echo $this->Form->input('remarks');
		echo $this->Form->input('client_id');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contactpeople'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Environments'), array('controller' => 'environments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environment'), array('controller' => 'environments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
