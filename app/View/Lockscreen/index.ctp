<!DOCTYPE html>
<html class="lockscreen">
    <head>
        <meta charset="UTF-8"/>
        <title>Cẩm nang đi làm | LockScreen</title>
        <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport"/>
        <?php
            echo $this->Html->css(array(
                "bootstrap.min.css"
                ,"font-awesome.min.css"
                ,"AdminLTE.css"
            ));
        ?>
    </head>
    <body>
        <!-- Automatic element centering using js -->
        <div class="center">
            <div class="headline text-center" id="time">
                <!-- Time auto generated by js -->
            </div><!-- /.headline -->
            
            <!-- Username -->
            <div class="lockscreen-name">TuDT</div>
            
            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-item">
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img src="img/avatar5.png" alt="user image"/>
                </div>
                <!-- /.lockscreen-image -->
                
                <!-- lockscreen credentials (contains the form) -->
                <div class="lockscreen-credentials">
                    <div class="input-group">
                       <input type="password" class="form-control" placeholder="password"/>
                       <div class="input-group-btn">
                            <button class="btn btn-flat"><i class="fa fa-arrow-right text-muted"></i></button>
                       </div> 
                    </div>
                </div><!-- /.lockscreen credentials -->
            </div><!-- /.lockscreen-item -->
            <div class="lockscreen-link">
                <a href="login.html">Or sign in as a different user</a>
            </div>
        </div><!-- /.center -->
        <?php
            echo $this->Html->script(array(
                "jquery.min.js"//jQuery 2.0.2
                ,"bootstrap.min.js"
            ));
        ?>
        
        <!-- page script -->
        <script type="text/javascript">
            $(function(){
                startTime();
                $(".center").center();
                $(window).resize(function(){
                    $(".center").center(); 
                });
            });
            function startTime(){
                var today=new Date();
                var h=today.getHours();
                var m=today.getMinutes();
                var s=today.getSeconds();
                
                //add a zero in front of numbers<10
                m=checkTime(m);
                s=checkTime(s);
                
                //Check for PM or AM
                var day_or_night=(h>11)?"PM":"AM";
                
                //Convert to 12 hours system
                if(h>12){
                    h-=12;
                }
                //Add time to the headline and update every 500 milliseconds
                $("#time").html(h+":"+m+":"+s+" "+day_or_night);
                setTimeout(function(){
                    startTime()
                },500);
            }
            function checkTime(i){
                if(i<10){
                    i="0"+i;
                }
                return i;
            }
            /*CENTER ELEMENTS IN THE SCREEN*/
            jQuery.fn.center=function(){
                this.css("position","absolute");
                this.css("top",Math.max(0,(($(window).height()-$(this).outerHeight())/2)+
                    $(window).scrollTop())-30+"px");
                this.css("left",Math.max(0,(($(window).width()-$(this).outerWidth())/2)+
                    $(window).scrollLeft())+"px");
                return this;
            }
        </script>
    </body>
</html>