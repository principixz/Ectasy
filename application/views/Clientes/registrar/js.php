<script>  
cargar_departamentos();
    $("#departamento").change(function(){dependencia_provincia();});
    $("#provincia").change(function(){dependencia_distrito();});
    $("#provincia").attr("disabled",true);
    $("#distrito").attr("disabled",true);
var datos="<option value=''>Seleccione...</option";
function cargar_departamentos()
{

    $.post("<?php echo site_url('Personal_c/cargar_departamentos');?>" , function(data){
        if(data == false)
        {
            alert("Error");
        }
        else
        {
            $('#departamento').append(data);            
        }
    }); 
}
function dependencia_provincia()
{
    var code = $("#departamento").val();
    $.post("<?php echo site_url('Personal_c/cargar_provincias');?>", { code: code },
        function(resultado)
        {
            if(resultado == false)
            {
                
                $("#provincia").attr("disabled",true);  
                $("#distrito").attr("disabled",true);
                $("#provincia").empty("disabled",true); 
                $("#distrito").empty("disabled",true);  
                $("#provincia").append(datos);  
                $("#distrito").append(datos);
            }
            else
            {
                $("#provincia").attr("disabled",false);
                document.getElementById("provincia").options.length=1;
                $('#provincia').append(resultado);          
            }
        }

    );
}
function dependencia_distrito()
{
    var code = $("#provincia").val();
    $.post("<?php echo site_url('Personal_c/cargar_distrito');?>", { code: code }, function(resultado){
        if(resultado == false)
        {
            $("#distrito").attr("disabled",true);
            $("#distrito").append(datos);   
        }
        else
        {
            $("#distrito").attr("disabled",false);
            document.getElementById("distrito").options.length=1;
            $('#distrito').append(resultado);           
        }
    }); 
    
}
    var validateCheckRadio = function (val) {
        $("input[type='radio'], input[type='checkbox']").on('ifChecked', function(event) {
            $(this).parent().closest(".has-error").removeClass("has-error").addClass("has-success").find(".help-block").hide().end().find('.symbol').addClass('ok');
        });
    };
    var fecha = function() {
        $('.date-picker').datepicker({
        format: 'mm-dd-yyyy',
      endDate: '+0d',
      autoclose: true
        });
        $('.date-picker').keypress(function(evt){
            return false;
        });
    };
    fecha(); 

    var wizardContent = $('#wizard');
    var wizardForm = $('#form');
    var numberOfSteps = $('.swMain > ul > li').length;
    var initWizard = function () {
        // function to initiate Wizard Form
        wizardContent.smartWizard({
            selected: 0,
            keyNavigation: false,
            onLeaveStep: leaveAStepCallback,
            onShowStep: onShowStep,
        });
        var numberOfSteps = 0;
        animateBar();
        initValidator();
    };
    var animateBar = function (val) {
        if ((typeof val == 'undefined') || val == "") {
            val = 1;
        };
        
        var valueNow = Math.floor(100 / numberOfSteps * val);
        $('.step-bar').css('width', valueNow + '%');
    };
    var validateCheckRadio = function (val) {
        $("input[type='radio'], input[type='checkbox']").on('ifChecked', function(event) {
			$(this).parent().closest(".has-error").removeClass("has-error").addClass("has-success").find(".help-block").remove().end().find('.symbol').addClass('ok');
		});
    };    
    var initValidator = function () {
        $.validator.addMethod("cardExpiry", function () {
            //if all values are selected
            if ($("#card_expiry_mm").val() != "" && $("#card_expiry_yyyy").val() != "") {
                return true;
            } else {
                return false;
            }
        }, 'Please select a month and year');
        $.validator.setDefaults({
            errorElement: "span", // contain the error msg in a span tag
            errorClass: 'help-block',
            errorPlacement: function (error, element) { // render error placement for each input type
                if (element.attr("type") == "radio" || element.attr("type") == "checkbox") { // for chosen elements, need to insert the error after the chosen container
                    error.insertAfter($(element).closest('.form-group').children('div').children().last());
                } else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
                    error.appendTo($(element).closest('.form-group').children('div'));
                } else {
                    error.insertAfter(element);
                    // for other inputs, just perform default behavior
                }
            },
            ignore: ':hidden',
            rules: {
                 nombre: {
                    minlength: 2,
                    required: true,
                },
                materno: {
                    minlength: 2,
                    required: true
                },
                paterno: {
                    minlength: 2,
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
              
                fecha: {
                	required:true
                },
               
                departamento: {
                	required: true,
                },
                provincia: {
                	required: true,
                },
                distrito: {
                	required: true,
                },
               
                sexo: {
                    required: true
                },

                emergencia: {
                    required: true,
                    number: true
                },
                tipo_empleado: {
                    required: true
                },
                fijo: {
                    
                    number: true,
                    minlength: 6
                },
                celular: {

                    required: true,
                    number: true,
                    minlength: 9
                },
                direccion: {
                    required: true,
                    minlength: 9
                },
                documento: {
                    required: true,
                    maxlength:15
                    
                },
                hijos: {
                        
                    number: true
                },
                tipo_documento: {
                    required: true
                },

            },
            messages: {
                nombre: "Por favor especifica tu nombre",
                materno: "Por favor especifica tu Apellido Materno",
                paterno: "Por favor especifica tu Apellido Paterno",
                celular: "Por favor ingrese numero valido",
                direccion: "Por favor ingrese direccion valida",
                fijo: "Por favor ingresar numero valido",
                departamento: "Seleccione una opcion",
                provincia: "Seleccione una opcion",
                distrito: "Seleccione una opcion",
                tipo_empleado: "Seleccione una opcion",
                documento: "Seleccione una opcion",
                tipo_documento: "Seleccione una opcion",
                fecha: "Introducir la fecha de Nacimiento",
                email: {
                    required: "Nosotros necesitamos el correo electronico!!",
                    email: "Ingrese su correo en este formato ejemplo@gmail.com"
                },
                sexo: "Por favor seleccione el genero!"
            },
            groups: {
                DateofBirth: "dd mm yyyy",
            },
            highlight: function (element) {
                $(element).closest('.help-block').removeClass('valid');
                // display OK icon
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                // add the Bootstrap error class to the control group
            },
            unhighlight: function (element) { // revert the change done by hightlight
                $(element).closest('.form-group').removeClass('has-error');
                // set error class to the control group
            },
            success: function (label, element) {
                label.addClass('help-block valid');
                // mark the current input as valid and display OK icon
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            }
        });
    };
    var displayConfirm = function () {
        $('.display-value', form).each(function () {
            var input = $('[name="' + $(this).attr("data-display") + '"]', form);
            if (input.attr("type") == "text" || input.attr("type") == "email" || input.is("textarea")) {
                $(this).html(input.val());
            } else if (input.is("select")) {
                $(this).html(input.find('option:selected').text());
            } else if (input.is(":radio") || input.is(":checkbox")) {

                $(this).html(input.filter(":checked").closest('label').text());
            } else if ($(this).attr("data-display") == 'card_expiry') {
                $(this).html($('[name="card_expiry_mm"]', form).val() + '/' + $('[name="card_expiry_yyyy"]', form).val());
            }
        });
    };
    var onShowStep = function (obj, context) {
    	if(context.toStep == numberOfSteps){
    		$('.anchor').children("li:nth-child(" + context.toStep + ")").children("a").removeClass('wait');
            displayConfirm();
    	}
        $(".next-step").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goForward");
        });
        $(".back-step").unbind("click").click(function (e) {
            e.preventDefault();
            wizardContent.smartWizard("goBackward");
        });
        $(".finish-step").unbind("click").click(function (e) {
            e.preventDefault();
            onFinish(obj, context);
        });
    };
    var leaveAStepCallback = function (obj, context) {
        return validateSteps(context.fromStep, context.toStep);
        // return false to stay on step and true to continue navigation
    };
    var onFinish = function (obj, context) {
        if (validateAllSteps()) {
            var descripcion = $("input[name=descripcion]").val();
            
            $('.anchor').children("li").last().children("a").removeClass('wait').removeClass('selected').addClass('done').children('.stepNumber').addClass('animated tada');
            cargardatos();
        }
    };

    function cargardatos(){
        $.blockUI({
                    message : '<i class="fa fa-spinner fa-spin"></i>Estamos Registrando al Cliente... Espere por favor',
                   responseTime : 1000,
          });
            $.ajax({
            url : "<?php echo site_url('Clientes_c/guardar_cliente'); ?>",
            data : {    nombre : $('#nombre').val(),paterno : $('#paterno').val(),materno : $('#materno').val(), sexo : $('#sexo').val(),
                tipo_documento : $('#tipo_documento').val(),documento : $('#documento').val(),direccion : $('#direccion').val(),email : $('#email').val(),
                fijo : $('#fijo').val(),fecha : $('#fecha').val(), distrito : $('#distrito').val(),hijos : $('#hijos').val(),rango :$('#rango').val(),
                sangre : $('#sangre').val(),estadoc : $('#estadoc').val(),emergencia : $('#emergencia').val(),alergia : $('#alergia').val(),
                segurom : $('#segurom').val(),ocupacion : $('#ocupacion').val(),enfermedad : $('#enfermedad').val(),medicamento : $('#medicamento').val(),
                grado : $('#grado').val(),alias : $('#alias').val(),hobby : $('#hobby').val(), celular : $('#celular').val() },
            type : 'POST',
            dataType : 'json',
         
            
            success : function(json) {
                $.unblockUI({});
                swal({
                title: "Se Guardo Correctamente!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/like.png';?>"
                });
                
                location.href = "<?php echo site_url().'Clientes_c'; ?>";
            },
             error : function(xhr, status) {
                $.unblockUI({});
                swal({
                title: "Disculpe ocurrio un problema!",
                // text: "Here's a custom image.",
                imageUrl: "<?php echo base_url().'public/images/dislike.png';?>"
                });
            },  
        });
            //
    };
    function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
        var validateSteps = function (stepnumber, nextstep) {
        var isStepValid = false;
        
        
        if (numberOfSteps >= nextstep && nextstep > stepnumber) {
        	
            // cache the form element selector
            if (wizardForm.valid()) { // validate the form
                wizardForm.validate().focusInvalid();
                for (var i=stepnumber; i<=nextstep; i++){
        		$('.anchor').children("li:nth-child(" + i + ")").not("li:nth-child(" + nextstep + ")").children("a").removeClass('wait').addClass('done').children('.stepNumber').addClass('animated tada');
        		}
                //focus the invalid fields
                animateBar(nextstep);
                isStepValid = true;
                return true;
            };
        } else if (nextstep < stepnumber) {
        	for (i=nextstep; i<=stepnumber; i++){
        		$('.anchor').children("li:nth-child(" + i + ")").children("a").addClass('wait').children('.stepNumber').removeClass('animated tada');
        	}
            
            animateBar(nextstep);
            return true;
        } 
    };
    var validateAllSteps = function () {
        var isStepValid = true;
        // all step validation logic
        return isStepValid;
    };

            initWizard();
            validateCheckRadio();
       
function validarNum(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) return true;
    patron = /\d/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

</script>