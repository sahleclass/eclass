@extends('theme2.master')
@section('title', "$cats->title")
@section('content')
@include('admin.message')
<!-- categories-tab start-->
<!-- <section id="categories-tab" class="categories-tab-main-block">
    <div class="container-xl">
        <div id="categories-tab-slider" class="categories-tab-block owl-carousel">
            @php
            $category = App\Categories::all();
            @endphp
            @foreach($category as $cat)
            @if($cat->status == 1)
            <div class="item categories-tab-dtl">
                <a href="{{ route('category.page',['id' => $cat->id, 'category' => str_slug(str_replace('-','&',$cat->slug))]) }}" title="tab"><i class="fa {{ $cat->icon }}"></i>{{ $cat->title }}</a>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section> -->
<!-- categories-tab end-->
@php
$gets = App\Breadcum::first();
@endphp

@if($gets['img'] !== NULL && $gets['img'] !== '')
<section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('{{ asset('/images/breadcum/'.$gets->img) }}')">
@else
<section class="breadcrumb-area d-flex  p-relative align-items-center" style="background-image: url('{{ asset('Avatar::create($gets->text)->toBase64() ') }}')">
@endif
<div class="overlay-bg"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 col-lg-12">
                <div class="breadcrumb-wrap text-left">
                    <div class="breadcrumb-title">
                        <h2>{{ $cats->title }}</h2>    
                        
                    </div>
                </div>
            </div>
            <div class="breadcrumb-wrap2">
                  
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $cats->title }}</li>
                        </ol>
                    </nav>
                </div>
            
        </div>
    </div>
</section>
<!-- category-title end -->
<!-- sub categories start -->
@if(isset($subcat))
<section id="categories" class="categories-main-block categories-main-block-one">
    <div class="container-xl">
        <h4 class="categories-heading">{{ __('SubCategories') }}</h4>
        <div class="row">
            @foreach($subcat as $cat)
            @if($cat->status == 1)
            <div class="col-lg-3 col-sm-6">
                <div class="categories-block">
                    <div class="categories-block-one">
                        <ul>
                            <li><a href="#" title="{{ $cat->title }}"><i class="fa {{ $cat->icon }}"></i>
                                </a></li>
                            <li><a href="{{ route('subcategory.page',['id' => $cat->id, 'category' => str_slug(str_replace('-','&',$cat->slug))]) }}">{{ $cat->title }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@elseif(isset($childcat))
<section id="categories" class="categories-main-block categories-main-block-one">
    <div class="container-xl">
        <h4 class="categories-heading">{{ __('SubCategories') }}</h4>
        <div class="row">

            @foreach($childcat as $cat)
            @if($cat->status == 1)
            <div class="col-lg-3 col-sm-6">
                <div class="categories-block">
                    <ul>
                        <li><a href="#" title="{{ $cat->title }}"><i class="fa {{ $cat->icon }}"></i>
                            </a></li>
                        <li><a href="{{ route('childcategory.page',['id' => $cat->id, 'category' => str_slug(str_replace('-','&',$cat->slug))]) }}">{{ $cat->title }}</a></li>
                    </ul>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
@else
<section id="categories" class="categories-main-block categories-main-block-one">
</section>
@endif
<!-- sub categories end -->
<!-- categories start -->
<section id="categories-popularity" class="categories-popularity-main-block category-filters">
    <div class="container-xl">
        <h4 class="btm-40">{{ $cats->title }} {{ __('Courses') }}</h4>

        <div class="row">

            <div class="col-md-6 col-sm-6">
                <div class="filter-dropdown catalog-main-block">
                    <ul>

                        @if(isset($subcat))

                        <li class="dropdown language-select dropdown-select-one">
                            <a href="#" data-toggle="dropdown" title="Duration" class="select">{{ __('Sort') }}<i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-one">
                                <li>
                                    <ul>
                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'a-z' ]) }}" title="A-Z">A-Z {{ __('Sort') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'z-a' ]) }}" title="Z-A">Z-A {{ __('Sort') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'newest' ]) }}" title="{{ __('Newest') }}">{{ __('Newest') }} </a></li>
                                        <br>
                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'featured' ]) }}" title="{{ __('Featured') }}">{{ __('Featured') }}</a></li>

                                        <br>
                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'l-h' ]) }}" title="{{ __('Low to High') }}"> {{ __('Low to High') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'h-l' ]) }}" title="{{ __('High to Low') }}"> {{ __('High to Low') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown language-select dropdown-select rgt-15 limit-dropdown">
                            <a href="#" data-toggle="dropdown" title="Ratings" class="select">{{ __('Limit') }}<i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>

                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '10' ]) }}" title="Highest Rated">{{ __('10') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '30' ]) }}" title="Highest Rated">{{ __('30') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '50' ]) }}" title="Highest Rated">{{ __('50') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('category.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '100' ]) }}" title="Highest Rated">{{ __('100') }}</a></li>
                                        <br>


                                    </ul>
                                </li>

                            </ul>
                        </li>

                        @elseif(isset($childcat))


                        <li class="dropdown language-select dropdown-select-one">
                            <a href="#" data-toggle="dropdown" title="Duration" class="select">{{ __('Sort') }}<i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-one">
                                <li>
                                    <ul>
                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'a-z' ]) }}" title="A-Z">{{ __('A-Z')}} {{ __('Sort') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'z-a' ]) }}" title="Z-A">{{ __('Z-A')}} {{ __('Sort') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'newest' ]) }}" title="{{ __('Newest') }}"> {{ __('Newest') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' =>str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'featured' ]) }}" title="{{ __('Featured') }}">{{ __('Featured') }}</a></li>

                                        <br>
                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'l-h' ]) }}" title="{{ __('Low to High') }}">{{ __('Low to High') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'h-l' ]) }}" title="{{ __('High to Low') }}">{{ __('High to Low') }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="dropdown language-select dropdown-select rgt-15 limit-dropdown">
                            <a href="#" data-toggle="dropdown" title="Ratings" class="select">{{ __('Limit') }}<i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>

                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '10' ]) }}" title="Highest Rated">{{ __('10') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '30' ]) }}" title="Highest Rated">{{ __('30') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '50' ]) }}" title="Highest Rated">{{ __('50') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('subcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '100' ]) }}" title="Highest Rated">{{ __('100') }}</a></li>
                                        <br>


                                    </ul>
                                </li>

                            </ul>
                        </li>

                        @else


                        <li class="dropdown language-select dropdown-select-one">
                            <a href="#" data-toggle="dropdown" title="Duration" class="select">{{ __('Sort') }}<i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu dropdown-menu-one">
                                <li>
                                    <ul>
                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'a-z' ]) }}" title="A-Z">{{ __('A-Z')}} {{ __('Sort') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'z-a' ]) }}" title="Z-A">{{ __('Z-A')}} {{ __('Sort') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'newest' ]) }}" title="{{ __('Newest') }}"> {{ __('Newest') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'featured' ]) }}" title="{{ __('Featured') }}">{{ __('Featured') }}</a></li>

                                        <br>
                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'l-h' ]) }}" title="{{ __('Low to High') }}">{{ __('Low to High') }}</a></li>
                                        <br>
                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'sortby' => 'h-l' ]) }}" title="{{ __('High to Low') }}">{{ __('High to Low') }}</a></li>

                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <li class="dropdown language-select dropdown-select rgt-15 limit-dropdown">
                            <a href="#" data-toggle="dropdown" title="Ratings" class="select">{{ __('Limit') }}<i class="fa fa-chevron-down lft-7"></i></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul>

                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '10' ]) }}" title="Highest Rated">{{ __('10') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '30' ]) }}" title="Highest Rated">{{ __('30') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '50' ]) }}" title="Highest Rated">{{ __('50') }}</a></li>
                                        <br>

                                        <li><a href="{{ route('childcategory.page',['id' => $cats->id, 'category' => str_slug(str_replace('-','&',$cats->slug)), 'limit' => '100' ]) }}" title="Highest Rated">{{ __('100') }}</a></li>
                                        <br>

                                    </ul>
                                </li>

                            </ul>
                        </li>

                        @endif

                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 ">

                @php
                $course_count = App\Course::where('status', '1')->count();
                @endphp

                <div class="text-right">
                    {{ __('Showing result')}} {{ $filter_count }} of {{ $filter_count }}
                </div>
                <div class="btn-group-web-screen">
                    <div class="btn-group float-right mt-2 mb-4">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label id="list" class="btn btn-outline-dark active">
                                <input type="radio" name="layout" id="layout1" checked> <i data-feather="list"></i>
                            </label>
                            <label id="grid" class="btn btn-outline-dark">
                                <input type="radio" name="layout" id="layout2"> <i data-feather="grid"></i>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

        </div>



        <div class="row">

            <div class="col-lg-3 col-md-4">

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" data-toggle="collapse" href="#collapseOne" data-closetxt="Stäng block" data-opentxt="Visa innehåll">
                            <a class="card-title">
                                {{ __('Categories') }}
                            </a>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="">
                            <div class="card-body">
                                <div class="wrapper-two center-block">
                                    @php
                                    $categories = App\Categories::orderBy('position','ASC')->get();
                                    @endphp
                                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                        @foreach($categories->where('status', '1') as $cate)
                                        <div class="panel panel-default">
                                            <div class="panel-heading active" role="tab" id="headingOnexxx">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOnexxx{{ $cate->id }}" aria-expanded="false" aria-controls="collapseOnexxx">
                                                        <label class="prime-cat" data-url="{{ route('category.page',['id' => $cate->id, 'category' => str_slug(str_replace('-','&',$cate->slug))]) }}">{{ str_limit($cate->title, $limit = 20, $end = '..') }}</label>
                                                    </a>
                                                </h4>
                                            </div>


                                            <div id="collapseOnexxx{{ $cate->id }}" class="subcate-collapse panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOnexxx">
                                                @foreach($cate->subcategory as $sub)
                                                @if($sub->status ==1)
                                                <div class="panel-body">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingelevenxxx">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseelevenxxx{{ $sub->id }}" aria-expanded="false" aria-controls="collapseelevenxxx">
                                                                    <label class="sub-cate" data-url="{{ route('subcategory.page',['id' => $sub->id, 'category' => str_slug(str_replace('-','&',$sub->slug))]) }}">{{ str_limit($sub->title, $limit = 15, $end = '..') }}</label>

                                                                </a>
                                                            </h4>
                                                        </div>

                                                        <div id="collapseelevenxxx{{ $sub->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingelevenxxx">
                                                            @foreach($sub->childcategory as $child)
                                                            @if($child->status ==1)
                                                            <div class="panel-body sub-cat">
                                                                <label class="child-cate" data-url="{{ route('childcategory.page',['id' => $child->id, 'category' => str_slug(str_replace('-','&',$child->slug))]) }}">{{ $child->title }} </label>
                                                            </div>
                                                            @endif
                                                            @endforeach
                                                        </div>

                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>

                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo" data-closetxt="Stäng block" data-opentxt="Visa innehåll">
                            <a class="card-title">
                                {{ __('Price') }}
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse show" data-parent="">
                            <div class="card-body">
                                <div class="categories-tags">
                                    <div class="categories-content-one">
                                        <div class="categories-tags-content-one">
                                            <ul>
                                                <li>
                                                    <div class="form-check form-check-inline">
                                                        <input {{ app('request')->input('type') == 'paid' ? 'checked' : '' }} class="form-check-input type" type="radio" name="type" id="flexRadioDefaultpaid" value="paid">
                                                        <label class="form-check-label active" for="inlineCheckboxpaid">{{ __('Paid') }}</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-check form-check-inline">
                                                        <input {{ app('request')->input('type') == 'free' ? 'checked' : '' }} class="form-check-input type" type="radio" name="type" id="flexRadioDefaultfree" value="free">
                                                        <label class="form-check-label" for="inlineCheckboxfree">{{ __('Free') }}</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo" data-closetxt="Stäng block" data-opentxt="Visa innehåll">
                            <a class="card-title">
                                {{ __('Languages') }}
                            </a>
                        </div>
                        <div id="collapseTwo" class="collapse show" data-parent="">
                            <div class="card-body">
                                <div class="categories-tags">
                                    <div class="categories-content-one">
                                        <div class="categories-tags-content-one">
                                            @php
                                            $CourseLanguage = App\CourseLanguage::get();
                                            @endphp
                                            @foreach($CourseLanguage as $lang)
                                            <ul>
                                                <li>
                                                    <div class="form-check form-check-inline">
                                                        <input {{ app('request')->input('lang') == $lang->id ? 'checked' : '' }} class="form-check-input lang" type="radio" name="lang" id="flexRadioDefault{{ $lang->id }}" value="{{ $lang->id }}">
                                                        <label class="form-check-label" for="inlineCheckbox{{ $lang->id }}">{{ $lang->name }}</label>
                                                    </div>
                                                </li>
                                            </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div id="posts" class="students-bought btm-30">
                    <div class="row">
                        @php
                        $test = count($courses);
                        
                        @endphp
                        @if($test != 0)
                        @foreach($courses as $course)
                        @if($course->country != '')
                        @if( !in_array($usercountry, $course->country) )
                        <div class="item col-lg-12 col-12">
                            <div class="course-bought-block protip courses-item mb-30 hover-zoomin course-item-main-block" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$course->id}}">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 course-bought-block-one ">
                                        <div class="thumb fix ">
                                            @if($course['preview_image'] !== NULL && $course['preview_image'] !== '')
                                            <a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}"><img src="{{ asset('images/course/'.$course->preview_image) }}" alt="course" class="img-fluid"></a>
                                            @else
                                            <a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}"><img src="{{ Avatar::create($course->title)->toBase64() }}" alt="course" class="img-fluid"></a>
                                            @endif
                                            @if($course['level_tags'] == !NULL)
                                            <div class="best-seller best-seller-one">{{ $course['level_tags'] }}</div>
                                            @endif
                                            <div class="courses-icon">
                                                <div class="protip-wishlist">
                                                    <ul>

                                                        <li class="protip-wish-btn"><a href="#" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                        @if(Auth::check())

                                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($course->id)}}" title="compare"><i data-feather="bar-chart"></i></a></li>

                                                        @php
                                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                                        @endphp
                                                        @if ($wish == NULL)
                                                        <li class="protip-wish-btn">
                                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $course->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                                {{ csrf_field() }}

                                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                                <input type="hidden" name="course_id" value="{{$course->id}}" />

                                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        @else
                                                        <li class="protip-wish-btn-two">
                                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $course->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                                {{ csrf_field() }}

                                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                                <input type="hidden" name="course_id" value="{{$course->id}}" />

                                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        @endif
                                                        @else
                                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6 categories-popularity-dtl-block">
                                        <div class="categories-popularity-dtl courses-content">
                                            <div class="view-user-img d-none">
                                                <a href="{{ route('all/profile',$course->user->id) }}" title="{{ optional($course->user)['fname'] }}">
                                                    @if($course->user['user_img'] !== NULL && $course->user['user_img'] !== '')
                                                    <img src="{{ asset('images/user_img/'.$course->user['user_img']) }}" class="img-fluid user-img-one" alt="">
                                                    @else
                                                    <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="img">
                                                    @endif
                                                </a>                  
                                            </div>   
                                            <h3><a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}">{{ str_limit($course->title, $limit = 18, $end = '..') }}</a></h3>
                                            <ul>

                                                <li>
                                                    <i data-feather="play-circle"></i>
                                                    <div class="class-des">
                                                        @php
                                                        $data = App\CourseClass::where('course_id', $course->id)->count();
                                                        if($data>0){

                                                        echo $data;
                                                        }
                                                        else{

                                                        echo "0";
                                                        }
                                                        @endphp {{ __('Classes') }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <i data-feather="clock"></i>
                                                    <div class="time-des">


                                                        <span class="">
                                                            @php
                                                            $classtwo = App\CourseClass::where('course_id', $course->id)->sum("duration");

                                                            @endphp
                                                            {{ $classtwo }} {{ __('Minutes')}}
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i data-feather="user"></i>
                                                    <div class="student-des">
                                                        @php
                                                        $enroll = App\Order::where('course_id', $course->id)->count();
                                                        if($enroll>0){

                                                        echo $enroll;
                                                        }
                                                        else{

                                                        echo "0";
                                                        }



                                                        @endphp {{ __('Students') }}
                                                    </div>
                                                </li>
                                                <li>
                                                    @if(isset($course->level_tags))
                                                    <i data-feather="align-justify"></i>
                                                    <div class="all-levels-des">
                                                        {{ optional($course)->level_tags }}
                                                    </div>
                                                    @endif
                                                </li>
                                            </ul>
                                            <p class="mb-0">{{ str_limit($course->short_detail, $limit = 125, $end = '..') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 course-rate-block">
                                         
                                        <div class="cat">
                                            <div class="rate text-right">
                                                <ul>
                                                    @if($course->type == 1)

                                                    @if($course->discount_price == !NULL)

                                                    <li><a><b>{{ currency($course->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}</b></a></li>
                                                    <li><a><b><strike>{{ currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}</strike></b></a></li>

                                                    @else
                                                    @if($course->price == !NULL)
                                                    <li><a><b>{{ currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}</b></a></li>
                                                    @endif

                                                    @endif
                                                    @else
                                                    <li><a><b>{{ __('Free') }}</b></a></li>
                                                    @endif
                                                </ul>
                                                <!-- <div class="rating">
                                                    <ul>
                                                        <li>
                                                            <?php
                                                            $learn = 0;
                                                            $price = 0;
                                                            $value = 0;
                                                            $sub_total = 0;
                                                            $sub_total = 0;
                                                            $reviews = App\ReviewRating::where('course_id', $course->id)->where('status', '1')->get();
                                                            ?>
                                                            @if(!empty($reviews[0]))
                                                            <?php
                                                            $count =  App\ReviewRating::where('course_id', $course->id)->count();

                                                            foreach ($reviews as $review) {
                                                                $learn = $review->price * 5;
                                                                $price = $review->price * 5;
                                                                $value = $review->value * 5;
                                                                $sub_total = $sub_total + $learn + $price + $value;
                                                            }

                                                            $count = ($count * 3) * 5;
                                                            $rat = $sub_total / $count;
                                                            $ratings_var = ($rat * 100) / 5;
                                                            ?>

                                                            <div class="pull-left">
                                                                <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                                </div>
                                                            </div>


                                                            @else
                                                            <div class="pull-left">
                                                                <p>{{ __('No Rating') }}</p>
                                                            </div>
                                                            @endif
                                                        </li>
                                                        <?php
                                                        $learn = 0;
                                                        $price = 0;
                                                        $value = 0;
                                                        $sub_total = 0;
                                                        $count =  count($reviews);
                                                        $onlyrev = array();

                                                        $reviewcount = App\ReviewRating::where('course_id', $course->id)->where('status', "1")->WhereNotNull('review')->get();

                                                        foreach ($reviews as $review) {

                                                            $learn = $review->learn * 5;
                                                            $price = $review->price * 5;
                                                            $value = $review->value * 5;
                                                            $sub_total = $sub_total + $learn + $price + $value;
                                                        }

                                                        $count = ($count * 3) * 5;

                                                        if ($count != ""  && $count != '0') {
                                                            $rat = $sub_total / $count;

                                                            $ratings_var = ($rat * 100) / 5;

                                                            $overallrating = ($ratings_var / 2) / 10;
                                                        }

                                                        ?>

                                                        @php
                                                        $reviewsrating = App\ReviewRating::where('course_id', $course->id)->first();
                                                        @endphp
                                                        <li class="reviews">
                                                            (@php
                                                            $data = App\ReviewRating::where('course_id', $course->id)->count();
                                                            if($data>0){

                                                            echo $data;
                                                            }
                                                            else{

                                                            echo "0";
                                                            }
                                                            @endphp Reviews)
                                                        </li>
                                                    </ul>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @else

                        <div class="item col-12">
                            <div class="course-bought-block protip courses-item mb-30 hover-zoomin course-item-main-block" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block{{$course->id}}">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 course-bought-block-one ">
                                        <div class="thumb fix ">
                                            @if($course['preview_image'] !== NULL && $course['preview_image'] !== '')
                                            <a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}"><img src="{{ asset('images/course/'.$course->preview_image) }}" alt="course" class="img-fluid"></a>
                                            @else
                                            <a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}"><img src="{{ Avatar::create($course->title)->toBase64() }}" alt="course" class="img-fluid"></a>
                                            @endif
                                            @if($course['level_tags'] == !NULL)
                                            <div class="best-seller best-seller-one">{{ $course['level_tags'] }}</div>
                                            @endif
                                            <div class="courses-icon">
                                                <div class="protip-wishlist">
                                                    <ul>

                                                        <li class="protip-wish-btn"><a href="#" target="__blank" title="reminder"><i data-feather="bell"></i></a></li>

                                                        @if(Auth::check())

                                                        <li class="protip-wish-btn"><a class="compare" data-id="{{filter_var($course->id)}}" title="compare"><i data-feather="bar-chart"></i></a></li>

                                                        @php
                                                        $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $course->id)->first();
                                                        @endphp
                                                        @if ($wish == NULL)
                                                        <li class="protip-wish-btn">
                                                            <form id="demo-form2" method="post" action="{{ url('show/wishlist', $course->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                                {{ csrf_field() }}

                                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                                <input type="hidden" name="course_id" value="{{$course->id}}" />

                                                                <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        @else
                                                        <li class="protip-wish-btn-two">
                                                            <form id="demo-form2" method="post" action="{{ url('remove/wishlist', $course->id) }}" data-parsley-validate class="form-horizontal form-label-left">
                                                                {{ csrf_field() }}

                                                                <input type="hidden" name="user_id" value="{{Auth::User()->id}}" />
                                                                <input type="hidden" name="course_id" value="{{$course->id}}" />

                                                                <button class="wishlisht-btn heart-fill" title="Remove from Wishlist" type="submit"><i data-feather="heart"></i></button>
                                                            </form>
                                                        </li>
                                                        @endif
                                                        @else
                                                        <li class="protip-wish-btn"><a href="{{ route('login') }}" title="heart"><i data-feather="heart"></i></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6 categories-popularity-dtl-block">
                                        <div class="categories-popularity-dtl courses-content">
                                            <div class="view-user-img d-none">
                                                <a href="{{ route('all/profile',$course->user->id) }}" title="{{ optional($course->user)['fname'] }}">
                                                    @if($course->user['user_img'] !== NULL && $course->user['user_img'] !== '')
                                                    <img src="{{ asset('images/user_img/'.$course->user['user_img']) }}" class="img-fluid user-img-one" alt="">
                                                    @else
                                                    <img src="{{ Avatar::create($course->title)->toBase64() }}" alt="img">
                                                    @endif
                                                </a>                  
                                            </div>   
                                            <h3><a href="{{ route('user.course.show',['id' => $course->id, 'slug' => $course->slug ]) }}">{{ str_limit($course->title, $limit = 18, $end = '..') }}</a></h3>
                                            <ul>

                                                <li>
                                                    <i data-feather="play-circle"></i>
                                                    <div class="class-des">
                                                        @php
                                                        $data = App\CourseClass::where('course_id', $course->id)->count();
                                                        if($data>0){

                                                        echo $data;
                                                        }
                                                        else{

                                                        echo "0";
                                                        }
                                                        @endphp {{ __('Classes') }}
                                                    </div>
                                                </li>
                                                <li>
                                                    <i data-feather="clock"></i>
                                                    <div class="time-des">


                                                        <span class="">
                                                            @php
                                                            $classtwo = App\CourseClass::where('course_id', $course->id)->sum("duration");

                                                            @endphp
                                                            {{ $classtwo }} {{ __('Minutes')}}
                                                        </span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <i data-feather="user"></i>
                                                    <div class="student-des">
                                                        @php
                                                        $enroll = App\Order::where('course_id', $course->id)->count();
                                                        if($enroll>0){

                                                        echo $enroll;
                                                        }
                                                        else{

                                                        echo "0";
                                                        }



                                                        @endphp {{ __('Students') }}
                                                    </div>
                                                </li>
                                                <li>
                                                    @if(isset($course->level_tags))
                                                    <i data-feather="align-justify"></i>
                                                    <div class="all-levels-des">
                                                        {{ optional($course)->level_tags }}
                                                    </div>
                                                    @endif
                                                </li>
                                            </ul>
                                            <p class="mb-0">{{ str_limit($course->short_detail, $limit = 125, $end = '..') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-3 course-rate-block">
                                         
                                        <div class="cat">
                                            <div class="rate text-right">
                                                <ul>
                                                    @if($course->type == 1)

                                                    @if($course->discount_price == !NULL)

                                                    <li><a><b>{{ currency($course->discount_price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}</b></a></li>
                                                    <li><a><b><strike>{{ currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}</strike></b></a></li>

                                                    @else
                                                    @if($course->price == !NULL)
                                                    <li><a><b>{{ currency($course->price, $from = $currency->code, $to = Session::has('changed_currency') ? Session::get('changed_currency') : $currency->code, $format = true) }}</b></a></li>
                                                    @endif

                                                    @endif
                                                    @else
                                                    <li><a><b>{{ __('Free') }}</b></a></li>
                                                    @endif
                                                </ul>
                                                <!-- <div class="rating">
                                                    <ul>
                                                        <li>
                                                            <?php
                                                            $learn = 0;
                                                            $price = 0;
                                                            $value = 0;
                                                            $sub_total = 0;
                                                            $sub_total = 0;
                                                            $reviews = App\ReviewRating::where('course_id', $course->id)->where('status', '1')->get();
                                                            ?>
                                                            @if(!empty($reviews[0]))
                                                            <?php
                                                            $count =  App\ReviewRating::where('course_id', $course->id)->count();

                                                            foreach ($reviews as $review) {
                                                                $learn = $review->price * 5;
                                                                $price = $review->price * 5;
                                                                $value = $review->value * 5;
                                                                $sub_total = $sub_total + $learn + $price + $value;
                                                            }

                                                            $count = ($count * 3) * 5;
                                                            $rat = $sub_total / $count;
                                                            $ratings_var = ($rat * 100) / 5;
                                                            ?>

                                                            <div class="pull-left">
                                                                <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                                </div>
                                                            </div>


                                                            @else
                                                            <div class="pull-left">
                                                                <p>{{ __('No Rating') }}</p>
                                                            </div>
                                                            @endif
                                                        </li>
                                                        <?php
                                                        $learn = 0;
                                                        $price = 0;
                                                        $value = 0;
                                                        $sub_total = 0;
                                                        $count =  count($reviews);
                                                        $onlyrev = array();

                                                        $reviewcount = App\ReviewRating::where('course_id', $course->id)->where('status', "1")->WhereNotNull('review')->get();

                                                        foreach ($reviews as $review) {

                                                            $learn = $review->learn * 5;
                                                            $price = $review->price * 5;
                                                            $value = $review->value * 5;
                                                            $sub_total = $sub_total + $learn + $price + $value;
                                                        }

                                                        $count = ($count * 3) * 5;

                                                        if ($count != ""  && $count != '0') {
                                                            $rat = $sub_total / $count;

                                                            $ratings_var = ($rat * 100) / 5;

                                                            $overallrating = ($ratings_var / 2) / 10;
                                                        }

                                                        ?>

                                                        @php
                                                        $reviewsrating = App\ReviewRating::where('course_id', $course->id)->first();
                                                        @endphp
                                                        <li class="reviews">
                                                            (@php
                                                            $data = App\ReviewRating::where('course_id', $course->id)->count();
                                                            if($data>0){

                                                            echo $data;
                                                            }
                                                            else{

                                                            echo "0";
                                                            }
                                                            @endphp Reviews)
                                                        </li>
                                                    </ul>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endif

                        @endforeach
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="top-20">{!! $courses->appends(Request::except('page'))->links() !!}</a></li>
                            </ul>
                        </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- categories end -->
@endsection
@section('custom-script')
<script type="text/javascript">
    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };


    $('.type').on('click', function() {
        if ($(this).is(':checked')) {
            var type = $(this).val();

            var exist = window.location.href;
            var url = new URL(exist);
            var query_string = url.search;
            var search_params = new URLSearchParams(query_string);
            search_params.set('type', type);
            url.search = search_params.toString();
            var new_url = url.toString();
            window.history.pushState('page2', 'Title', new_url);

        } else {
            var element = '&type=' + getUrlParameter('type');
            var exist = window.location.href;
            var new_url = exist.replace(element, '');
            window.history.pushState('page2', 'Title', new_url);
        }

        location.reload();

    });


    $('.lang').on('click', function() {
        if ($(this).is(':checked')) {
            var type = $(this).val();

            var exist = window.location.href;
            var url = new URL(exist);
            var query_string = url.search;
            var search_params = new URLSearchParams(query_string);
            search_params.set('lang', type);
            url.search = search_params.toString();
            var new_url = url.toString();
            window.history.pushState('page2', 'Title', new_url);

        } else {
            var element = '&lang=' + getUrlParameter('lang');
            var exist = window.location.href;
            var new_url = exist.replace(element, '');
            window.history.pushState('page2', 'Title', new_url);
        }

        location.reload();

    });
</script>
@endsection