<?php
 echo"<script src='SoundManager2-master/script/soundmanager2.js'></script>
<script>
    // where to find flash SWFs, if needed...
    soundManager.url = 'SoundManager2-master/swf/';

    soundManager.onready(function() {
        soundManager.createSound({
            id: 'mySound',
            url: 'temp.mp3'
        });

        // ...and play it
        soundManager.play('mySound');
    });
</script>";
?>