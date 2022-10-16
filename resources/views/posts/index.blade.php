<x-layout>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-3 ">
                    <div class="card">
                        <div class="card-body">
                            @if($posts->count())
                            <h5 class="card-title text-center">All Posts</h5>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Title</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post )
                                    <tr>
                                        <td>{{$post->id}}</td>
                                        <td><a href="{{route('post',['id'=>$post->id])}}">{{$post->title}}</a></td>

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