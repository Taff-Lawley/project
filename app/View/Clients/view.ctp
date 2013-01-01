<div class="clients view">
<h2><?php  echo __('Client'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($client['Client']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Environment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($client['Environment']['name'], array('controller' => 'environments', 'action' => 'view', $client['Environment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Remarks'); ?></dt>
		<dd>
			<?php echo h($client['Client']['remarks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php echo h($client['Client']['rate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Client'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to delete # %s?', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Environments'), array('controller' => 'environments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environment'), array('controller' => 'environments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contactpeople'), array('controller' => 'contactpeople', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contactperson'), array('controller' => 'contactpeople', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Contactpeople'); ?></h3>
	<?php if (!empty($client['Contactperson'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Environment Id'); ?></th>
		<th><?php echo __('Telephone'); ?></th>
		<th><?php echo __('Remarks'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Contactperson'] as $contactperson): ?>
		<tr>
			<td><?php echo $contactperson['id']; ?></td>
			<td><?php echo $contactperson['name']; ?></td>
			<td><?php echo $contactperson['environment_id']; ?></td>
			<td><?php echo $contactperson['telephone']; ?></td>
			<td><?php echo $contactperson['remarks']; ?></td>
			<td><?php echo $contactperson['client_id']; ?></td>
			<td><?php echo $contactperson['email']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'contactpeople', 'action' => 'view', $contactperson['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'contactpeople', 'action' => 'edit', $contactperson['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contactpeople', 'action' => 'delete', $contactperson['id']), null, __('Are you sure you want to delete # %s?', $contactperson['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Contactperson'), array('controller' => 'contactpeople', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Projects'); ?></h3>
	<?php if (!empty($client['Project'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prefix'); ?></th>
		<th><?php echo __('Client Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Environment Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Status Id'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($client['Project'] as $project): ?>
		<tr>
			<td><?php echo $project['id']; ?></td>
			<td><?php echo $project['prefix']; ?></td>
			<td><?php echo $project['client_id']; ?></td>
			<td><?php echo $project['name']; ?></td>
			<td><?php echo $project['description']; ?></td>
			<td><?php echo $project['environment_id']; ?></td>
			<td><?php echo $project['user_id']; ?></td>
			<td><?php echo $project['status_id']; ?></td>
			<td><?php echo $project['slug']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), null, __('Are you sure you want to delete # %s?', $project['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
