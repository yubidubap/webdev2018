
function lettersOnly(txt, e) {
    var arr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
    var code;
    	if (window.event)
            code = e.keyCode;
        else
            code = e.which;
            var char = keychar = String.fromCharCode(code);
            if (arr.indexOf(char) == -1)
                return false;
        }

function numbersOnly(txt, e) {
    var arr = "1234567890";
    var code;
    	if (window.event)
            code = e.keyCode;
        else
            code = e.which;
            var char = keychar = String.fromCharCode(code);
            if (arr.indexOf(char) == -1)
                return false;
        }

function enableCurriculumCourse() 
{
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
 
function showOptions(str, currentFunction, url)
{
    if (window.XMLHttpRequest) 
    {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } 

    else 
    {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200) 
        {
        	currentFunction(this);
      	}
    };

    xmlhttp.open("GET", url+ "?q=" +str, true);
    xmlhttp.send();
}


function showCurriculum(xmlhttp)
{
	document.getElementById("curriculum").innerHTML = xmlhttp.responseText;
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
				stringLength: {
                        min: 2,
                        message: 'Please Enter your First name'

                },
        
				notEmpty: {
					message: 'Please Enter your First name'
				}
			}
		},

		middlename: {
			validators: {
				stringLength: {
                        min: 2,
                        message: 'Please Enter your Middle name'
                },
				notEmpty: {
					message: 'Please Enter your Middle name'
				}
			}
		},

		lastname: {
			validators: {
				stringLength: {
                        min: 2,
                        message: 'Please Enter your Last name'

                },
				notEmpty: {
					message: 'Please Enter your Last name'
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



