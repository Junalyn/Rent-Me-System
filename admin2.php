<html>
<head>
    
</head>

<body>
    
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
$(function(){
    $("#div2").hide();
    $("#preview").on("click", function(){
        $("#div1, #div2").toggle();
    });
});
</script>

<div id="div1">
This is preview Div1. This is preview Div1.
</div>

<div id="div2">
This is preview Div2 to show after div 1 hides.
</div>

<div id="preview" style="color:#999999; font-size:14px">
PREVIEW
</div> 
    
</body>
</html>