<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="shortcut icon" href="{{asset('public/logo.ico')}}" type="image/x-icon" />
    <title>Book Meeting</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/datatable.css')}}">
    <link rel="stylesheet" href="{{url('css/font-awesome.css')}}">
    <link href="{{url('css/fullcalendar.min.css')}}" rel='stylesheet' />
    <link href="{{url('css/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
    <link rel="stylesheet" href="{{url('build/jquery.datetimepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/pick-a-color-1.2.3.min.css')}}">
    <script src="{{url('js/jquery.min.js')}}"></script>
    <script src="{{url('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('lib/moment.min.js')}}"></script>
    <script src="{{url('js/fullcalendar.min.js')}}"></script>
    <script src="{{url('lib/fullcalendar.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#example').DataTable();
          } );
        $(document).ready(function() {
        $('#example2').DataTable();
          } );
    </script>
</head>
<body>
    <header>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5 pull-left">
                        <h3 style="font-weight: bold; line-height: 11px;"><a href="{{url('/index')}}" style="text-decoration: none;color: #fff;">Room</a></h3>
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
        </div>
    </header>
    <section>

        @yield('content')

        <div id="back-to-top">
          <i class="fa fa-chevron-circle-up"></i>
        </div>
        <div id="network">
          <a href="#">
            <span class="fa fa-facebook-square">
              <div id="facebook">
                xxxxx
              </div>
            </span>
          </a>
          <a href="#"><span class="fa fa-youtube-square">
            <div id="youtube">
              xxxxx
            </div>
          </span></a>
          <a href="#"><span class="fa fa-twitter-square">
            <div id="twitter">
              xxxxx
            </div>
          </span></a>
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
        <img src="{{url('images/icon-loading.gif')}}" width="100">
    </div>
    <!-- Script -->
    <script src="{{url('/js/ajax.js')}}"></script>
    <script src="{{url('/js/common.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/build/jquery.datetimepicker.full.js')}}"></script>
    <script src="{{url('/js/datetimepicker.js')}}"></script>
    <script src="{{asset('js/pick-a-color-1.2.3.min.js')}}"></script>
    <script src="{{asset('js/tinycolor-0.9.15.min.js')}}"></script>
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
