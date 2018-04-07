
$(document).ready(function(){
    $("#fname,#Mname,#lname").keypress(function(event){
        var inputValue = event.which;
        // allow letters and whitespaces only.
        if(!(inputValue >= 65 && inputValue <= 120) && (inputValue != 32 && inputValue != 0)) { 
            event.preventDefault(); 
        }
    });

    $('#mobNum').bind("cut copy paste drag drop", function(e) {
      e.preventDefault();
  	});     
});

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
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
 	
 	$("#accounttype").change(function() {
		var type = $("#accounttype").val();

		if(type != "Student")
		{
			$("#course").slideUp("fast");
			$("#curriculum").slideUp("fast");

			$("#course").prop("disabled", true);
			$("#curriculum").prop("disabled", true);

			$("#label1").fadeOut("fast");
			$("#label2").fadeOut("fast");
		}

		else
		{
			$("#course").slideDown("fast");
			$("#curriculum").slideDown("fast");

			$("#course").prop("disabled", false);
			$("#curriculum").prop("disabled", false);

			$("#label1").fadeIn("fast");
			$("#label2").fadeIn("fast");
		}
	});

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

		}
	});

});



