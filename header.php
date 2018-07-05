<header class="header-section">
    <div class="header-alert" style="display: none;">
        <div class="container">
            <i class="fa fa-bell-o" aria-hidden="true"></i> We are performing usual website maintenance and hence you may face disturbances during this period. This message will disappear once the maintenance period is over.
        </div>

    </div>

    <input type="hidden" id="geoCountry" value="<?=$_SESSION['geoCountry']?>" />
    <?php
        $containerClass = "";
        if(isset($_SESSION['user']) && (strpos($_SERVER['REQUEST_URI'], '/franchisor-') > -1 || strpos($_SERVER['REQUEST_URI'], '/entrepreneur-') > -1 || strpos($_SERVER['REQUEST_URI'], '/city-coach-') > -1 || strpos($_SERVER['REQUEST_URI'], '/broker-') > -1)) {
            $containerClass = "";
        } else {
            $containerClass = "container";
        }
    ?>
    <nav class="navbar navbar-default">
        <div class="<?=$containerClass?>" style="position: relative;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="z-index: 1;position: relative;">

               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="/">
                    <img src="/public/img/icon-png/franchisebazar-logo.jpg" alt="FranchiseBazar" />
                </a>
            </div>
            <div class="collapse navbar-collapse navbar-links-container">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Company <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/about-us">About Us</a></li>
                            <li><a href="/blogs/">Blogs</a></li>
                            <li><a href="/careers">Careers</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Business Directory <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/opportunities-by-industry">By Industry</a></li>
                            <li><a href="/opportunities-by-investment">By Investment</a></li>
                            <li><a href="/opportunities-by-location">By Location</a></li>
                            <li><a href="/opportunities-directory">By A-Z Alphabets</a></li>
                        </ul>
                    </li>
                    <li><a href="/locations">Top Locations</a></li>
                    <li><a href="/new-business">New Businesses</a></li>
                    <li><a href="/top-opportunities">Top 50 Businesses</a></li>
                    <li><a href="/be-our-franchise">Be Our Franchise</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(!isset($_SESSION['user'])): ?>
                    <li><a href="/franchisor-registration/">List Your Brand</a></li>
                    <?php endif; ?>
                    <li><a href="javascript: void(0);" class="flag flag-in"></a></li>
                </ul>
            </div>

            <div class="collapse navbar-collapse bottom-navbar-links-container">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse By Industry <span class="caret"></span></a>
                        <ul class="dropdown-menu expanded-1">
                            <?php foreach ($industryList as $key => $value) { ?>
                            <li>
                                <a href="/industry/<?=$value['page_url']?>">
                                    <i class="<?=$value['icon_class']?>" aria-hidden="true" style="width: 20px;"></i> <?=$value['name']?>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse By Investment <span class="caret"></span></a>
                        <ul class="dropdown-menu expanded-2">
                            <?php foreach ($investmentList as $key => $value) { ?>
                            <li><a href="/investment/<?=$value['inr_url']?>"><?=$value['inr_value']?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Browse By Location <span class="caret"></span></a>
                        <ul class="dropdown-menu expanded-3">
                            <?php foreach ($locationList as $key => $value) { ?>
                            <li><a href="/location/<?=$value['page_url']?>"><?=$value['name']?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(isset($_SESSION['user'])) { ?>
                    <li class="inner-addon right-addon">
                        <a href="javascript: void(0);" id="searchLink"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </li>
                    <li class="dropdown">
                        <a style="padding: 5px 8px;" href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php if($_SESSION['userType'] == 'F'): ?>
                            <img style="height: 32px;border-radius: 0;" src="<?=$_SESSION['user']['logo']?>" alt="<?=$_SESSION['user']['brand_name']?>" />
                            <?php else: ?>
                            <img style="width: 32px;border-radius: 50%;" src="<?=$_SESSION['user']['photo']?>" alt="<?=$_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']?>" />
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu" style="max-height: initial;">
                        <?php if($_SESSION['userType'] == 'F') { ?>
                            <li>
                                <a href="javascript: void(0);">Available Lead Credits : <b><?=($_SESSION['user']['leads_count'] == '-1') ? 'Unlimited' : $_SESSION['user']['leads_count']?></b></a>
                            </li>
                            <li>
                                <a href="/franchisor-dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="/franchisor-profile"><i class="fa fa-cogs" aria-hidden="true"></i> Profile Settings</a>
                            </li>
                            <li>
                                <a href="/franchisor-account"><i class="fa fa-sliders" aria-hidden="true"></i> Account Settings</a>
                            </li>
                            <li>
                                <a href="/franchisor-news-events"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News / Events</a>
                            </li>
                            <li>
                                <a href="/franchisor-seo"><i class="fa fa-rss" aria-hidden="true"></i> Profile SEO</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-envelope-open-o" aria-hidden="true"></i> Advertise with us</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-arrows-alt" aria-hidden="true"></i> Outsource Franchise</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-comments-o" aria-hidden="true"></i> Publish CEO interview</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-envelope-o" aria-hidden="true"></i> Send Brokerage Aprroval Letter</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Contact Your Account Manager</a>
                            </li>
                            <li>
                                <form name="logout-form" id="logout-form" method="post" novalidate style="margin: 0;">
                                    <input type="hidden" name="action" value="systemout" />
                                    <a style="color: #e6e6e6;text-decoration: none;" relation="logout" href="javascript: void(0);"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                </form>
                            </li>
                        <?php } elseif($_SESSION['userType'] == 'E') { ?>
                            <li>
                                <a href="/entrepreneur-dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="/entrepreneur-profile"><i class="fa fa-cogs" aria-hidden="true"></i> Profile Settings</a>
                            </li>
                            <li>
                                <a href="/entrepreneur-account"><i class="fa fa-sliders" aria-hidden="true"></i> Account</a>
                            </li>
                            <li>
                                <a href="/entrepreneur-seo"><i class="fa fa-rss" aria-hidden="true"></i> Profile SEO</a>
                            </li>
                            <li>
                                <?php if(!isset($_SESSION['logoutURL']) || strlen($_SESSION['logoutURL']) == 0): ?>
                                <form name="logout-form" id="logout-form" method="post" novalidate style="margin: 0;">
                                    <input type="hidden" name="action" value="systemout" />
                                    <a style="color: #e6e6e6;text-decoration: none;" relation="logout" href="javascript: void(0);"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                </form>
                                <?php else: ?>
                                <a href="<?=$_SESSION['logoutURL']?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                <?php endif; ?>
                            </li>
                        <?php } elseif($_SESSION['userType'] == 'B') { ?>
                            <li>
                                <a href="/broker-dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                            </li>
                            <li>
                                <form name="logout-form" id="logout-form" method="post" novalidate style="margin: 0;">
                                    <input type="hidden" name="action" value="systemout" />
                                    <a style="color: #e6e6e6;text-decoration: none;" relation="logout" href="javascript: void(0);"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                </form>
                            </li>
                        <?php } elseif($_SESSION['userType'] == 'C') { ?>
                            <li>
                                <a href="/city-coach-dashboard"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                            </li>
                            <li>
                                <form name="logout-form" id="logout-form" method="post" novalidate style="margin: 0;">
                                    <input type="hidden" name="action" value="systemout" />
                                    <a style="color: #e6e6e6;text-decoration: none;" relation="logout" href="javascript: void(0);"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                </form>
                            </li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php } else { ?>
                    <li>
                        <button style="margin: 0 -1px;padding: 10px 12px;" type="button" id="register" class="btn btn-primary">Register</button>
                    </li>
                    <li><a href="javascript: void(0);" class="login-modal">Login</a></li>
                    <li class="inner-addon right-addon">
                        <a href="javascript: void(0);" id="searchLink" style="padding: 11px 17px 10px 13px;"><i class="fa fa-search" aria-hidden="true"></i></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="header-inline-form">
                <h1 class="search-content">The fastest way to search new business opportunities that match your requirements.</h1>
                <form class="search-container-home" id="search-container-home" autocomplete="off" method="post" action="/search" novalidate>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="nav navbar-nav">
                                <li class="dropdown" data-rel="by_industry">
                                    <?php if(isset($_SESSION['by_industry']) && strlen($_SESSION['by_industry']) > 0): ?>
                                    <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span id="industry_text"><?=$sessionIndustry?></span>
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </a>
                                    <input type="hidden" name="by_industry" id="by_industry" autocomplete="off" value="<?=$_SESSION['by_industry']?>"/>
                                    <ul class="dropdown-menu">
                                        <li class="default"><a href="javascript: void(0);" data-rel="">Select Industry</a></li>
                                    <?php else: ?>
                                    <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span id="industry_text">Select Industry</span>
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </a>
                                    <input type="hidden" name="by_industry" id="by_industry" autocomplete="off"/>
                                    <ul class="dropdown-menu">
                                        <li class="default" style="display: none;"><a href="javascript: void(0);" data-rel="">Select Industry</a></li>
                                    <?php endif; ?>
                                        <?php foreach ($industryList as $key => $value) {
                                                  if(isset($_SESSION['by_industry']) && strlen($_SESSION['by_industry']) > 0 && $value['id'] == $_SESSION['by_industry']):
                                        ?>
                                        <li>
                                            <a href="javascript: void(0);" data-rel="<?=$value['id']?>">
                                                <?=$value['name']?>
                                                <i class="fa fa-check" aria-hidden="true" style="margin-left: 10px;"></i>
                                            </a>
                                        </li>
                                        <?php     else: ?>
                                        <li><a href="javascript: void(0);" data-rel="<?=$value['id']?>"><?=$value['name']?></a></li>
                                        <?php     endif;
                                              } ?>
                                    </ul>
                                </li>
                                <li class="dropdown" data-rel="by_location">
                                    <?php if(isset($_SESSION['by_location']) && strlen($_SESSION['by_location']) > 0): ?>
                                    <?php if(!is_numeric($_SESSION['by_location'])){?>
                                      <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                          <span id="location_text">
                                            <?php if($_SESSION['by_location']=="S"){?>
                                              South india
                                            <?php }
                                            if($_SESSION['by_location']=="N"){?>
                                              North india
                                            <?php }
                                            if($_SESSION['by_location']=="W"){?>
                                              West india
                                            <?php }
                                            if($_SESSION['by_location']=="E"){?>
                                              East india
                                            <?php }
                                            if($_SESSION['by_location']=="C"){?>
                                              Central India
                                            <?php }
                                            if($_SESSION['by_location']=="A"){?>
                                              Union Territories
                                            <?php }?>
                                            </span>
                                          <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                      </a>
                                    <?php }else{ ?>
                                    <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span id="location_text"><?=$sessionLocation?></span>
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </a>
                                    <?php } ?>
                                    <input type="hidden" name="by_location" id="by_location" autocomplete="off" value="<?=$_SESSION['by_location']?>"/>
                                    <ul class="dropdown-menu">
                                        <li class="default"><a href="javascript: void(0);" data-rel="">Select Location</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="A">Union Territories</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="S">South India</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="N">North India</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="W">West India</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="E">East India</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="C">Central India</a></li>
                                    <?php else: ?>
                                    <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span id="location_text">Select Location</span>
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </a>
                                    <input type="hidden" name="by_location" id="by_location" autocomplete="off"/>
                                    <ul class="dropdown-menu">
                                        <li class="default" style="display: none;"><a href="javascript: void(0);" data-rel="">Select Location</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="A">Union Territories</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="S">South India</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="N">North India</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="W">West India</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="E">East India</a></li>
                                        <li class="default" ><a href="javascript: void(0);" data-rel="C">Central India</a></li>
                                    <?php endif; ?>
                                        <?php foreach ($locationList as $key => $value) {
                                                  if(isset($_SESSION['by_location']) && strlen($_SESSION['by_location']) > 0 && $value['id'] == $_SESSION['by_location']):
                                        ?>
                                        <li>
                                            <a href="javascript: void(0);" data-rel="<?=$value['id']?>">
                                                <?=$value['name']?>
                                                <i class="fa fa-check" aria-hidden="true" style="margin-left: 10px;"></i>
                                            </a>
                                        </li>
                                        <?php     else: ?>
                                        <li><a href="javascript: void(0);" data-rel="<?=$value['id']?>"><?=$value['name']?></a></li>
                                        <?php     endif;
                                              }
                                        ?>
                                    </ul>
                                </li>
                                <li class="dropdown" data-rel="by_investment">
                                    <?php if(isset($_SESSION['by_investment']) && strlen($_SESSION['by_investment']) > 0): ?>
                                    <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span id="investment_text"><?=$sessionInvestment?></span>
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </a>
                                    <input type="hidden" name="by_investment" id="by_investment" autocomplete="off" value="<?=$_SESSION['by_investment']?>"/>
                                    <ul class="dropdown-menu">
                                        <li class="default"><a href="javascript: void(0);" data-rel="">Select Investment</a></li>
                                    <?php else: ?>
                                    <a href="javascript: void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <span id="investment_text">Select Investment</span>
                                        <i class="fa fa-arrow-down" aria-hidden="true"></i>
                                    </a>
                                    <input type="hidden" name="by_investment" id="by_investment" autocomplete="off"/>
                                    <ul class="dropdown-menu">
                                        <li class="default" style="display: none;"><a href="javascript: void(0);" data-rel="">Select Investment</a></li>
                                    <?php endif; ?>
                                        <?php foreach ($investmentList as $key => $value) {
                                                  if(isset($_SESSION['by_investment']) && strlen($_SESSION['by_investment']) > 0 && $_SESSION['by_investment'] == $value['id']):
                                        ?>
                                        <li>
                                            <a href="javascript: void(0);" data-rel="<?=$value['id']?>">
                                                <?=$value['inr_value']?>
                                                <i class="fa fa-check" aria-hidden="true" style="margin-left: 10px;"></i>
                                            </a>
                                        </li>
                                        <?php     else: ?>
                                        <li><a href="javascript: void(0);" data-rel="<?=$value['id']?>"><?=$value['inr_value']?></a></li>
                                        <?php     endif;
                                              }
                                        ?>
                                    </ul>
                                </li>
                                <li style="width: 60px;height: 40px;">
                                    <button type="submit" class="btn btn-primary custom-button">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>

                <div class="or-container">
                    <span>OR</span>
                </div>

                <div class="search-results" id="searchResults">
                    <input type="text" placeholder="Start typing to search for Opportunities / Locations / Industries" class="form-control" id="searchKey" />
                    <ul>
                        <li class='info'>No Results Found</li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#social-tab" aria-controls="social-tab" role="tab" data-toggle="tab">SOCIAL</a></li>
                <li role="presentation"><a href="#register-tab" aria-controls="register-tab" role="tab" data-toggle="tab">REGISTER</a></li>
                <li role="presentation"><a href="#login-tab" aria-controls="login-tab" role="tab" data-toggle="tab">LOGIN</a></li>
            </ul>

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="social-tab">
                    <div class="social-login-section">
                        <ul>
                            <li>
                                <a href="/facebook" style="background-color: #3c5a98;">
                                    <i class="fa fa-facebook" aria-hidden="true"></i> <span>Continue With Facebook</span>
                                </a>
                            </li>


                            <li>
                                <a href="/google" style="background-color: #dd4b39;">
                                    <i class="fa fa-google" aria-hidden="true"></i> <span>Continue With Google</span>
                                </a>
                            </li>
                            <li>
                                <a href="/linkedin" style="background-color: #0274b3;">
                                    <i class="fa fa-linkedin" aria-hidden="true"></i> <span>Continue With Linkedin</span>
                                </a>
                            </li>
                            <li>
                                <a href="/twitter" style="background-color: #009DF6;">
                                    <i class="fa fa-twitter" aria-hidden="true"></i> <span>Continue With Twitter</span>
                                </a>
                            </li>
                        </ul>

                        <div class="text-left">
                            <hr/>
                            <h5>Why Should I Register?</h5>
                            <small>You are seeking to access information which is provided only to registered members. It takes less than a minute to register and access information on FRANCHISEBAZAR.</small>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="register-tab">
                    <div class="social-login-section">
                        <form class="register-form form-horizontal" name="register-form" id="register-form" method="post" novalidate style="margin: 0;">
                            <input type="hidden" name="action" value="systemreg" />
                            <div class="form-group">
                                <label for="r_fname" class="sr-only">First Name</label>
                                <input type="text" class="form-control" autocomplete="off" name="r_fname" id="r_fname" placeholder="First Name" />
                            </div>
                            <div class="form-group">
                                <label for="r_lname" class="sr-only">Last Name</label>
                                <input type="text" class="form-control" autocomplete="off" name="r_lname" id="r_lname" placeholder="Last Name" />
                            </div>
                            <div class="form-group">
                                <label for="r_email" class="sr-only">Email</label>
                                <input type="email" class="form-control" autocomplete="off" name="r_email" id="r_email" placeholder="Where can we mail you?" />
                            </div>
                            <div class="form-group text-right">
                                <label for="r_mobile" class="sr-only">Contact Number</label>
                                <div class="input-group">
                                    <span class="input-group-addon">+91</span>
                                    <input type="text" class="form-control" autocomplete="off" name="r_mobile" id="r_mobile" placeholder="Where can we ring you?" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="r_password" class="sr-only">Password</label>
                                <input type="password" class="form-control" autocomplete="off" name="r_password" id="r_password" placeholder="Password" />
                            </div>
                            <div class="form-group" style="transform: scale(0.77); -webkit-transform: scale(0.88); transform-origin: 0 0; -webkit-transform-origin: 0 0;">
                                <div id="registerReCaptcha"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-left" relation="register">Register</button>
                                <div class="spinner">
                                    <div class="rect1"></div>
                                    <div class="rect2"></div>
                                    <div class="rect3"></div>
                                    <div class="rect4"></div>
                                    <div class="rect5"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="success-message"></div>
                                <div class="error-message"></div>
                            </div>

                            <div class="text-left">
                                <hr/>
                                <h5>Why Should I Register?</h5>
                                <small>You are seeking to access information which is provided only to registered members. It takes less than a minute to register and access information on FRANCHISEBAZAR.</small>
                            </div>
                        </form>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="login-tab">
                    <div class="login-section">
                        <form class="login-form form-horizontal" name="login-form" id="login-form" method="post" novalidate style="margin: 0;">
                            <input type="hidden" name="action" value="systemin" />
                            <div class="form-group">
                                <label for="l_f_email" class="sr-only">Email / Username</label>
                                <input type="email" class="form-control" autocomplete="off" name="l_f_email" id="l_f_email" placeholder="Email / Username">
                            </div>
                            <div class="form-group">
                                <label for="f_password" class="sr-only">Password</label>
                                <input type="password" class="form-control" autocomplete="off" name="f_password" id="f_password" placeholder="Password">
                            </div>
                            <div class="form-group text-right">
                                <small><a href="javascript: void(0);" class="forgot-password-link">Forgot password</a></small>
                            </div>
                            <div class="form-group" style="transform: scale(0.77); -webkit-transform: scale(0.88); transform-origin: 0 0; -webkit-transform-origin: 0 0;">
                                <div id="loginReCaptcha"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-left" relation="login">Login</button>
                                <div class="spinner">
                                    <div class="rect1"></div>
                                    <div class="rect2"></div>
                                    <div class="rect3"></div>
                                    <div class="rect4"></div>
                                    <div class="rect5"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="error-message"></div>
                            </div>
                            <div class="text-left">
                                <hr/>
                                <h5>Why Account Login?</h5>
                                <small>You are seeking to access information which is provided only to registered members. It takes less than a minute to register and access information on FRANCHISEBAZAR.</small>
                            </div>
                        </form>
                    </div>

                    <div class="forgot-password-section">
                        <form class="password-form form-horizontal" name="password-form" id="password-form" method="post" novalidate style="margin: 0;">
                            <input type="hidden" name="action" value="forgot" />
                            <div class="form-group">
                                <label for="f_email" class="sr-only">Email / Username</label>
                                <input type="email" class="form-control" autocomplete="off" name="f_email" id="f_email" placeholder="Email / Username">
                            </div>
                            <div class="form-group" style="transform: scale(0.77); -webkit-transform: scale(0.88); transform-origin: 0 0; -webkit-transform-origin: 0 0;">
                                <div id="forgotPasswordReCaptcha"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-left" relation="reset">Reset</button>
                                <div class="spinner">
                                    <div class="rect1"></div>
                                    <div class="rect2"></div>
                                    <div class="rect3"></div>
                                    <div class="rect4"></div>
                                    <div class="rect5"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="error-message"></div>
                            </div>
                            <div class="form-group">
                                <div class="success success-message"></div>
                            </div>
                            <div class="form-group text-right">
                                <small><a href="javascript: void(0);" class="login-link"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Login</a></small>
                            </div>
                            <div class="text-left">
                                <hr/>
                                <h5>Why Account Login?</h5>
                                <small>You are seeking to access information which is provided only to registered members. It takes less than a minute to register and access information on FRANCHISEBAZAR.</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
