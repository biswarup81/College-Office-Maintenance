<?php
include './inc/datacon.php';
include 'classes/admin_class.php';



$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
echo strtoupper($f->format(200));

?>
</body>
</html>

