<?

include_once('configuration.php');
include_once('translatable-elements.php');

if (!(empty($unlock_key))):

	if ($_REQUEST['unlock_key'] !== $unlock_key):
		echo "Unavailable";
		exit;
		endif;

	endif;

$language_request_allowed = [ "ar"=>"عربي", "en"=>"English", "he"=>"עברית", "ku"=>"کوردی", ];
$language_request = ( empty($_REQUEST['language']) ? "en" : $_REQUEST['language'] );
if (!(isset($language_request_allowed[$language_request]))): $language_request = "en"; endif;

$sitemap_array = [
 	"about" => [],
	"history" => [],
	"communities" => [
		"urmia",
		"urfa",
		"arbil",
		"betanure",
		"barashe",
		"barzan",
		"duhok",
		"zakho",
		"kirkuk",
		"nerwa",
		"sondor",
		"silemaniye",
		"amadiya",
		"aqra", 
		"challa",
		"qamishli",
		],
	"figures" => [
		"rabbi-zakharia-berashe",
		"shimoni-habib",
		"avidani-alwan",
		"gershon-meir",
		"rabbi-shmuel-barukh",
		"yitzhak-amedi",
		"yitzhak-berashi",
		"gabay-yitzhak",
		"gabay-moshe",
		"hacham-zaken-abraham",
		"moshe-sinduri",
		"hacham-habib-alvan",
		"amiram-levi",
		"hacham-mordechai-shabtay-zibrikho",
		"hacham-shalom-yacov",
		"yacov-ahiya-hashiloni",
		"shimoni-shalom",
		"alvan-moshe",
		"nakhum-khaftsadi",
		"hacham-yacov-babekha",
		"hacham-yosef-alvan",
		"eliyahu-meir",
		],
	"circle-of-life" => [
		"wedding",
		"childbirth",
		"bar-mitzvah",
		"funerary",
		],
	"folklore" => [
		"music",
		],
	"publications" => [],
	"recipes" => [],
	"photos" => [],
	"events" => [],
	"videos" => [],
	];
	
function print_navigation($navigation_link, $navigation_content) {

	global $translatable_elements;
	
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
<link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre&display=swap" rel="stylesheet">

<style amp-custom>
	
a {
	text-decoration: inherit;
	font-style: inherit;
	color: inherit;
	}
	
.he {
	font-family: 'Frank Ruhl Libre', serif;	
	direction: rtl;
	align: right;
	}

.ku, .ar {
	font-family: 'Arial', serif;
	direction: rtl;
	align: right;
	}
	
.en {
	font-family: 'Arial';
	direction: ltr;
	align: left;
	}

	
</style>	
</head>
<body>

<div id='navigation-sidebar'>
<ul>
<? foreach ($sitemap_array as $navigation_link => $navigation_content):
	echo "<li><a href='". $navigation_link ."'>". $translatable_elements[$language_request][$navigation_link] ."</a>";
	if (!(empty($navigation_content))): 
		echo "<ul>";
		foreach ($navigaton_content as $subnavigation_link => $subnavigation_content):
			echo "<li><a href='". $navigation_link ."'>". $translatable_elements[$navigation_link][$language_request] ."</a></li>";
			endforeach;
		echo "</ul>";
		endif;
	echo "</li>";
	endforeach; ?>
</ul>
</div>

</body>
	
</html>
