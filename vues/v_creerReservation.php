
<form method='post'>
	date:<input type='date' name='date' /><br>
	debut:<input type='text' name='debut'/><br>
	fin:<input type='text' name='fin' /><br>
	remarque:<input type='text' name='remarque' /><br>
	<select name='produit'>
		<?php 
			foreach ($lesProduits as $produit) 
			{
				echo "<option value='".$produit['id']."'>".$produit['nom']."</option>" ;
			}

		?>
	</select><br>
	<input type='submit' name='co' value='Creation'/>
</form>