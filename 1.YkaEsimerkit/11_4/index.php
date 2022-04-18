<!DOCTYPE html>
<html>
	<meta charset="utf-8">
	<head>
		<title>WebShop</title>
	</head>
	<body>
		<h3>WebShop - Osta paita</h3>
		<p>T-paitoja saatavilla. Tee tilaus.</p>
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
								<option value="Small" >Small</option>
								<option value="Medium"  >Medium</option>
								<option value="Large"  >Large</option>
							</select>
							
					</td>
				</tr>
				<tr>
					<td>Väri</td>
					<td>	<input type="radio" name="color" value="white"  />Valkea
							<input type="radio" name="color" value="red"  />Punainen
							<input type="radio" name="color" value="black"  />Musta
						
					</td>
				</tr>
				<tr>
					<td>Määrä</td>
					<td><input name="maara" type="number" min="1" max="5" value="" required />
							
					</td>
				</tr>
				<tr>
					<td>Nimi</td>
					<td><input name="nimi" type="text" value="" required/>
						
					</td>
				</tr>
				<tr>
					<td>Osoite</td>
					<td><input name="osoite" type="text" value="" required/>
							
					</td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input name="email" type="email" value="" required/>
					
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