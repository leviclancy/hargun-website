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
		"ar"=>"",
		"en"=>"National Association",
		],
	"history" => [
		"he"=>"תולדות",
		"ku"=>"",
		"ar"=>"",
		"en"=>"History",
		],
	"communities" => [
		"he"=>"קהילות",
		"ku"=>"",
		"ar"=>"",
		"en"=>"Communities",
		"subpages"=>[
			"urmia" => [
				"he"=>"אורמיה-ריזאיה",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Urmia-Rezaiyeh",
				],
			"urfa" => [
				"he"=>"אורפה",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Urfa",
				],
			"arbil" => [
				"he"=>"ארביל",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Erbil",
				],
			"betanure" => [
				"he"=>"ביתנורי",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Betanure",
				],
			"barashe" => [
				"he"=>"בראשי",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Berashe",
				],
			"barzan" => [
				"he"=>"ברזאן",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Barzan",
				],
			"duhok" => [
				"he"=>"דוהוכ",
				"ku"=>"دهۆک",
				"ar"=>"",
				"en"=>"Duhok",
				],
			"zakho" => [
				"he"=>"זאכו",
				"ku"=>"زاخۆ",
				"ar"=>"زاخو",
				"en"=>"Zakho",
				],
			"kirkuk" => [
				"he"=>"כרכוכ",
				"ku"=>"کرکوک",
				"ar"=>"کرکوک",
				"en"=>"Kirkuk",
				],
			"nerwa" => [
				"he"=>"נירווא",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Nerwa",
				],
			"sondor" => [
				"he"=>"נירווא",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Sondor",
				],
			"silemaniye" => [
				"he"=>"סלימניה",
				"ku"=>"سلێمانی",
				"ar"=>"سلێمانی",
				"en"=>"Silemaniye",
				],
			"amadiya" => [
				"he"=>"עמדיה",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Amadiya",
				],
			"aqra" => [
				"he"=>"עקרא",
				"ku"=>"ئاکرێ",
				"ar"=>"عقرة",
				"en"=>"Aqra",
				],
			"challa" => [
				"he"=>"צ'לא",
				"ku"=>"",
				"ar"=>"",
				"en"=>"Challa",
				],
			"qamishli" => [
				"he"=>"קמישלי",
				"ku"=>"قامشلۆ",
				"ar"=>"القامشلي",
				"en"=>"Qamishli",
				],
			],
		],
	"figures" => [
		"he"=>"דמויות ואישים",
		"ku"=>"",
		"ar"=>"",
		"en"=>"Figures",
		"subpages"=> [
			"" => [
				"he"=>"",
				"ku"=>"",
				"ar"=>"",
				"en"=>"",
				],
			],
		],
	"circle-of-life" => [
		"he"=>"מחזור החיים",
		"ku"=>"",
		"ar"=>"",
		"en"=>"Circle of Life",
		],
	"folklore" => [
		"he"=>"פולקלור",
		"ku"=>"",
		"ar"=>"",
		"en"=>"Folklore",
		],
	"publications" => [
		"he"=>"ספרים וכתבי - עת",
		"ku"=>"",
		"ar"=>"",
		"en"=>"Publications",
		],
	"recipes" => [
		"he"=>"מהמטבח הכורדי",
		"ku"=>"",
		"ar"=>"",
		"en"=>"Recipes",
		],
	"photos" => [
		"he"=>"ארכיון תמונות",
		"ku"=>"",
		"ar"=>"",
		"en"=>"Photo archive",
		],
	"events" => [
		"he"=>"אירועים",
		"ku"=>"",
		"ar"=>"",
		"en"=>"Events",
		],
	"videos" => [
		"he"=>"סרטים",
		"ku"=>"",
		"ar"=>"",
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
	echo "<li><a href='/?link=". $navigation_link ."'>";
		
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

<!doctype html>
<html amp lang="en">
<head>
<meta charset="utf-8">
<script async src="https://cdn.ampproject.org/v0.js"></script>
<title>Foundation of Ours</title>
<link rel="canonical" href="https://ours.foundation/">
<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async custom-element="amp-lightbox" src="https://cdn.ampproject.org/v0/amp-lightbox-0.1.js"></script>
<script async custom-element="amp-fx-collection" src="https://cdn.ampproject.org/v0/amp-fx-collection-0.1.js"></script>
<script async custom-element="amp-list" src="https://cdn.ampproject.org/v0/amp-list-0.1.js"></script>
<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
<script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
	
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet"> <!-- Scheherazade and Amiri also looked good. -->
<link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre&display=swap" rel="stylesheet">

<style amp-custom>
	
.he {
	font-family: 'Frank Ruhl Libre', serif;	
	direction: rtl;
	align: right;
	}

.ku, .ar {
	font-family: 'Amiri', serif;
	direction: rtl;
	align: right;
	}
	
.en {
	font-family: Arial;
	direction: ltr;
	align: left;
	}

	
</style>	
</head>
<body>

<div id='navigation-sidebar'>
<ul>
<? foreach ($sitemap_array as $navigation_link => $navigation_content):
	print_navigation($navigation_link, $navigation_content);
	endforeach; ?>
</ul>
</div>

</body>
	
</html>
