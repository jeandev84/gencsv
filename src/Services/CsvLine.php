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
           $csvFile = $this->fullFilename($this->filename);
           $extension = pathinfo($csvFile)['extension'] ?? '';

           if($extension != 'csv')
           {
               exit('Ошибка расшерения файла!');
           }

           $row = 1;
           $sources = [];
           $content = $this->getContentHeader();
           $content .= $this->getHeaders();

           if (($handle = fopen($csvFile, "r")) !== FALSE)
           {
               while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
               {
                   $data = $this->filteredData($data);
                   $region = isset($data[12]) ? $data[12] : false;
                   // $num = count($data);

                   if(in_array($region, $regions))
                   {
                        $sources[$region][] = $data;
                   }

                   $row++;
               }

               $files = [];

               foreach ($sources as $region => $source)
               {
                   foreach ($source as $s)
                   {
                       $content .= $this->buildHtml($s);
                   }

                   $content .= $this->getContentFooter();

                   $nameOfRegion = str_replace(' ', '_', $region);
                   $filename = $this->fullFilename(sprintf('html/%s.html', $nameOfRegion));
                   $dirname = dirname($filename);

                   if(! is_dir($dirname))
                   {
                       mkdir($dirname, 0777, true);
                   }

                   file_put_contents($filename, $content);
               }

           } // end if
      }


      /**
        * @param array $data
       * @return string
      */
      public function buildHtml(array $data)
      {
          $content = "<tr>\n";
          foreach ($data as $value)
          {
              $content .= "<td>$value</td>\n";
          }
          $content .= "<tr>\n";
          return $content;
      }



    /**
     * @param array $data
     * @return array
     */
    public function filteredData(array $data)
    {
        $diff = [];
        foreach ($data as $key => $value)
        {
            if(in_array($key, [3, 9, 10, 11]))
            {
                $diff[$key] = $value;
            }
        }

        return array_diff($data, $diff);
    }




    /**
     * @return string
     */
    public function getContentHeader()
    {
        $headHtml = [
            '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">',
            '<html>',
            '<head>',
            '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>',
            '<title></title>',
            '<meta name="generator" content="LibreOffice 6.3.5.2 (Linux)"/>',
            '<meta name="created" content="00:00:00"/>',
            '<meta name="changed" content="2020-07-02T12:15:51.172466787"/>',
            '<style type="text/css">
                body,div,table,thead,tbody,tfoot,tr,th,td,p 
                { font-family:"Liberation Sans"; font-size:x-small }
                a.comment-indicator:hover + comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em;  } 
                a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em;  } 
                comment { display:none;  } 
	        </style>',
            '</head>',
            '<body>',
            '<table cellspacing="0" border="0">',
            '<colgroup width="76"></colgroup>',
            '<colgroup width="68"></colgroup>',
            '<colgroup width="137"></colgroup>',
            '<colgroup width="111"></colgroup>',
            '<colgroup width="87"></colgroup>',
            '<colgroup width="112"></colgroup>',
            '<colgroup width="940"></colgroup>',
            '<colgroup width="736"></colgroup>',
            '<colgroup width="540"></colgroup>'
        ];

        return join("\n", $headHtml);
    }


    /**
     * @return string
     */
    public function getHeaders()
    {
        $headers = [
            "username",
            "password",
            "idnumber",
            "lastname",
            "firstname",
            "middlename",
            "institution",
            "department",
            "profile_field_region_d"
        ];

        $html = "<tr>\n";
        foreach ($headers as $header)
        {
            $html .= "<td>$header</td>\n";
        }
        $html .= "</tr>\n";
        return $html;
    }


    /**
     * @return string
     */
    public function  getContentFooter()
    {
        $footerHtml = [
            '</table>',
            '<!-- ************************************************************************** -->',
            '</body>',
            '</html>'
        ];

        return join("\n", $footerHtml);
    }


}