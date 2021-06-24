<?php
/**
 * @var int $invoice
 */
?>
<div class="d-flex flex-column">
    <h1>Paiment Accepter</h1>
    <div class="col-12 col-lg-6">
        <object type="<?= $invoice['file']['type']?>" data="data:<?= $invoice['file']['type']?>;base64,<?= $invoice['file']['content']?>" style="height: 90vh; width: 100%" ></object>
    </div>
</div>
