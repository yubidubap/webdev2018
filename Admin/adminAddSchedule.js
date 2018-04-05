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
		RoomLab: {
			validators: {
				notEmpty: {
					message: 'Select a room'
				}
			}
		},
		labday: {
			validators: {
				notEmpty: {
					message: 'Please select a day/s'
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



