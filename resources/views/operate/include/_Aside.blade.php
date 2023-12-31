@inject('menuService', 'App\Services\Operate\MenuService')

<!-- sidebar  -->
<button class="sidebar-switch d-flex align-items-center justify-content-center" type="button">
    <i class="ionicon-menu-outline"></i>
</button>
<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="index.html"><img src="/template/Salessa/img/logo.png" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        @php
            $menus = $menuService->userMenu();
        @endphp

        @foreach ($menus as $menu)
            @if (array_key_exists('subMenu', $menu))
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            <img src="{{ $menu['icon'] }}" alt="">
                        </div>
                        <span>{{ $menu['name'] }}</span>
                    </a>
                    <ul>
                        @foreach ($menu['subMenu'] as $subMenu)
                            <li><a class="{{ '/' . Request::path() == $subMenu['href'] ? 'active' : '' }}"
                                    href="{{ $subMenu['href'] }}">{{ $subMenu['name'] }}</a></li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li class="">
                    <a href="{{ $menu['href'] }}" class="{{ '/' . Request::path() == $menu['href'] ? 'active' : '' }}">
                        <div class="icon_menu">
                            <img src="{{ $menu['icon'] }}" alt="">
                        </div>
                        <span>{{ $menu['name'] }}</span>
                    </a>
                </li>
            @endif
        @endforeach



        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/2.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Apps</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="editor.html">editor</a></li> --}}
        {{--                <li><a href="mail_box.html">Mail Box</a></li> --}}
        {{--                <li><a href="chat.html">Chat</a></li> --}}
        {{--                <li><a href="faq.html">FAQ</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}

        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/3.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>UI Kits</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="colors.html">colors</a></li> --}}
        {{--                <li><a href="Alerts.html">Alerts</a></li> --}}
        {{--                <li><a href="buttons.html">Buttons</a></li> --}}
        {{--                <li><a href="modal.html">modal</a></li> --}}
        {{--                <li><a href="dropdown.html">Droopdowns</a></li> --}}
        {{--                <li><a href="Badges.html">Badges</a></li> --}}
        {{--                <li><a href="Loading_Indicators.html">Loading Indicators</a></li> --}}
        {{--                <li><a href="State_color.html">State color</a></li> --}}
        {{--                <li><a href="typography.html">Typography</a></li> --}}
        {{--                <li><a href="datepicker.html">Date Picker</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}

        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/4.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>forms</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="Basic_Elements.html">Basic Elements</a></li> --}}
        {{--                <li><a href="Groups.html">Groups</a></li> --}}
        {{--                <li><a href="Max_Length.html">Max Length</a></li> --}}
        {{--                <li><a href="Layouts.html">Layouts</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a href="Board.html" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/5.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Board</span> --}}
        {{--            </a> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a  href="invoice.html" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/6.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Invoice</span> --}}
        {{--            </a> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a  href="calender.html" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/7.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Calander</span> --}}
        {{--            </a> --}}
        {{--        </li> --}}

        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}

        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/8.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Products</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="Products.html">Products</a></li> --}}
        {{--                <li><a href="Product_Details.html">Product Details</a></li> --}}
        {{--                <li><a href="Cart.html">Cart</a></li> --}}
        {{--                <li><a href="Checkout.html">Checkout</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/8.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Icons</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="Fontawesome_Icon.html">Fontawesome Icon</a></li> --}}
        {{--                <li><a href="themefy_icon.html">themefy icon</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}

        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/9.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Animations</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="wow_animation.html">Animate</a></li> --}}
        {{--                <li><a href="Scroll_Reveal.html">Scroll Reveal</a></li> --}}
        {{--                <li><a href="tilt.html">Tilt Animation</a></li> --}}

        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/10.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Components</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="accordion.html">Accordions</a></li> --}}
        {{--                <li><a href="Scrollable.html">Scrollable</a></li> --}}
        {{--                <li><a href="notification.html">Notifications</a></li> --}}
        {{--                <li><a href="carousel.html">Carousel</a></li> --}}
        {{--                <li><a href="Pagination.html">Pagination</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}

        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/11.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Table</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="data_table.html">Data Tables</a></li> --}}
        {{--                <li><a href="bootstrap_table.html">Bootstrap</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/12.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Cards</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="basic_card.html">Basic Card</a></li> --}}
        {{--                <li><a href="theme_card.html">Theme Card</a></li> --}}
        {{--                <li><a href="dargable_card.html">Draggable Card</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}


        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/13.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Charts</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="chartjs.html">ChartJS</a></li> --}}
        {{--                <li><a href="apex_chart.html">Apex Charts</a></li> --}}
        {{--                <li><a href="chart_sparkline.html">Chart sparkline</a></li> --}}
        {{--                <li><a href="am_chart.html">am-charts</a></li> --}}
        {{--                <li><a href="nvd3_charts.html">nvd3 charts.</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}


        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/14.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Widgets</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="chart_box_1.html">Chart Boxes 1</a></li> --}}
        {{--                <li><a href="profilebox.html">Profile Box</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}


        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}
        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/15.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Maps</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="mapjs.html">Maps JS</a></li> --}}
        {{--                <li><a href="vector_map.html">Vector Maps</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}
        {{--        <li class=""> --}}
        {{--            <a   class="has-arrow" href="#" aria-expanded="false"> --}}

        {{--                <div class="icon_menu"> --}}
        {{--                    <img src="/template/Salessa/img/menu-icon/16.svg" alt=""> --}}
        {{--                </div> --}}
        {{--                <span>Pages</span> --}}
        {{--            </a> --}}
        {{--            <ul> --}}
        {{--                <li><a href="login.html">Login</a></li> --}}
        {{--                <li><a href="resister.html">Register</a></li> --}}
        {{--                <li><a href="error_400.html">Error 404</a></li> --}}
        {{--                <li><a href="error_500.html">Error 500</a></li> --}}
        {{--                <li><a href="forgot_pass.html">Forgot Password</a></li> --}}
        {{--                <li><a href="gallery.html">Gallery</a></li> --}}
        {{--            </ul> --}}
        {{--        </li> --}}

    </ul>
</nav>
<!--/ sidebar  -->
