<?php
namespace Jan\Services;


/**
 * Class CsvLine
 * @package Jan\Services
*/
class CsvLine
{

   /** @var string  */
   private $source;

   /** @var string csv file */
   private $filename;

   /**
     * CsvLine constructor.
     * @param string $source
     * @throws \Exception
   */
   public function __construct(string $source)
   {
       $this->source = rtrim($source, '\/');
   }


   /**
     * @param string $filename
     * @return $this
   */
   public function setFileCsv(string $filename)
   {
       $this->filename = $filename;
       return $this;
   }


    /**
     * @param string $path
     * @return string
     */
   public function fullFilename(string $path)
   {
       return $this->source . DIRECTORY_SEPARATOR. trim($path, '/');
   }


   /**
     * @param array $regions
   */
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

       $content = "<table>\n";

       if (($handle = fopen($csvFile, "r")) !== FALSE)
       {
           while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
           {
               $num = count($data);
               $row++;

               for ($c=0; $c < $num; $c++)
               {
                   $parts = explode(';', $data[$c]);
                   $diff = [];

                   foreach ($parts as $key => $value)
                   {
                       if(in_array($key, [3, 9, 10, 11]))
                       {
                           $diff[$key] = $value;
                       }
                   }

                   $parts = array_diff($parts, $diff);

                   if($row = 1)
                   {
                       $content .= $this->buildSimpleRow($parts);
                   }

                   $region = isset($parts[12]) ? $parts[12] : '';

                   if (in_array($region, $regions)) {
                       $sources[$region][] = $parts;
                   }
               }
           }

           fclose($handle);

           // Build HTML files
           $str = [];
           foreach ($sources as $region => $components)
           {
               $str = [
                   'html' => $this->buildHtmlCode($components),
                   'region' => $region
               ];

               // $content = "<table>\n";
               $content .= $str['html'];
               $content .= "</table>\n";

               //echo $content;

               $filename = $this->fullFilename('html/'. strtolower($str['region']) . '.html');
               $dirname = dirname($filename);

               if(! is_dir($dirname))
               {
                   mkdir($dirname, 0777, true);
               }

               file_put_contents($filename, $content);
           }

       } else {
           // error opening the file.
           echo "error opening file";
       }
   }


   /**
     * @param $sources
     * @return string
   */
   public function buildHtmlCode($sources)
   {
       $str = [];
       foreach ($sources as $source)
       {
          $str[] = $this->buildRows($source);
       }
       return join("\n", $str);
   }


   /**
     * @param array $source
     * @return string
   */
   public function buildRows($source)
   {
       if(is_array($source))
       {
           $str[] = '<tr>';
           for($i = 0; $i < count($source); $i++)
           {
               if(isset($source[$i]))
               {
                   $str[] = '<td>'. $source[$i] . '</td>';
               }
               $str[] = '<td></td>';
           }
           $str[] = '</tr>';

           return join("\n", $str);
       }

   }


  /**
     * @param array $rows
     * @return string
   */
   public function buildSimpleRow(array $rows)
   {
       $str = "<tr>\n";
       foreach ($rows as $row)
       {
           $str .= "<td>\n";
           $str .= $row ."\n";
           $str .= "</td>\n";
       }
       $str .= "</tr>";
       return $str;
   }

    /**
     * @param array $allows
    */
    public function getLinesOld(array $allows)
    {
        ini_set("memory_limit", "-1");
        $handle = fopen($this->source, "r");
        if ($handle) {
            while (($line = fgets($handle)) !== false) {
                //  echo "start reading ";
                if(!in_array($line, $allows)) {
                    echo "linenotfound\n";
                } else {
                    switch($line){
                        case "Владимирская область\n"; echo "33\n";

                            break;
                        case "Волгоградская область\n"; echo "34\n";

                            break;
                        case "Вологодская область\n"; echo "35\n";

                            break;
                        case "Воронежская область\n"; echo "36\n";

                            break;
                        case "Ивановская область\n"; echo "37\n";

                            break;
                        case "Иркутская область\n"; echo "38\n";

                            break;
                        case "Калининградская область\n"; echo "39\n";

                            break;
                        case "Калужская область\n"; echo "40\n";

                            break;
                        case "Кемеровская область\n"; echo "42\n";

                            break;
                        case "Кировская область\n"; echo "43\n";

                            break;
                        case "Костромская область\n"; echo "44\n";

                            break;
                        case "Курганская область\n"; echo "45\n";

                            break;
                        case "Курская область\n"; echo "46\n";

                            break;
                        case "Ленинградская область\n"; echo "47\n";

                            break;
                        case "Липецкая область\n"; echo "48\n";

                            break;
                        case "Магаданская область\n"; echo "49\n";

                            break;
                        case "Московская область\n"; echo "50\n";

                            break;
                        case "Мурманская область\n"; echo "51\n";

                            break;
                        case "Нижегородская область\n"; echo "52\n";

                            break;
                        case "Новгородская область\n"; echo "53\n"; break;
                        case "Новосибирская область\n"; echo "54\n"; break;
                        case "Омская область\n"; echo "55\n"; break;
                        case "Оренбургская область\n"; echo "56\n"; break;
                        case "Орловская область\n"; echo "57\n"; break;
                        case "Пензенская область\n"; echo "58\n"; break;
                        case "Псковская область\n"; echo "60\n"; break;
                        case "Ростовская область\n"; echo "61\n"; break;
                        case "Рязанская область\n"; echo "62\n"; break;
                        case "Самарская область\n"; echo "63\n"; break;
                        case "Саратовская область\n"; echo "64\n"; break;
                        case "Сахалинская область\n"; echo "65\n"; break;
                        case "Свердловская область\n"; echo "66\n"; break;
                        case "Смоленская область\n"; echo "67\n"; break;
                        case "Тамбовская область\n"; echo "68\n"; break;
                        case "Тверская область\n"; echo "69\n"; break;
                        case "Томская область\n"; echo "70\n"; break;
                        case "Тульская область\n"; echo "71\n"; break;
                        case "Тюменская область\n"; echo "72\n"; break;
                        case "Ульяновская область\n"; echo "73\n"; break;
                        case "Челябинская область\n"; echo "74\n"; break;
                        case "Ярославская область\n"; echo "76\n"; break;
                        case "г. Москва\n"; echo "77\n"; break;
                        case "г. Санкт-Петербург\n"; echo "78\n"; break;
                        case "г. Севастополь\n"; echo "92\n"; break;
                        case "Еврейская автономная область\n"; echo "79\n"; break;
                        case "Ненецкий автономный округ\n"; echo "83\n"; break;
                        case "Ханты-Мансийский автономный округ - Югра\n"; echo "86\n"; break;
                        case "Чукотский автономный округ\n"; echo "87\n"; break;
                        case "Ямало-Ненецкий автономный округ\n"; echo "89\n"; break;
                        case "Республика Адыгея\n"; echo "01\n"; break;
                        case "Республика Алтай\n"; echo "04\n"; break;
                        case "Республика Башкортостан\n"; echo "02\n"; break;
                        case "Республика Бурятия\n"; echo "03\n"; break;
                        case "Республика Дагестан\n"; echo "05\n"; break;
                        case "Республика Ингушетия\n"; echo "06\n"; break;
                        case "Кабардино-Балкарская Республика\n"; echo "07\n"; break;
                        case "Республика Калмыкия\n"; echo "08\n"; break;
                        case "Карачаево-Черкесская Республика\n"; echo "09\n"; break;
                        case "Республика Карелия\n"; echo "10\n"; break;
                        case "Республика Коми\n"; echo "11\n"; break;
                        case "Республика Крым\n"; echo "91\n"; break;
                        case "Республика Марий Эл\n"; echo "12\n"; break;
                        case "Республика Мордовия\n"; echo "13\n"; break;
                        case "Республика Саха (Якутия)\n"; echo "14\n"; break;
                        case "Республика Северная Осетия — Алания\n"; echo "15\n"; break;
                        case "Республика Татарстан\n"; echo "16\n"; break;
                        case "Республика Тыва\n"; echo "17\n"; break;
                        case "Удмуртская Республика\n"; echo "18\n"; break;
                        case "Республика Хакасия\n"; echo "19\n"; break;
                        case "Чеченская Республика\n"; echo "20\n"; break;
                        case "Чувашская Республика\n"; echo "21\n"; break;
                        case "Алтайский край\n"; echo "22\n"; break;
                        case "Забайкальский край\n"; echo "75\n"; break;
                        case "Камчатский край\n"; echo "41\n"; break;
                        case "Краснодарский край\n"; echo "23\n"; break;
                        case "Красноярский край\n"; echo "24\n"; break;
                        case "Пермский край\n"; echo "59\n"; break;
                        case "Приморский край\n"; echo "25\n"; break;
                        case "Ставропольский край\n"; echo "26\n"; break;
                        case "Хабаровский край\n"; echo "27\n"; break;
                        case "Амурская область\n"; echo "28\n"; break;
                        case "Архангельская область\n"; echo "29\n"; break;
                        case "Астраханская область\n"; echo "30\n"; break;
                        case "Белгородская область\n"; echo "31\n"; break;
                        case "Брянская область\n"; echo "32\n"; break;
                    }
                }
            }

            fclose($handle);
        } else {
            // error opening the file.
            echo "error opening file";
        }
    }
}