<?php
/**
 * PHP DOM: How to get child elements by tag name in an elegant manner?
 *
 * @link http://stackoverflow.com/a/19569921/367456
 * @author hakre <http://hakre.wordpress.com>
 */

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

$htmlContent = file_get_contents('https://www.easistent.com/urniki/izpis/30a1b45414856e5598f2d137a5965d5a4ad36826/110401/0/0/');

$doc->loadHTML($htmlContent);

$a = $doc->getElementsByTagName('table')->item(0);

$bs = new DOMElementFilter($a->childNodes, 'tr');

$urnik = [];

echo "<table>";
$y = 0;
foreach($bs as $b){
	echo "<tr>";
	$td = new DOMElementFilter($b->childNodes, 'td');
	$x = 0;
	foreach($td as $d){
		echo "<td>";
		echo $d->nodeValue;
		$urnik[$y][$x] = preg_replace('/\s+/', ' ', $d->nodeValue);
		echo "</td>";
		$x++;
	}
    
	echo "</tr>";
	$y++;
}
echo "</table>";

echo "<hr>";

$json = json_encode($urnik);
print_r($json);
