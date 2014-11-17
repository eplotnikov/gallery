
    <!-- страница "news", вывод новостей -->

        <div id="inform_block">

            <h1>News</h1>
            <hr>

            <?php

            foreach ($data as $key => $value) {
                foreach ($value as $k => $val) {
                    if ($k == "name") {
                        echo "<h3>".$val."</h3>";
                    }
                    if ($k == "date") {
                        echo "<p><i>".$val."</i></p>";
                    }
                    if ($k == "text") {
                        echo "<p>".$val."</p>";
                    }
                }
            }

            ?>

        </div>