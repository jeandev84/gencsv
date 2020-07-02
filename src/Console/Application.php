<?php
namespace Jan\Console;


use Jan\Services\CsvToHtml;

/**
 * Class Application
 * @package Jan\Console
*/
class Application
{

     /** @var string */
     private $root;


     /**
      * Application constructor.
      * @param string $root
     */
     public function __construct(string $root)
     {
         /*
         if(php_sapi_name() != 'cli')
         {
             exit('Access denied!');
         }
         */
         $this->root = rtrim($root, '\/');
     }


    /**
     * @param string $source
     * @return string
     * @throws \Exception
    */
    public function generateFullPath(string $source)
    {
        return $this->root . DIRECTORY_SEPARATOR. trim($source, '/');
    }


    /**
     * @param Input $input
     * @return string
     * @throws \Exception
     */
     public function handle(Input $input)
     {
         $argument = $input->getFirstArgument();

         if(! $argument)
         {
             return "Empty first argument!\n";
         }

         $csvToHtml = new CsvToHtml();
         $filename = $this->generateFullPath('csv/students_jan.csv');
         $html = $csvToHtml->generate($filename);

         $filename = $argument.'.html';
         $target = $this->generateFullPath('html/'. $filename);

         $directory = dirname($target);

         if(! is_dir($directory))
         {
             mkdir($directory, 0777, true);
         }

         if(file_put_contents($target, $html))
         {
             return sprintf("File (%s) generated successfully!\n", $target);
         }
     }

}