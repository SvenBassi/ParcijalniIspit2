<?php

function consonant($a){
    $string = $a;
    $consonant = 0;
    for($i = 0, $j = strlen($string) ; $i< $j ; $i++){
        if(!strstr('aeiouAEIOU', $string[$i])){
            $consonant++;
        }
    }
    return $consonant;
    }

function vowels($a){
$string = $a;
$vowels = 0;
for($i = 0, $j = strlen($string) ; $i< $j ; $i++){
	if(strstr('aeiouAEIOU', $string[$i])){
		$vowels++;
	}
}
return $vowels ;
}

$a =$_POST['input'];


if(isset($_POST['submit'])){

     $data = file_get_contents('words.json');
     $data_array = json_decode($data,true);
     $data_new = array(
        "word"=> $a,
        "wCount"=>strlen($a),
        "conCount"=>consonant($a),
        "vowCount"=>vowels($a)
     );

     $data_array[] = $data_new;

     $new_data = json_encode($data_array);

     if(file_put_contents('words.json',$new_data)){
        echo '';
     }
}
?>
<body>

<form action="" method="post">
    <br>
    <label for="input">Upišite riječ:</label><br>
        <input type="text" name="input" />
        <br>
        <input type="submit" name="submit" />
    </form>
<br>
<br>
<table border= "1" align=center>
<tr>
    <th>Riječ</th>
    <th>Broj slova</th>
    <th>Broj suglasnika</th>
    <th>Broj samoglasnika</th>
   
</tr>
<?php
foreach($data_array as $words) { 
    echo "<tr>";
    echo "<td>". $words['word']. "</td>";
    echo "<td>". $words['wCount']. "</td>";
    echo "<td>". $words['conCount']. "</td>";
    echo "<td>". $words['vowCount']. "</td>";
    echo "</tr>";
    
    } 
 ?>
</table>
</body>
</html>