<?php
if ($_GET['randomId'] != "iDqTS3hOyGwsLdIPptWEGf7_cARO29_R0s2Bb3C0leyKV1ykYDweim2zZxs9ncBK") {
    echo "Access Denied";
    exit();
}

// display the HTML code:
echo stripslashes($_POST['wproPreviewHTML']);

?>  
