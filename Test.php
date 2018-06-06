<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Get Value from Textarea in jQuery</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function(){
        $("button").click(function(){
            var comment = $.trim($("#comment").val());
            if(comment != ""){
                // Show alert dialog if value is not blank
                alert(comment);
            }
        });
        
    });
</script>
</head>
<body>
    <textarea name="comment" id="comment" rows="5" cols="50"></textarea>
    <script>
                CKEDITOR.replace( 'comment' );</script>
                
    <p><button type="button">Get Value</button></p>
    <p><strong>Note:</strong> Type something in the textarea and click the button to see the result.</p>
    
    
    <?php  include_once './inc/footer.php';?>

</body>
</html>                            