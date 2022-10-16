<x-layout>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 ">
                    <div class="card">
                        <div class="card-body">
                            @if($books->count())
                            <h5 class="card-title text-center">All Books</h5>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Name</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book )
                                    <tr>
                                        <td>{{$book->id}}</td>
                                        <td><a href="{{route('book',['id'=>$book->id])}}">{{$book->name}}</a></td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <h1 style="min-height: 100vh;" class="text-center">Empty</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>