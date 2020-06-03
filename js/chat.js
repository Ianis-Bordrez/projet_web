$(document).ready(function(){
    fetch_user();

    setInterval(function(){
        update_last_activity();
        fetch_user();
        update_chat_history_data();
    }, 5000);

    function fetch_user() {
        $.ajax({
        url:"script/s_fetch_user.php",
        method:"POST",
        success:function(data) {
            $('#user_details').html(data);
        }
        })
    }

    function update_last_activity() {
        $.ajax({
            url:"script/s_update_last_activity.php",
            success:function() {
            }
        })
    }

    function make_chat_dialog_box(receiver_id, receiver_username) {
        var modal_content = '<div id="user_dialog_'+receiver_id+'" class="user_dialog" title="You have chat with '+receiver_username+'">';
        modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history" data-receiverid="'+receiver_id+'" id="chat_history_'+receiver_id+'">';
        modal_content += fetch_user_chat_history(receiver_id);
        modal_content += '</div>';
        modal_content += '<div class="form-group">';
        modal_content += '<textarea name="message_'+receiver_id+'" id="message_'+receiver_id+'" class="form-control"></textarea>';
        modal_content += '</div><div class="form-group" align="right">';
        modal_content+= '<button type="button" name="send_chat" id="'+receiver_id+'" class="btn btn-info send_chat">Send</button></div></div>';
        $('#user_model_details').html(modal_content);
    }

    function scrollToBottom(id){
        var div = document.getElementById(id);
        div.scrollTop = div.scrollHeight - div.clientHeight;
    }

    $(document).on('click', '.start_chat', function(){
        var receiver_id = $(this).data('receiverid');
        var receiver_username = $(this).data('receiverusername');
        make_chat_dialog_box(receiver_id, receiver_username);
        $("#user_dialog_"+receiver_id).dialog({
        autoOpen:false,
        width:400
        });
        $('#user_dialog_'+receiver_id).dialog('open');
    });

    $(document).on('click', '.send_chat', function(){
        var receiver_id = $(this).attr('id');
        var message = $('#message_'+receiver_id).val();
        $.ajax({
            url:"script/s_insert_chat.php",
            method:"POST",
            data:{receiver_id:receiver_id, message:message},
            success:function(data) {
                $('#message_'+receiver_id).val('');
                $('#chat_history_'+receiver_id).html(data);
            }
        })
    });

    function fetch_user_chat_history(receiver_id) {
        $.ajax({
        url:"script/s_fetch_user_chat_history.php",
        method:"POST",
        data:{receiver_id:receiver_id},
        success:function(data){
            $('#chat_history_'+receiver_id).html(data);
        }
        })
    }

    function update_chat_history_data() {
        $('.chat_history').each(function(){
            var receiver_id = $(this).data('receiverid');
            fetch_user_chat_history(receiver_id);
        });
    }

    function move_scrollbar() {
        var objDiv = document.getElementById("your_div");
        objDiv.scrollTop = objDiv.scrollHeight;
    }

    $(document).on('click', '.ui-button-icon', function(){
        $('.user_dialog').dialog('destroy').remove();
    });
 
});