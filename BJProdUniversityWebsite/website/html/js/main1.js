function formSubmit(){
        var name = document.getElementById("name").value;
        var message = document.getElementById("message").value;
        var dataString = 'name='+ name + '&message=' + message;
        jQuery.ajax({
            url: "submit.php",
            data: dataString,
            type: "POST",
            success: function(data){
                $("#myForm").html(data);
            },
            error: function (){}
        });
    return true;
    }