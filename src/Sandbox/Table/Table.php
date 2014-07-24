<?php

namespace Sandbox\Table;

use Goodby\CSV\Import\Standard\LexerConfig;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\Lexer;


class Table
{
    public $data;
    public $headers;
    private $csv;
    public function importCsv($filename)
    {
        $data = array();
        $headers = array();
        $config = new LexerConfig();
        $lexer = new Lexer($config);

        $interpreter = new Interpreter();

        $interpreter->addObserver(function(array $columns) use (&$data, &$headers) {
            $row = array();
            if(!count($headers)) {
                $headers = $columns;
            } else {
                array_walk($columns, function($val, $idx) use (&$columns, &$headers, &$row) {
                    $row[$headers[$idx]] = $val;
                });
                $data[] = $row;
            }
        });
        $lexer->parse($filename, $interpreter);
        $this->data = $data;
        $this->headers = $headers;

    }
    public function export(array $options = array())
    {
        $html = [];
        if(!$this->data) {
            throw new \Exception ('Data not provided');
        }
        $html[] = '<table>';
        $html[] = '<thead>';
        $html[] = $this->composeRow($this->headers, true);
        $html[] = '</thead>';
        $html[] = '<tbody class="list">';
        $html = array_merge($html,array_map(array($this,'composeRow'),$this->data));
        $html[] = '</tbody>';
        $html[] = '</table>';
        return implode('',$html);
    }
    public function composeRow($row, $isHeader = false)
    {
        $cellType = ($isHeader ? 'th' : 'td');
        $html = '<tr>';

        foreach($row as $key=>$col) {
            $key = $isHeader ? '' : $key;
            $html .= "<{$cellType} class=\"{$key}\">{$col}</{$cellType}>";
        }
        return $html . '</tr>';
    }
}
