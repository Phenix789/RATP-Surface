<style>
body, html{padding:0;margin:0;}
strong{}
em{font-style:normal;font-weight:bold;}
.etiquette{page-break-after: always;font-size:9px;}
fieldset{border:none;margin:0;padding:0;}
.qrcode{width:60px;}
.qrcode_content{font-size:5px;margin:0;padding:0;text-align:center;}
</style>
<page>
	<page_header></page_header>
	<page_footer></page_footer>
	<?php foreach($objects as $object):?>
		<table class="etiquette" style="width:80%">
			<tbody>
				<tr>
					<td style="width:60px;">
						<?php
						$text = $class_name.'_'.$object->getByName($primary_key, BasePeer::TYPE_FIELDNAME);
						$path = '/tmp/'.rand(0, 10000).$text;
						SfcQRCode::png($text, $path, QR_ECLEVEL_M, 3, 0);
						?>
						<img src="<?php echo $path ?>" class="qrcode" />
						<p class="qrcode_content"><?php echo $text ?></p>
					</td>
					<td style="vertical-align:top;">
						<strong><?php echo $object->getMetadata('name').' '.$object->getByName($primary_key, BasePeer::TYPE_FIELDNAME) ?></strong><br/>
						<?php surface_include_component($module_name, $component, array('object' => $object, 'noscript' => true)) ?>
					</td>
				</tr>
			</tbody>
		</table>
	<?php endforeach ?>

</page>