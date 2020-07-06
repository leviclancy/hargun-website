<?

include_once('configuration.php');

if (!(empty($unlock_key))):

	if ($_REQUEST['unlock_key'] !== $unlock_key):
		echo "Unavailable";
		exit;
		endif;

	endif;

$sitemap_array = [
 	"about" => [
		"he"=>"על הארגון",
		"ku"=>"",
		"en"=>"National Association",
		],
	"history" => [
		"he"=>"תולדות",
		"ku"=>"",
		"en"=>"History",
		],
	"communities" => [
		"he"=>"קהילות",
		"ku"=>"",
		"en"=>"Communities",
		"subpages"=>[
			"kirkuk" => [
				"he"=>"כרכוכ",
				"ku"=>"کرکوک",
				"en"=>"Kirkuk",
				],
			"urmia" => [
				"he"=>"",
				"ku"=>"",
				"en"=>"",
				],
			"arbil" => [
				"he"=>"",
				"ku"=>"",
				"en"=>"",
				],
			 ],
		],
	"figures" => [
		"he"=>"דמויות ואישים",
		"ku"=>"",
		"en"=>"Figures",
		],
	"circle-of-life" => [
		"he"=>"מחזור החיים",
		"ku"=>"",
		"en"=>"Circle of Life",
		],
	"folklore" => [
		"he"=>"פולקלור",
		"ku"=>"",
		"en"=>"Folklore",
		],
	"publications" => [
		"he"=>"ספרים וכתבי - עת",
		"ku"=>"",
		"en"=>"Publications",
		],
	"recipes" => [
		"he"=>"מהמטבח הכורדי",
		"ku"=>"",
		"en"=>"Recipes",
		],
	"photos" => [
		"he"=>"ארכיון תמונות",
		"ku"=>"",
		"en"=>"Photo archive",
		],
	"events" => [
		"he"=>"אירועים",
		"ku"=>"",
		"en"=>"Events",
		],
	"videos" => [
		"he"=>"סרטים",
		"ku"=>"",
		"en"=>"Videos",
		],
	];
	
function print_navigation($navigation_link, $navigation_content) {

	// The $navigation_content must have these language options
	$language_options = ["he", "ku", "en"];
	
	// If any language options are missing then skip it
//	foreach ($language_options as $option_temp):
//		if (empty($navigation_content[$option_temp])): return; endif;
//		endforeach;
	
	// Make sure the indent count is numeric
	if (!(is_numeric($indent_count))): $indent_count = 0; endif;
	
	// Begin the navigation item
	echo "<li><a href='/?link=". $navigation_link ."'>
		
	// Echo out the content of the navigation item
	echo "<span class='navigation-item-content he'>". $navigation_content['he'] ."</span>";
	echo "<span class='navigation-item-content ku'>". $navigation_content['ku'] ."</span>";
	echo "<span class='navigation-item-content en'>". $navigation_content['en'] ."</span>";
	
	// Close the navigatio item
	echo "</a>";
	
	// If no subpages, just close it here
	if (empty($navigation_content['subpages'])):
		echo "</li>"; endif;
	
	// If there are subpages, then keep going
	foreach ($navigation_content['subpages'] as $navigation_link => $navigation_content):
		echo "<ul>";
		print_navigation($navigation_link, $navigation_content);
		echo "</ul>";
		endforeach;
	
	}

?>


<div>
<ul>
<? foreach ($sitemap_array as $navigation_link => $navigation_content):
	print_navigation($navigation_link, $navigation_content);
	endforeach;
</ul>
</div>
