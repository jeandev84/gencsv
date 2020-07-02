<?php
namespace Jan\Services;


/**
 * Class CsvToHtml
 * @package Jan\Services
*/
class CsvToHtml
{

    /**
     * @param string $source (Type csv)
     * @return string
     * @throws \Exception
     */
     public function generate(string $source)
     {
         $extension = pathinfo($source)['extension'];

         if($extension !== 'csv')
         {
             throw new \Exception('Invalid csv file!');
         }

         $row = 1;

         $html = [];

         if(! file_exists($source))
         {
             exit("File ". $source . " does not exist!\n");
         }

         if (($handle = fopen($source, "r")) !== FALSE) {

             $html[] = '<table border="1">';

             while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                 $num = count($data);
                 if ($row == 1) {
                     $html[] = '<thead>';
                     $html[] = '<tr>';
                 } else {
                     $html[] = '<tr>';
                 }

                 for ($c = 0; $c < $num; $c++)
                 {
                     //echo $data[$c] . "<br />\n";
                     if (empty($data[$c])) {
                         $value = "&nbsp;";
                     } else {
                         $value = $data[$c];
                     }
                     if ($row == 1) {
                         $html[] = '<th>' . $value . '</th>';
                     } else {
                         $html[] = '<td>' . $value . '</td>';
                     }
                 }

                 if ($row == 1) {
                     $html[] = '</tr></thead><tbody>';
                 } else {
                     $html[] = '</tr>';
                 }
                 $row++;
             }

             $html[] = '</tbody></table>';
             fclose($handle);

             return join("\n", $html);
         }
     }

}