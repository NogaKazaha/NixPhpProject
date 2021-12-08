<?php
class ComponentRenderer
{
    protected $params, $content, $layout;
    public function __construct($params, $content, $layout)
    {
        $this->params = $params;
        $this->content = $content;
        $this->layout = file_get_contents(dirname(__FILE__) . '/' . $layout);
    }
    public function __toString()
    {
        if ($this->params != null) {
            $component = str_replace('{$params}', $this->params, $this->layout);
            $component = str_replace('{$content}', $this->content, $component);
            return $component;
        } else {
            $component = $this->layout;
            $component = str_replace('{$content}', $this->content, $component);
            return $component;
        }
    }
}
