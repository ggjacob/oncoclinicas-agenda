
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
			
			<ul class="list-group">			
						<li class="list-group-item"><?php echo $this->Html->link(__('Edit Appointment'), array('action' => 'edit', $appointment['Appointment']['id']), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete Appointment'), array('action' => 'delete', $appointment['Appointment']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $appointment['Appointment']['id'])); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Appointments'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Appointment'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Agendas'), array('controller' => 'agendas', 'action' => 'index'), array('class' => '')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Agenda'), array('controller' => 'agendas', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- /.list-group -->
			
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .span3 -->
	
	<div id="page-content" class="col-sm-9">
		
		<div class="appointments view">

			<h2><?php  echo __('Appointment'); ?></h2>
			
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>
						<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($appointment['Appointment']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Patient Name'); ?></strong></td>
		<td>
			<?php echo h($appointment['Appointment']['patient_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Birth Date'); ?></strong></td>
		<td>
			<?php echo h($appointment['Appointment']['birth_date']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Phone'); ?></strong></td>
		<td>
			<?php echo h($appointment['Appointment']['phone']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Doctor Name'); ?></strong></td>
		<td>
			<?php echo h($appointment['Appointment']['doctor_name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Agenda'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($appointment['Agenda']['name'], array('controller' => 'agendas', 'action' => 'view', $appointment['Agenda']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->
			
		</div><!-- /.view -->

			
	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->
