<script type="text/javascript" src="<?= PUBLIC_URL?>/js/main.js">
</script>
<?php 
$file = VIEW_PATH . explode('/',$view)[0] . '/scripts.php';
if(file_exists($file)){
   include($file);
}
?>
</body>
</html>