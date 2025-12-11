@extends('home.home_master')


<div class="breadcrumb-wrapper light-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <h1 class="breadcrumb-title pb-0">Portfolio</h1>
            <div class="breadcrumb-menu-wrapper">
                <div class="breadcrumb-menu-wrap">
                    <div class="breadcrumb-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><img src="{{ asset('frontend/assets/images/blog/right-arrow.svg') }}" alt="right-arrow"></li>
                            <li aria-current="page">Portfolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb -->

@php
    $categories = App\Models\PortfolioCategory::all();
    $portfolios = App\Models\Portfolio::with('categories')->get();
@endphp

<div class="lonyo-section-padding9">
    <div class="container">

        <!-- Portfolio Filter Menu -->
        <div class="lonyo-portfolio-menu lonyo-section-title" data-aos="fade-up" data-aos-duration="500">
            <ul id="watch-filter-gallery" class="option-set clear-both" data-option-key="filter">
                <li class="wow fadeInUpX active" data-wow-delay="0.1s" data-option-value="*">All projects</li>
                @foreach($categories as $index => $category)
                    <li class="wow fadeInUpX" data-wow-delay="{{ 0.2 + $index * 0.1 }}s" 
                        data-option-value=".{{ Str::slug($category->name) }}">
                        {{ $category->name }}
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Portfolio Grid -->
        <div class="lonyo-portfolio-column" id="lonyo-portfolio-grid">
            @foreach ($portfolios as $portfolio)
                <div class="collection-grid-item
                    @foreach($portfolio->categories as $cat) {{ Str::slug($cat->name) }} @endforeach">
                    
                    <div class="lonyo-p-thumb" data-aos="fade-up" data-aos-duration="700">
                        <img class="w100" src="{{ $portfolio->image }}" alt="{{ $portfolio->title }}">
                        
                        <div class="lonyo-p-data-wrap">
                            <div class="lonyo-p-content">
                                <h4>{{ $portfolio->title }}</h4>
                                <ul>
                                    @foreach ($portfolio->categories as $cat)
                                        <li>
                                            <a href="#">{{ $cat->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="lonyo-p-title-btn">
                                <a class="title-btn" href="{{ route('portfolios.details', $portfolio->id) }}">
                                    Learn more
                                    <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.7796 8.53108L11.03 15.2807C10.8893 15.4214 10.6984 15.5005 10.4994 15.5005C10.3004 15.5005 10.1095 15.4214 9.96882 15.2807C9.8281 15.14 9.74904 14.9491 9.74904 14.7501C9.74904 14.5511 9.8281 14.3602 9.96882 14.2195L15.4388 8.75045H0.749958C0.551057 8.75045 0.360302 8.67143 0.219658 8.53079C0.0790134 8.39014 0 8.19939 0 8.00049C0 7.80159 0.0790134 7.61083 0.219658 7.47019C0.360302 7.32954 0.551057 7.25053 0.749958 7.25053H15.4388L9.96882 1.78146C9.8281 1.64074 9.74904 1.44988 9.74904 1.25086C9.74904 1.05185 9.8281 0.860991 9.96882 0.720268C10.1095 0.579545 10.3004 0.500488 10.4994 0.500488C10.6984 0.500488 10.8893 0.579545 11.03 0.720268L17.7796 7.46989C17.8494 7.53954 17.9047 7.62225 17.9424 7.7133C17.9802 7.80434 17.9996 7.90193 17.9996 8.00049C17.9996 8.09904 17.9802 8.19663 17.9424 8.28768C17.9047 8.37872 17.8494 8.46143 17.7796 8.53108Z" fill="#142D6F" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
<!-- end content -->

<div class="lonyo-content-shape">
    <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
</div>

@include('home.homelayout.cta')
<!-- end cta -->


