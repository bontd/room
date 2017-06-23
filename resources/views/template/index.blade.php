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
    <link rel="stylesheet" href="{{asset('public/css/select2.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/select2.min.css')}}" />
    <script src="{{url('public/js/jquery.min.js')}}"></script>
    <!-- <script src="https://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script> -->
    <!-- <script src="{{url('public/js/jquery.mobile.min.js')}}"></script> -->
    <script src="{{url('public/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('public/lib/moment.min.js')}}"></script>
    <script src="{{url('public/js/fullcalendar.min.js')}}"></script>
    <script src="{{url('public/lib/fullcalendar.js')}}"></script>
    <script src="{{url('public/js/select2/select2.full.js')}}"></script>
    <script src="{{url('public/js/select2/select2.full.min.js')}}"></script>
    <script src="{{url('public/js/select2/select2.js')}}"></script>
    <script src="{{url('public/js/select2/select2.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
        $('#example').DataTable();
          } );
        $(document).ready(function() {
        $('#example2').DataTable();
          } );
    </script>

<script type="text/javascript" src="{{url('public/js/canvas.js')}}"></script>
</head>
<body>
    <header>
        <div class="header">
          <div class="row">
              <div class="col-xs-5 pull-left">
                  <div style="font-weight: bold; font-size:40px;margin-left:30px; line-height: 55px;">
                    <a href="{{url('/index')}}" style="text-decoration: none;color: #fff;">
                      <i class="fa fa-pagelines"></i>
                    </a>
                  </div>
              </div>
              <div class="col-xs-2 pull-right">
                  <h5 class="text-right">
                    @if($type_user == 1)
                    <div id="status-header">
                      <img src="{{url('public/images/'.$image)}}"/>
                      <a href="{{url('/index/profile/'.Crypt::encrypt($id_user))}}"><label class="control-label" style="color: #fff;">{{$name_user}}</label></a>
                    </div>
                    @elseif($type_user == 2)
                    <div id="status-header">
                      <img src="{{url('public/images/'.$image)}}"/>
                      <a href="{{url('/index/profile/'.Crypt::encrypt($id_user))}}"><label class="control-label" style="color: #fff;">{{$name_user}}</label></a>
                    </div>
                    @else

                    @endif
                    <div class="open">
                      <span class="cls"></span>
                      <span>
                        <ul class="sub-menu">
                          @if($type_user == 1)
                              <li><a href="{{url('/users')}}"><i class="fa fa-user"></i> User Manage</a></li>
                              <li><a href="{{url('/groups')}}"><i class="fa fa-users"></i> Group & Room Manage</a></li>
                              <li><a href="{{url('/home')}}"><i class="fa fa-calendar"></i> Calendar</a></li>
                              <li><a href="{{url('/location')}}"><i class="fa fa-location-arrow"></i> location</a></li>
                              <div class="dropdown-divider"></div>
                              <!-- <li><a href="#" data-toggle="modal" data-target="#changePassword"><i class="fa fa-lock"></i> Change password</a></li> -->
                              <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                          @elseif($type_user == 2)
                              <li><a href="{{url('/home')}}"><i class="fa fa-calendar"></i> Calendar</a></li>
                              <li><a href="{{url('/index')}}"><i class="fa fa-home"></i> Index</a></li>
                              <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                          @else
                              <li><a href="{{url('/login')}}"><i class="fa fa-sign-out"></i> Login</a></li>
                              <li><a href="{{url('/index/register')}}"><i class="fa fa-sign-out"></i> Register</a></li>
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
        <div class="col-md-2 col-sm-2" style="height:100%;padding:0 12px 0 0;">
          @if($type_user == 1)
          <div id="network">
            <div id="search">
              <div class="col-md-12">
                <input type="search" required="required" id="abc" placeholder="1321231232" />
              </div>
              <div class="col-md-12">
                <label>Location</label>
                <select id="select2-test-2">
                  @foreach($g_location as $value)
                    <option value="{{$value->id}}">{{$value->title_l}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12">
                <label>Groups</label>
                <select id="select-3">
                  @foreach($g_groups as $value)
                    <option value="{{$value->id}}">{{$value->g_name}}</option>
                  @endforeach
                </select>
              </div>
              <button type="button" class="btn btn-info fa fa-search"></button>
            </div>
            <ul>
              <a href="#"><li><span class="fa fa-newspaper-o"></span> news</li></a>
              <a href="#"><li><i class="fa fa-user"></i> profile</li></a>
              <a href="#"><li><i class="fa fa-map-marker"></i> location</li></a>
              <a href="#" data-toggle="modal" data-target="#divPopUpSignContract"><li><i class="fa fa-pencil"></i></li></a>
            </ul>
          </div>
          @elseif($type_user == 2)
          <div id="network">
            <div id="search">
              <input type="search" required="required" id="abc" placeholder="1321231232" />
              <select id="select2-test-2" multiple="multiple">
                @foreach($g_location as $value)
                  <option value="{{$value->id}}">{{$value->title_l}}</option>
                @endforeach
              </select>
              <button type="button" class="btn btn-info fa fa-search"></button>
            </div>
            <ul>
              <a href="#"><li><span class="fa fa-newspaper-o"></span> news</li></a>
              <a href="#"><li><i class="fa fa-user"></i> profile</li></a>
              <a href="#"><li><i class="fa fa-map-marker"></i> location</li></a>
              <a href="#" data-toggle="modal" data-target="#divPopUpSignContract"><li><i class="fa fa-pencil"></i></li></a>
            </ul>
          </div>
          @else
          <div id="network">
            <div id="search">
              <input type="search" required="required" id="abc" placeholder="1321231232" />
              <select id="select2-test-2" multiple="multiple">
                @foreach($g_location as $value)
                  <option value="{{$value->id}}">{{$value->title_l}}</option>
                @endforeach
              </select>
              <button type="button" class="btn btn-info fa fa-search"></button>
            </div>
            <!-- <ul>
              <a href="#"><li><span class="fa fa-newspaper-o"></span> news</li></a>
              <a href="#"><li><i class="fa fa-user"></i> profile</li></a>
              <a href="#"><li><i class="fa fa-map-marker"></i> location</li></a>
              <a href="#" data-toggle="modal" data-target="#divPopUpSignContract"><li><i class="fa fa-pencil"></i></li></a>
            </ul> -->
          </div>
          @endif
        </div>
        <div class="col-md-10 col-sm-10" style="margin:10px 0 100px;">
          @yield('content')
        </div>
        <div id="footer" class="nav nav-pills nav-stacked col-md-12">
          <div class="col-md-6 footer-bar-left">
            Copyright © 2017 BTD, All Right Reserved
          </div>
          <div class="col-md-6 footer-bar-right">
            <ul>
              <li>Profile</li>
              <li>location</li>
              <li>help</li>
            </ul>
          </div>
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
    <!-- Canvas -->
    <div id="divPopUpSignContract" class="modal fade" role="dialog" data-backdrop="static">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>
          <div class="modal-body">
            <div class="ui-content popUpHeight">
              <div id="div_signcontract" style="margin-left:7%;">
                <canvas id="canvas">Canvas is not supported</canvas>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input id="btnSubmitSign" class="btn btn-info pull-left" type="button" data-inline="true" data-mini="true" data-theme="b" value="Submit Sign" onclick="fun_submit()" />
            <input id="btnClearSign" class="btn btn-info pull-left" type="button" data-inline="true" data-mini="true" data-theme="b" value="news" onclick="init_Sign_Canvas()" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    <!-- End Canvas -->
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
    $(document).ready(function(){
        $('.nav').affix({offset: {top: 300} });
    });
    $(document).ready(function(){
        $('#network').affix({offset: {top: 50} });
    });

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

      $(document).ready(function() {
        $("form").bind("keypress", function(e) {
            if (e.keyCode == 13) {
                return false;
            }
        });
    });

      $(document).ready(function(){
        $('#select2-test').select2();
      });

      $(document).ready(function(){
        $('#select2-test-2').select2();
      });
      $(document).ready(function(){
        $('#select-3').select2();
      });
    </script>
</body>
</html>
