if(typeof(ONCO) == "undefined"){
	ONCO = {};
}

/**
 *
 * @constructor Agenda
 */

ONCO.Agenda = function(){
    this.Appointments = {};
    this.setupDatePickerBrasil();
    this.dateSelected = $.datepicker.formatDate('yy-mm-dd', new Date());
    $(".data-selected").html($.datepicker.formatDate('DD, d - MM - yy', new Date()));
	this.setListeners();
    this.cleanAppointments();
    this.loadAppointments();
    this.selectedAppointment = null;
};

/**
 * Funcão para limpar a agenda
 */

ONCO.Agenda.prototype.cleanAppointments = function(){
    $(".appointment_schedule").remove();
};

/**
 *
 * Função responsável para adicionar ao dom os agendamentos buscados na função loadAppointments
 *
 */

ONCO.Agenda.prototype.addAppointments = function(objects){
    var self = this;
    var size = objects.length;
    for(var count = 0; count < size; count++){
        var appointment = objects[count].Appointment;
        var idRow = appointment.time.substr(0,5).replace(":", "");
        console.log(idRow);
        var row = document.getElementById(idRow);
        console.log(row);
        var cell = row.getElementsByClassName("subject-day");
        var fragment = document.createDocumentFragment();
        var elem = $('<div>', {class: "appointment_schedule"})[0];
        var icon = $('<span>', {class: "glyphicon glyphicon-time icon-appointment"})[0];
        var text = $('<span>', {class: "text-appointment"})[0];
        $(elem).data("appointment", appointment);
        $(text).html(appointment.patient_name)
        elem.appendChild(icon);
        elem.appendChild(text);
        fragment.appendChild(elem);
        cell[0].appendChild(fragment);
    }

    /**
     * Evento para edição ou cancelamento de um agendamento, exibe formulário
     */

    $(".appointment_schedule").click(function(e){
        e.preventDefault();
        $(".busy").modal('hide');
        var appoint = $(this).data("appointment");
        self.loadEditForm(appoint);
    });

};

/**
 *
 * Função responsável para buscar eventos na data selecionada
 *
 */

ONCO.Agenda.prototype.loadAppointments = function(){
    var form = {'date' : this.dateSelected};
    var self = this;
    $.ajax({
        type: "GET",
        url: "/appointments/load",
        data: form,
        dataType: "json",
        success: function(data){
            console.log(data);
            var objects = data.response;
            this.Appointments = { day : self.dateSelected, appointments : objects }
            self.addAppointments(objects);
        },

        error: function(data){
            console.log(data);
        }

    });
};

/**
 * Set Global Listeners
 */

ONCO.Agenda.prototype.setListeners = function(){

    var self = this;

    /**
     * Configuração de componente de calendário da página
     */

	$( "#datepicker" ).datepicker({
		showOn: "button",
		buttonText : '<span class="glyphicon glyphicon-calendar" ></span>',
		showButtonPanel: true,
		changeMonth: true,
      	changeYear: true,
      	dateFormat: "yy-mm-dd",
      	onSelect: function(data, object){
            var dateTypeVar = $('#datepicker').datepicker('getDate');
  			$(".data-selected").html($.datepicker.formatDate('DD, d - MM - yy', dateTypeVar));
            self.dateSelected = data;
            self.cleanAppointments();
            self.loadAppointments();
  		}
	});

    /**
     *
     * Configuração de componente de calendário do formulário de Agendamento
     *
     */

	$( ".date-form" ).datepicker({
		showOn: "button",
		buttonText : '<span class="icon glyphicon glyphicon-calendar" ></span>',
		showButtonPanel: true,
		changeMonth: true,
      	changeYear: true,
      	dateFormat: "yy'-'mm'-'dd",
      	onSelect: function(date, object){
//  			$(".data-selected").html(date);
  		}
	});

    /**
     *
     * Evento para clique duplo do mouse em uma linha de tempo para visualização do formulário de novo Agendamento
     * Escuta parte vazia da linha
     * Consiste se a linha já tem um agendamento e exibe modal para confirmação de edição do agendamento atual
     *
     */

	$(".date-line-selected").dblclick(function(e){
		var tdSelected = e.target;
		var rowSelected = tdSelected.parentNode;
		var tdData = rowSelected.getElementsByClassName("header-cal-day")[0];
        var tdSubject = rowSelected.getElementsByClassName("subject-day")[0];

        if($(tdSubject).html() != ""){
            var appointment = tdSubject.getElementsByClassName("appointment_schedule")[0];
            self.selectedAppointment = $(appointment).data("appointment");
            $('.busy').modal();
        }else{
            var selectedDataTime = tdData.getAttribute("data-time");
            $(".id-field").val("");
            if($("#add_appointment").hasClass("editar")){
                $("#add_appointment").removeClass(("editar"));
            }
            $(".date-field").val(self.dateSelected);
            $(".time-field").val(selectedDataTime);
            $(".modal-title").html("Novo Agendamento");
            $("#cancel_appointment").css("display", "none");
            $("#AppointmentPatientName").val("");
            $("#AppointmentPatientName").prop("disabled", false);
            $("#AppointmentBirthDate").val("");
            $("#AppointmentBirthDate").prop("disabled", false);
            $("#AppointmentPhone").val("");
            $("#AppointmentDoctorName").val("");
            $('.appointment_modal').modal();
        }

	});


    /**
     * Evento para adição de um novo Agendamento
     *
     * Requisição Ajax para o método add da classe AppointmentsController
     *
     */

	$("#add_appointment").click(function(e){
		e.preventDefault();
		var form = $("#AppointmentDayForm").serialize();
        var endPoint = "/appointments/add";
        if($("#add_appointment").hasClass("editar")){
            endPoint += "/" + $(".id-field");
            $("#add_appointment").removeClass("editar");
        }
		$.ajax({
	       type: "POST",
	       url: endPoint,
	       data: form,

	       success: function(data){
	           $('.appointment_modal').modal('hide');
               ONCO.Agenda.cleanAppointments();
               ONCO.Agenda.loadAppointments();
	           //$(".success").fadeIn(500).delay(2000).fadeOut(500);
               $(".success-message").html("Compromisso Agendado com Sucesso.");
               $('.success-modal').modal();
	           $("#AppointmentDayForm")[0].reset();

	       },

	       error: function(data){
               $(".error-message").html("Erro ao Agendar Compromisso.");
               $('.error-modal').modal();
	       	   console.log(data);
               $("#AppointmentDayForm")[0].reset();
	       }

     	});
	});

    /**
     * Evento para visualização do formulário de Edição e Cancelamento do Agendamento
     */

    $(".edit_appointment").click(function(e){
        e.preventDefault();
        $(".busy").modal('hide');
        var appoint = self.selectedAppointment;
        self.loadEditForm(appoint);

    });

    /**
     * Evento para Cancelar um Agendamento
     *
     * Requisição Ajax para o método deletar da classe AppointmentsController passando o id do Agendamento
     *
     */

    $("#cancel_appointment").click(function(e){
        e.preventDefault();
        var id = $(".id-field").val();
        var self = this;
        $.ajax({
            type: "POST",
            url: "/appointments/delete/" + id,
            data: id,

            success: function(data){
                $('.appointment_modal').modal('hide');
                ONCO.Agenda.cleanAppointments();
                ONCO.Agenda.loadAppointments();
                //$(".success").fadeIn(500).delay(2000).fadeOut(500);
                $(".success-message").html("Compromisso Cancelado com Sucesso.");
                $('.success-modal').modal();
                $("#AppointmentDayForm")[0].reset();

            },

            error: function(data){
                $(".error-message").html("Erro ao Cancelar Compromisso.");
                $('.error-modal').modal();
                $("#AppointmentDayForm")[0].reset();
                console.log(data);
            }

        });
    });
};

ONCO.Agenda.prototype.loadEditForm = function(appoint){
    $(".modal-title").html("Agendamento");
    $("#cancel_appointment").css("display", "inline block");
    $("#AppointmentPatientName").val(appoint.patient_name);
    $("#AppointmentPatientName").prop("disabled", true);;
    $("#AppointmentBirthDate").val(appoint.birth_date);
    $("#AppointmentBirthDate").prop("disabled", true);
    $("#AppointmentPhone").val(appoint.phone);
    $("#AppointmentDoctorName").val(appoint.doctor_name);
    $(".id-field").val(appoint.id);
    $("#add_appointment").addClass("editar");
    $('.appointment_modal').modal();
};

/**
 * Setup DatePicker(Componente de Calendário) para Português Brasil
 */

ONCO.Agenda.prototype.setupDatePickerBrasil = function(){
    $.datepicker.regional['pt-BR'] = {
        closeText: 'Fechar',
        prevText: 'Anterior',
        nextText: 'Próximo',
        currentText: 'Hoje',
        monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho',
            'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan.','Fev.','Mar','Abr','Mai','Jun',
            'Jul.','Ago','Set.','Out.','Nov.','Dec.'],
        dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
        dayNamesShort: ['Dom.','Seg.','Ter.','Qua.','Qui.','Sex.','Sab.'],
        dayNamesMin: ['D','S','T','Q','Q','S','S'],
        weekHeader: 'Sem.',
        dateFormat: 'dd/mm/yy',
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''};
    $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
};

/**
 * Load Agenda JS Library
 */

jQuery(function($){
	ONCO.Agenda = new ONCO.Agenda();
});
