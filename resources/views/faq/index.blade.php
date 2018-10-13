<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

	<title>FAQ</title>
</head>
<body>
<header>
	<h1>FAQ</h1>
	<h3>Frequently Asked Questions</h3>
</header>
<section class="cd-faq">
	<ul class="cd-faq-categories">
	@foreach($categories as $category)
	@if($category->question()->where('published', 1)->count())
		<li><a class="selected" href="{{ $category->category }}">{{ $category->category }}</a></li>
    @endif
    @endforeach
	</ul><!-- cd-faq-categories -->
	<div class="cd-faq-items">	
        <div>
            <button style="background:#4E5359; padding:18px 40px; border:none;">
                <a href="{{ route('faq.create') }}" style="color:#fff">Add Question</a>
            </button>
                                                  
        <!-- Authentication Links -->
        @guest
            <button style="background:#4E5359; padding:18px 40px; border:none; float:right">
                <a class="nav-link" href="{{ route('login') }}" style="color:#fff">Login</a>
            </button>
        @else
            <button style="background:#4E5359; color:#fff; padding:18px 40px; border:none; float:right">
                <a class="dropdown-item" href="{{ route('logout') }}" style="color:#fff"
                   onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </button>
        @endguest
        </div>   
        
        @foreach($categories as $category)
        @if($category->question()->where('published', 1)->count())
            <ul id="{{ $category->category }}" class="cd-faq-group">
                <li class="cd-faq-title"><h2>{{ $category->category }}</h2></li>
                
                @foreach($questions as $question)
                @if($question->category_id == $category->id)
                @if($question->published == 1)
                @if($question->answer == true)
                                               
                <li>
                    <a class="cd-faq-trigger" href="#0">{{ $question->question }}</a>
                    <div class="cd-faq-content">                   
                        <p>{{ $question->answer }}</p>                   
                    </div> <!-- cd-faq-content -->
                </li>
                @endif
                @endif
                @endif
        @endforeach		
       
		</ul> <!-- cd-faq-group -->
		@endif
		@endforeach
	</div> <!-- cd-faq-items -->
	<a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq <-->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ asset('js/jquery.mobile.custom.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>