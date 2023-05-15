function validateForm(theForm){
	 if (theForm.name.value == "")
	{
		alert("Please enter a value for the \"Full name of Applicant\" field.");
		theForm.name.focus();
		return (false);
	}
	else if (theForm.mobile.value == "")
	{
		alert("Please enter a value for the \"Mobile No\" field.");
		theForm.mobile.focus();
		return (false);
	}
	else if (theForm.mobile.value.length < 10)
	{
		alert("Please enter at least 10 characters in the \"Mobile No\" field.");
		theForm.mobile.focus();
		return (false);
	}
	else if (theForm.mobile.value.length > 10)
	{
		alert("Please enter at most 10 characters in the \"Mobile No\" field.");
		theForm.mobile.focus();
		return (false);
	}
	else {
		$.ajax({
			url: 'submit.php',
			data:{
					key:"saveData",
					name:theForm.name.value,
					mobile:theForm.mobile.value,
					email:theForm.email.value,
					query:theForm.query.value,
				},
			dataType: 'json',
			type: 'POST',
			success: function(data){
				if(data.status == 'true'){
					$('.form').css('display','none');
					$('.outer .success-message').css('display','table');
				}
			}
		});
	}
}
