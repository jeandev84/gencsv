<?php
namespace Jan\Console;


use function Couchbase\defaultDecoder;

/**
 * Class Input
 * @package Jan\Console
 */
class Input
{

    private $arguments;

    /** @var string */
    private $input;

    /**
     * Application constructor.
     * @param array $arguments
     */
    public function __construct(array $arguments = [])
    {
        if(! $arguments)
        {
            $arguments = $_SERVER['argv'];
        }

        array_shift($arguments);
        $this->arguments = $arguments;

    }


    /**
     * @return mixed
     */
    public function getFirstArgument()
    {
        return $this->arguments[0] ?? '';
    }
}