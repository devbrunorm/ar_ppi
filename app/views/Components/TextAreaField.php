<?php
class TextAreaField {
    private string $div_class;
    private string $id;
    private string $name;
    private string $placeholder;
    private string $label;
    private string $span;
    private string $html;

    public function __construct($div_class, $id, $name, $placeholder, $label, $span, $value = null)
    {
        $this->div_class = $div_class;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->span = $span;
        if ($value==null){
            $this->html =  '<div class="'.$div_class.'">
                <label for="'.$id.'">'.$label.'</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">'.$span.'</span>
                    </div>
                    <textarea class="form-control" aria-label="'.$placeholder.'" id="'.$id.'" name="'.$name.'"></textarea>
                </div>
            </div>';
        } else {
            $this->html =  '<div class="'.$div_class.'">
                <label for="'.$id.'">'.$label.'</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">'.$span.'</span>
                    </div>
                    <textarea class="form-control" aria-label="'.$placeholder.'" id="'.$id.'" name="'.$name.'">'.$value.'</textarea>
                </div>
            </div>';
        }
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }
}
?>