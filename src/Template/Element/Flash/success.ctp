<?php
$this->html->scriptBlock('$.niftyNoty({
    type: "success",
    container : "floating",
    title : "Succes",
    message : "'. h($message).'",
    closeBtn : false,
    timer : 5000
});',['defer' => true])

?>

<div class="message success" onclick="this.classList.add('hidden')"><?= h($message) ?></div>
