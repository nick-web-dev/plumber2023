<?php
header('Content-type: text/xml');
?>
<Response>
    <Dial callerId="+18559761708"><?php  echo $_POST['To'];?></Dial>
</Response>