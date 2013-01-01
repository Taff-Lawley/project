<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Website'); ?></dt>
		<dd>
			<?php echo h($user['User']['website']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bio'); ?></dt>
		<dd>
			<?php echo h($user['User']['bio']); ?>
			&nbsp;
		</dd>
	</dl>
	<div class="related">
	<?php
	if (!empty($user['Environment'])): ?>
	<h3><?php echo __('Related Environments'); ?></h3>
	
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('User Type'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Environment'] as $environment): ?>
		<tr>
			<td><?php echo $environment['id']; ?></td>
			<td><?php echo $environment['name']; ?></td>
			<td><?php echo $environment['slug']; ?></td>
			<td><?php echo $group[$this->Session->read('Environments.'.$environment['id'])]; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'environments', 'action' => 'view', $environment['id'])); ?>
				<?php if($this->Session->read('Environments.'.$environment['id'])==1){ ?>
					<?php echo $this->Html->link(__('Edit'), array('controller' => 'environments', 'action' => 'edit', $environment['id'])); ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'environments', 'action' => 'delete', $environment['id']), null, __('Are you sure you want to delete # %s?', $environment['id'])); ?>
				<?php } ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Environments'), array('controller' => 'environments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environment'), array('controller' => 'environments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Task'), array('controller' => 'tasks', 'action' => 'add')); ?> </li>
				<li><?php echo $this->Html->link(__('List Worktypes'), array('controller' => 'worktypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Worktype'), array('controller' => 'worktypes', 'action' => 'add')); ?> </li>
	</ul>
</div>
