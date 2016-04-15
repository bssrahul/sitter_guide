<!--<div id="flash-<?= h($key) ?>" class="message-info success">
    <?= h($message) ?>: <?= h($params['name']) ?>, <?= h($params['email']) ?>.
</div> -->

<div class="message-info success success_msg" onclick="this.classList.add('hidden');"><i class="fa fa-check-square"></i> <?= h($message) ?></div>
