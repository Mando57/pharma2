
<form method='post'>
	date:<?php echo $laDemande['date'] ;?><br>
	debut:<?php echo $laDemande['debut'] ;?><br>
	fin:<?php echo $laDemande['fin'] ;?><br>
	remarque:<?php echo $laDemande['remarque'] ;?><br>
	<input type='hidden' name='id' value='<?php echo $_GET['id'] ;?>'/>
	<input type='submit' name='valider' value='valider'/>
	<input type='submit' name='refuser' value='refuser'/>
</form>