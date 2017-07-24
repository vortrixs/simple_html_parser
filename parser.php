<?php

/**
 * HTML Template Parser
 *
 * Uses type hinting introduced in PHP 7
 *
 * @author Hans Erik Jepsen <hanserikjepsen@hotmail.com>
 */

class Parser {

    /**
     * Contains the template.
     *
     * @var string
     */
    private $tempalte;

    /**
     * Takes a template and an array with the placeholders and the value to replace them with
     *
     * @param  string $view The path to the file containing the HTML template.
     * @param  array  $data The array containing the placeholders and replacement values.
     */
    function __construct(string $view, array $data)
    {
        if (empty($view))
        {
            throw new Exception('View not found.');
        }
        
        if (empty($data))
        {
            throw new Exception('No data passed.');
        }
        
        $this->template = file_get_contents($view);
        
        foreach ($data as $key => $value)
        {
            $this->replace($key,$value);
        }
    }

    /**
     * Replaces the placeholders in the template with the values from the data array.
     *
     * @param  string $key   The key from the data array passed to the constructor.
     * @param  string $value The value from the data array passed to the constructor.
     *
     * @return true          Returns true when the script has finished running.
     */
    private function replace(string $key, string $value) : true
    {
        if (empty($key) || empty($value))
        {
            throw new Exception('A key or value is missing.');
        }
        
        $this->template = preg_replace('/{{ '.$key.' }}/', $value, $this->template);
        
        return true;
    }

    /**
     * Returns the template property.
     *
     * @return string The finished view with all placeholders replaced is returned for rendering.
     */
    public function render() : string
    {
        if (empty($this->template))
        {
            throw new Exception('The template was not set, thus could not be rendered.');
        }
        
        return $this->template;
    }
}
