<?php
namespace Jan;


/**
 * Class Repository
 * @package Jan
*/
class Repository
{
    public function donothing()
    {
        /*
        if (($handle = fopen($csvFile, "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
            {
                //  echo "start reading ";
                dump($data);
                $reqion = isset($data[12]) ? $data[12] : '';
                // dump($reqion, $regions);

                if (! in_array($reqion, $regions))
                {
                    dump("linenotfound\n");
                } else {
                    dump($data);
                    switch ($reqion) {
                        case "Владимирская область\n";
                            echo "33\n";
                            break;
                        case "Волгоградская область\n";
                            echo "34\n";
                            break;
                        case "Вологодская область\n";
                            echo "35\n";
                            break;
                        case "Воронежская область\n";
                            echo "36\n";
                            break;
                        case "Ивановская область\n";
                            echo "37\n";
                            break;
                        case "Иркутская область\n";
                            echo "38\n";
                            break;
                        case "Калининградская область\n";
                            echo "39\n";
                            break;
                        case "Калужская область\n";
                            echo "40\n";
                            break;
                        case "Кемеровская область\n";
                            echo "42\n";
                            break;
                        case "Кировская область\n";
                            echo "43\n";
                            break;
                        case "Костромская область\n";
                            echo "44\n";
                            break;
                        case "Курганская область\n";
                            echo "45\n";
                            break;
                        case "Курская область\n";
                            echo "46\n";
                            break;
                        case "Ленинградская область\n";
                            echo "47\n";
                            break;
                        case "Липецкая область\n";
                            echo "48\n";
                            break;
                        case "Магаданская область\n";
                            echo "49\n";
                            break;
                        case "Московская область\n";
                            echo "50\n";
                            break;
                        case "Мурманская область\n";
                            echo "51\n";
                            break;
                        case "Нижегородская область\n";
                            echo "52\n";
                            break;
                        case "Новгородская область\n";
                            echo "53\n";
                            break;
                        case "Новосибирская область\n";
                            echo "54\n";
                            break;
                        case "Омская область\n";
                            echo "55\n";
                            break;
                        case "Оренбургская область\n";
                            echo "56\n";
                            break;
                        case "Орловская область\n";
                            echo "57\n";
                            break;
                        case "Пензенская область\n";
                            echo "58\n";
                            break;
                        case "Псковская область\n";
                            echo "60\n";
                            break;
                        case "Ростовская область\n";
                            echo "61\n";
                            break;
                        case "Рязанская область\n";
                            echo "62\n";
                            break;
                        case "Самарская область\n";
                            echo "63\n";
                            break;
                        case "Саратовская область\n";
                            echo "64\n";
                            break;
                        case "Сахалинская область\n";
                            echo "65\n";
                            break;
                        case "Свердловская область\n";
                            echo "66\n";
                            break;
                        case "Смоленская область\n";
                            echo "67\n";
                            break;
                        case "Тамбовская область\n";
                            echo "68\n";
                            break;
                        case "Тверская область\n";
                            echo "69\n";
                            break;
                        case "Томская область\n";
                            echo "70\n";
                            break;
                        case "Тульская область\n";
                            echo "71\n";
                            break;
                        case "Тюменская область\n";
                            echo "72\n";
                            break;
                        case "Ульяновская область\n";
                            echo "73\n";
                            break;
                        case "Челябинская область\n";
                            echo "74\n";
                            break;
                        case "Ярославская область\n";
                            echo "76\n";
                            break;
                        case "г. Москва\n";
                            echo "77\n";
                            break;
                        case "г. Санкт-Петербург\n";
                            echo "78\n";
                            break;
                        case "г. Севастополь\n";
                            echo "92\n";
                            break;
                        case "Еврейская автономная область\n";
                            echo "79\n";
                            break;
                        case "Ненецкий автономный округ\n";
                            echo "83\n";
                            break;
                        case "Ханты-Мансийский автономный округ - Югра\n";
                            echo "86\n";
                            break;
                        case "Чукотский автономный округ\n";
                            echo "87\n";
                            break;
                        case "Ямало-Ненецкий автономный округ\n";
                            echo "89\n";
                            break;
                        case "Республика Адыгея\n";
                            echo "01\n";
                            break;
                        case "Республика Алтай\n";
                            echo "04\n";
                            break;
                        case "Республика Башкортостан\n";
                            echo "02\n";
                            break;
                        case "Республика Бурятия\n";
                            echo "03\n";
                            break;
                        case "Республика Дагестан\n";
                            echo "05\n";
                            break;
                        case "Республика Ингушетия\n";
                            echo "06\n";
                            break;
                        case "Кабардино-Балкарская Республика\n";
                            echo "07\n";
                            break;
                        case "Республика Калмыкия\n";
                            echo "08\n";
                            break;
                        case "Карачаево-Черкесская Республика\n";
                            echo "09\n";
                            break;
                        case "Республика Карелия\n";
                            echo "10\n";
                            break;
                        case "Республика Коми\n";
                            echo "11\n";
                            break;
                        case "Республика Крым\n";
                            echo "91\n";
                            break;
                        case "Республика Марий Эл\n";
                            echo "12\n";
                            break;
                        case "Республика Мордовия\n";
                            echo "13\n";
                            break;
                        case "Республика Саха (Якутия)\n";
                            echo "14\n";
                            break;
                        case "Республика Северная Осетия — Алания\n";
                            echo "15\n";
                            break;
                        case "Республика Татарстан\n";
                            echo "16\n";
                            break;
                        case "Республика Тыва\n";
                            echo "17\n";
                            break;
                        case "Удмуртская Республика\n";
                            echo "18\n";
                            break;
                        case "Республика Хакасия\n";
                            echo "19\n";
                            break;
                        case "Чеченская Республика\n";
                            echo "20\n";
                            break;
                        case "Чувашская Республика\n";
                            echo "21\n";
                            break;
                        case "Алтайский край\n";
                            echo "22\n";
                            break;
                        case "Забайкальский край\n";
                            echo "75\n";
                            break;
                        case "Камчатский край\n";
                            echo "41\n";
                            break;
                        case "Краснодарский край\n";
                            echo "23\n";
                            break;
                        case "Красноярский край\n";
                            echo "24\n";
                            break;
                        case "Пермский край\n";
                            echo "59\n";
                            break;
                        case "Приморский край\n";
                            echo "25\n";
                            break;
                        case "Ставропольский край\n";
                            echo "26\n";
                            break;
                        case "Хабаровский край\n";
                            echo "27\n";
                            break;
                        case "Амурская область\n";
                            echo "28\n";
                            break;
                        case "Архангельская область\n";
                            echo "29\n";
                            break;
                        case "Астраханская область\n";
                            echo "30\n";
                            break;
                        case "Белгородская область\n";
                            echo "31\n";
                            break;
                        case "Брянская область\n";
                            echo "32\n";
                            break;
                    }
                }
        }
        */
    }

    /*
    public function generateHtmlByRegion(array $regions)
    {
        ini_set("memory_limit", "-1");

        $row = 1;
        $sources = [];

        $csvFile = $this->fullFilename($this->filename);

        $extension = pathinfo($csvFile)['extension'] ?? '';

        if($extension != 'csv')
        {
             exit('Ошибка расшерения файла!');
        }

        $content = $this->getContentHeader();
        $content .= $this->getHeaders();
        $sources = [];

        if (($handle = fopen($csvFile, "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
            {
                $data = $this->filteredData($data);
                $region = isset($data[12]) ? $data[12] : false;
                $num = count($data);

                $nameOfRegion = str_replace(' ', '_', $region);
                $filename = $this->fullFilename('html/'. $nameOfRegion . '.html');
                $dirname = dirname($filename);

                if(in_array($region, $regions) && in_array($region, $data))
                {
                    if($row == 1)
                    {
                        $content .= "<thead>";
                        $content .= "<tr>";
                    }else{
                        $content .= "<tr>";
                    }

                    for ($c=0; $c < $num; $c++)
                    {
                        if(empty($data[$c]))
                        {
                            $value = "&nbsp;";
                        }else{
                            $value = $data[$c];
                        }

                        if($row == 1)
                        {
                            $content .= "<td>$value</td>";
                        }else{
                            $content .= "<td>$value</td>";
                        }
                    }

                    if($row == 1)
                    {
                        $content .= "</tr>";
                        $content .= "</thead>";
                        $content .= "<tbody>";
                    } else {
                        $content .= "</tr>";
                    }

                    $row++;

                    if(! is_dir($dirname))
                    {
                        mkdir($dirname, 0777, true);
                    }

                    file_put_contents($filename, $content);
                }

            }

            fclose($handle);

        } else {
            // error opening the file.
            echo "error opening file";
        }
    }

    */



    /**
     * @param array $allows
     */
    /*
    public function getLinesOld(array $allows)
    {
        ini_set("memory_limit", "-1");
        $handle = fopen($this->source, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                //  echo "start reading ";
                if(!in_array($line, $allows)) {
                    echo "linenotfound";
                } else {
                    switch($line){
                        case "Владимирская область"; echo "33";

                            break;
                        case "Волгоградская область"; echo "34";

                            break;
                        case "Вологодская область"; echo "35";

                            break;
                        case "Воронежская область"; echo "36";

                            break;
                        case "Ивановская область"; echo "37";

                            break;
                        case "Иркутская область"; echo "38";

                            break;
                        case "Калининградская область"; echo "39";

                            break;
                        case "Калужская область"; echo "40";

                            break;
                        case "Кемеровская область"; echo "42";

                            break;
                        case "Кировская область"; echo "43";

                            break;
                        case "Костромская область"; echo "44";

                            break;
                        case "Курганская область"; echo "45";

                            break;
                        case "Курская область"; echo "46";

                            break;
                        case "Ленинградская область"; echo "47";

                            break;
                        case "Липецкая область"; echo "48";

                            break;
                        case "Магаданская область"; echo "49";

                            break;
                        case "Московская область"; echo "50";

                            break;
                        case "Мурманская область"; echo "51";

                            break;
                        case "Нижегородская область"; echo "52";

                            break;
                        case "Новгородская область"; echo "53"; break;
                        case "Новосибирская область"; echo "54"; break;
                        case "Омская область"; echo "55"; break;
                        case "Оренбургская область"; echo "56"; break;
                        case "Орловская область"; echo "57"; break;
                        case "Пензенская область"; echo "58"; break;
                        case "Псковская область"; echo "60"; break;
                        case "Ростовская область"; echo "61"; break;
                        case "Рязанская область"; echo "62"; break;
                        case "Самарская область"; echo "63"; break;
                        case "Саратовская область"; echo "64"; break;
                        case "Сахалинская область"; echo "65"; break;
                        case "Свердловская область"; echo "66"; break;
                        case "Смоленская область"; echo "67"; break;
                        case "Тамбовская область"; echo "68"; break;
                        case "Тверская область"; echo "69"; break;
                        case "Томская область"; echo "70"; break;
                        case "Тульская область"; echo "71"; break;
                        case "Тюменская область"; echo "72"; break;
                        case "Ульяновская область"; echo "73"; break;
                        case "Челябинская область"; echo "74"; break;
                        case "Ярославская область"; echo "76"; break;
                        case "г. Москва"; echo "77"; break;
                        case "г. Санкт-Петербург"; echo "78"; break;
                        case "г. Севастополь"; echo "92"; break;
                        case "Еврейская автономная область"; echo "79"; break;
                        case "Ненецкий автономный округ"; echo "83"; break;
                        case "Ханты-Мансийский автономный округ - Югра"; echo "86"; break;
                        case "Чукотский автономный округ"; echo "87"; break;
                        case "Ямало-Ненецкий автономный округ"; echo "89"; break;
                        case "Республика Адыгея"; echo "01"; break;
                        case "Республика Алтай"; echo "04"; break;
                        case "Республика Башкортостан"; echo "02"; break;
                        case "Республика Бурятия"; echo "03"; break;
                        case "Республика Дагестан"; echo "05"; break;
                        case "Республика Ингушетия"; echo "06"; break;
                        case "Кабардино-Балкарская Республика"; echo "07"; break;
                        case "Республика Калмыкия"; echo "08"; break;
                        case "Карачаево-Черкесская Республика"; echo "09"; break;
                        case "Республика Карелия"; echo "10"; break;
                        case "Республика Коми"; echo "11"; break;
                        case "Республика Крым"; echo "91"; break;
                        case "Республика Марий Эл"; echo "12"; break;
                        case "Республика Мордовия"; echo "13"; break;
                        case "Республика Саха (Якутия)"; echo "14"; break;
                        case "Республика Северная Осетия — Алания"; echo "15"; break;
                        case "Республика Татарстан"; echo "16"; break;
                        case "Республика Тыва"; echo "17"; break;
                        case "Удмуртская Республика"; echo "18"; break;
                        case "Республика Хакасия"; echo "19"; break;
                        case "Чеченская Республика"; echo "20"; break;
                        case "Чувашская Республика"; echo "21"; break;
                        case "Алтайский край"; echo "22"; break;
                        case "Забайкальский край"; echo "75"; break;
                        case "Камчатский край"; echo "41"; break;
                        case "Краснодарский край"; echo "23"; break;
                        case "Красноярский край"; echo "24"; break;
                        case "Пермский край"; echo "59"; break;
                        case "Приморский край"; echo "25"; break;
                        case "Ставропольский край"; echo "26"; break;
                        case "Хабаровский край"; echo "27"; break;
                        case "Амурская область"; echo "28"; break;
                        case "Архангельская область"; echo "29"; break;
                        case "Астраханская область"; echo "30"; break;
                        case "Белгородская область"; echo "31"; break;
                        case "Брянская область"; echo "32"; break;
                    }
                }
            }

            fclose($handle);
        } else {
            // error opening the file.
            echo "error opening file";
        }
    }
    */
}