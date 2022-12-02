<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Connectez-vous</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css" />
    </head>
	
    <body>
        <div>
            <form id="connexion" method="post">
                <fieldset>
                    <legend><h3>Identification</h3></legend>
                    <p><input type="text" placeholder="ID" name="id"/>
                    <p><input type="password" placeholder="Mot de passe" name="pass"/></p>
					<?php echo $erreur ; ?>
                    <p><input type="submit" name="seconnecter" value="Connexion"/></p>
                </fieldset>
            </form>
			<br/>
        </div>
    </body>
</html>
