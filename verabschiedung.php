<html>

<head>

	<title>Lamazon - Worlds No.1 Online-Shop</title>	

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="style.css">

</head>



<body id="globalBody">

	  <?php
		
		include_once('hilfs_funktionen.php');

		$dbh = db_connect("marzian_ws");

		session_start();
		//phpinfo();
		$produkteArray = $_SESSION['warenkorb'];
		$maxAnzahlProdukte = count($produkteArray);
		$AnzahlProdukteArray = array();
		//Insert in Rechnung und Bestellung machen
		for($i = 0;$i < $maxAnzahlProdukte;$i++)
		{
			$AnzahlProdukteArray[$i] = $_POST[$i+1];			
		}
		
		$BID = getNewBID();
		$KID = getKID($_SESSION['kennung']);
		insertBestellung($produkteArray,$AnzahlProdukteArray,$BID,$KID);
		insertRechnung($BID);
		$_SESSION['warenkorb'] = array();		
	  ?>

	  <br>
		<p>Vielen Dank für Ihren Einkauf</p>
	  <br>	  
	  <a href = "shop1.php">zur&uuml;ck zur Produkt&uuml;bersicht</a>
	  <br>	  
	  <a href = "listeAlteRechnungen.php">alte Rechnungen</a>
</body>
</html>

































