<?php
/** 
 * Main File  
 *
 * @author Eftakhairul Islam <eftakhairul@gmail.com>  http://eftakhairul.com
 */
 
include_once('yahoosearch.php');

$request 		= $_REQUEST['msg'];
$search 		=  new YahooSearch();

$xml 			= $search->getXml($request);
$resultCount 	= $search->getResultCount($xml);
$results 	    = $search->getResultAsArray($xml);
$count 			= 1;

echo "{$resultCount} results are found for you <br>";

foreach($results AS $row) 
{
	echo "{$count}. " . $row->description . " LinK: " . $row->link . "<br>";
	$count++;
}
