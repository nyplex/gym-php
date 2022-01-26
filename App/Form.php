<?php 

namespace App;

class Form {

    public function select(string $name, ?string $id = "", array $options = []): string 
    {
        $optionsHTML = [];
        foreach($options as $option) {
            $optionsHTML[] = "<option value='{$option[0]}'>{$option[0]}</option>";
        }
        $optionsHTML = implode("", $optionsHTML);
        return "<select name='{$name}' id='{$id}'>{$optionsHTML}</select>";
    }

    public function input($placeHolder = "palceholder", $class = "standard-input", $type = "text"): string
    {
        return "<input class='{$class}' type='{$type}' placeholder='{$placeHolder}'>";
    }

}