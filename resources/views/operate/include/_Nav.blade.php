@inject('OnlineUserTool', 'App\Tools\OnlineUser\OnlineUserTool')
@inject('RouteLanguageService', 'App\Services\Route\RouteLanguageService')
<!-- menu  -->
<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area d-flex align-items-center">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Search here..." >
                            </div>
                            <button type="submit"> <img src="/template/Salessa/img/icon/icon_search.svg" alt=""> </button>
                        </form>
                    </div>
                    <span class="f_s_14 f_w_400 ml_25 white_text text_white" >Apps</span>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            {{--語系切換選項--}}
                            @foreach($RouteLanguageService->localesOperate as $key => $value)
                                @if(!App::isLocale($value))<a href="{{route("locale_config",["locale"=>$value])}}">{{__("切換")}}{{__($value)}}</a>@endif
                            @endforeach
                            {{$OnlineUserTool->viewCounter()}}
                            <a class="bell_notification_clicker nav-link-notify" href="#"> <img src="/template/Salessa/img/icon/bell.svg" alt="">

                            </a>
                            <!-- Menu_NOtification_Wrap  -->
                            <div class="Menu_NOtification_Wrap">
                                <div class="notification_Header">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="Notification_body">
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="/template/Salessa/img/staf/2.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>Cool Marketing </h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="/template/Salessa/img/staf/4.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>Awesome packages</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="/template/Salessa/img/staf/3.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>what a packages</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="/template/Salessa/img/staf/2.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>Cool Marketing </h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="/template/Salessa/img/staf/4.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>Awesome packages</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                    <!-- single_notify  -->
                                    <div class="single_notify d-flex align-items-center">
                                        <div class="notify_thumb">
                                            <a href="#"><img src="/template/Salessa/img/staf/3.png" alt=""></a>
                                        </div>
                                        <div class="notify_content">
                                            <a href="#"><h5>what a packages</h5></a>
                                            <p>Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1">See More</a>
                                    </div>
                                </div>
                            </div>
                            <!--/ Menu_NOtification_Wrap  -->
                        </li>
                        <li>
                            <a class="CHATBOX_open nav-link-notify" href="#"> <img src="/template/Salessa/img/icon/msg.svg" alt="">   </a>
                        </li>
                    </div>
                    <div class="profile_info">
                        <img src="/template/Salessa/img/client_img.png" alt="#">
                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <p>Neurologist </p>
                                <h5>Dr. Robar Smith</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="#">My Profile </a>
                                <a href="#">Settings</a>
                                <a href="/operate/logout">Log Out </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
