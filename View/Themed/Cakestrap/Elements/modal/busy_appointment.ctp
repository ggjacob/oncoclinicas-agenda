<div class="modal fade busy">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Novo Agendamento</h4>
      </div>
      <div class="modal-body">
        <p>
        	Horário Ocupado.
        </p>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default edit_appointment" >Editar Horário</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
      <?php echo $this->Form->end(); ?>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->