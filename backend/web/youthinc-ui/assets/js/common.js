$(document).ready(function(){
    
    $(".nav").find(".submenu ").find("li.active").parents('li').addClass("open active");
    
    $(".drop-model-youth").click(function(){ 
        if($(this).hasClass("open"))
        {
            $(this).removeClass("open")
        }
        else
        {
            $(this).addClass("open")
        }
    });
    
    $("#sidebar .dropdown-menu").each(function(){
        $(this).attr('class', 'submenu')
    });
    
    $(".dropdown-toggle").each(function(){
        $(this).find('.caret').hide();
        $(this).find('.caret').after('<b class="arrow fa fa-angle-down"></b>');
    });
    
    
//    $("body").on("click",'input[name*="[Is_Active]"]',function(){
//        if ($(this).attr("checked")) {
//            $(this).val(1);
//        }
//        else
//        {
//            $(this).val(0);
//        }
//    });
    
    
    setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
    /**
     * 
     */
    $("body").on("click",".form-close", function(){
        $("#formPopUp").modal("hide");
    });
    
    $.ajaxSetup({
        
        complete: function(xhr, status, error) 
        {
           
        } ,
        error: function(xhr, status, error) 
        {
            $(".pop-up-danger").find('.error-message').html("An  error occured <span class='hidden'> " + status + "\nError: " + error + "\nError detail : " + xhr.responseText + "</span>");
            $('.form-ajax-content').html($(".pop-up-danger").removeClass("hidden").html());
            $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text("Error");
        } 
    });
    
    $("body").on("click", ".btn-create, .model-update, .model-view, .btn-edit-popup", function(){
        $("#formPopUp").find(".modal-header h2").text($(".pop-up-dummy").find("h2").text());
//        $("#formPopUp").find(".modal-body").find(".form-ajax-content").html($(".pop-up-dummy").find(".dummy-content").html());
        $(".form-ajax-content").addClass('hidden');
        $("#formPopUp").modal("show"); 
        $(".loading-content").removeClass('hidden');
        var href = $(this).attr("href");
        var $this = $(this);
        
        if(typeof tinyMCE == "object" )
        {
             tinyMCE.remove();
        }
        
        $.ajax({
            url: href,
            type: "GET",            
            async : false,
            success: function(data) { 
                $this.attr("disabled", false);
                $this.parent().find(".hidden-spinner").remove();
                $(".form-ajax-content").html(data).addClass('hidden');
                $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").hide().text());
                $(".form-ajax-content").removeClass('hidden');
                $(".loading-content").addClass('hidden');
                
                $("#users-role_id").trigger("change");
                
                
               
                
            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }

        });

        return false;

    });
    
    $("body").on("click", ".model-inactive, .model-active", function(){
        $("#statusPopUp").modal("show");
        var href = $(this).attr("href");
        var className = $(this).attr("class");
        if($(this).hasClass("model-inactive"))
        {   

            $("#statusPopUp").find(".disabled").removeClass("hidden");
            $("#statusPopUp").find(".enable").addClass("hidden");
        }
        else
        {

            $("#statusPopUp").find(".disabled").addClass("hidden");
            $("#statusPopUp").find(".enable").removeClass("hidden");
        }
        $("#statusPopUp").data("href", href);
        return false;
    });
    
    $("body").on("click", ".model-unlock, .model-lock", function(){
        $("#accountLockPopUp").modal("show");
            var href = $(this).attr("href");
            var className = $(this).attr("class");
            if($(this).hasClass("model-unlock"))
            {
                $("#accountLockPopUp").find(".disabled").removeClass("hidden");
                $("#accountLockPopUp").find(".enable").addClass("hidden");
            }
            else
            {

                $("#accountLockPopUp").find(".disabled").addClass("hidden");
                $("#accountLockPopUp").find(".enable").removeClass("hidden");
            }
        $("#accountLockPopUp").data("href", href);
        return false;
    });
    
    /***
     * Model delete
     */
    $("body").on("click", ".model-delete", function(){
        $("#deletePopUp").modal("show");
        var href = $(this).attr("href");
        var className = $(this).attr("class");
            
        $("#deletePopUp").data("href", href);
        return false;
    });
    
    /**
     * Activate/Deactivate Record
     */
    $("body").on("click",".status-button", function(){ 
        var href = $("#statusPopUp").data("href");
        var $this = $(this);
        $this.parent().find(".hidden-spinner").remove();
        var spinner = '<span class="hidden-spinner"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>';

        $this.before(spinner);
        $this.attr("disabled", true);

        $.ajax({
            url: href,
            type: "GET",            
            async : false,
            success: function(data){ 
                
                

                $.ajax({
                    url: baseUrl+"/npo/flash",
                    type: "GET",            
                    async : false,
                    success: function(data){ 
                        $.pjax.reload({container:"#p0"});
                        $this.attr("disabled", false);
                        $this.parent().find(".hidden-spinner").remove();
                        $("#statusPopUp").modal("hide");
                        $(".alert-message-cnt").html(data);
                        setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
                        
                    },
                    error: function(xhr, status, error) {
                        ajaxError(xhr, status, error);
                    }
                });
            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });
        return false;
    });
    
    /**
     * delete Record
     */
    $("body").on("click",".delete-button", function(){ 
        var href = $("#deletePopUp").data("href");
        var $this = $(this);
        $this.parent().find(".hidden-spinner").remove();
        var spinner = '<span class="hidden-spinner"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>';

        $this.before(spinner);
        $this.attr("disabled", true);

        $.ajax({
            url: href,
            type: "GET",            async : false,
            success: function(data){ 
                
                
                

                $.ajax({
                    url: baseUrl+"/npo/flash",
                    type: "GET",            async : false,
                    success: function(data){ 
                        $.pjax.reload({container:"#p0"});
                        $this.attr("disabled", false);
                        $this.parent().find(".hidden-spinner").remove();
                        $("#deletePopUp").modal("hide");
                        $(".alert-message-cnt").html(data);
                        setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
                        
                    },
                    error: function(xhr, status, error) {
                        ajaxError(xhr, status, error);
                    }
                });
            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });
        return false;
    });
        
    $("body").on("click",".user-lock", function(){ 
        var href = $("#accountLockPopUp").data("href");
        var $this = $(this);
        $this.parent().find(".hidden-spinner").remove();
        var spinner = '<span class="hidden-spinner"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>';

        $this.before(spinner);
        $this.attr("disabled", true);

        $.ajax({
            url: href,
            type: "GET",            async : false,
            success: function(data)
            { 
                

                $.ajax({
                    url: baseUrl+"/npo/flash",
                    type: "GET",            
                    async : false,
                    success: function(data){ 
                        $.pjax.reload({container:"#p0"});
                        $this.attr("disabled", false);
                        $this.parent().find(".hidden-spinner").remove();
                        $("#accountLockPopUp").modal("hide");
                        $(".alert-message-cnt").html(data);
                        setTimeout(function(){$(".alert").find(".close").trigger("click")}, 2000);
                        
                    },
                    error: function(xhr, status, error) {
                        ajaxError(xhr, status, error);
                    }
                });
            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });
        return false;
    });
    
    /**
     * Popup Cancel
     */
    $(".popup-cancel").click(function(){
        
        $("#statusPopUp").modal("hide");
        $("#statusPopUp, #accountLockPopUp, #deletePopUp, #npoApprovalPopUp").modal("hide");
        $("#statusPopUp, #accountLockPopUp, #npoApprovalPopUp").find(".enable, .disabled").addClass("hidden");
        
        return false;
    });
    
    $("body").on("change", "#users-role_id", function(){
        if($(this).val() == 1 ) 
        {
            $("body").find(".field-users-organization_id").slideUp();
        }
        else
        {
            $("body").find(".field-users-organization_id").slideDown();
        }
    });
    
    /*
     * Program Application Page
     */
    $("body").on("click", ".model-reject", function() {
        if(typeof tinyMCE == "object" )
        {
            tinymce.activeEditor.setContent('');
        }
        $("#statusPopUp").modal("show");
        
        var href = $(this).attr("href");
        $("#statusPopUp").data("href", href);
        $("#statusPopUp").find(".enable").removeClass("hidden");
        return false;
    });
    
    $("body").on("click", ".model-approve", function() {
        $("#approvePopUp").modal("show");
        var href = $(this).attr("href");
        $("#approvePopUp").data("href", href);
        return false;
    });
    
    $("body").on("click", ".reject-button", function() {
        
        var href = $("#statusPopUp").data("href");
        var notes = tinyMCE.activeEditor.getContent();
        var $this = $(this);
        
        submitButtonDisable($this);
        $.ajax({
            method: 'POST',
            url: href,
            data: { notes: notes },
            async : false,
            success: function(data) {
                submitButtonEnable($this);
                $('#statusPopUp').modal('hide');


                $.ajax({
                    url: baseUrl + "/npo/flash",
                    type: "GET",
                    async : false,
                    success: function(data) {
                        tinymce.activeEditor.setContent('');
                        $(".alert-message-cnt").html(data);
                        setTimeout(function() {
                            $(".alert").find(".close").trigger("click")
                        }, 2000);
                        $.pjax.reload({
                            container: "#p0"
                        });
                    },
                    error: function(xhr, status, error) {
                        ajaxError(xhr, status, error);
                    }
                });




            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });
        return false;
    });
    
    $("body").on("click", ".approval-button", function() {
        $(".loading-cnt").removeClass("hidden");
        $(".popup-content").addClass("hidden");
        $("#formPopUp").find(".modal-header h2").text($(".pop-up-dummy").find("h2").text());
        $("#formPopUp").find(".modal-body").find(".form-ajax-content").html($(".pop-up-dummy").find(".dummy-content").html());
        var $this = $(this);
        submitButtonDisable($this);
        var href = $("#approvePopUp").data("href");
        $.ajax({
            url: href,
            type: "GET",
            async : false,
            success: function(data) {
                submitButtonEnable($this);
                $(".loading-cnt").addClass("hidden");
                $(".popup-content").removeClass("hidden");
                $("#approvePopUp").modal("hide");
                $("#formPopUp").modal("show");
                $("#formPopUp").find(".form-ajax-content").html(data);

                $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").hide().text());

            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });

        return false;
    });
    $("body").on("click", ".model-question-map", function() {
        $(".loading-cnt").removeClass("hidden");
        $(".popup-content").addClass("hidden");
        $("#formPopUp").find(".modal-header h2").text($(".pop-up-dummy").find("h2").text());
        $("#formPopUp").find(".modal-body").find(".form-ajax-content").html($(".pop-up-dummy").find(".dummy-content").html());
        $("#formPopUp").modal("show");
        var href = $(this).attr("href");
        $.ajax({
            url: href,
            type: "GET",
            async : false,
            success: function(data) {
                $(".loading-cnt").addClass("hidden");
                $(".popup-content").removeClass("hidden");
                $("#approvePopUp").modal("hide");
                $("#formPopUp").modal("show");
                $("#formPopUp").find(".form-ajax-content").html(data);

                $(".form-ajax-content").parents(".modal-content").find(".modal-header h2").text($(".form-ajax-content").find("h1").hide().text());
            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });

        return false;
    });
    $("body").on("click", ".question-org-map-submit", function() {
        var data = $("#questionMap").serialize();
        var href = $("#questionMap").attr("action");
        var $this = $(this);
        submitButtonDisable($this);
        $.ajax({
            url: href,
            type: "POST",
            data: data,
            async : false,
            success: function(data) {
                $("#formPopUp").modal("hide");

                $.ajax({
                    url: baseUrl + "/npo/flash",
                    type: "GET",
                    async : false,
                    success: function(data) {
                        $(".alert-message-cnt").html(data);
                        setTimeout(function() {
                            $(".alert").find(".close").trigger("click")
                        }, 2000);
                        $.pjax.reload({
                            container: "#p0"
                        });
                    },
                    error: function(xhr, status, error) {
                        ajaxError(xhr, status, error);
                    }
                });

            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });

        return false;
    });
    
    
    $('body').on('click', '.select-all', function() {
        if (this.checked) {
            $('.ace').each(function() {
                this.checked = true;
            });
        } else {
            $('.ace').each(function() {
                this.checked = false;
            });
        }
    });

    $('body').on('click', '.ace', function() {
        if ($('.ace:checked').length == $('.ace').length) {
            $('.select-all').prop('checked', true);
        } else {
            $('.select-all').prop('checked', false);
        }
    });
    
    /**
     * NPO Approval or Cancel
     * @param {type} $this
     * @returns {undefined}
     */
    $("body").on("click", ".model-approve, .model-declined", function() {
        $("#npoApprovalPopUp").modal("show");
        var href = $(this).attr("href");
        if ($(this).hasClass("model-declined")) {
            $("#npoApprovalPopUp").find(".reject-form").removeClass("hidden");
            $("#npoApprovalPopUp").find(".disabled").removeClass("hidden");
            $("#npoApprovalPopUp").find(".enable").addClass("hidden");
        } else {
            $("#npoApprovalPopUp").find(".reject-form").addClass("hidden");
            $("#npoApprovalPopUp").find(".disabled").addClass("hidden");
            $("#npoApprovalPopUp").find(".enable").removeClass("hidden");
        }
        $("#npoApprovalPopUp").data("href", href);
        return false;
    });
    $("body").on("click", ".approve-npo", function() {
        var href = $("#npoApprovalPopUp").data("href");
        var notes = $("#organization-notes").val();
        var $this = $(this);
        submitButtonDisable($this);
        $.ajax({
            method: 'POST',
            url: href,
            data: {
                notes: notes
            },
            success: function(data) {
                submitButtonEnable($this);
                $('#npoApprovalPopUp').modal('hide');

                $.ajax({
                    url: baseUrl + "/npo/flash",
                    type: "GET",
                    async : false,
                    success: function(data) {
                        $(".alert-message-cnt").html(data);
                        setTimeout(function() {
                            $(".alert").find(".close").trigger("click")
                        }, 2000);
                        $.pjax.reload({
                            container: "#p0"
                        });
                    },
                    error: function(xhr, status, error) {
                        ajaxError(xhr, status, error);
                    }
                });

                
            },
            error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });
        return false;
    });
    
    /**
     *  FTA 
     * @param {type} $this
     * @returns {undefined}
     */
    $("body").on("click", ".approve-fta", function() {
        var href = $("#ftatApprovalPopUp").data("href");
        tinyMCE.triggerSave();
        var notes = $("textarea[name='Organization[Notes]']").val();
        var $this = $(this);
        submitButtonDisable($this);
        $.ajax({
            method: 'POST',
            url: href,
            data: {
                notes: notes
            },
            success: function(data) {
                submitButtonEnable($this);
                $('#ftatApprovalPopUp').modal('hide');
                $.ajax({
                    url: baseUrl + "/npo/flash",
                    type: "GET",
                    async : false,
                    success: function(data) {
                        $(".alert-message-cnt").html(data);
                        setTimeout(function() {
                            $(".alert").find(".close").trigger("click")
                        }, 2000);
                        $.pjax.reload({
                            container: "#p0"
                        });
                    },
                    error: function(xhr, status, error) {
                        ajaxError(xhr, status, error);
                    }
                });

            },
             error: function(xhr, status, error) {
                ajaxError(xhr, status, error);
            }
        });
        return false;
    });
    
    
    
});

function submitButtonDisable($this)
{
    $this.parent().find(".hidden-spinner").remove();
    var spinner = '<span class="hidden-spinner"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>';

    $this.before(spinner);
    $this.attr("disabled", true);
}

function submitButtonEnable($this)
{
    $this.attr("disabled", false);
    $this.parent().find(".hidden-spinner").remove();
}

function ajaxError(xhr, status, error)
{
    
    
    $(".pop-up-danger").find('.error-message').html("An  error occured <span class='hidden'> " + status + "\nError: " + error + "\nError detail : " + xhr.responseText + "</span>");
    $('.common-ajax-content').removeClass('hidden').html($(".pop-up-danger").html());
    $(".common-ajax-content").parents(".modal-content").find(".modal-header h2").text("Error");
    $(".popup-cancel, .close").click(function(){
        window.location.reload();
    });
    if(xhr.status == 500)
    {
        window.location.reload();
    }
}