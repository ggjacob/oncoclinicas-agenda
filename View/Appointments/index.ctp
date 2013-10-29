
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Html->link(__('New Appointment'), array('action' => 'add'), array('class' => '')); ?></li>						<li class="list-group-item"><?php echo $this->Html->link(__('List Agendas'), array('controller' => 'agendas', 'action' => 'index'), array('class' => '')); ?></li> 
		<li class="list-group-item"><?php echo $this->Html->link(__('New Agenda'), array('controller' => 'agendas', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="appointments index">
		
			<h2><?php echo __('Appointments'); ?></h2>
			
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
					<thead>
						<tr>
															<th><?php echo $this->Paginator->sort('id'); ?></th>
															<th><?php echo $this->Paginator->sort('patient_name'); ?></th>
															<th><?php echo $this->Paginator->sort('birth_date'); ?></th>
															<th><?php echo $this->Paginator->sort('phone'); ?></th>
															<th><?php echo $this->Paginator->sort('doctor_name'); ?></th>
															<th><?php echo $this->Paginator->sort('agenda_id'); ?></th>
															<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($appointments as $appointment): ?>
	<tr>
		<td><?php echo h($appointment['Appointment']['id']); ?>&nbsp;</td>
		<td><?php echo h($appointment['Appointment']['patient_name']); ?>&nbsp;</td>
		<td><?php echo h($appointment['Appointment']['birth_date']); ?>&nbsp;</td>
		<td><?php echo h($appointment['Appointment']['phone']); ?>&nbsp;</td>
		<td><?php echo h($appointment['Appointment']['doctor_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($appointment['Agenda']['name'], array('controller' => 'agendas', 'action' => 'view', $appointment['Agenda']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $appointment['Appointment']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $appointment['Appointment']['id']), array('class' => 'btn btn-default btn-xs')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $appointment['Appointment']['id']), array('class' => 'btn btn-default btn-xs'), __('Are you sure you want to delete # %s?', $appointment['Appointment']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
					</tbody>
				</table>
			</div><!-- /.table-responsive -->
			
			<p><small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>			</small></p>

			<ul class="pagination">
				<?php
		echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
		echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	?>
			</ul><!-- /.pagination -->
			
		</div><!-- /.index -->
	
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
