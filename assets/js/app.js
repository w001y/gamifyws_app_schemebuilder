$(document).ready(function(){

    $('.create_btn').click(function(){

        var my_id = $(this).attr('id');

        // Close all the options divs
        $(".options_div").hide('fast');

        // Open its corresponding options div
       $("#"+my_id+"_options").show('fast');

   });

    function init()
    {
        // Populate the action buttons div
        $.ajax({
            url     : 'ajax/ajax_processes.php',
            type    : "post",
            data    : {
                process : 'show_action_buttons'
            },
            success : function(data){
                $("#action_buttons").html(data);
            }
        });

        // Populate the actions dropdown(s)
        var method="scheme_get_items";
        var params = new Object();
        params.type = "actions";

        ajax_call(method, params, null, function(data){
            var obj = $.parseJSON(data);
            $.each( obj, function( key, value ) {
                $('.actions_list_select')
                    .append($("<option></option>")
                        .attr("value",obj[key].name)
                        .text(obj[key].name));
            });
        }, '0');

        // Populate the action_groupss dropdown(s)
        var method="scheme_get_items";
        var params = new Object();
        params.type = "action_groups";

        ajax_call(method, params, null, function(data){
            var obj = $.parseJSON(data);
            $.each( obj, function( key, value ) {
                $('.action_groups_list_select')
                    .append($("<option></option>")
                        .attr("value",obj[key].name)
                        .text(obj[key].name));
            });
        }, '0');


        // Check the badge type
        check_badge_type_val();
    }

    function ajax_call(method, params, message, callback, visibility)
    {

        $.ajax({
            url     : 'ajax.php',
            type    : "post",
            data    : {
                method : method,
                params : params
            },
            success : function(data){
                if(visibility != "0") // 0 turns it off, visible by default
                {
                    $("#ajax_reply").html(data);
                }
                if(message)
                {
                    alert(message);
                }

                if(typeof(callback)==='function'){
                    callback.call(this, data);
                }

            }
        });
    }

    function sayhi()
    {
        alert('hi there!')
    }

    /**
     * INDIVIDUAL CALLS HERE
     * These are individually set so as to allow you to alter it as much as you like.
     */

    // Action Create
    $("#action_create_go").click(function(e){
        e.preventDefault();

        var method = "action_create";
        var message = "Once you create your action, reload this page to use it.";
        var params = new Object();
        params.action_name = $("#action_create_input").val();

        ajax_call(method, params, message);
    });

    // Action Group Create
    $("#action_group_create_go").click(function(e){
        e.preventDefault();

        var method = "action_group_create";
        var params = new Object();
        params.action_group_name = $("#action_group_create_input_name").val();
        params.actions = "a," + $("#action_group_create_input_action").val() + "," + $("#action_group_create_input_number").val();

        // Hidden advanced options..
        params.points_multiplier    = $("#action_group_create_points_multiplier").val();
        params.timeframe_days       = $("#action_group_create_timeframe_days").val();
        params.multi                = $("#action_group_create_multi").val();

        ajax_call(method, params);
    });


    // Level Create
    $("#level_create_go").click(function(e){
        e.preventDefault();

        var method = "level_create";
        var params = new Object();
        params.level_name = $("#level_create_name_input").val();
        params.points = $("#level_create_points_input").val();

        ajax_call(method, params);
    });


    // Badge Create
    $("#badge_create_go").click(function(e){
        e.preventDefault();

        var method = "badge_create";
        var params = new Object();
        params.badge_name = $("#badge_create_name_input").val();
        params.url = $("#badge_create_url_input").val();
        params.badge_type = $("#badge_create_type").val();

            if($("#badge_create_type").val() == "points")
            {
                params.badge_value = $("#badge_create_points_input").val();
            }
            else
            {
                params.badge_value = $("#badge_create_action_groups").val();
            }

        ajax_call(method, params);
    });


    $("#action_group_create_advanced_options_link").click(function(e){
        e.preventDefault();
        $("#action_group_create_advanced_options").toggle('fast');
    });


    $('#action_buttons').on("dblclick", "a", function(e){
        e.preventDefault();
        console.log("Running action "+ $(this).data('action_name'));

        var method = "action_register";
        var params = new Object();
        params.action = $(this).data('action_name');
        params.user_id = "Gamify.WS Test User"; // Best not to change this. Do so at your own peril :)

        // Set a unique identifier for this action
        var d = new Date();
        params.element_id = d.getTime();

        ajax_call(method, params);

        // An example of using the data returned from an ajax call in another function after the call is done.
        /*ajax_call(method, params, null, function(data){
            alert(JSON.stringify(data))
        });*/
    });


    $("#badge_create_type").change(function(){
        var self = $(this);
        check_badge_type_val();
    });

    function check_badge_type_val()
    {
        if($("#badge_create_type").val() == "points")
        {
            $("#badge_create_action_groups").hide('fast').val("");
            $("#badge_create_points_input").show('fast');
        }
        else
        {
            $("#badge_create_action_groups").show('fast');
            $("#badge_create_points_input").hide('fast').val("");
        }
    }


    // Init
    init();
});