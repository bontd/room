<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="{{asset('public/logo.ico')}}" type="image/x-icon" />
    <title>Book Meeting</title>
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('public/css/datatable.css')}}">
    <link rel="stylesheet" href="{{url('public/css/font-awesome.css')}}">
    <link href="{{url('public/css/fullcalendar.min.css')}}" rel='stylesheet' />
    <link href="{{url('public/css/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
    <link rel="stylesheet" href="{{url('public/build/jquery.datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/pick-a-color-1.2.3.min.css')}}">
    <script src="{{url('public/js/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
    <script src="{{url('public/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/lib/moment.min.js')}}"></script>
    <script src="{{url('public/js/fullcalendar.min.js')}}"></script>
    <script src="{{url('public/lib/fullcalendar.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#example').DataTable();
          } );
        $(document).ready(function() {
        $('#example2').DataTable();
          } );
    </script>

<script type="text/javascript">
    var isSign = false;
    var leftMButtonDown = false;

    jQuery(function(){
    //Initialize sign pad
    init_Sign_Canvas();
    });

    function fun_submit() {
    if(isSign) {
    var canvas = $("#canvas").get(0);
    var imgData = canvas.toDataURL();
    jQuery('#page').find('p').remove();
    jQuery('#page').find('img').remove();
    jQuery('#page').append(jQuery('<p>Your Sign:</p>'));
    jQuery('#page').append($('<img/>').attr('src',imgData));

    closePopUp();
    } else {
    alert('Please sign');
    }
    }

    function closePopUp() {
    jQuery('#divPopUpSignContract').popup('close');
    jQuery('#divPopUpSignContract').popup('close');
    }

    function init_Sign_Canvas() {
    isSign = false;
    leftMButtonDown = false;

    //Set Canvas width
    var sizedWindowWidth =$('#div_signcontract').width();
    if(sizedWindowWidth > 700)
    sizedWindowWidth = $(window).width() / 2;
    else if(sizedWindowWidth > 400)
    sizedWindowWidth = sizedWindowWidth - 50;
    else
    sizedWindowWidth = sizedWindowWidth - 20;

     $("#canvas").width(sizedWindowWidth);
     $("#canvas").height(200);
     $("#canvas").css("border","1px solid #000");

     var canvas = $("#canvas").get(0);

     canvasContext = canvas.getContext('2d');

     if(canvasContext)
     {
     canvasContext.canvas.width  = sizedWindowWidth;
     canvasContext.canvas.height = 200;

     canvasContext.fillStyle = "#fff";
     canvasContext.fillRect(0,0,sizedWindowWidth,200);

     canvasContext.moveTo(50,150);
     canvasContext.lineTo(sizedWindowWidth-50,150);
     canvasContext.stroke();

     canvasContext.fillStyle = "#000";
     canvasContext.font="20px Arial";
     canvasContext.fillText("x",40,155);
     }

     $(canvas).on('vmousedown', function (e) {
     if(e.which === 1) {
     leftMButtonDown = true;
     canvasContext.fillStyle = "#000";
     var x = e.pageX - $(e.target).offset().left;
     var y = e.pageY - $(e.target).offset().top;
     canvasContext.moveTo(x, y);
     }
     e.preventDefault();
     return false;
     });

     $(canvas).on('vmouseup', function (e) {
     if(leftMButtonDown && e.which === 1) {
     leftMButtonDown = false;
     isSign = true;
     }
     e.preventDefault();
     return false;
     });

     // draw a line from the last point to this one
     $(canvas).bind('vmousemove', function (e) {
     if(leftMButtonDown == true) {
     canvasContext.fillStyle = "#000";
     var x = e.pageX - $(e.target).offset().left;
     var y = e.pageY - $(e.target).offset().top;
     canvasContext.lineTo(x,y);
     canvasContext.stroke();
     }
     e.preventDefault();
     return false;
     });
    }
</script>
</head>
<body>
    <header>
        <div class="header">
          <div class="row">
              <div class="col-xs-5 pull-left">
                  <div style="font-weight: bold; font-size:40px;margin-left:30px; line-height: 55px;">
                    <a href="{{url('/index')}}" style="text-decoration: none;color: #fff;">
                      <!-- <i class="fa fa-pagelines"></i> -->
                      Meeting Room
                    </a>
                  </div>
              </div>
              <div class="col-xs-3 pull-right">
                  <h5 class="text-right">
                    <div class="open">
                      <span class="cls"></span>
                      <span>
                        <ul class="sub-menu">
                          @if($type_user == 1)
                              <li><a href="{{url('/users')}}"><i class="fa fa-user"></i>User Manage</a></li>
                              <li><a href="{{url('/groups')}}"><i class="fa fa-users"></i>Group & Room Manage</a></li>
                              <li><a href="{{url('/home')}}"><i class="fa fa-calendar"></i>Calendar</a></li>
                              <div class="dropdown-divider"></div>
                              <!-- <li><a href="#" data-toggle="modal" data-target="#changePassword"><i class="fa fa-lock"></i> Change password</a></li> -->
                              <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
                          @elseif($type_user == "2")
                              <li><a href="{{url('/home')}}"><i class="fa fa-calendar"></i>Calendar</a></li>
                              <li><a href="{{url('/index')}}"><i class="fa fa-home"></i>Index</a></li>
                              <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
                          @else
                              <li><a href="{{url('/login')}}"><i class="fa fa-sign-out"></i>Login</a></li>
                              <li><a href="{{url('/index/register')}}"><i class="fa fa-sign-out"></i>Register</a></li>
                          @endif
                        </ul>
                      </span>
                      <span
                          class="cls"></span>
                    </div>
                  </h5>
              </div>
          </div>
        </div>
    </header>
    <section>
        <div id="back-to-top">
          <i class="fa fa-chevron-circle-up"></i>
        </div>
        <div id="network" class="col-md-2 col-sm-2">
          <div id="search">
            <input type="search" name="search" required="required" />
            <button type="button" class="btn btn-info fa fa-search"></button>
          </div>
          <ul>
            <li><span class="fa fa-newspaper-o"></span> news</li>
            <li><i class="fa fa-user"></i> profile</li>
            <li><i class="fa fa-map-marker"></i> location</li>
          </ul>
        </div>
        <div id="news_page" class="col-md-8 col-sm-8">
          @yield('content')
        </div>

        <div id="bottom-network">
          <!-- <a href="http://Facebook.com">
            <span class="fa fa-facebook-square" style="color:#095494;">
              <div id="facebook">
                Facebook
              </div>
            </span>
          </a>
          <a href="http://youtube.com"><span class="fa fa-youtube-square" style="color:red;">
            <div id="youtube">
              Youtube
            </div>
          </span></a>
          <a href="http://twitter.com"><span class="fa fa-twitter-square" style="color: #55acee;">
            <div id="twitter">
              Twitter
            </div>
          </span></a>
          <a href="http://instagram.com"><span class="fa fa-instagram" style="color: #f04e4e;">
            <div id="instagram">
              instagram
            </div>
          </span></a> -->
        </div>
    </section>
    <div id="error" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Error</h4>
                </div>
                <div class="modal-body">
                    <h3></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- load -->
    <div id="load-event" class="modal fade" role="dialog">
        <i class="fa fa-cog fa-spin"></i>
    </div>
    <!-- end load -->
    <div id="success" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Success</h4>
                </div>
                <div class="modal-body">
                    <h3 style="color:green;"></h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" onclick="close_user();">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div id="icon-loading" >
        <img src="{{url('public/images/icon-loading.gif')}}" width="100">
    </div>
    <!-- Script -->
    <script src="{{url('public//js/ajax.js')}}"></script>
    <script src="{{url('public//js/common.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('public//js/bootstrap.min.js')}}"></script>
    <script src="{{url('public//build/jquery.datetimepicker.full.js')}}"></script>
    <script src="{{url('public//js/datetimepicker.js')}}"></script>
    <script src="{{asset('public/js/pick-a-color-1.2.3.min.js')}}"></script>
    <script src="{{asset('public/js/tinycolor-0.9.15.min.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script type="text/javascript">
        $(document).ready(function () {
            $(".pick-a-color").pickAColor({
              showSpectrum            : true,
                showSavedColors       : true,
                saveColorsPerElement  : true,
                fadeMenuToggle         : true,
                showAdvanced          : true,
                showHexInput          : true,
                showBasicColors       : true,
                allowBlank          : true,
                inlineDropdown      : true
            });
        });

        jQuery(document).ready(function ($) {
        	if ($(window).scrollTop() > 200) {
                    	$('#back-to-top').fadeIn();
                } else {
                    	$('#back-to-top').fadeOut();
                }

        	$(window).scroll(function () {
        	        if ($(this).scrollTop() > 200) {
        			$('#back-to-top').fadeIn();
        	        } else {
        	            	$('#back-to-top').fadeOut();
        	        }
        	});

        	$('#back-to-top').click(function () {
        	        $("html, body").animate({
        	            	scrollTop: 0
        	        }, 600);
        	        return false;
        	});
        });
    </script>
    <script>
      $(document).ready(function() {
        $(document).delegate('.open', 'click', function(event) {
          $(this).addClass('oppenned');
          event.stopPropagation();
        })
        $(document).delegate('body', 'click', function(event) {
          $('.open').removeClass('oppenned');
        })
        $(document).delegate('.cls', 'click', function(event) {
          $('.open').removeClass('oppenned');
          event.stopPropagation();
        });
      });
    </script>
</body>
</html>
