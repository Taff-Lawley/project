<div class="contactpeople view">
<h2><?php  echo __('Contactperson'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contactperson['Contactperson']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($contactperson['Contactperson']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Environment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contactperson['Environment']['name'], array('controller' => 'environments', 'action' => 'view', $contactperson['Environment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telephone'); ?></dt>
		<dd>
			<?php echo h($contactperson['Contactperson']['telephone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks'); ?></dt>
		<dd>
			<?php echo h($contactperson['Contactperson']['remarks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contactperson['Client']['name'], array('controller' => 'clients', 'action' => 'view', $contactperson['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($contactperson['Contactperson']['email']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contactperson'), array('action' => 'edit', $contactperson['Contactperson']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contactperson'), array('action' => 'delete', $contactperson['Contactperson']['id']), null, __('Are you sure you want to delete # %s?', $contactperson['Contactperson']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contactpeople'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contactperson'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Environments'), array('controller' => 'environments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environment'), array('controller' => 'environments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
