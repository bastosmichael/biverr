jQuery.ajaxSetup({ 
    'beforeSend': function(xhr) {
        xhr.setRequestHeader("Accept", "text/javascript")
    }
})



$(document).ready( function() {


    $('#RES_ID_fb_login').click(function(){
      FB.login(function(response) {
        if (response.session) {
          $("#connect_to_facebook_form").submit(); 
        } else {
          window.location.reload();    
        }
      });
      return false;
    });


    // submit backoffice global messages update_show form
    $('.gm_show').change(function(){
      $('#global_message_id').val($(this).attr('id'));
      $('#global_message_show').val($(this).is(':checked'));
      $('#global_messages').submit();
      });

    // handle the textboxes with hints
    toggleSmallSearchBoxHint();

    function toggleSmallSearchBoxHint(){
        if( $('.swap-value-small-search').val() == '' ){
            $('.swap-value-small-search').css("background","#fff url(/images/bg-small-search-box-idle.gif) repeat-x");
        }
        else{
            $('.swap-value-small-search').css('background','#fff url(/images/bg-input02.gif) repeat-x');
        }
    }

    $('.swap-value-small-search').focus(function(){
        $('.swap-value-small-search').css('background','#fff')
    });

    $('.swap-value-small-search').blur(function(){
        toggleSmallSearchBoxHint();
    });



    // handles the buttons of the review form for the buyer
    $('.bad-review-button').click(function() {
        $('.contact-seller-from-review').show('fast');
        return true;
    });

    $('.good-review-button').click(function() {
        $('.contact-seller-from-review').hide('fast');
        return true;
    });

    // more options int the seller's manage orders screen
    $('.column3 .more-options').click(function() {
        $(this).next().toggle('fast');
        return true;
    });



    // submit button animations
    // ************************

    // gig edit / new -> submit button animation
    $('.edit-gig-form .button').click(function() {
        $('.edit-gig-form .button').hide();
        $('.progress-indicator-icon-gigform').show();
        return true;
    });

    // new message -> submit button animation
    $('.inbox-compose .button').click(function() {
        $('.inbox-compose .button').hide();
        $('.progress-indicator-icon-message').show();
        return true;
    });

    // review page -> submit button animation
    $('.thank-form .button').click(function() {
        $('.thank-form .button').hide();
        $('.progress-indicator-icon-review').show();
        return true;
    });

    // profile settings -> submit button animation
    $('.settings-form .btn-update').click(function() {
        $('.settings-form .btn-update').hide();
        $('.settings-form .progress-indicator-icon-gigform').show();
        return true;
    });

    // profile settings / password reset -> submit button animation
    $('.reset-form .btn-change').click(function() {
        $('.reset-form .btn-change').hide();
        $('.reset-form .progress-indicator-icon-gigform').show();
        return true;
    });

    // profile settings / password reset -> submit button animation
    $('.notify-form .row .button').click(function() {
        $('.notify-form .row .button').hide();
        $('.notify-form .row .progress-indicator-icon-notifycomp').show();
        return true;
    });

    $('.suggest-form .button').click(function() {
        if ($('#suggest_form #content').val() == '') {
        return false;} else {
        $('.suggest-form .button').hide();
        $('.suggest-form .progress-indicator-icon-message').show();
        return true;}
    });

    // login popup submit
    $('.row01 .progress-indicator-icon-message').click(function() {
        $('.row01 .button').hide();
        $('.row01 .progress-indicator-icon-message').show();
        return true;
    });



    function expandSideMenu(){
        $('#side_menu_expanded').toggle("fast", toggleMoreToLess);
    }

    $('#side_menu_expander').click(function() {
        expandSideMenu();
        //	$('#side_menu_expanded').toggle("fast", toggleMoreToLess);
        return false;
    });



    function toggleMoreToLess() {
        // this; // dom element
        if ($('#side_menu_expander').text() == "More..."){
            $('#side_menu_expander').text("Less...");
        }else{
            $('#side_menu_expander').text("More...");
        }
    }

    $('#login-button').click(function() {
        /*
    $('.register-popup').hide();
    $('.login-popup').toggle();
    $("input:text:visible:first").focus();
    return false;
		*/
        });

    $('#join-button').click(function() {
        $('.register-popup').toggle();
        $('.login-popup').hide();
        $("input:text:visible:first").focus();
        return false;
    });

    $('a.show_join_popup').click(function() {
        $('.register-popup').show();
        return false;
    });


    $('a.join-close-button').click(function() {
        $('.register-popup').hide();
        return false;
    });


    $('#withdrawal-submit').click(function() {
        if (!$('.withdraw-i-agree').is(':checked')){
            alert('you must agree to the terms to transfer funds.')
            return false;
        }
    //return false;
    });
		


    //prevent empty suggestions submit
    $('#suggest_form').submit(function() {
        if ($('#suggest_form #content').val() == '') {
            return false;
        } else {
//            $.post(this.action, $(this).serialize(), null, "script");
            return true;
        }
    });


    //prevent empty new gig submit
    $('#submit_new_gig').submit(function() {
        if ($('#submit_new_gig #quicktitle').val() == '') {
            return false;
        } else {
            return true;
        }
    });

    //prevent empty search gig submit
    $('#search_form').submit(function() {
        if ($('#search_form #query').val() == '') {
            return false;
        } else {
            return true;
        }
    });
	
    // select all gigs and mail checkboxes
    $('a.select-all').click(function() {
        $('.checkbox').each(function(){
            $(this).attr('checked', true);
        });
        return false;
    });
    // unselect all gigs and mail checkboxes
    $('a.select-none').click(function() {
        unselectCheckboxes();
        return false;
    });
	
    // select active gigs checkboxes
    $('a.select-active').click(function() {
        unselectCheckboxes();
        $('.checkbox.approved').each(function(){
            $(this).attr('checked', true);
        });
        return false;
    });
	
    // select suspended gigs checkboxes
    $('a.select-suspended').click(function() {
        unselectCheckboxes();
        $('.checkbox.suspended').each(function(){
            $(this).attr('checked', true);
        });
        return false;
    });
	
    // select read mail checkboxes
    $('a.select-read').click(function() {
        unselectCheckboxes();
        $('.checkbox.read').each(function(){
            $(this).attr('checked', true);
        });
        return false;
    });
	
    // select read mail checkboxes
    $('a.select-unread').click(function() {
        unselectCheckboxes();
        $('.checkbox.unread').each(function(){
            $(this).attr('checked', true);
        });
        return false;
    });
	
    // submit gigs for suspention
    $('.btn-suspend').click(function() {
        if ($('.checkbox:checked').size() > 0) {
            $('#gigs_form').attr('action',$('#gigs_form').attr('action')+'/suspend_selected');
            $('#gigs_form').submit();
        } else {
            return false;
        }
    });
	
    // submit gigs for activation
    $('.btn-activate').click(function() {
        if ($('.checkbox:checked').size() > 0) {
            $('#gigs_form').attr('action',$('#gigs_form').attr('action')+'/activate_selected');
            $('#gigs_form').submit();
        } else {
            return false;
        }
    });

    // submit gigs for delete
    $('.manage .btn-delete').click(function() {
        if (confirm('Are you sure you want to delete selected gigs?\nThis action can\'t be undone!') && $('.checkbox:checked').size() > 0) {
            $('#gigs_form').attr('action',$('#gigs_form').attr('action')+'/delete_selected');
            $('#gigs_form').submit();
        } else {
            return false;
        }
      return false;
    });
	
    // submit messages for read
    $('.btn-mark-as-read').click(function() {
        if ($('.checkbox:checked').size() > 0) {
            $('#messages_form').attr('action',$('#messages_form').attr('action')+'/read_selected');
            $('#messages_form').submit();
        } else {
            return false;
        }
    });



	
    //switch from login form to forgot password
    $('a.forgotpassword').click(function() {
        $('div.loginwrapper').hide();
        $('div.forgotpasswordform').show();
        return false;
    });
	
    //switch from forgot password form to login
    $('a.backtologin').click(function() {
        $('div.forgotpasswordform').hide();
        $('div.loginwrapper').show();
        return false;
    });



	
    // update used gig title chars count
    if ($('#gig_title').length != 0) {
        updateGigTitleCharsCount();
        $('#gig_title').keyup(function(){
            updateGigTitleCharsCount();
        });
    };
	
    // update used gig title chars count
    if ($('#gig_description').length != 0) {
        updateGigDescCharsCount();
        $('#gig_description').keyup(function(){
            updateGigDescCharsCount();
        });
    };

    //limit text to maxlength
    $('input[maxlength],textarea[maxlength]').keyup(function(){
        var max = parseInt($(this).attr('maxlength'));
        if($(this).val().length > max){
            $(this).val($(this).val().substr(0, $(this).attr('maxlength')));
        };
    });

    //bookmarks submition
    $('a.addbookmark, a.removebookmark').click(function() {
        $(this).addClass('onduty');
        $.ajax({
            url: this.href,
            dataType: "script"
        });
        return false;
    });
	
    //show change password form
    $('a.changepassword').click(function() {
        $('.reset-form').toggle('fast');
        return false;
    });
	
    //show and hide share popup
    $('a.shareit').click(function() {
        if ($(this).parent().parent().next('.pop-share').css('display') == "none") {
            $(this).parent().parent().next('.pop-share').show();
        } else {
            $(this).parent().parent().next('.pop-share').hide();
        }
        return false;
    });

    //show and hide share popup
    $('a.pshare').click(function() {
        if ($(this).parent().next('.p-share').css('display') == "none") {
            $(this).parent().next('.p-share').show();
        } else {
            $(this).parent().next('.p-share').hide();
        }
        return false;
    });

    //add reset button to file input
    var file_input_index = 0;
    $('input[type=file]').each(function() {
        file_input_index++;
        $(this).wrap('<div class="reset-button" id="file_input_container_'+file_input_index+'"></div>');
        $(this).after('<div></div><input type="button" value="Clear" onclick="reset_html(\'file_input_container_'+file_input_index+'\')" />');
    });

    //username validation
    $("#user_username").keyup(function() {
        checkUsername();
    });
    // join form ajax submit
    $('#join_form').submit(function() {
        $('#join_form .button').hide();
        //$('.search input.text').hide();
        $('#join_form .progress-indicator-icon-join').show();
        $.post($(this).attr('action'), $(this).serialize(),function(data){
            eval(data)
            });
        return false;
    });

    // login form ajax submit
    $('#session_form').submit(function() {
	
        if($('#session_form #user_session_username').val() == '' && $('#session_form #user_session_password').val() == ''){
            return false;
        }
	
        $('#session_form .button').hide();
        $('#session_form .progress-indicator-icon-login').show();
        //$('.search input.text').hide();
        $.post($(this).attr('action'), $(this).serialize(),function(data){
            eval(data)
            });

        return false;
    });

    // forgot password form ajax submit
    $('#forgot_password_form').submit(function() {
        $('#forgot_password_form .button').hide();
        $('#forgot_password_form .progress-indicator-icon-login').show();
        $.post($(this).attr('action'), $(this).serialize(),function(data){
            eval(data)
            });
        return false;
    });

});

pic1 = new Image(16, 16);
pic1.src = "/images/loader.gif";

function checkUsername() {
    var usr = $("#user_username").val();

    if(usr.length >= 4)
    {
        $("#status").html('<div class="status-checking"><img align="absmiddle" src="/images/loader.gif" /> Checking availability...</div>');

        $.ajax({
            type: "POST",
            url: "/checkuser",
            data: "username="+ usr,
            success: function(msg){

                $("#status").ajaxComplete(function(event, request, settings){

                    if(msg == 'OK')
                    {
                        $("#user_username").removeClass('object_error'); // if necessary
                        $("#user_username").addClass("object_ok");
                        $(this).html(' <div class="status-ok"><img align="absmiddle" src="/images/bg-valid-name.gif" /></div> ');
                    }
                    else
                    {
                        $("#user_username").removeClass('object_ok'); // if necessary
                        $("#user_username").addClass("object_error");
                        $(this).html(msg);
                    }
                });
            }
        });
    }
    else
    {
        $("#status").html('<div class="status-error">Username should have at least 4 characters</div>');
        $("#user_username").removeClass('object_ok'); // if necessary
        $("#user_username").addClass("object_error");
    }
};

function deleteSelectedMessages() {
    if ($('.checkbox:checked').size() > 0) {
        $('#messages_form').attr('action',$('#messages_form').attr('action')+'/delete_selected');
        $('#messages_form').submit();
    }
    else {
        return false;
    }
};

function spamSelectedMessages() {
    if ($('.checkbox:checked').size() > 0) {
        $('#messages_form').attr('action',$('#messages_form').attr('action')+'/spam_selected');
        $('#messages_form').submit();
    }else {
        return false;
    }
};

// update used gig title chars count

function updateGigTitleCharsCount() {
    var used = $('#gig_title').val().length;
    $('.gigtitleused').html(used);
};

// update used gig description chars count

function updateGigDescCharsCount() {
    var used = $('#gig_description').val().length;
    $('.gigdescused').html(used);
};

// unselects all checkboxes
function unselectCheckboxes() {
    $('.checkbox').each(function(){
        $(this).attr('checked', false);
    });
};


function reset_html(id) {
    $('#'+id).html($('#'+id).html());
}

// Define: Linkify plugin
(function($){

    var url1 = /(^|&lt;|\s)(www\..+?\..+?)(\s|&gt;|$)/g,
    url2 = /(^|&lt;|\s)(((https?|ftp):\/\/|mailto:).+?)(\s|&gt;|$)/g,

    linkifyThis = function () {
        var childNodes = this.childNodes,
        i = childNodes.length;
        while(i--)
        {
            var n = childNodes[i];
            if (n.nodeType == 3) {
                var html = $.trim(n.nodeValue);
                if (html)
                {
                    html = html.replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(url1, '$1<a href="http://$2" target="_blank">$2</a>$3')
                    .replace(url2, '$1<a href="$2" target="_blank">$2</a>$5');
                    $(n).after(html).remove();
                }
            }
            else if (n.nodeType == 1  &&  !/^(a|button|textarea)$/i.test(n.tagName)) {
                linkifyThis.call(n);
            }
        }
    };

    $.fn.linkify = function () {
        return this.each(linkifyThis);
    };

})(jQuery);
