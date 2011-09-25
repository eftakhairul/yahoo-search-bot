<?php
/**
 * Description of YahooSearch
 *
 * @package     Class
 * @author      Eftakhairul Islam <eftakhairul@gmail.com>  http://eftakhairul.com
 */
 
class YahooSearch
{	
	public function getXML($searchterms)
	{
		$searchterms = $this->filterInput($searchterms);
		$searchterms = "http://api.search.yahoo.com/WebSearchService/rss/webSearch.xml?appid=yahoosearchwebrss&query=".$searchterms;
		$xml = simplexml_load_file($searchterms); 
		
		return $xml;
	}
	
	private function filterInput($input)
	{
		$input = preg_replace('/[^a-zA-Z0-9\s]/', '', $input);
		$input = str_replace(" ","+",$input);
		$input = str_replace("++","+",$input);
		
		return $input;
	}
	
	function getResultAsArray($xml)
	{
		$result_array = array();		
		
		foreach($xml->channel->item AS $row)
		{
			$result_array[] = $row;
		}				
		
		return $result_array;
	}
	
	public function getResultCount($xml) 
	{	
		return count($xml->channel->item);
	}
}

