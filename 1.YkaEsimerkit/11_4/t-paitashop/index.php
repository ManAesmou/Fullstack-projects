<?php
/*
	file: index.php  - Sovelluksen pääsivu
	desc: Näyttää lomakkeen, jonka tiedot lähetetään "tilaa.php" scriptille. Virheilmoitukset
		  tulevat tälle sivulle "tilaa.php" sivunpyynnöstä
*/
if(!empty($_GET['virhe'])) $virhe=true; else $virhe=false;
if(!empty($_GET['koko'])) $koko=$_GET['koko'];else $koko='';
if(!empty($_GET['color'])) $color=$_GET['color'];else $color='';
if(!empty($_GET['email'])) $email=$_GET['email'];else $email='';
if(!empty($_GET['nimi'])) $nimi=$_GET['nimi'];else $nimi='';
if(!empty($_GET['osoite'])) $osoite=$_GET['osoite'];else $osoite='';
if(!empty($_GET['maara'])) $maara=$_GET['maara'];else $maara='';

?>
<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<head>
		<title>WebShop</title>
	</head>
	<body>
		<h3>WebShop - Osta paita</h3>
		<p>T-paitoja saatavilla. Tee tilaus.</p>
		<?php
		if($virhe) echo '<p style="color:red">Tarkista lomakkeen tiedot!</p>';
		?>
		<form action="tilaa.php" method="post" >
			<table>
				<tr>
					<td>T-Paita</td>
					<td>15&euro;</td>
					<td rowspan="4"><img src="shirt.jpg" /></td>
				</tr>
				<tr>
					<td>Valitse koko</td>
					<td>	<select name="koko" required>
								<option value=''>--Valitse kokosi--</option>
								<option value="Small" <?php if($koko=='Small') echo 'selected'?>>Small</option>
								<option value="Medium" <?php if($koko=='Medium') echo 'selected'?> >Medium</option>
								<option value="Large" <?php if($koko=='Large') echo 'selected'?> >Large</option>
							</select>
							<?php if($koko=='virhe') echo '<p style="color:red">Koko on pakollinen!</p>'?>
					</td>
				</tr>
				<tr>
					<td>Väri</td>
					<td>	<input type="radio" name="color" value="white" <?php if($color=='white') echo 'checked'?>  />Valkea
							<input type="radio" name="color" value="red" <?php if($color=='red') echo 'checked'?> />Punainen
							<input type="radio" name="color" value="black" <?php if($color=='black') echo 'checked'?> />Musta
					<?php if($color=='virhe') echo '<p style="color:red">Väri on pakollinen!</p>'?>	
					</td>
				</tr>
				<tr>
					<td>Määrä</td>
					<td><input name="maara" type="number" min="1" max="5" value="<?php echo $maara?>" required />
							
					</td>
				</tr>
				<tr>
					<td>Nimi</td>
					<td><input name="nimi" type="text" value="<?php echo $nimi?>" required/>
						
					</td>
				</tr>
				<tr>
					<td>Osoite</td>
					<td><input name="osoite" type="text" value="<?php echo $osoite?>" required/>
							
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input name="email" type="email" value="<?php if($email<>'virhe') echo $email?>" required/>
						<?php if($email=='virhe') echo '<p style="color:red">Tarkista emailin kirjoitus!</p>'?>
					</td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="Tilaa" /></td>
				</tr>
			</table>
		</form>
	</body>
</html>