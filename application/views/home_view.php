
    <!-- страница "home", контент вкладки подтягивается из текстового файла -->

        <div id="inform_block">

            <?php

                if (is_file('application/files/home.txt')) {
                    $filename = 'application/files/home.txt';
                    $open = fopen($filename, 'r');
                    echo $read = fread($open, filesize($filename));
                    fclose($open);
                }

            ?>

        </div>