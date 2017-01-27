<?php
// RetroPHP ne prend désormais pas en compte les divers problèmes que vous pouvez rencontrer sur votre CMS si celui-ci n'a pas été acheté sur RetroPHP. //
$cms = "LeetCMS"; // Ne pas toucher //
$version = "0.2"; // Ne pas toucher //

class Config
{
	// Vérification de maintenance
	public function Maintenance($pageid, $page, $urank) 
	{
		if($urank <= 5 || $pageid != "maintenance" || $page != "hk") {
		if(Settings('Maintenance') == "true") {
		Redirect(URL."/maintenance");
		}
		}
		return true;
		
	}
}
?>