@extends('theme2.master')
@section('title', 'Test Series')
@section('content')
@include('admin.message')
<!-- blog end -->
@php
   $gets = App\Breadcum::first();
   @endphp
   
   
     <!-- breadcrumb-area-end -->   
      <!-- inner-blog -->
      @if (isset($testSeries))
          
      @endif
     
 <section class="courses pt-120 pb-60 p-relative fix">
    <div class="animations-01"><img src="{{url('frontcss/img/bg/an-img-03.png')}}" alt="an-img-01')}}"></div>
    <div class="container">
        <div class="row">   
            <div class="col-lg-12 p-relative">
                <div class="section-title center-align mb-50 wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h5 class="text-center"><i class="fal fa-graduation-cap"></i> {{__('Test Series')}}</h5>
                    <h2 class="text-center">
                        {{__('Test Series')}}
                    </h2>                             
                </div>
            </div>
        </div>
        <div class="row">  
            @foreach($cors as $c)
            @if($c->status == 1 && $c->featured == 1)   
                <div class="col-lg-3 col-md-3" style="height:415px;">
                <div class="courses-item mb-30 hover-zoomin @if($gsetting['course_hover'] == 1) protip @endif">
                
                    <div class="thumb fix ">
                        @if($c['preview_image'] !== NULL && $c['preview_image'] !== '0')
                        <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img src="{{ asset('images/course/'.$c['preview_image']) }}" alt="contact-bg-an-01"></a>
                        @else
                        <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"><img src="{{ Avatar::create($c->title)->toBase64() }}" alt="contact-bg-an-01"></a>
                        @endif
                            
                        <div class="courses-icon">
                            <ul>
                                <li class="protip-wish-btn"><a
                                        href="https://calendar.google.com/calendar/r/eventedit?text={{ $c['title'] }}"
                                        target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                        @if (Auth::check())
                                        <li class="protip-wish-btn">
                                            <a class="compare" data-id="{{ filter_var($c->id) }}" title="compare">
                                                <i data-feather="bar-chart"></i>
                                            </a>
                                        </li>
                                 

                                @php
                                $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id',
                                $c->id)->first();
                                @endphp
                                @if ($wish == NULL)
                                <li class="protip-wish-btn">
                                    <form id="demo-form2" method="post"
                                        action="{{ url('show/wishlist', $c->id) }}" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                        <input type="hidden" name="course_id" value="{{$c->id}}" />

                                        <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i
                                                data-feather="heart"></i></button>
                                    </form>
                                </li>
                                @else
                                <li class="protip-wish-btn-two heart-fill">
                                    <form id="demo-form2" method="post"
                                        action="{{ url('remove/wishlist', $c->id) }}" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        {{ csrf_field() }}

                                        <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                        <input type="hidden" name="course_id" value="{{$c->id}}" />

                                        <button class="wishlisht-btn" title="Remove from Wishlist"
                                            type="submit"><i data-feather="heart"></i></button>
                                    </form>
                                </li>
                                @endif
                                @else
                                <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i
                                            data-feather="heart"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- @if(isset($c->discount_price))
                    <div class="badges bg-priamry offer-badge"><span>{{__('OFF')}}<span></span></span></div>
                    @endif -->
                    <div class="courses-content" style="height:265px">    
                        <div class="view-user-img">
                            <a href="{{ route('all/profile',$c->user->id) }}" title="{{ optional($c->user)['fname'] }}">
                                @if($c->user['user_img'] !== NULL && $c->user['user_img'] !== '')
                                <img src="{{ asset('images/user_img/'.$c->user['user_img']) }}" class="img-fluid user-img-one" alt="">
                                @else
                                <img src="{{ Avatar::create($c->title)->toBase64() }}" alt="img">
                                @endif
                            </a>
                                                     
                        </div>                                
                        <div class="cat">
                            <div class="rate text-right">
                                <ul>
                                    @if($c->type == 1)
                                                    @if($c->discount_price != NULL)
                                                        <li><a><b>{{ activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : '' }}{{ price_format(currency($c['discount_price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }} {{ activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : '' }}</b></a></li>
                                                        <li><a><b><strike>{{ activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : '' }}{{ price_format(currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }}{{ activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : '' }}</strike></b></a></li>
                                                    @elseif($c->price != NULL)
                                                        <li><a><b>{{ activeCurrency()->getData()->position == 'l' ? activeCurrency()->getData()->symbol : '' }}{{ price_format(currency($c['price'], $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = false)) }}{{ activeCurrency()->getData()->position == 'r' ? activeCurrency()->getData()->symbol : '' }}</b></a></li>
                                                    @endif
                                                @else
                                                    <li><a><b>{{ __('Free') }}</b></a></li>
                                                @endif
                                </ul>
                            </div>
                        </div>
                        <h4><a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}"> {{ str_limit(preg_replace("/\r\n|\r|\n/",'',strip_tags(html_entity_decode($c->title))) , $limit = 70, $end = '...') }}</a></h4>
                            <p>{{$c->category['title'] ?? '-'}}
                        <a href="{{ route('user.course.show',['id' => $c->id, 'slug' => $c->slug ]) }}" class="readmore">{{__('Read More ')}}<i class="fal fa-long-arrow-right"></i></a>
                    </div>
                    <div class="icon">
                        <img src="{{ url('frontcss/img/icon/cou-icon.png') }}" alt="img">
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div><br>
    </div>
</section>
 @endsection