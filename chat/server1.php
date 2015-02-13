 <?php

 set_time_limit (0);
 $address = '127.0.0.1';

 $port = 1234;

 $sock = socket_create(AF_INET, SOCK_STREAM, 0);
 socket_bind($sock, $address, $port) or die('Could not bind to address');
 socket_listen($sock);


 $client = socket_accept($sock);
 $welcome = "Roll up, roll up, to the greatest show on earth!\n? ";
 socket_write($client, $welcome,strlen($welcome)) or die("Could not send connect string\n");

do{
$input=socket_read($client,1024,1) or die("Could not read input\n");
echo "User Says:  \n\t\t\t".$input;

if (trim($input) != "")
    { 
    echo "Received input: $input\n";
    if(trim($input)=="END")
    {
        socket_close($spawn);
        break;
    }
}
else{

$output = strrev($input) . "\n"; 
socket_write($spawn, $output . "? ", strlen (($output)+2)) or die("Could not write output\n");              
echo "Sent output: " . trim($output) . "\n";

}
}
while(true);


socket_close($sock);
echo "Socket Terminated";
?>