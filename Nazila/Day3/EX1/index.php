
<?php
$myName="Nazila";
?>
<h3>-- For Loop --</h3>
<?php
for($i=0; $i<50; $i++){
    
echo "My name is:". $i." : ".$myName."</br>";
}
?>
<hr>
<h3>-- While Loop --</h3>
<?php
$i=0;
while($i<50){
   echo "My name is:". $i." : ".$myName."</br>";
$i++;
}
?>
<hr>
<h3>-- Do While Loop --</h3>
<?php
do{
    echo "My name is:". $i." : ".$myName."</br>";
    $i++;

}while($i<50);
