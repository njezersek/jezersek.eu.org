<?php
/**
 * PHP DOM: How to get child elements by tag name in an elegant manner?
 *
 * @link http://stackoverflow.com/a/19569921/367456
 * @author hakre <http://hakre.wordpress.com>
 */

error_reporting(E_ALL);
ini_set('display_errors', true);

/**
 * Class DOMElementFilter
 */
class DOMElementFilter extends FilterIterator
{
    private $tagName;

    public function __construct(DOMNodeList $nodeList, $tagName = NULL)
    {
        $this->tagName = $tagName;
        parent::__construct(new IteratorIterator($nodeList));
    }

    /**
     * @return bool true if the current element is acceptable, otherwise false.
     */
    public function accept()
    {
        $current = $this->getInnerIterator()->current();

        if (!$current instanceof DOMElement) {
            return FALSE;
        }

        return $this->tagName === NULL || $current->tagName === $this->tagName;
    }
}

$doc = new DOMDocument();

$url = 'https://www.easistent.com/urniki/izpis/30a1b45414856e5598f2d137a5965d5a4ad36826/110401/0/0/';
#$url = "http://raptor2.ddns.net/easistent/index.html";

$htmlContent = file_get_contents($url);

$doc->loadHTML($htmlContent);

$a = $doc->getElementsByTagName('table')->item(0);

$bs = new DOMElementFilter($a->childNodes, 'tr');

$urnik = [];

//echo "<table>";
$y = 0;
foreach($bs as $b){
	//echo "<tr>";
	$td = new DOMElementFilter($b->childNodes, 'td');
	$x = 0;
	foreach($td as $d){
		//echo "<td>";
		//echo $d->nodeValue;
		$urnik[$y][$x] = preg_replace('/\s+/', ' ', $d->nodeValue);
		//echo "</td>";
		$x++;
	}
    
	//echo "</tr>";
	$y++;
}
//echo "</table>";

//echo "<hr>";

$json = json_encode($urnik);
//print_r($json);



require "php/connection.php";

// GET LATEST RECORD

$query="SELECT * FROM records ORDER BY id DESC";    
$result = $mysql->query($query);

$old_urnik = "";
if($row = $result->fetch_assoc()){
	$old_urnik = $row['json'];
}

//echo "<hr class='Nejc Jezersek'>";
$old_urnik = json_decode($old_urnik,  true);

print_r($old_urnik);
echo "<hr>";
print_r($urnik);

// UPLOAD TO DB



$query="INSERT INTO records (id, json, date, url) VALUES (NULL, '".$json."', NOW(), '".$url."');";    
$result = $mysql->query($query);


// COMPARE TIMETABLES
/*echo "<table>";
for($x=0; $x<count($urnik); $x++){
	for($y=0; $y<count($urnik[$x]); $y++){
        
    }
}
echo "</table>";
*/

