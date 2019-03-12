<?php

	if($_POST)
		{
		$errors = array();

		if(empty($_POST['userName']))
		{
			$errors['userName1'] = 'Entrez un Nom !';
		}

		if(empty($_POST['userFirstName']))
		{
			$errors['userFirstName1'] = 'Entrez un Prénom !';
		}		

		if(empty($_POST['userMail']))
		{
			$errors['userMail1'] = 'Entrez un Mail !';
		}
		else
		{
			if (!filter_var($_POST['userMail'], FILTER_VALIDATE_EMAIL)) 
			{
  				$errors['userMail2'] = "Invalid email format";
			}	
		}
		if(empty($_POST['phone']))
		{
			$errors['phone1'] = 'Entrez un numero de Telephone !';
		}

		if(empty($_POST['userMessage']))
		{
			$errors['userMessage1'] = 'Entrez un message !';
		}


		// check errors

		if(count($errors) == 0)
		{
			header("location: succes.php");
			exit();
		}
	}
?>



<!DOCTYPE html>
<html lang="fr">
  	<head>
    	<meta charset="utf-8">
    	<title>Mon formulaire</title>
    	<link rel="stylesheet" type="text/css" href="style.css">
  	</head>
  	<body>
    	

    	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    		<h1>Voici mon formulaire</h1>
			<div>
	        	<label for="name">Nom :</label>
	        	<input type="text" id="name" name="userName" pattern="^[a-zA-Z]{1,10}$" value="<?php if(isset($_POST['userName'])) { echo $_POST['userName'];} ?>">
	        	<p>
	        		<?php 
	        		if (isset($errors['userName1'])) 
	        		{
	        			echo $errors['userName1'];
	        		}
	        		?>
	        	</p>
	    	</div>
			<div>
	        	<label for="firstName">Prenom :</label>
	        	<input type="text" id="FirstName" name="userFirstName" pattern="^[a-zA-Z]{1,10}$" value="<?php if(isset($_POST['userFirstName'])) { echo $_POST['userFirstName'];} ?>">
	        	<p>
	        		<?php 
	        		if (isset($errors['userFirstName1'])) 
	        		{
	        			echo $errors['userFirstName1'];
	        		}
	        		?>
	        	</p>
	    	</div>	    	
	   		<div>
	        	<label for="mail">e-mail :</label>
	        	<input type="text" id="mail" name="userMail" value="<?php if(isset($_POST['userMail'])) { echo $_POST['userMail'];} ?>">
	        	<p>
	        		<?php 
	        		if (isset($errors['userMail1'])) 
	        		{
	        			echo $errors['userMail1'];
	        		}
	        		if (isset($errors['userMail2']))
	        		{
	        			echo $errors['userMail2'];
	        		}
	        		?>
	        	</p>
	    	</div>
	    	<div>
	    		<label for="phone">Telephone:</label>
				<input type="tel" id="phone" name="phone" pattern="^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone'];} ?>">
	        	<p>
	        		<?php 
	        		if (isset($errors['phone1'])) 
	        		{
	        			echo $errors['phone1'];
	        		}
	        		?>
	        	</p>
       		</div>
       		<div>
       			<label for="sujet">Sujet:</label>
       			<select name="sujet" id="sujet">
				  	<option value="sujetOne">Sujet 1</option>
				  	<option value="sujetTwo">Sujet 2</option>
				</select> 
       		</div>
	    	<div>
	        	<label for="msg">Message :</label>
	        	<textarea id="msg" name="userMessage"><?php if(isset($_POST['userMessage'])) { echo $_POST['userMessage'];} ?></textarea>
	        	<p>
	        		<?php 
	        		if (isset($errors['userMessage1'])) 
	        		{
	        			echo $errors['userMessage1'];
	        		}
	        		?>
	        	</p>
	    	</div>
	    	<div class="button">
        		<button type="submit">Envoyer le message</button>
    		</div>
		</form>
  	</body>
</html>