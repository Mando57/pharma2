<a href=index.php?uc=reserv&action=creer> Creer une reservation </a> <br><br>
<table border='1'>
		<tr>
			<td>
				Action
			</td>
			<td >
				date
			</td>
			<td>
				debut
			</td>
			<td>
				fin
			</td>
			<td>
				remarque
			</td>
			<td>
				status
			</td>
			<td>
				remarque admin
			</td>
			<td>
				Produit
			</td>
		</tr>

	<?php
	
	foreach ($lesDemandes as $demande) 
	{
		?>
		<tr>
			<form method='post' action='index.php?uc=reserv&action=delDemande'>
			<td>
				<input type='hidden' name='id' value='<?php echo $demande['id'] ;?>'/>
				<?php if(is_null($demande['idDemande']))
				{?>
					
				<input type='submit' style='width:100px' name='delete' value='delete'/>
			<?php }else{ ?>
					<a href=index.php?uc=reserv&action=contreOffre&id=<?php echo $demande['id'] ;?> >Action</a>
			<?php	 } ?>
			</td>
			<td>
				<?php echo $demande['date']; ?>
			</td>
			<td>
				<?php echo $demande['debut']; ?>
			</td>
			<td>
				<?php echo $demande['fin']; ?>
			</td>
			<td>
				<?php echo $demande['remarque']; ?>
			</td>
			<td>
				<?php echo $demande['status']; ?>
			</td>
			<td>
				<?php echo $demande['remarqueGSB']; ?>
			</td>
			<td>
				<?php /*echo $demande['nom']; */?>
			</td>
		</form>
		</tr>
		<?php
	}
	?>
</table>