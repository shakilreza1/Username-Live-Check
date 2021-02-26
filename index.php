<!DOCTYPE html>
<html>
<head>
<title>Live Username Availability Check</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript">
	
$(document).ready(function()
{    
	$("#name").keyup(function()
	{		
		var name = $(this).val();	
		
		if(name.length > 3)
		{		
			$("#result").html('checking...');
			
			/*$.post("username-check.php", $("#reg-form").serialize())
				.done(function(data){
				$("#result").html(data);
			});*/
			
			$.ajax({
				
				type : 'POST',
				url  : 'username-check.php',
				data : $(this).serialize(), //The serialize() method creates a URL encoded text string by serializing form values. The serialized values can be used in the URL query string when making an AJAX request.
				success : function(data)
						  {
					         $("#result").html(data);
					      }
				});
				return false;
			
		}
		else
		{
			$("#result").html('');
		}
	});
	
});
</script>
</head>

<body>


<form id="reg-form" action="" method="post" autocomplete="off">
<fieldset>
	<div>
    <input type="text" name="name" id="name" placeholder="Username" />
    <span id="result"></span>
    </div>
</fieldset>
</form>
</body>
</html>