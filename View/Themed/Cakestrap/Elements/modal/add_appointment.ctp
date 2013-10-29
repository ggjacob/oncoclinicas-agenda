<div class="modal fade appointment_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Novo Agendamento</h4>
      </div>
      <div class="modal-body">
        <p>
        	<div class="appointments form">
		
			    <?php echo $this->Form->create('Appointment', array('inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                <fieldset>
                    <?php echo $this->Form->input('date', array('class' => 'date-field', 'type' => 'hidden')); ?>
                    <?php echo $this->Form->input('time', array('class' => 'time-field', 'type' => 'hidden')); ?>
                    <?php echo $this->Form->input('id', array('class' => 'id-field', 'type' => 'hidden')); ?>
                    <div class="form-group">
                        <?php echo $this->Form->input('patient_name', array('class' => 'form-control', 'label' => 'Nome do Paciente')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('birth_date', array('class' => 'form-control date-form', 'label' => 'Data de Nascimento', 'type' => 'text')); ?>
                    </div><!-- .form-group -->

                    <div class="form-group">
		                <?php echo $this->Form->input('phone', array('class' => 'form-control', 'label' => 'Telefone')); ?>
                    </div><!-- .form-group -->

                    <div class="form-group">
		                <?php echo $this->Form->input('doctor_name', array('class' => 'form-control', 'label' => 'Nome do Médico')); ?>
                    </div><!-- .form-group -->

                    <div class="form-group">
		                <?php echo $this->Form->input('agenda_id', array('class' => 'form-control', 'type' => 'hidden', 'value' => '1')); ?>
                    </div><!-- .form-group -->
				</fieldset>
			
		    </div><!-- /.form -->
        </p>
      </div>
      <div class="modal-footer">
        <input type="button" id="add_appointment" class="btn btn-primary" value="Confirmar" />
        <input type="button" id="cancel_appointment" class="btn btn-warning hidden" value="Cancelar Consulta" />
      </div>
      <?php echo $this->Form->end(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
