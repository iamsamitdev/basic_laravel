<p>ISBN</p>
<h2>{{$data_book->isbn}}</h2>

<p>Book name</p>
<h2>{{$data_book->title}}</h2>

<p>Auther</p>
<h2>{{$data_book->auther}}</h2>

<p>Publisther</p>
<h2>{{$data_book->publisher}}</h2>

<p>Cover</p>
<p><img src="{{asset('resources/assets/images/bookcover/')}}/{{$data_book->cover}}" class="img-responsive"></p>


