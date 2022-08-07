<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('blog-index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 <img style="height:200px;" src="{{ URL::to('/') }}/images/blogs/{{ $blog->image }}" class="img-thumbnail" />
 <h3>Title - {{ $blog->title }} </h3>
 <h3>Content - {{ $blog->content }}</h3>
</div>