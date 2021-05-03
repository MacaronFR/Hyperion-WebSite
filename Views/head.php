<?php
/**
 * @var string $title title of the page
 */
?>
<title><?= $title ?></title>
<script>
	const token = "<?= $_SESSION["token"] ?? null ?>";
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<link href="/assets/css/main.css" type="text/css" rel="stylesheet">
<link href="/assets/bootstrap-5/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<script src="/assets/bootstrap-5/js/bootstrap.min.js"></script>
<link rel="icon" href="/assets/images/Hyperion-yellow-transparent.png">
<link href="/assets/WillowBody_pc_ps3.ttf">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="/assets/js/utils.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">

<!-- test pour mika -->
<link href="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.18.3/dist/bootstrap-table-locale-all.min.js"></script>
<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/locale/bootstrap-table-fr-FR.min.js"></script>