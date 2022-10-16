<x-layout>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2" x-show="open">
                    <div class="card" id="users-list">
                        <div class="card-body">
                            <h5 class="card-title text-center">All Users</h5>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" class="text-center" colspan="3">Activities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user )
                                    <tr data-id={{$user->id}}>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="{{route('profile',['profile'=>$user->id])}}"
                                                class="btn btn-primary">Profile</a>
                                        </td>
                                        <td><a href="{{route('posts',['id'=>$user->id])}}"
                                                class="btn btn-primary">Posts</a></td>
                                        <td><a href="{{route('books',['id'=>$user->id])}}"
                                                class="btn btn-primary">Books</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card" id="users-post" style="display: none;z-index=1000;">
                        <div class="card-body">
                            <h5 class="card-title text-center">All Users</h5>
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" colspan="2">Activities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user )
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="{{route('profile',['profile'=>$user->id])}}"
                                                class="btn btn-primary">Profile</a>
                                        </td>
                                        <td><a href="{{route('posts',['id'=>$user->id])}}"
                                                class="btn btn-primary">Posts</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>