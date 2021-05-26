<!-- php display code -->
            
<?php


$code = '<?php 
for($i=0;$i<10;$i++){
    echo "$i <br>";
}
?> ';
                

                echo '<pre>' . htmlspecialchars($code) . '</pre>';

            ?>

            <!-- button code -->

            <button onclick="executeCode()">Run</button>
            <br>
            
            <!-- php code -->
            <?php 
                $value = "";
                for($i=0;$i<10;$i++){
                    $value = strval($value).'<br>' . strval($i);
            
                }
                echo '<input id="data" type="hidden" name="" value="'.$value.'">'
            ?>    
            

            <!-- Resule display code -->
            <p id="display">
            </p>       

            <!-- end of operation  -->