$(document).ready(function(){
//    function alignModal(){
//        var modalDialog = $(this).find(".modal-dialog");
//        
//        // Applying the top margin on modal dialog to align it vertically center
//        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
//    }
//    // Align modal when it is displayed
//    $(".modal").on("shown.bs.modal", alignModal);
//    
//    // Align modal when user resize the window
//    $(window).on("resize", function(){
//        $(".modal:visible").each(alignModal);
//    });   
     
     
    setTimeout(function(){
//        var window_height = $( window ).height();
//        var max_height = window_height * 80/100;
//        $("body .modal-content").find("form").css({
//            'max-height' : max_height
//        });
    }, 2000);
     
    
    $( document ).on("ajaxComplete resize",function() {
        var window_height = $( window ).height();
        var max_height = window_height * 70/100;
        $("body .modal-content").find("form").css({
            'max-height' : max_height,
            'width' : '100%',
            'overflow-x' : 'hidden',
            'overflow-y' : 'auto'
        });
    });
    
    
    
    
     $('#modal-content').on('shown.bs.modal', function() {
//        var window_height = $( window ).height();
//        var max_height = window_height * 80/100;
//        $("body .modal-content").find("form").css({
//            'max-height' : max_height
//        });
    });
    
    
    
    
    
//    $(".dropdown-modal").click(function(){ $(this).toggleClass("open")});
});