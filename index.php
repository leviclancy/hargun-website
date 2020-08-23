<?

include_once('configuration.php');
include_once('translatable-elements.php');

$sitemap_array = [
 	"about" => [
		"publications" => [],
		"recipes" => [],
		"photos" => [],
		"events" => [],
		"videos" => [],
		"representative" => [],
		],
	"history" => [
		],
	"communities" => [
		"urmia" => [],
		"urfa" => [],
		"arbil" => [],
		"betanure" => [],
		"barashe" => [],
		"barzan" => [],
		"duhok" => [],
		"zakho" => [],
		"kirkuk" => [],
		"nerwa" => [],
		"sondor" => [],
		"silemaniye" => [],
		"amadiya" => [],
		"aqra" => [], 
		"challa" => [],
		"qamishli" => [],
		],
	"figures" => [
		"rabbi-zakharia-berashe" => [],
		"shimoni-habib" => [],
		"avidani-alwan" => [],
		"gershon-meir" => [],
		"rabbi-shmuel-barukh" => [],
		"yitzhak-amedi" => [],
		"yitzhak-berashi" => [],
		"gabay-yitzhak" => [],
		"gabay-moshe" => [],
		"hacham-zaken-abraham" => [],
		"moshe-sinduri" => [],
		"hacham-habib-alvan" => [],
		"amiram-levi" => [],
		"hacham-mordechai-shabtay-zibrikho" => [],
		"hacham-shalom-yacov" => [],
		"yacov-ahiya-hashiloni" => [],
		"shimoni-shalom" => [],
		"alvan-moshe" => [],
		"nakhum-khaftsadi" => [],
		"hacham-yacov-babekha" => [],
		"hacham-yosef-alvan" => [],
		"eliyahu-meir" => [],
		],
	"circle-of-life" => [
		"wedding" => [],
		"childbirth" => [],
		"bar-mitzvah" => [],
		"funerary" => [],
		],
	"folklore" => [
		"music" => [],
		],
	];

// The pageview is passed in the URL
$pageview_request = ( empty($_REQUEST['pageview']) ? "about" : $_REQUEST['pageview'] );
$pageview_request_found = 0;
foreach ($sitemap_array as $navigation_link => $navigation_content):
	if ($navigation_link == $pageview_request): $pageview_request_found = 1; break; endif;
	if (in_array($pageview_request, array_keys($navigation_content))): $pageview_request_found = 1; break; endif;
	endforeach;
if ($pageview_request_found !== 1):
	header("HTTP/1.0 404 Not Found");
	echo "Not found";
	exit; endif;

// The language is also passed in the URL
$language_request_allowed = [ "ar"=>"عربي", "en"=>"English", "he"=>"עברית", "ku"=>"کوردی", ];
$language_request = ( empty($_REQUEST['language']) ? "en" : $_REQUEST['language'] );
if (!(isset($language_request_allowed[$language_request]))): $language_request = "en"; endif;

function language_picker($string_id, $language_command=null) {
	
	global $language_request_allowed;
	global $language_request;
	global $translatable_elements;
	
	if (empty($language_command) || !(isset($language_request_allowed[$language_command]))): $language_command = $language_request; endif;
	
	if (!(empty($translatable_elements[$string_id][$language_command]))):
		return $translatable_elements[$string_id][$language_command];
		endif;
	
	foreach (array_keys($language_request_allowed) as $language_request_possible):
		if (empty($translatable_elements[$string_id][$language_request_possible])): continue; endif;
		return $translatable_elements[$string_id][$language_request_possible];
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

ul {
	margin: 0;
	padding: 0;
	}

ul li {
	margin: 0;
	padding: 6px 5px 0 20px;
	list-style-type: none;
	}

	
</style>	
</head>
<body>

<div id='navigation-sidebar'>
<ul>
<? foreach ($sitemap_array as $navigation_link => $navigation_content):
	echo "<li><a href='?pageview=". $navigation_link ."'>". language_picker($navigation_link) ."</a>";
	if (!(empty($navigation_content))): 
		echo "<ul>";
		foreach ($navigation_content as $subnavigation_link => $subnavigation_content):
			echo "<li><a href='?pageview=". $subnavigation_link ."'>". language_picker($subnavigation_link) ."</a></li>";
			endforeach;
		echo "</ul>";
		endif;
	echo "</li>";
	endforeach; ?>
</ul>
</div>
	
<h1><? echo language_picker($pageview_request) ?></h1>

if ($pageview_request == "representative"):
	
	function output_faq($translatable_elements_id) {
		global $translatable_elements;
		global $language_request;
		echo "<dt id='" . $translatable_elements_id ."'><a href='#" . $translatable_elements_id ."'>". $translatable_elements[$translatable_elements_id.'-question'][$language_request] ."</a></dt>";
		echo "<dd>". $translatable_elements[$translatable_elements_id.'-answer'][$language_request] ."</dd>";
		return; }
	
	echo "<dl>";

		output_faq("who-is-the-representative");

		output_faq("how-was-dr-zaken-appointed");

		output_faq("what-is-the-role");

		output_faq("what-is-the-scope");

		output_faq("who-does-the-representative-represent");
	
		output_faq("how-is-the-representative-appointed");
	
		output_faq("what-is-the-population");
	
		output_faq("are-there-jews-in-kurdistan");
	
		output_faq("what-about-the-impostors");

		output_faq("who-does-the-representative-not-represent");

		output_faq("what-does-the-representative-not-represent");

		output_faq("will-the-jews-from-kurdistan-return");
	
		output_faq("can-i-be-part-jewish");

		output_faq("what-if-i-want-to-be-jewish");

		output_faq("can-i-visit-israel");

		output_faq("are-there-exchanges");

		echo "<dt>What was life like for Kurdish Jews in Kurdistan?</dt>";
		echo "<dd>Like other places, there was antisemitism in the broader society that targeted Jews in unique, bitter, and harmful ways. However, the Kurdish world is overwhelmingly dynamic and this is not the defining feature of Jewish life in Kurdistan. The focus is on reconciliation, including acknowleding happy and painful parts of history, and learning from both for a positive future.</dd>";

		echo "<dt>What about the Friendship league?</td>";
		echo "<dd>The founder was Mordechai Zaken[4][5] and the main activists who worked together were the late Moshe Zaken, a business man from Jerusalem, Meir Baruch, a retired military person, Michael Niebur who spent some time in NGOs helping the Kurds, and Mathew B. Hand an American who promoted activity of coexistence with Muslims. The response of Kurdish representatives and organizations both in Kurdistan and the diaspora was enthusiastic as can be judged from hundreds of letters, phone calls and also email received in Jerusalem within short time after the announcement of its founding in the world press and in The Voice of America in the Kurdish language, which conducted interviews with the founder, Mordechai Zaken. The League also published a newsletter called yedidut (heb., friendship) carrying the message of Israeli and Jewish friendship to Kurds worldwide.</dd>";

		echo "</dl>";
	
	endif;
	
</body>
	
</html>
