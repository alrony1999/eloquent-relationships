<x-layout>
    <section>
        <div class="container">
            <div class="row d-flex flex-row justify-content-center " style="min-height: 100vh;">

                @if($post)
                <div class="col-md-6 offset-3">
                    <h1 class="my-3">Post</h1>
                    <div class="card" style="width: 20rem; ">
                        <img class="card-img-top" src="{{asset('images/posts/default.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-title">By <a
                                    href="{{route('posts',['id'=>$post->author->id])}}">{{ucwords($post->author->name)}}</a>
                            </p>
                            <h5 class="card-text">{{$post->body}}</h5>
                        </div>
                    </div>
                </div>
                @else
                <h1>Empty</h1>
                @endif
            </div>
        </div>
    </section>
</x-layout>