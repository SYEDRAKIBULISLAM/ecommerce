
    function delete_row(row, urlLink){
        
        var box = $("#mb-remove-row");
        box.addClass("open");
        
        box.find(".mb-control-yes").on("click",function(){
            box.removeClass("open");
            $.ajax({url: urlLink, success: function(result){
                $("#"+row).hide("slow",function(){
                    $(this).remove();
                });
            }});
        });
        
    }
