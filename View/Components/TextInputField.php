<?php
class TextInputField {
    private string $div_class;
    private string $id;
    private string $anme;
    private string $placeholder;
    private string $label;
    private string $span;
    private string $html;

    public function __construct($div_class, $id, $name, $placeholder, $label, $span)
    {
        $this->div_class = $div_class;
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->label = $label;
        $this->span = $span;
        $this->html =  '<div class="'.$div_class.'">
            <label for="'.$id.'">'.$label.'</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="'.$id.'">
                        '.$span.'
                    </span>
                </div>
                <input type="text" class="form-control" placeholder="'.$placeholder.'" aria-label="'.$placeholder.'" aria-describedby="$id" name="'.$name.'">
            </div>
        </div>';
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }
}
?>