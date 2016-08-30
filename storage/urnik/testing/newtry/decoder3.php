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
/*$doc->loadXML(<<<EndOfXML
<a>
  <b>1</b>
  <b>2</b>
  <c>
    <b>3</b>
    <b>4</b>
  </c>
</a>
EndOfXML
);<*/

$doc->loadHTMLFile("htmltable.html");

$a = $doc->getElementsByTagName('table')->item(0);

$bs = new DOMElementFilter($a->childNodes, 'tr');

echo "<table>";
foreach($bs as $b){
	echo "<tr>";
	$td = new DOMElementFilter($b->childNodes, 'td');
	foreach($td as $d){
		echo "<td>";
		echo $d->nodeValue;
		echo "</td>";
	}
    
	echo "</tr>";
}
echo "</table>";
