<?php 
   
            ob_start();
            function test ($var) {
                echo $var;
            }
              test("hello");
            $content = ob_get_clean();
 ?> 