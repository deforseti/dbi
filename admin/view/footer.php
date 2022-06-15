 
    <?php
    

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="view/module/nestable/jquery.nestable.js"></script>

    <script type="text/javascript">
         $j_ = jQuery.noConflict( true );
         var updateOutput = function(e)
    {
        var list   = e.length ? e : $j_(e.target),
            output = list.data('output');
        if (window.JSON) {
            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $j_('#nestable').nestable({
        group: 1
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($j_('#nestable').data('output', $j_('#nestable-output')));

   (function(){
            if( $j_('.remove_item_menu').length )
            {
                $j_('.remove_item_menu').click(function(){
                    var index = $j_('.remove_item_menu').index(this);
                    $j_('li.dd-item').eq(index).remove();
                    // console.log
                    updateOutput($j_('#nestable').data('output', $j_('#nestable-output')));
                    // $j_('#nestable').nestable('remove');
                });  
            }
        })();
    </script>
	<?php
AutoconnectCssJsController::actionAutoconnectJs();
MediaCallery::mediaGalerryPopup($media_gallery_errors);


?>

<!-- <script type="text/javascript" src="view/js/html2canvas.min.js"></script> -->
<script>
    var screenn = $j_('.wrapp-online-zakaz');
    if( screenn.length )
    {
        // html2canvas(document.querySelector(".wrapp-online-zakaz")).then(function(canvas) {
        //     document.body.appendChild(canvas);
        // });
        
    }
    
</script>
</body>
</html>