<?php 
	require("conexao.php");

	function parseToXML($htmlStr){
		$xmlStr=str_replace('<','&lt;',$htmlStr);
		$xmlStr=str_replace('>','&gt;',$xmlStr);
		$xmlStr=str_replace('"','&quot;',$xmlStr);
		$xmlStr=str_replace("'",'&#39;',$xmlStr);
		$xmlStr=str_replace("&",'&amp;',$xmlStr);
		return $xmlStr;
	}

	// Select all the rows in the markers table
	$query = "SELECT * FROM markers";
	$result = mysql_query($conn, $query);

	header("Content-type: text/xml");

	// Start XML file, echo parent node
	echo '<markers>';


	// Iterate through the rows, printing XML nodes for each
	while ($row = @mysql_fetch_assoc($result)){
  	// Add to XML document node
	  echo '<marker ';
	  echo 'name="' . parseToXML($row['name']) . '" ';
	  echo 'address="' . parseToXML($row['address']) . '" ';
	  echo 'lat="' . $row['lat'] . '" ';
	  echo 'lng="' . $row['lng'] . '" ';
	  echo 'type="' . $row['type'] . '" ';
	  echo '/>';
	}

	// End XML file
	echo '</markers>';





 ?>