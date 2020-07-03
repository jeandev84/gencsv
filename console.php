#!/usr/bin/env php
<?php
// #!/usr/bin/env php
require_once __DIR__.'/vendor/autoload.php';


$csvline = new \Jan\Services\CsvLine(__DIR__);
$csvline->setFileCsv('/csv/students_2106_out_mod2906_done_modKarachaevo09.csv');
$csvline->generateHtmlByRegion(\Jan\Services\Region::stuff());


/*

# HTML generator
$console = new \Jan\Console\Application(__DIR__.'/');
$status = $console->handle(
    new \Jan\Console\Input()
);

exit($status);
*/