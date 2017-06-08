$(document).ready(function(){
    $("#addEntry").click(function(){
        var title = $("#title").val();
        var description = $("#description").val();
        var dataString = 'title="'+ title + '"&description="'+ description+'"';
        if (title == '' || description == '') {
            alert('Please fill all fields!');
        } else {
            $.ajax({
                type: 'POST',
                url: "add.php",
                data: dataString,
                cache: false,
                success: function(result) {
                    $(" #table").load(' #table');
                }
            });
        }
        return false;
    });
    $("a.deleteEntry").click(function(){
        var thisparam = $(this);
        thisparam.parent().parent().find('p').text('Please Wait...');
        $.ajax({
            type: 'GET',
            url: thisparam.attr('href'),
            success: function(results){
                thisparam.parent().parent().fadeOut('slow');
            }
        })
        return false;
    });
});