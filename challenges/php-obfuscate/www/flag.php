<?php
if (empty($_GET['password'])) {
    highlight_file('flag.php');
    return;
}
eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));