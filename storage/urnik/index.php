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

#$url = 'https://www.easistent.com/urniki/izpis/30a1b45414856e5598f2d137a5965d5a4ad36826/110401/0/0/';
#$url = "http://192.168.1.102/easistent/index.html";
$url = "https://www.easistent.com/urniki/izpis/30a1b45414856e5598f2d137a5965d5a4ad36826/110401/0/0/41";
#$url = "http://bertoncelj.eu.org/urnik/index.html";

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

$json = json_encode($urnik, JSON_UNESCAPED_UNICODE);
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

echo "<br><h6 style='margin: 0 20px; background: #fff; position: relative; top: 15px; display: inline-block; font-size: 15px'>Zdajšnje stanje</h6><hr>";
print_r($urnik);
echo "<br><h6 style='margin: 0 20px; background: #fff; position: relative; top: 15px; display: inline-block; font-size: 15px'>Zadnji posnetek</h6><hr>";
print_r($old_urnik);

// UPLOAD TO DB



$query="INSERT INTO records (id, json, date, url) VALUES (NULL, '".$json."', NOW(), '".$url."');";    
$result = $mysql->query($query);

//echo count($urnik[1]);

//echo count($urnik[0]);


// DISPLAY TIMETABLES

// now
echo "<br><h6 style='margin: 0 20px; background: #fff; position: relative; top: 15px; display: inline-block; font-size: 15px'>Zdajšnje stanje</h6><hr>";
echo "<table>";
for($x=1; $x+1<count($urnik); $x++){
    echo "<tr>";
	for($y=0; $y<count($urnik[$x]); $y++){
        echo "<td>";
        echo $urnik[$x][$y];
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";


// lact record
echo "<br><h6 style='margin: 0 20px; background: #fff; position: relative; top: 15px; display: inline-block; font-size: 15px'>Zadnji posnetek</h6><hr>";
echo "<table>";
for($x=1; $x+1<count($old_urnik); $x++){
    echo "<tr>";
	for($y=0; $y<count($old_urnik[$x]); $y++){
        echo "<td>";
        echo $old_urnik[$x][$y];
        echo "</td>";
    }
    echo "</tr>";
}
echo "</table>";


// COMPARE TIMETABLES

echo "<br><h6 style='margin: 0 20px; background: #fff; position: relative; top: 15px; display: inline-block; font-size: 15px'>Spremembe</h6><hr>";

$dnevi = ["[ura]", "ponedeljek", "torek", "sredo", "četrtek", "petek", "soboto", "nedeljo"];

/*
$spremembe = [];
for($x=1; $x+1<count($old_urnik); $x++){
	for($y=0; $y<count($old_urnik[$x]); $y++){
        
        if(isset($urnik[$x][$y])){
            if($urnik[$x][$y] != $old_urnik[$x][$y]){
                echo $spremembe[] = 'V '.$dnevi[$y].' '.$x.' šolsko uro bo namesto <b><i>'.$old_urnik[$x][$y].'</i></b> ura <b><i>'.$urnik[$x][$y].'</b></i>.';
                echo "<br>";
            }
        }
        else{
            echo $spremembe[] = 'V '.$dnevi[$y].' '.$x.' šolsko uro ne bo <b><i>'.$old_urnik[$x][$y].'</b></i>';
            echo "<br>";
        }
    }
}
*/



$spremembe = [];
$tabela_spremembe = "<table style='border-collapse: collapse;'>";
$tabela_spremembe .= "<tr><th>Dan</th><th>Ura</th><th>Prej</th><th>Potem</th></tr>";
for($x=1; $x+1<count($old_urnik); $x++){
	for($y=0; $y<count($old_urnik[$x]); $y++){
        
        if(isset($urnik[$x][$y])){
            if($urnik[$x][$y] != $old_urnik[$x][$y]){
                $tabela_spremembe .= "<tr>";
                $tabela_spremembe .= "<td style='border: solid 1px #aaa; border-collapse: collapse'>";
                $tabela_spremembe .= $spremembe[]['dan'] = $y;
                $tabela_spremembe .= "</td>";
                
                $tabela_spremembe .= "<td style='border: solid 1px #aaa; border-collapse: collapse'>";
                $tabela_spremembe .= $spremembe[]['ura'] = $x;
                $tabela_spremembe .= "</td>";
                
                $tabela_spremembe .= "<td style='border: solid 1px #aaa; border-collapse: collapse'>";
                $tabela_spremembe .= $spremembe[]['prej'] = $old_urnik[$x][$y];
                $tabela_spremembe .= "</td>";
                
                $tabela_spremembe .= "<td style='border: solid 1px #aaa; border-collapse: collapse'>";
                $tabela_spremembe .= $spremembe[]['potem'] = $urnik[$x][$y];
                $tabela_spremembe .= "</td>";
                $tabela_spremembe .= "</tr>";
            }
        }
        else{
            $tabela_spremembe .= "<tr>";
            $tabela_spremembe .= "<td style='border: solid 1px #aaa; border-collapse: collapse'>";
            $tabela_spremembe .= $spremembe[]['dan'] = $y;
            $tabela_spremembe .= "</td>";

            $tabela_spremembe .= "<td style='border: solid 1px #aaa; border-collapse: collapse'>";
            $tabela_spremembe .= $spremembe[]['ura'] = $x;
            $tabela_spremembe .= "</td>";

            $tabela_spremembe .= "<td style='border: solid 1px #aaa; border-collapse: collapse'>";
            $tabela_spremembe .= $spremembe[]['prej'] = $old_urnik[$x][$y];
            $tabela_spremembe .= "</td>";

            $tabela_spremembe .= "<td style='border: solid 1px #aaa; border-collapse: collapse'>";
            $tabela_spremembe .= $spremembe[]['potem'] = " ";
            $tabela_spremembe .= "</td>";
            $tabela_spremembe .= "</tr>";
        }
    }
}
$tabela_spremembe .= "</table>";


// POŠLJI MAIL

$to = "njezersek@gmail.com";
$subject = "Sprememba urnika";
$message = "<body style='margin: 0; font-family: Roboro, sans-serif;'>";
$message .= "<div style='background: #0c66a0; padding: 10px; color: #fff; padding: 0;'>";
$message .= "  <div style='padding: 0; max-width: 1000px; margin: 0 auto 0; display: block;'>";
$message .= "    <img src='http://raptor2.ddns.net/media/logo.png' style='width: 40px; height: 40px; margin: 0 10px; vertical-align: middle;'>";
$message .= "    <h1 style='margin: 0; font-size: 20px; font-weight: 100; display: inline-block; padding: 0; display: inline-block;
  vertical-align: middle; colour: #fff; font-size: 26px'>Raptor 2</h1>";
$message .= "  </div>";
$message .= "</div>";
$message .= "<div style='padding: 10px; max-width: 1000px; margin: 0 auto 0;'>";
$message .= "  <h1>Sprmebe urnika:</h1>";
$message .= $tabela_spremembe;
$message .= "  <p style='font-size: 16px; color: #777'>This email was sent to you automaticly from <a href='raptor2.ddns.net'>raptor2</a>. If you didn't request this email please delete it.</p>";
$message .= "</div>";
$message .= "</body>";
$from = "Raptor 2 <raptor2info@gmail.com>";
$headers = "From: Raptor 2 <raptor2info@gmail.com>\r\nMIME-Version: 1.0\r\nContent-Type: text/html; charset=UTF-8";

if(count($spremembe) > 0){
    mail($to,$subject,$message,$headers);
}
