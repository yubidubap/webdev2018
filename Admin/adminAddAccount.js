
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

 $("#subButton").click(function() {
 		var acctType = $("#accounttype").val();
		var course = $("#course").val();
		var curr = $("#curriculum").val();
		var fName = $("#fname").val();
		var mName = $("#Mname").val();
		var lName = $("#lname").val();
		var num = $("#mobNum").val();
		var email = $("#email").val();
		var confPass = $("#pass2").val();

		var number = "+63".concat(num);

		console.log(acctType);
		console.log(course);
		console.log(curr);
		console.log(fName);
		console.log(mName);
		console.log(lName);
		console.log(number);
		console.log(email);
		console.log(confPass);

     	$.ajax(
		{
			type: "POST",
			url:  "insertAccount.php",
			data: { acctType: acctType,
	        		course: course,
					curr: curr,
					fName: fName,
					mName: mName,
					lName: lName,
					number: number,
					email: email,
					confPass: confPass
				},

			success: function(data)
			{
				alert("Success Added!");
			}
		});
 	});

 	$("#accounttype").change(function() {
		var type = $("#accounttype").val();

		if(type != "Student")
		{
			$("#course").slideUp("fast");
			$("#curriculum").slideUp("fast");

			$("#label1").fadeOut("fast");
			$("#label2").fadeOut("fast");
		}

		else
		{
			$("#course").slideDown("fast");
			$("#curriculum").slideDown("fast");

			$("#label1").fadeIn("fast");
			$("#label2").fadeIn("fast");
		}
	});

		

	$('#validateForm').bootstrapValidator({

		
		feedbackIcons: {

			validating: 'glyphicon glyphicon-refresh'
		},

		fields: {

			accountType: {
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

		}
	});

});






