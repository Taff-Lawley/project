<div class="environmentsUsers view">
<h2><?php  echo __('Environments User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($environmentsUser['EnvironmentsUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($environmentsUser['User']['username'], array('controller' => 'users', 'action' => 'view', $environmentsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Environment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($environmentsUser['Environment']['name'], array('controller' => 'environments', 'action' => 'view', $environmentsUser['Environment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($environmentsUser['Group']['name'], array('controller' => 'groups', 'action' => 'view', $environmentsUser['Group']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Environments User'), array('action' => 'edit', $environmentsUser['EnvironmentsUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Environments User'), array('action' => 'delete', $environmentsUser['EnvironmentsUser']['id']), null, __('Are you sure you want to delete # %s?', $environmentsUser['EnvironmentsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Environments Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environments User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Environments'), array('controller' => 'environments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environment'), array('controller' => 'environments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
