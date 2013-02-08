<ul class="system_messages">
	<li class="white">
		<?php if(method_exists($this->getClassName(), 'getCreatedAt')): ?>
			[?php if ($<?php echo $this->getSingularName() ?>->getCreatedAt()): ?]
			<span class="ico"></span>
			<span>
				<?php if(method_exists($this->getClassName(), 'getsfGuardUserRelatedByCreatedBy')): ?>

				
					[?php if ($<?php echo $this->getSingularName() ?>->getsfGuardUserRelatedByCreatedBy() && method_exists($<?php echo $this->getSingularName() ?>->getsfGuardUserRelatedByCreatedBy(), 'getProfileName')) : ?]
						[?php echo __("Created at %1% by %2%.", array(  '%1%' => $<?php echo $this->getSingularName() ?>->getCreatedAt(), '%2%' => $<?php echo $this->getSingularName() ?>->getsfGuardUserRelatedByCreatedBy()->getProfileName())) ?]
					[?php else : ?]
						[?php echo __("Created at %1%.", array( '%1%' => $<?php echo $this->getSingularName() ?>->getCreatedAt())) ?]
					[?php endif ?]
				<?php else : ?>
					[?php echo __("Created at %1%.", array( '%1%' => $<?php echo $this->getSingularName() ?>->getCreatedAt())) ?]    
				<?php endif ?>
			</span>
			<br/>
			[?php endif ?]
		<?php endif ?>
		<?php if(method_exists($this->getClassName(), 'getUpdatedAt')): ?>
			[?php if ($<?php echo $this->getSingularName() ?>->getUpdatedAt()) : ?]
			<span style="line-height: 12px;">
				<?php if(method_exists($this->getClassName(), 'getsfGuardUserRelatedByUpdatedBy')): ?>
					[?php if (   $<?php echo $this->getSingularName() ?>->getsfGuardUserRelatedByUpdatedBy() && method_exists($<?php echo $this->getSingularName() ?>->getsfGuardUserRelatedByUpdatedBy(), 'getProfileName')) : ?]
						[?php echo __("Updated at %1% by %2%.", array(  '%1%' => $<?php echo $this->getSingularName() ?>->getUpdatedAt(), '%2%' => $<?php echo $this->getSingularName() ?>->getsfGuardUserRelatedByUpdatedBy()->getProfileName())) ?]    
					[?php else: ?]
						[?php echo __("Updated at %1%.", array( '%1%' => $<?php echo $this->getSingularName() ?>->getUpdatedAt())) ?]    
					[?php endif ?]
				<?php else: ?>
					[?php echo __("Updated at %1%.", array( '%1%' => $<?php echo $this->getSingularName() ?>->getUpdatedAt())) ?]    
				<?php endif ?>
			</span>
			[?php endif ?]
		<?php endif ?>
	</li>
</ul>