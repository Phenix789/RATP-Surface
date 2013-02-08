<style>
	.page_footer { width: 100%; color: #333; font-size: 7pt; }
	.page_footer a { color: #999; font-style: italic}
	.center_footer { width: 60%; text-align: center; }
	.left_footer { width: 20%; text-align: left; padding-left: 5mm; }
	.right_footer{ width: 20%; text-align: right; padding-right: 5mm; }
</style>
<page_footer>
	<table class="page_footer">
		<tr>
			<td class="footer left_footer">
				Imprimé le <?php echo date('d/m/Y') ?>
				[?php if ($sf_user->getSignature()) echo "par&nbsp;".$sf_user->getSignature()?]
			</td>
			<td class="footer center_footer">
				PAGE [[page_cu]]/[[page_nb]]
			</td>
			<td class="footer right_footer">
				 <a href="www.elogys.fr/surface">Surface</a>
			</td>
		</tr>
	</table>
</page_footer>