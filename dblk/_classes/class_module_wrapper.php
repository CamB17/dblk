<? class dblk_module_wrapper 
{
    
    public function __construct(
        // needs to match the module's function name
        private string $name,
        private string $background_color,
        private $hide_module = false,
        // this is the type of element the module will be wrapped in
        private string $element = "div",
        // array('class_1', 'class_2');
        private array $classes = array(),
        // "default", "none", "large", "medium", "small", number
        public $padding_top = "default",
        public $padding_bottom = "default",
        // "default", "none", "large", "medium", "small", number
        public $margin_top = "default",
        public $margin_bottom = "default",
        // array("color:red", "display:block");
        private $inline_css = array(),
        // id
        private string $id = "",
        // the params array that will be passed to the module function
        private array $params = array()
    ) 
    {
        // add these classes to the beginning of the class list
        if(is_array($this->classes)) {
            array_unshift($this->classes, "module", "fm_{$this->name}");
        }
        
        $this->process_background_color();
        $this->process_padding();
        $this->process_margin();
        $this->process_class_string();
        $this->process_inline_css_string();
    }
    public function wrap() {
        if(!$this->hide_module) {
            echo "<{$this->element} ";
                echo $this->id ? "id='{$this->id}' " : null;
                echo $this->class_string ? "class='{$this->class_string}' " : null;
                echo $this->inline_css_string ? "style='{$this->inline_css_string}' " : null;
            echo ">";
                ("fm_" . $this->name)(...$this->params);
            echo "</{$this->element}>";
        }
    }
    private function process_background_color() {
        if ( $this->background_color ) {
            $bg_classes = explode(' ', $this->background_color);
            if ( is_array($bg_classes) ) {
                foreach ( $bg_classes as $class ) {
                    $this->classes[] = $class;
                }
            }
        }
    }
    private function process_class_string()
    {
        $this->class_string = implode(" ", array_filter($this->classes));
    }private function process_inline_css_string()
    {
        $this->inline_css_string = implode(";", $this->inline_css);
    }
    private function process_padding() {
        
        if ( is_numeric($this->padding_top) ) {
            $this->inline_css[] = "padding-top:{$this->padding_top}px";
            $this->classes[] = "custom-padding-top";

        } else {
            $this->classes[] = "{$this->padding_top}-padding-top";
        }
        if ( is_numeric($this->padding_bottom) ) {
            $this->inline_css[] = "padding-bottom:{$this->padding_bottom}px";
            $this->classes[] = "custom-padding-bottom";

        } else {
            $this->classes[] = "{$this->padding_bottom}-padding-bottom";
        }
    }
    private function process_margin() {
        if ( is_numeric($this->margin_top) ) {
            $this->inline_css[] = "margin-top:{$this->margin_top}px";
            $this->classes[] = "custom-margin-top";

        } else {
            $this->classes[] = "{$this->margin_top}-margin-top";
        }
        if ( is_numeric($this->margin_bottom) ) {
            $this->inline_css[] = "margin-bottom:{$this->margin_bottom}px";
            $this->classes[] = "custom-margin-bottom";

        } else {
            $this->classes[] = "{$this->margin_bottom}-margin-bottom";
        }
    }

    
}