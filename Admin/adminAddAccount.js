		function lettersOnly(input) {
		    	var regex = /[^a-z " "]/gi ;
		    	input.value = input.value.replace(regex, "");}

		function numbersOnly(input) {
		    	var regex = /[^0-9]/gi ;
		    	input.value = input.value.replace(regex, "");}


		function enableCurriculumCourse() {
				var x = document.getElementById("accounttype").value;

				if (x == "Student")
				{
					document.getElementById("course").disabled = false;
					document.getElementById("curriculum").disabled = false;
				}

				else
				{
					document.getElementById("course").setAttribute('disabled', true);
					document.getElementById("curriculum").setAttribute('disabled', true);
				}
			}
 

 $(document).ready(function() {
	$('#validateForm').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {

		role: {
			validators: {
				notEmpty: {
					message: 'Choose your user role'
				}
			}
		},

		course: {
			validators: {
				notEmpty: {
					message: 'Choose student course'
				}
			}
		},

		curriculum: {
			validators: {
				notEmpty: {
					message: 'Choose curriculum'
				}
			}
		},

		firstname: {
			validators: {
				/*stringLength: {

					message: 'Please Enter your Full name with minimum of 5 letters max: 20'
				},*/
				notEmpty: {
					message: 'Please Enter your Full name'
				}
			}
		},

		middlename: {
			validators: {
				notEmpty: {
					message: 'Please Enter your Full name'
				}
			}
		},

		lastname: {
			validators: {
				notEmpty: {
					message: 'Please Enter your Full name'
				}
			}
		},		

		mobilenumber: {
			validators: {
				phone: {
					min: 11,
					message: 'The phone no must be a number'
				},
				notEmpty: {
					message: 'Please Enter your phone number'
				}
			}
		},
		email: {
			validators: {
				notEmpty: {
					message: 'Please Enter your email address'
				},
				emailAddress: {
					message: 'Please Enter a valid email address'
				}
			}
		},
		 	password: {
            validators: {
            	identical: {
                    field: 'confirmPassword',
                    message: 'Confirm your password below - type same password please'
                }
            }
        },
        confirmPassword: {
            validators: {
                identical: {
                    field: 'password',
                    message: 'The password and its confirm are not the same'
                }
            }
         },
		
		semester: {
			validators: {
				notEmpty: {
					message: 'Choose semester'
				}
			}
		},

		section: {
			validators: {
				notEmpty: {
					message: 'Choose section'
				}
			}
		},

		timeend: {
			validators: {
				notEmpty: {
					message: 'Choose section'
				}
			}
		},	

		timestart: {
			validators: {
				notEmpty: {
					message: 'Choose section'
				}
			}
		},			

		room: {
			validators: {
				notEmpty: {
					message: 'Choose section'
				}
			}
		},

		timestart: {
			validators: {
				notEmpty: {
					message: 'The gender option is required'
				}
			}
		},		


		}
		});

	});



