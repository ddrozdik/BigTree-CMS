<?
	BigTree::globalizePOSTVars();

	$module = end($bigtree["path"]);

	$default_position = isset($default_position) ? $default_position : "";

	$fields = array();
	if (is_array($_POST["type"])) {
		foreach ($_POST["type"] as $key => $val) {
			$field = json_decode(str_replace(array("\r","\n"),array('\r','\n'),$_POST["options"][$key]),true);
			$field["type"] = $val;
			$field["title"] = htmlspecialchars($_POST["titles"][$key]);
			$field["subtitle"] = htmlspecialchars($_POST["subtitles"][$key]);
			$fields[$key] = $field;
		}
	}

	$embed = $admin->createModuleEmbedForm($module,$title,$table,$fields,$preprocess,$callback,$default_position,$default_pending,$css,$redirect_url,$thank_you_message);
	$module_info = $admin->getModule($module);

	$admin->growl("Developer","Created Embeddable Form");
?>
<div class="container">
	<section>
		<h3><?=$title?></h3>
		<p>Your embeddable form has been created. You can copy and paste the code below to embed this form.</p>
		<input type="text" value="<?=$embed?>" />
	</section>
	<footer>
		<a href="<?=$developer_root?>modules/edit/<?=$module_info["id"]?>/" class="button blue">Return to Edit Module</a>
	</footer>
</div>