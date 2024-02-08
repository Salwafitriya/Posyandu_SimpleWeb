<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery UI Autocomplete - Default functionality</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jqueryui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
$( function() {
<?php
include 'config.php';
$db = new Database();
?>
var availableTags = [
<?php
foreach($db->data_balita() as $x){
echo '"'.$x['nama_balita'].'",';
}
?>
];
$( "#tags" ).autocomplete({
source: availableTags
});
} );
</script>
</head>
<body>
<div class="ui-widget">
<label for="tags">Tags: </label>
<input id="tags">
</div>
</body>
</html>