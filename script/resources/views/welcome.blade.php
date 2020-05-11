<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset($query->favicon) }}">
  {!! SEO::generate() !!}

  <!-- CSS here -->
  <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/default.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
  {!! $script->css !!}
</head>

<body>
      <!--[if lte IE 9]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- loader seaction start -->
        <section class="loading_bar">
          <div class="load">
            <div class="fusion-slider-loading">
            </div>
            <div>
              <h3 class="install-info">{{ __('Please Wait..') }}</h3>
            </div>
          </div>
        </section>
        <!-- loader seaction start -->

        <!-- report area start -->
        <section>
          <div class="report-area">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-9 map-area">
                  <div id="contact-map"></div>
                </div>
                <div class="col-lg-3 report-area">
                  <div class="coronavirus-total-info">
                    <div class="logo text-center">
                      <img src="{{ asset($query->logo) }}">
                    </div>
                    <div class="Totalcases-caces text-center">
                      <h2 id="Totalcases" class="text-white"></h2>
                    </div>
                    <div class="coronavirus-total-country-info d-flex justify-content-center">
                      <div class="single-total-country-info">
                        <h4 id="death"></h4>
                        <p >{{ __('DEATHS') }}</p>
                      </div>
                      <div class="single-total-country-info">
                        <h4 id="Toatalrecovered"></h4>
                        <p >{{ __('RECOVERIES') }}</p>
                      </div>
                      <div class="single-total-country-info">
                        <h4 id="active"></h4>
                        <p>{{ __('ACTIVE CASES') }}</p>
                      </div>
                    </div>
                  </div>
                  <div class="all-country-list">
                    <div class="country_search">
                      <input type="text" id="search_country" class="form-control" placeholder="Enter Country Name....">
                    </div>
                    <div class="country-list" id="country-list">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- report area end -->
        <input type="hidden" id="country_link" value="{{ route('country.report') }}">
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content custom-modal-content hide_class">
             <div class="modal-header">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
             </div>
              <div class="loader_country">
                <div class="fusion-slider-loading"></div>
                <h3 class="pt-80">{{ __('Please Wait...') }}</h3></div>
                <div class="main_widget">
                  <div class="country-name1 text-center pt-20">
                    <h2 id="country"></h2>
                  </div>

                  <div class="text-center pb-30">{!!  $info->adds !!}</div>
                 
                  <div class="info-covid mb-15">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-3 mb-30">
                          <div class="single-covid-widget">
                            <div class="single-covid-info">
                              <h3 id="cases"></h3>
                              <span>{{ __('Total Cases') }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                          <div class="single-covid-widget">
                            <div class="single-covid-info">
                              <h3 id="today"></h3>
                              <span>{{ __('Todays Cases') }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                          <div class="single-covid-widget">
                            <div class="single-covid-info">
                              <h3 id="deaths"></h3>
                              <span>{{ __('Deaths') }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                          <div class="single-covid-widget">
                            <div class="single-covid-info">
                              <h3 id="todayDeaths"></h3>
                              <span>{{ __('Today Deaths') }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                          <div class="single-covid-widget">
                            <div class="single-covid-info">
                              <h3 id="recovered"></h3>
                              <span>{{ __('Recoveries') }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                          <div class="single-covid-widget">
                            <div class="single-covid-info">
                              <h3 id="activecases"></h3>
                              <span>{{ __('Active Cases') }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                          <div class="single-covid-widget">
                            <div class="single-covid-info">
                              <h3 id="critical"></h3>
                              <span>{{ __('Critical') }}</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3 mb-30">
                         <div class="single-covid-widget">
                          <div class="single-covid-info">
                            <h3 id="casesPerOneMillion"></h3>
                            <span>{{ __('Cases Per One Million') }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 mb-30 pl-20">
                       <div class="single-covid-widget">
                        <div class="single-covid-info">
                          <h3 id="deathsPerOneMillion"></h3>
                          <span>{{ __('Deaths Per One Million') }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 mb-30">
                     <div class="single-covid-widget">
                      <div class="single-covid-info">
                        <h3 id="tests"></h3>
                        <span>{{ __('Tests') }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 mb-30">
                   <div class="single-covid-widget">
                    <div class="single-covid-info">
                      <h3 id="testsPerOneMillion"></h3>
                      <span>{{ __('Tests Per One Million') }}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="currenturl" value="{{ url('/') }}">
  <input type="hidden" id="zoom" value="{{ $info->zoom }}">
  <input type="hidden" id="center_lat" value="{{ $info->center_lat }}">
  <input type="hidden" id="center_lng" value="{{ $info->center_lng }}">
  <!-- JS here -->
  <script src="{{ asset('frontend/js/vendor/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
  <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/js/jquery.nicescroll.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key={{ $info->api }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  
  {!! $script->js !!}
  
</body>

</html>