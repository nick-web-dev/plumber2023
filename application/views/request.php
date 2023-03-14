<?php
header('Content-type: text/xml');
?>
<Response>
    <Dial callerId="+14159805349"><?php  echo $_POST['To'];?></Dial>
</Response>