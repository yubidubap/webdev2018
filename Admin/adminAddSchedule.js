function numbersOnly(txt, e) {
    var arr = "1234567890";
    var code;
    	if (window.event)
            code = e.keyCode;
        else
        {
            code = e.which;
            var char = keychar = String.fromCharCode(code);
            if (arr.indexOf(char) == -1)
                return false;
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
					message: 'Please specify the total number of slots'
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
		lecday: {
			validators: {
				notEmpty: {
					message: 'Please select a day/s'
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

 	$(document).ready(function () {
		$("input[name='lecday']").change(function () {
			var maxAllowed = 3;
			var cnt = $("input[name='lecday']:checked").length;
				if (cnt > maxAllowed) {
					$(this).prop("checked", "");
						            
				}
		});
	});

 	$(document).ready(function () {
		$("input[name='labday']").change(function () {
			var maxAllowed = 3;
			var cnt = $("input[name='labday']:checked").length;
			if (cnt > maxAllowed) {
				$(this).prop("checked", "");
				// alert('You can select maximum ' + maxAllowed + ' of days!!');
			}
		});
	});



