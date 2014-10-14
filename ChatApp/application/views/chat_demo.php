<!DOCTYPE HTML>
<html>
    <head>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>//assets/css/chatDemo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/jquery-ui.css">
        <script src="<?php echo base_url(); ?>/assets/js/pusher.min.js"></script>
        <script src="<?php echo base_url(); ?>/assets/js/jquery.min.js"></script>

        <script>
            
            function ajaxCall(ajax_data, successCallback) {
                var baseurl = "<?php print base_url(); ?>";
               
                $.ajax({
                    type : "POST",
                    url:  baseurl+"/home/start_session",
                    dataType : "json",
                    data: ajax_data,
                    time : 10,
                    success : function(msg) {
                        if( msg.success ) {
                            alert("SUCCESS");
                            successCallback(msg);
                        } else {
                            
                            alert(msg.errormsg);
                        }
                    },
                    error: function(msg) {
                    }
                });
            }
            
            function updateOnlineCount() {
                $('#chat_widget_counter').html($('.chat_widget_member').length);
            }
            
        $(document).ready(function() {
            $('#chat_widget_login_button').click(function() {
                $(this).hide(); //hide the login button
                //$('#chat_widget_login_loader').show(); //show the loader gif
                username = $('#chat_widget_username').val(); //get the username
                username = username.replace(/[^a-z0-9]/gi, ''); //filter it
                if( username == '' ) { //if blank, then alert the user
                    alert('Please provide a valid username (alphanumeric only)');
                } else { //else, login our user via start_session.php
                    
                    ajaxCall({ username : username }, function() {
                        
                        //We're logged in! Now what?
                        var str = "<?php print base_url(); ?>"+"pusher_auth";
                        
  //                      pusher = new Pusher('c65cad7e5b313630c01c'); //APP KEY
                        pusher = new Pusher('c65cad7e5b313630c01c', { authEndpoint: str });
//                        Pusher.channel_auth_endpoint = '<?php echo base_url(); ?>application/libraries/pusher_auth.php'; //override the channel_auth_endpoint
var channel = pusher.channel("presence-test");

                        nettuts_channel = pusher.subscribe('presence-test'); //join the presence-nettuts channel
                        
                        pusher.connection.bind('connected', function() { //bind a function after we've connected to Pusher
                            
                            $('#chat_widget_login_loader').hide(); //hide the loading gif
                            $('#chat_widget_login_button').show(); //show the login button again

                            $('#chat_widget_login').hide(); //hide the login screen
                            $('#chat_widget_main_container').show(); //show the chat screen
                             
                            //here, we bind to the pusher:subscription_succeeded event, which is called whenever you
                            //successfully subscribe to a channel
                            nettuts_channel.bind('pusher:subscription_error', function(status) {
                                alert(status);
                                window.console.warn("Subscription of channel failed");
                            });
                            nettuts_channel.bind('pusher:subscription_succeeded', function(members) {
                                //this makes a list of all the online clients and sets the online list html
                                //it also updates the online count
                                var whosonline_html = '';
                              
                                members.each(function(member) {
                                
                                   
                                    whosonline_html += '<li class="chat_widget_member" id="chat_widget_member_' + 
                                    member.id + '">' + member.info.username + '</li>';
                           
                                });
                                $('#chat_widget_online_list').html(whosonline_html);
                                updateOnlineCount();
                            });

                            //here we bind to the pusher:member_added event, which tells us whenever someone else
                            //successfully subscribes to the channel
                            nettuts_channel.bind('member_added', function(member) {
                                alert("Sub Succeeded");
                                //this appends the new connected client's name to the online list
                                //and updates the online count as well
                                $('#chat_widget_online_list').append('<li class="chat_widget_member" ' +
                                'id="chat_widget_member_' + member.id + '">' + member.info.username + '</li>');
                                updateOnlineCount();
                            });

                            //here, we bind to pusher:member_removed event, which tells us whenever someone
                            //unsubscribes or disconnects from the channel
                            nettuts_channel.bind('pusher:member_removed', function(member) {
                                alert("Mem Failed");
                                //this removes the client from the online list and updates the online count
                                $('#chat_widget_member_' + member.id).remove();
                                updateOnlineCount();
                            });
                        });
                    });
                }
            });
        });
        
        
        </script>
    </head>
<body>
    <div id="chat_widget_container">
        <div id="chat_widget_login">
            <label for="chat_widget_username">Name:</label>
            <input type="text" id="chat_widget_username" />
            <input type="button" value="Login!" id="chat_widget_login_button" />
<!--            <img src="http://nettuts.s3.amazonaws.com/1059_pusher/loading.gif" alt="Logging in..." id="chat_widget_login_loader" />-->
        </div>
         
        <div id="chat_widget_main_container">
            <div id="chat_widget_messages_container">
                <div id="chat_widget_messages">
                    chat messages go here
                </div>
            </div>
            <div id="chat_widget_online">
                <p>Who's Online (<span id="chat_widget_counter">0</span>)</p>
                <ul id="chat_widget_online_list">
                    <li>online users go here</li>
                </ul>
            </div>
            <div class="clear"></div>
            <div id="chat_widget_input_container">
                <form method="post" id="chat_widget_form">
                    <input type="text" id="chat_widget_input" />
                    <input type="submit" value="Chat" id="chat_widget_button" />
<!--                    <img src="http://nettuts.s3.amazonaws.com/1059_pusher/loading.gif" alt="Sending..." id="chat_widget_loader" />-->
                </form>
            </div>
        </div>
    </div>
</body>
</html>