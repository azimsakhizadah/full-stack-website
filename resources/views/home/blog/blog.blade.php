@extends('home.home_master')

@section('home')
<!-- Breadcrumb -->
<div class="breadcrumb-wrapper light-bg">
    <div class="container">
        <div class="breadcrumb-content">
            <h1 class="breadcrumb-title pb-0">Blog</h1>
            <div class="breadcrumb-menu-wrapper">
                <div class="breadcrumb-menu-wrap">
                    <div class="breadcrumb-menu">
                        <ul>
                            <li><a href="{{ route('home') }}">Home</a></li>
                            <li><img src="{{ asset('frontend/assets/images/blog/right-arrow.svg') }}" alt="right-arrow"></li>
                            <li aria-current="page">Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumb -->

@php
    use App\Models\Post;
    use App\Models\PostCategory;

    // Paginated posts for main blog list
    $posts = Post::latest()->paginate(6);

    // Categories with post count
    $categories = PostCategory::withCount('posts')->get();

    // Recent posts (latest 5)
    $recentPosts = Post::latest()->take(5)->get();
@endphp

<div class="lonyo-section-padding9 overflow-hidden">
    <div class="container">
        <div class="row">
            <!-- Blog Posts -->
            <div class="col-lg-8">
                @foreach ($posts as $post)
                    <div class="lonyo-blog-wrap" data-aos="fade-up" data-aos-duration="500">
                        <div class="lonyo-blog-thumb">
                            <img src="{{ asset($post->feature_image ?? 'frontend/assets/images/logo/bastan.svg') }}" alt="{{ $post->title }}">
                        </div>
                        <div class="lonyo-blog-meta">
                            <ul>
                                <li>
                                    <a href="{{ route('single.blog', $post->slug) }}">
                                        <img src="{{ asset('frontend/assets/images/blog/date.svg') }}" alt=""> {{ $post->created_at->format('M d, Y') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('single.blog', $post->slug) }}">
                                        <img src="{{ asset('frontend/assets/images/blog/clock.svg') }}" alt=""> 5 min read
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="lonyo-blog-content">
                            <h2><a href="{{ route('single.blog', $post->slug) }}">{{ $post->title }}</a></h2>
                            <p>{{ Str::limit(strip_tags($post->content), 200) }}</p>
                        </div>
                        <div class="lonyo-blog-btn">
                            <a href="{{ route('single.blog', $post->slug) }}" class="lonyo-default-btn blog-btn">continue reading</a>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="lonyo-blog-sidebar" data-aos="fade-left" data-aos-duration="700">

                    <!-- Search -->
                    <div class="lonyo-blog-widgets">
                        <form action="{{ route('blog.search') }}" method="GET">
                            <div class="lonyo-search-box">
                                <input type="search" name="query" placeholder="Type keyword here" value="{{ request('query') }}">
                                <button id="lonyo-search-btn" type="submit"><i class="ri-search-line"></i></button>
                            </div>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="lonyo-blog-widgets">
                        <h4>Categories:</h4>
                        <div class="lonyo-blog-categorie">
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('blog.category', $category->id) }}">
                                            {{ $category->name }} <span>{{ $category->posts_count }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Recent Posts -->
                    <div class="lonyo-blog-widgets">
                        <h4>Recent Posts</h4>
                        @foreach ($recentPosts as $recent)
                            <a class="lonyo-blog-recent-post-item" href="{{ route('single.blog', $recent->slug) }}">
                                <div class="lonyo-blog-recent-post-thumb">
                                    <img src="{{ asset($recent->feature_image ?? 'frontend/assets/images/logo/bastan.svg') }}" alt="{{ $recent->title }}">
                                </div>
                                <div class="lonyo-blog-recent-post-data">
                                    <ul>
                                        <li>
                                            <img src="{{ asset('frontend/assets/images/blog/date.svg') }}" alt=""> {{ $recent->created_at->format('M d, Y') }}
                                        </li>
                                    </ul>
                                    <div>
                                        <h4>{{ Str::limit($recent->title, 40) }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <!-- Tags -->
                    <div class="lonyo-blog-widgets">
                        <h4>Tags</h4>
                        <div class="lonyo-blog-tags">
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('blog.category', $category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Blog -->

<div class="lonyo-content-shape">
    <img src="{{ asset('frontend/assets/images/shape/shape2.svg') }}" alt="">
</div>

@include('home.homelayout.cta')
@endsection
