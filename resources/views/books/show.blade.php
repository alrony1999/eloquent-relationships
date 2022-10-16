<x-layout>
    <section>
        <div class="container">
            <div class="row d-flex flex-row justify-content-center " style="min-height: 100vh;">

                @if($book)
                <div class="col-md-6 offset-3">
                    <h1 class="my-3">Book</h1>
                    <div class="card" style="width: 20rem; ">
                        <img class="card-img-top" src="{{asset('images/books/default.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-title">By
                                @foreach ($book->authors as $author )
                                <a href="{{route('books',['id'=>$author->id])}}">{{ucwords($author->name)}}
                                    {{$loop->last ? '':' ,'}}</a>
                                @endforeach




                            </p>
                            <h5 class="card-text">{{$book->excerpt}}</h5>
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