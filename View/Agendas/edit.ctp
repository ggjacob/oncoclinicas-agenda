
<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">
		
		<div class="actions">
		
			<ul class="list-group">
										<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Agenda.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Agenda.id'))); ?></li>
										<li class="list-group-item"><?php echo $this->Html->link(__('List Agendas'), array('action' => 'index')); ?></li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Appointments'), array('controller' => 'appointments', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Appointment'), array('controller' => 'appointments', 'action' => 'add')); ?> </li>
			</ul><!-- /.list-group -->
		
		</div><!-- /.actions -->
		
	</div><!-- /#sidebar .col-sm-3 -->
	
	<div id="page-content" class="col-sm-9">

		<div class="agendas form">
		
			<?php echo $this->Form->create('Agenda', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
				<fieldset>
					<h2><?php echo __('Edit Agenda'); ?></h2>
			<div class="form-group">
	<?php echo $this->Form->label('id', 'id');?>
		<?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
</div><!-- .form-group -->

<div class="form-group">
	<?php echo $this->Form->label('name', 'name');?>
		<?php echo $this->Form->input('name', array('class' => 'form-control')); ?>
</div><!-- .form-group -->

				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div><!-- /.form -->
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->
