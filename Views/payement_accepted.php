<?php
/**
 * @var int $invoice
 */
?>
<h1>Paiment Accepter</h1>
<object type="<?= $invoice['file']['type']?>" data="data:<?= $invoice['file']['type']?>;base64,<?= $invoice['file']['content']?>"></object>