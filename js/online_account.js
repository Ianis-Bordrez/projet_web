$(document).ready(function(){
    update_last_activity()
    setInterval(function(){
        update_last_activity();
    }, 5000);

    function update_last_activity() {
        $.ajax({
            url:"script/s_update_last_activity.php",
            success:function() {
            },  
        })
    }
});