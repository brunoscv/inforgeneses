//;
$(function() {
	$("#form_user").validate({
		ignore : [],
		errorElement : "em",
		onfocusout : function(element) {
			if ((!this.check(element) || !this.checkable(element) ) && (element.name in this.submitted || !this.optional(element))) {
				var currentObj = this;
				var currentElement = element;
				var delay = function() {
					currentObj.element(currentElement);
				};
				setTimeout(delay, 0);
			}
		},
		invalidHandler : function(form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				validator.errorList[0].element.focus();
				var aba = $(validator.errorList[0].element).parents('div.tab-pane').attr('id');
				$("[href='#" + aba + "']").click();
			}
			return false;
		},
		rules : {
			name : {
				required : true
			},
			email : {
				email : true
			},
			username : {
				required : true,
				remote : {
					url : base_url + "users/userExists",
					data:{id:$("#id").val()}
				}
			},
			password : {
				required : true,
				minlength : 6
			},
			password2 : {
				required : true,
				equalTo : '#password'
			},
			"profiles[]":{
				required : true,
				min_length: 1,
			}
		},
		messages : {
			user:{
				remote: "Usuário já cadastrado"
			}
		}
	});

	$("#form_updatepassword").validate({
		ignore : [],
		errorElement : "em",
		onfocusout : function(element) {
			if ((!this.check(element) || !this.checkable(element) ) && (element.name in this.submitted || !this.optional(element))) {
				var currentObj = this;
				var currentElement = element;
				var delay = function() {
					currentObj.element(currentElement);
				};
				setTimeout(delay, 0);
			}
		},
		invalidHandler : function(form, validator) {
			var errors = validator.numberOfInvalids();
			if (errors) {
				validator.errorList[0].element.focus();
				var aba = $(validator.errorList[0].element).parents('div.tab-pane').attr('id');
				$("[href='#" + aba + "']").click();
			}
			return false;
		},
		rules : {
			password_old : {
				required : true,
				minlength : 6
			},
			new_password : {
				required : true,
				minlength : 6
			},
			password2 : {
				required : true,
				equalTo : '#new_password'
			}
		}
	});
}); 