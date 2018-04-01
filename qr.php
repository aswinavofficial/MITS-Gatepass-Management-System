<?php

    $text=$_GET['regno'];
    include('vendor/phpqrcode/qrlib.php');

    // outputs image directly into browser, as PNG stream
    QRcode::png($text);

?>