<?php 

@require_once(APPPATH.'libraries/richtexteditor/include_rte.php');

?>


<?php
	$text = $_POST['text'];
	

    $rte=new RichTextEditor();
	$rte->Text=$text;
	$rte->Width="853px";
	$rte->ResizeMode="disabled";
	$rte->name="RichText";

    $rte->MvcInit();
    
?>

<script type="text/javascript">
	function RichTextEditor_OnPasteFilter(editor, evt) {
		var html = evt.Arguments[0];
		var cmd = evt.Arguments[1];
		//filter html here
		evt.ReturnValue = "<div style='color:blue;'>[-- RichTextEditor has filtered your pasted code --]</div><div style='color:blue;'>{</div>" + html + "<div style='color:blue;'>}</div>";
	}

</script>

<?php
    echo $rte->GetString();
?>


