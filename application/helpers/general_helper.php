<?php

function redirect($uri = '', $method = 'auto', $code = NULL){
    ci_redirect($uri = '', $method = 'auto', $code = NULL);
}

//translate function
function tr($text){
    //return get_instance()->config->item('track_language_errors') ? 'yes' : 'no';
    return get_instance()->lang->line($text, get_instance()->config->item('track_language_errors'));
}

function show_toolbar($form_name, $element_name, $short = false)
	{
		$toolbar =  "
				<script language='javascript'>
				
				/* Code taken from http://actuel.fr.selfhtml.org/articles/javascript/bbcode/ */
				function addText(repdeb, repfin) {
				var input = document.$form_name.$element_name;
				input.focus();
				/* pour l'Explorer Internet */
				if(typeof document.selection != 'undefined') {
				/* Insertion du code de formatage */
				var range = document.selection.createRange();
				var insText = range.text;
				range.text = repdeb + insText + repfin;
				/* Ajustement de la position du curseur */
				range = document.selection.createRange();
				if (insText.length == 0) {
				range.move('character', -repfin.length);
				} else {
				range.moveStart('character', repdeb.length + insText.length + repfin.length);
				}
				range.select();
				}
				/* pour navigateurs plus récents basés sur Gecko*/
				else if(typeof input.selectionStart != 'undefined')
				{
				/* Insertion du code de formatage */
				var start = input.selectionStart;
				var end = input.selectionEnd;
				var insText = input.value.substring(start, end);
				input.value = input.value.substr(0, start) + repdeb + insText + repfin + input.value.substr(end);
				/* Ajustement de la position du curseur */
				var pos;
				if (insText.length == 0) {
				pos = start + repdeb.length;
				} else {
				pos = start + repdeb.length + insText.length + repfin.length;
				}
				input.selectionStart = pos;
				input.selectionEnd = pos;
				}
				/* pour les autres navigateurs */
				else
				{
				/* requête de la position d'insertion */
				var pos;
				var re = new RegExp('^[0-9]{0,3}$');
				while(!re.test(pos)) {
				pos = prompt(\"Inserting at position (0..\" + input.value.length + \"):\", \"0\");
				}
				if(pos > input.value.length) {
				pos = input.value.length;
				}
				/* Insertion du code de formatage */
				var insText = prompt(\"Please input the text to format:\");
				input.value = input.value.substr(0, pos) + repdeb + insText + repfin + input.value.substr(pos);
				}
				}
					
				
				</script>
				<table width='100%' border='0' cellspacing='0' cellpadding='0'>
				<tr><td>
				<div style='margin-top: 5; margin-bottom: 5'>
				<input type='button' value='".(empty($short) ? tr('Bold') : tr('b'))."' style='font-weight: bold' onclick=\"addText('[B]','[/B]');\">
				<input type='button' value='".(empty($short) ? tr('Italic') : tr('i'))."' style='font-style: italic' onclick=\"addText('[I]','[/I]');\">
				<input type='button' value='".(empty($short) ? tr('Underline'): tr('u'))."' style='text-decoration: underline' onclick=\"addText('[U]','[/U]');\">
				";
                
                if (empty($short)) 
                    $toolbar .= "<input type='button' value='".tr('Strike')."' style='text-decoration: line-through' onclick=\"addText('[S]','[/S]');\">";
				
                $toolbar .= "
                <input type='button' value='".tr('Center')."' onclick=\"addText('[CENTER]','[/CENTER]');\">
				<input type='button' value='" . (empty($short) ? tr('http://') : tr('Link')) . "' onclick=\"addText('[URL=http://',''); addText(']link description','[/URL]');\">
				<input type='button' value='".tr('IMG')."' onclick=\"addText('[IMG]','[/IMG]');\">
				<input type='button' value='".tr('Email')."' onclick=\"addText('[EMAIL]','[/EMAIL]');\">
				<input type='button' value='".tr('Quote')."' onclick=\"addText('[QUOTE]','[/QUOTE]');\">
				<input type='button' value='".tr('Code')."' onclick=\"addText('[CODE]','[/CODE]');\">
				</div>
				<div style='margin-top: 5; margin-bottom: 5'>
				<select name='face' onchange=\"addText('[FACE=' + value + ']','[/FACE]');\">
				<option value=''>".tr('Font')."</option>
				<option value='arial'>Arial</option>
				<option value='times'>Times</option>
				<option value='courier' style='font: courier;'>Courier</option>
				<option value='impact'>Impact</option>
				<option value='geneva'>Geneva</option>
				<option value='optima'>Optima</option>
				<option value='verdana'>Verdana</option>
				</select>
				<select name='size' onchange=\"addText('[SIZE=' + value + ']','[/SIZE]');\">
				<option value=''>".tr('Size')."</option>
				<option value='8'>".tr('Smallest')."</option>
				<option value='10'>".tr('Small')."</option>
				<option value='14'>".tr('Large')."</option>
				<option value='16'>".tr('Largest')."</option>
				</select>
				<select name='color' onchange=\"addText('[COLOR=' + value + ']','[/COLOR]');\">
				<option value=''>".tr('Color')."</option>
				<option value='#DD0000' style='color: #DD0000;'>".tr('Red')."</option>
				<option value='#FF9900' style='color: #FF9900;'>".tr('Orange')."</option>
				<option value='#33CC00' style='color: #33CC00;'>".tr('Green')."</option>
				<option value='#3300FF' style='color: #3300FF;'>".tr('Blue')."</option>
				<option value='#660066' style='color: #660066;'>".tr('Purple')."</option>
				<option value='#FFFF00' style='color: #FFFF00;'>".tr('Yellow')."</option>
				<option value='#797979' style='color: #797979;'>".tr('Grey')."</option>
				<option value='#FF99CC' style='color: #FF99CC;'>".tr('Pink')."</option>
				</select>
				</div>
				</td></tr>
				</table>";

		return $toolbar;
	}

