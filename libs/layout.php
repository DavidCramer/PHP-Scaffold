<?php

/*
 * Grid Layout Generator from a layout string
 * 2012 - David Cramer
 *
 *Example of use
 *
         $Data = '<h2>Heading<small>Has sub-heading…</small></h2>
          <p>Etiam porta sem malesuada magna mollis euismod. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>';
        $str = '960|960|480:480|480:480';

        $page = new Layout();
        $page->setLayout($str);
        $page->setData($Data, 4);
        $page->renderLayout();
 *
 *
 *
 */

class Layout {

    private $layoutString;
    private $html;
    private $offset;
    private $debug;
    private $layoutType;

    function Layout($layoutType = 'fixed') {
        $this->html = array();
        $this->classes = array();
        $this->offset = array();
        if(strtolower($layoutType) == 'fluid'){
            $this->layoutType = 'row-fluid';
        }else{
            $this->layoutType = 'row';
        }

    }
    public function debug(){
        $this->debug = true;
    }
    public function setLayout($str) {
        $this->layoutString = $str;
    }
    public function gethtml($index) {
        if(isset($this->html[$index])){
            return $this->html[$index];
        }else{
            return false;
        }
    }
    public function html($html, $index) {
        $this->html[$index] = $html;
    }
    public function append($html, $index) {
        if(isset($this->html[$index])){
            $this->html[$index] = $this->html[$index].$html;
        }else{
            $this->html[$index] = $html;
        }
    }
    public function prepend($html, $index) {
        if(isset($this->html[$index])){
            $this->html[$index] = $html.$this->html[$index];
        }else{
            $this->html[$index] = $html;
        }
    }
    public function setClass($class, $index){
        $this->classes[$index] = $class;
    }
    public function appendClass($class, $index){
        if(isset($this->classes[$index])){
            $this->classes[$index] = $this->classes[$index].' '.$class;
        }else{
            $this->classes[$index] = $class;
        }
    }
    public function prependClass($class, $index){
        if(isset($this->classes[$index])){
            $this->classes[$index] = $class.' '.$this->classes[$index];
        }else{
            $this->classes[$index] = $class;
        }
    }
    public function offset($number, $index){
            $this->offset[$index] = 'offset'.$number;
    }
    public function appendRow($rowLayout){
        if(isset($this->layoutString)){
            $this->layoutString = $this->layoutString.'|'.$rowLayout;
        }else{
            $this->layoutString = $rowLayout;
        }
    }
    public function prependRow($rowLayout){
        if(isset($this->layoutString)){
            $this->layoutString = $rowLayout.'|'.$this->layoutString;
        }else{
            $this->layoutString = $rowLayout;
        }
    }
    function renderLayout() {
        $lastChar = '';
        //start row
        $debugclass = '';
        if(isset($this->debug)){
            $debugclass = '  show-grid';
        }
        $output = "<div class=\"".$this->layoutType.$debugclass."\">\n";
        $contentIndex = 1;
        for ($i = 0; $i <= strlen($this->layoutString); $i++) {

            //// Get the current character
            $char = substr($this->layoutString, $i, 1);
            //$output .=$char.'-';
            if (!empty($lastChar)) {
                $Class = "span". $lastChar;
                if(isset($this->offset[$contentIndex])){
                    $Class .= ' '.$this->offset[$contentIndex];
                }
                $addClass = '';
                if(isset($this->classes[$contentIndex])){
                    $addClass = ' '.$this->classes[$contentIndex];
                }
                $Class .= $addClass;
            }
            switch ($char) {
                case ':';
                    if(!empty($lastChar)){
                        $output .= "<div class=\"".$Class."\">\n";
                        if(isset($this->html[$contentIndex])){
                            $output .= $this->html[$contentIndex];
                        }
                        $output .= "</div>\n";
                    }
                    $lastChar = '';
                    $openCol = true;
                    break;
                case '|';
                    if(!empty($lastChar)){
                        $output .= "<div class=\"".$Class."\">\n";
                        if(isset($this->html[$contentIndex])){
                            $output .= $this->html[$contentIndex];
                        }
                        $output .= "</div>\n";
                    }
                    $output .= "</div>\n<div class=\"".$this->layoutType.$debugclass."\">\n";

                    $lastChar = '';
                    break;
                case '[';
                    $output .= "<div class=\"".$Class."\">\n";
                    $output .= "<div class=\"row".$debugclass."\">\n";
                    $lastChar = '';
                    $contentIndex--;
                    break;
                case ']';
                    if(!empty($lastChar)){
                        $output .= "<div class=\"".$Class."\">\n";
                        if(isset($this->html[$contentIndex])){
                            $output .= $this->html[$contentIndex];
                        }
                        $output .= "</div>\n";
                    }
                    $output .= "</div>\n";
                    $output .= "</div>\n";
                    $lastChar = '';
                    $contentIndex--;
                    break;
                default:
                    $lastChar .= $char;
                    $contentIndex--;
                    break;
            }
            $contentIndex++;
        }

        // End the last Column if there is one
        if (!empty($lastChar)) {
            $output .= "<div class=\"".$Class."\">\n";
            if(isset($this->html[$contentIndex])){
                $output .= $this->html[$contentIndex];
            }
            $output .= "</div>\n";

            $output .="</div>\n";
        }

        return $output;
    }

}

?>