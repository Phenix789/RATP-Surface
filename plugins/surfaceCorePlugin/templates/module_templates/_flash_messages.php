<?php if ($sf_request->hasErrors()): ?>
	<ul class="system_messages">
		<?php foreach ($sf_request->getErrorNames() as $name): ?>
			<li class="red"><span class="ico"></span>
				<?php if (isset($labels[$name])): ?>
					<strong><?php echo __($labels[$name]) ?></strong>
				<?php else: ?>
					<strong><?php echo __($name) ?></strong>
				<?php endif; ?>
				<p><?php echo $sf_request->getError($name) ?></p>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif ?>
<?php if ($sf_flash->has('notice')) : ?>
	<ul class="system_messages">
		<li class="green"><span class="ico"></span>
			<strong class="system_title"><?php echo __($sf_flash->get('notice')) ?></strong>
		</li>
	</ul>
<?php endif ?>
<?php if ($sf_flash->has('warning')) : ?>
	<ul class="system_messages">
		<li class="yellow"><span class="ico"></span>
			<strong class="system_title"><?php echo __($sf_flash->get('warning')) ?></strong>
		</li>
	</ul>
<?php endif ?>
<?php if ($sf_flash->has('information')) : ?>
	<ul class="system_messages">
		<li class="blue"><span class="ico"></span>
			<strong class="system_title"><?php echo __($sf_flash->get('information')) ?></strong>
		</li>
	</ul>
<?php endif; ?>