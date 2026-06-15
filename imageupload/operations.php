<?php

function inputField($placeholder,$name,$type,$value){
    $ele = "<div class=\"mb-3\">
                <label for=\"username\" class=\"form-label\"></label>
                <input type=\"$type\" class=\"form-control\" name=\"$name\" placeholder=\"$placeholder\" value=\"$value\" autocomplete=\"off\"> 
            </div>
    ";

    echo $ele;
}

?>