<div class="contactpeople index">
	<h2><?php echo __('Contactpeople'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('environment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('telephone'); ?></th>
			<th><?php echo $this->Paginator->sort('remarks'); ?></th>
			<th><?php echo $this->Paginator->sort('client_id'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($contactpeople as $contactperson): ?>
	<tr>
		<td><?php echo h($contactperson['Contactperson']['id']); ?>&nbsp;</td>
		<td><?php echo h($contactperson['Contactperson']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contactperson['Environment']['name'], array('controller' => 'environments', 'action' => 'view', $contactperson['Environment']['id'])); ?>
		</td>
		<td><?php echo h($contactperson['Contactperson']['telephone']); ?>&nbsp;</td>
		<td><?php echo h($contactperson['Contactperson']['remarks']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contactperson['Client']['name'], array('controller' => 'clients', 'action' => 'view', $contactperson['Client']['id'])); ?>
		</td>
		<td><?php echo h($contactperson['Contactperson']['email']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contactperson['Contactperson']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contactperson['Contactperson']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contactperson['Contactperson']['id']), null, __('Are you sure you want to delete # %s?', $contactperson['Contactperson']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Contactperson'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Environments'), array('controller' => 'environments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Environment'), array('controller' => 'environments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('controller' => 'clients', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Client'), array('controller' => 'clients', 'action' => 'add')); ?> </li>
	</ul>
</div>
