$(function() {


	// validação formulário criação de usuário site
	$( "#form_usuarios" ).validate( {
		// debug: true,
		rules: {
			nome: "required",
			email: {
				required: true,
				email: true
			},
			telefone: {
				required: true,
				minlength: 13,
			},
			senha: {
				required: true,
				minlength: 6
			},
			senha2: {
				required: true,
				// minlength: 6,
				equalTo: "#senha"
			},
		},
		messages: {
			nome: "Digite seu nome e sobrenome.",
			email: "Digite um e-mail válido.",
			telefone: "Digite seu telefone com DDD.",
			senha: {
				required: "Digite sua senha.",
				minlength: "Sua senha deve ter pelo menos 6 caracteres."
			},
			senha2: {
				required: "Digite novamente sua senha",
				// minlength: "Sua senha deve ter pelo menos 6 caracteres.",
				equalTo: "Senhas não coincidem. Tente novamente."
			}
		},
		errorElement: "em",
		errorPlacement: function ( error, element ) {
			// Add the `help-block` class to the error element
			error.addClass( "help-block" );
			// Add `has-feedback` class to the parent div.form-group
			// in order to add icons to inputs
			element.parent().addClass( "has-feedback" );

			if ( element.prop( "type" ) === "checkbox" ) {
				error.insertAfter( element.parent( "label" ) );
			} else {
				error.insertAfter( element );
			}

			// Add the span element, if doesn't exists, and apply the icon classes to it.
			if ( !element.next( "span" )[ 0 ] ) {
				$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
			}
		},
		success: function ( label, element ) {
			// Add the span element, if doesn't exists, and apply the icon classes to it.
			if ( !$( element ).next( "span" )[ 0 ] ) {
				$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
			}
		},
		highlight: function ( element, errorClass, validClass ) {
			// adiciona classe de campo inválido ao elemento
			$( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
			// aumenta a margem inferior do elemento para exibição da mensagem de ajuda
			$( element ).parent().parent().addClass( "mb-4" ).removeClass( "mb-2" );
			// define cor de erro para o input
			$( element ).attr("style", "color: #fb6340 !important");

			$( element ).parent().addClass( "has-danger" ).removeClass( "has-success" );
			$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
		},
		unhighlight: function ( element, errorClass, validClass ) {
			// remove a classe de campo inválido do elemento
			$( element ).removeClass( "is-invalid" );;
			// retorna a margem inferior do elemento para o padrão
			$( element ).parent().parent().addClass( "mb-2" ).removeClass( "mb-4" );
			// remove cor de erro do input 
			$( element ).removeAttr("style", "color: #fb6340 !important");

			$( element ).parent().removeClass( "has-danger" );
			$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
		}
	} );


}); 