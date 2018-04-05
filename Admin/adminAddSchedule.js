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