<x-layout>
    <section>
        <div class="container">
            <div class="row d-flex flex-row justify-content-center" style="min-height: 100vh;">

                @if($profile)
                <div class="col-md-6 offset-3">
                    <h1 class="my-3">Profile</h1>
                    <div class="card" style="width: 20rem; heigth:300rem">
                        <img class="card-img-top" src="{{asset('images/profile/'.$profile->thumbnail)}}"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ucwords($profile->user->name)}}</h5>
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