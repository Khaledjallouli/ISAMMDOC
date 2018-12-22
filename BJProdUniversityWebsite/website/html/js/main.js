var main = function()
{
   $("form.ajax").on('submit',function(e)
                   {
    e.preventDefault();   
       $(this).ajaxSubmit(
       
           {
            beforeSend:function()
               {
                
                   
               },
               uploadProgress:function(event,position,total,percentCompelete)
               {
                  
               },
               success:function(data)
               {
                  
               }
           });
   });
};

$(document).ready(main);






