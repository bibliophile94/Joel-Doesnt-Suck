function get(id)
{
	return document.getElementById(id);
}
var rows = 0;
// adds a row to the people table one of the form pages with the following values in the arguments list
function addRow(person,father,grandfather,surname,role,occupation,title)
{
	person = person == undefined ? '' : person;
	father = father == undefined ? '' : father;
	grandfather = grandfather == undefined ? '' : grandfather;
	surname = surname == undefined ? '' : surname;
	role = role == undefined ? '' : role;
	occupation = occupation == undefined ? '' : occupation;
	title = title == undefined ? '' : title;

	// if(rows>15)
	// {
	// 	alert('Too many people in the people table.');
	// 	return false;
	// }
	rows++;
	get('start').innerHTML += '<div id="next'+(rows)+'"><span><input size="15" type="text" name="PersonName[]" value="'+person+'"></span><span><input size="15" type="text" name="FatherName[]" value="'+father+'"></span><span><input size="15" type="text" name="GrandFatherName[]" value="'+grandfather+'"></span><span><input size="15" type="text" name="Surname[]" value="'+surname+'"></span><span><input size="15" type="text" name="Role[]" value="'+role+'"></span><span><input size="15" type="text" name="Occupation[]" value="'+occupation+'"></span><span><input size="15" type="text" name="Title[]" value="'+title+'"></span><button type="button" onclick="get(\'next'+rows+'\').innerHTML = \'\'">Remove</button></div>';
	return true;
}

//checks all form fields to make sure they are all nonempty
function submissionCheck()
{
	form = get("form");
	// add in conditions here
	if(form.TextNumber.value=='' ||form.Museum.value == '' ||	form.Publication.value == '' ||	form.TabletKing.value == '' ||	form.Month.value == '' ||	form.Day.value == '' ||	form.Year.value == '' ||	form.Notes.value == '' ||	form.Transliteration.value == '' ||	form.Translation.value == '' ||	form.Summary.value == '')
	{
		alert('There are empty form elements.');
		return false;
	}

	if(isNaN(parseInt(form.TextNumber.value)) || isNaN(parseInt(form.Month.value)) || isNaN(parseInt(form.Day.value)) || isNaN(parseInt(form.Year.value)) || isNaN(parseInt(form.Kingyear.value)))
	{
		alert('Month, day, year, or King Year are not numbers, but they are supposed to be.');
		return true;
	}

	i=0;
	while(document.getElementsByName('PersonName[]')[i] != undefined)
	{
		if(document.getElementsByName('PersonName[]')[i].value == '' || document.getElementsByName('FatherName[]')[i].value == ''|| document.getElementsByName('GrandFatherName[]')[i].value == ''|| document.getElementsByName('Surname[]')[i].value == ''|| document.getElementsByName('Role[]')[i].value == '' || document.getElementsByName('Occupation[]')[i].value=='' || document.getElementsByName('Title[]')[i].value=='')
		{
			alert('There are empty form elements.');
			return false;
		}
		i++;
	}
	// submits the form
	form.submit();
}