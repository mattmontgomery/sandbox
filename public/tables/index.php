<?php

$loader = require_once('../../vendor/autoload.php');

use Sandbox\Table\Table;

$table = new Table();

$table->importCsv('./2014-5k.csv');
?>
<html>
    <head>
        <title>Tables</title>
        <script type="text/javascript" src="/vendor/requirejs/require.js" data-main="/tables/js/main">
        </script>
    </head>
    <body>
        <div id="marathon">
            <div class="toolbar">
                <input class="js-search" placeholder="Search name" type="search" data-search="Name">
                <input class="js-search" placeholder="Search city" type="search" data-search="City">
                <button class="sort" data-sort="Name">Sort by name</button>
                <button class="sort" data-sort="Place">Sort by place</button>
                <button class="sort" data-sort="City">Sort by city</button>
            </div>
            <div class="filterbar">
                <select class="js-filter" data-filter="Age Group">
                    <option>19-24</option>
                    <option>25-29</option>
                    <option>30-34</option>
                    <option>35-39</option>
                    <option>40-44</option>
                    <option>45-49</option>
                    <option>50-54</option>
                </select>
            </div>
        <textarea><?php
        echo $table->export();
        ?></textarea>
        </div>
    </body>
</html>
