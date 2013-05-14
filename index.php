<!DOCTYPE html>
<html>
<head>
    <title>Gamify.WS (Simple) Scheme Builder</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
</head>
<body>

<div class="container">

    <div class="row">
        <div class="span3">
            <h4>Gamify.WS (Simple) Scheme Builder</h4>
            <img src="http://gamify.ws/img/logo.png" />
        </div>
        <div class="span3">
            <h6>What's This?</h6>
            <p>
                This little app interacts with the Gamify.WS gamification API and allows you to build your gamification rules, as well as pass test data to your scheme to ensure everything is working correctly.
            </p>
        </div>
        <div class="span3">
            <h6>Getting Started</h6>
            <p>
                <a href="http://gamify.ws/#scheme_register" target="_blank">Register a scheme</a> using the Gamify.ws API, and once you have your API key and secret, plug them into the classes/gamify.class.php file, then get started.
            </p>
        </div>
    </div>

    <hr />

    <div class="row">


        <div class="span2">
            <h5>Configure</h5>
            <a href="#" class="call btn btn-small create_btn" id="action_create">Create Action</a>
            <a href="#" class="call btn btn-small create_btn" id="action_group_create">Create Action Group</a>
            <a href="#" class="call btn btn-small create_btn" id="level_create">Create Level</a>
            <a href="#" class="call btn btn-small create_btn" id="badge_create">Create Badge</a>
        </div>

        <div class="span4">
            <h5>Options</h5>


            <!-- Action -->
            <div id="action_create_options" class="options_div hide input-append">
                <input type="text" id="action_create_input" value="" placeholder="eg. User Logs In" />
                <a href="#" id="action_create_go" class="btn call-btn">Go</a>
            </div>

            <!-- Action Group -->
            <div id="action_group_create_options" class="options_div hide">
                <input type="text" id="action_group_create_input_name" value="" placeholder="Name - eg. 3 Logins" /><br />

                <div><small>Action:</small></div>
                <select id="action_group_create_input_action" class="actions_list_select">
                </select>


                <div><small># Times Required:</small></div>
                <select id="action_group_create_input_number">
                    <?php
                        for($i=1;$i<=10;$i++)
                        {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                        }

                    ?>
                </select>

                <br />
                <small><a href="#" id="action_group_create_advanced_options_link" title="Show advanced options..">Show advanced options..</a></small>
                <div id="action_group_create_advanced_options" class="hide">
                    <div><small>Points Multiplier:</small></div>
                    <select id="action_group_create_points_multiplier">
                        <?php
                        for($i=1;$i<=10;$i++)
                        {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                        }

                        ?>
                    </select>


                    <div><small>Timeframe Days:</small></div>
                    <select id="action_group_create_timeframe_days">
                        <option value="">..</option>
                        <?php
                        for($i=1;$i<=10;$i++)
                        {
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php
                        }

                        ?>
                    </select>


                    <div><small>Multi:</small></div>
                    <select id="action_group_create_multi">
                        <option value="">No</option>
                        <option value="1">Yes</option>
                    </select>


                </div>
                <br />
                <a href="#" id="action_group_create_go" class="btn call-btn">Go</a>
            </div>


            <!-- Level -->
            <div id="level_create_options" class="options_div hide input-append">
                <input type="text" id="level_create_name_input" value="" placeholder="Level Name - eg. Beginner" /><br />
                <input type="text" id="level_create_points_input" value="" placeholder="Points - eg. 10" />
                <a href="#" id="level_create_go" class="btn call-btn">Go</a>
            </div>


            <!-- Badge -->
            <div id="badge_create_options" class="options_div hide input-append" style="display:block;font-size:12px;">
                <input type="text" id="badge_create_name_input" value="" placeholder="Badge Name - eg. Eager Beaver" /><br />
                <input type="text" id="badge_create_url_input" value="" placeholder="Badge URL - .png files only" /><br />

                <div><small>Badge Type:</small></div>
                <select id="badge_create_type">
                    <option value="points" selected="selected">Points</option>
                    <option value="action_group">Action Group</option>
                </select>

                <div><small>Badge Value:</small></div>
                <input type="text" id="badge_create_points_input" value="" placeholder="Points - eg. 10" />
                <select id="badge_create_action_groups" class="action_groups_list_select hide">
                    <option value="">Select..</option>
                </select>
                <a href="#" id="badge_create_go" class="btn call-btn">Go</a>
            </div>


            <div id="action_buttons_div">
                <h5>Actions</h5>
                <div id="action_buttons"></div>
            </div>
        </div>

        <div class="span6">
            Reply
            <div><pre  id="ajax_reply"></pre></div>
        </div>

    </div>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
