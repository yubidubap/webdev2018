
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

  function handleChange(input) {
    if (input.value < 20) input.value = 20;
    if (input.value > 40) input.value = "not more than 50";
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

        function showSubject(xmlhttp)
        {
            document.getElementById("subjects").innerHTML = xmlhttp.responseText;
        }

        function showSection(xmlhttp)
        {
            document.getElementById("section").innerHTML = xmlhttp.responseText;
        }

        function showCurriculumAndSection(val)
        {
            showOptions(val, showCurriculum, 'getCurriculum.php');
            showOptions(val, showSection, 'getSection.php');
            showOptions(val, showSubject, 'getSubject.php');
        }

        $(document).ready(function(){

            $("#labButton").click(function() {
                $("#timestartlab").val('Select Start Time');
                $("#timeendlab").val('Select End Time');
                $("#roomLab").val('Select Laboratory Room');
                $('input:checkbox').removeAttr('checked');
                $("#laboratorybtn").toggle("fast");
            });


            /*$("#subButton").click(function() {
                var course = $("#course").val();
                var curriculum = $("#curriculum").val();
                var sem = $('#semester').val();
                var sub = $('#subjects').val();
                var sec = $('#section').val();
                var roomLec = $('#roomLec').val();
                var timeSLec = $('#timestartlec').val();
                var timeELec = $('#timeendlec').val();
                var roomLab = $('#roomLab').val();
                var timeSLab = $('#timestartlab').val();
                var timeELab = $('#timeendlab').val();
                var schYear = $('#schoolYear').val();
                var slot = $('#slot').val();

                console.log(course);
                console.log(curriculum);
                console.log(sem);
                console.log(sub);
                console.log(sec);
                console.log(roomLec);
                console.log(timeSLec);
                console.log(timeELec);

                $('input[name="checklist"]:checked').each(function() {
                    console.log(this.value);
                });

                console.log(roomLab);
                console.log(timeSLab);
                console.log(timeELab);
                console.log(schYear);
                console.log(slot);

                alert("Success Bithes!");
            });*/

        });

 $(document).ready(function() {
 	
	$('#slot').bind("cut copy paste drag drop", function(e) {
	  e.preventDefault();
	});    

	$('#slot').bind("cut copy paste drag drop", function(e) {
	  e.preventDefault();
	});

	$('#validateSchedule').bootstrapValidator({
	feedbackIcons: {
		validating: 'glyphicon glyphicon-refresh'
	},

	fields: {

		Course: {
			validators: {
				notEmpty: {
					message: 'Choose student course'
				}
			}
		},

		Curriculum: {
			validators: {
				notEmpty: {
					message: 'Choose curriculum'
				}
			}
		},

		Semester: {
			validators: {
				notEmpty: {
					message: 'Please specify Semester'
				}
			}
		},

		Subject: {
			validators: {
				notEmpty: {
					message: 'Please select a Subject'
				}
			}
		},

		Section: {
			validators: {
				notEmpty: {
					message: 'Please select a Section'
				}
			}
		},

		SchoolYear: {
			validators: {
				notEmpty: {
					message: 'Please specify School Year'
				}
			}
		},
		Slot: {
			validators: {
	        	notEmpty: {
					message: 'Provide the number of slot'
					}
				}
			},
		TimeStartLec: {
			validators: {
				notEmpty: {
					message: 'Specify time to start'
				}
			}
		},

		TimeEndLec: {
			validators: {
				notEmpty: {
					message: 'Specify end time'
				}
			}
		},

		RoomLec: {
			validators: {
				notEmpty: {
					message: 'Select a room'
				}
			}
		},

		RoomLab:{
			validators: {
				notEmpty: {
					message: 'Select a room'
				}
			}
		},

		"checklist[]": {
			validators: {
				notEmpty: {
					message: 'Please select day/s'
				}
			}
		},

		"checklist1[]": {
			validators: {
				notEmpty: {
					message: 'Please select day/s'
				}
			}
		},

		TimeStartLab: {
			validators: {
				notEmpty: {
					message: 'Specify time to start'
				}
			}
		},

		TimeEndLab: {
			validators: {
				notEmpty: {
					message: 'Specify end time'
				}
			}
		},

		}
		});

	});


