<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<title>Surface Generator</title>
		<link href="css/generator.css" rel="stylesheet" />
	</head>
	<body>
		<h2>Surface Generator YAML example</h2>
		<div class="yaml">
			<?php
			$lines = file('generator.yml');
			$max_length = 40;
			$final_lines = array();
			foreach($lines as $line){
				$newline = array('key' => rtrim(preg_filter('/^(\s*[^:#]*:).*$/', '$1', $line)), 'value' => trim(preg_filter('/^\s*[^:#]*:?\s*([^#]*).*$/', '$1', $line)), 'comment' => rtrim(preg_filter('/^(\s*[^\s#]+(\s*[^\s#]+)?|)(\s*#.*)$/', '$3', $line)));
				$newline['key'] = str_replace("\t", '  ', $newline['key']);
				$final_lines[] = $newline;
			}
			$lines = '';
			foreach($final_lines as $line){
				$string = '';
				if($line['value'] !== ''){
					$string = sprintf("% -{$max_length}s%s", "<b>{$line['key']}</b>", str_replace(array('[', ']', '{', '}', '|'), array('<span class="c1">[</span>', '<span class="c1">]</span>', '<span class="c1">{</span>', '<span class="c1">}</span>', '<span class="c1">|</span>'), $line['value']));
				} elseif($line['key']) {
					$string = '<b>'.rtrim($line['key']).'</b>';
				}
				if($line['comment']){
					$string .= ' <em>'.$line['comment'].'</em>';
				}
				$string .= '</br>';
				echo str_replace('  ', '&nbsp;&nbsp;', $string);
			}
			?>
		</div>
	</body>
</html>
