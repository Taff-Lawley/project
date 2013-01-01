<div class="environments view">
<h2><?php  echo __('Environment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($environment['Environment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($environment['Environment']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($environment['Environment']['slug']); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="related">
	<h3><?php echo __('Related Projects'); ?></h3>
	<?php if (!empty($environment['Project'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prefix'); ?></th>
		<th><?php echo __('Client Name'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Status Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($environment['Project'] as $project): ?>
		<tr>
			<td><?php echo $project['id']; ?></td>
			<td><?php echo $project['prefix']; ?></td>
			<td><?php echo $project['Client']['name']; ?></td>
			<td><?php echo $project['name']; ?></td>
			<td><?php echo $project['description']; ?></td>
			<td><?php echo $project['Status']['name']; ?></td>
			<td><?php echo $project['slug']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'projects', 'action' => 'view', $project['id'])); ?>
				<?php if($this->Session->read('Environments.'.$environment['Environment']['id'])==1){ ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'projects', 'action' => 'edit', $project['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'projects', 'action' => 'delete', $project['id']), null, __('Are you sure you want to delete # %s?', $project['id'])); ?>
				<?php } ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
	<?php if($this->Session->read('Environments.'.$environment['Environment']['id'])==1){ ?>
	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		</ul>
	</div>
	<?php } ?>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Environment'), array('action' => 'edit', $environment['Environment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Environment'), array('action' => 'delete', $environment['Environment']['id']), null, __('Are you sure you want to delete # %s?', $environment['Environment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Environments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contactpeople'), array('controller' => 'contactpeople', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contactperson'), array('controller' => 'contactpeople', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Clients'); ?></h3>
	<?php if (!empty($environment['Client'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Environment Id'); ?></th>
		<th><?php echo __('Remarks'); ?></th>
		<th><?php echo __('Rate'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($environment['Client'] as $client): ?>
		<tr>
			<td><?php echo $client['id']; ?></td>
			<td><?php echo $client['name']; ?></td>
			<td><?php echo $client['environment_id']; ?></td>
			<td><?php echo $client['remarks']; ?></td>
			<td><?php echo $client['rate']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'clients', 'action' => 'view', $client['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'clients', 'action' => 'edit', $client['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'clients', 'action' => 'delete', $client['id']), null, __('Are you sure you want to delete # %s?', $client['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Contactpeople'); ?></h3>
	<?php if (!empty($environment['Contactperson'])): ?>
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
		foreach ($environment['Contactperson'] as $contactperson): ?>
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
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($environment['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Bio'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($environment['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['first_name']; ?></td>
			<td><?php echo $user['last_name']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['website']; ?></td>
			<td><?php echo $user['bio']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), null, __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
