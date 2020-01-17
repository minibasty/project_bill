<?php 

$max = 20;
$file = "setip/log/setip-log.txt";
addNew($file, "New Line at : " . time() , $max);
echo time();
function addNew($fileName, $line, $max) {
    // Remove Empty Spaces
    $file = array_filter(array_map("trim", file($fileName)));

    // Make Sure you always have maximum number of lines
    $file = array_slice($file, 0, $max);

    // Remove any extra line 
    count($file) >= $max and array_shift($file);

    // Add new Line
    array_push($file, $line);

    // Save Result
    file_put_contents($fileName, implode(PHP_EOL, array_filter($file)));

    echo "555555555555555555555555555555555555555555555555555555555555555555555555555";
}
?>