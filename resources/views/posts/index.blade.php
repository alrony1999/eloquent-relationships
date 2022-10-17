@extends('layouts.layout')
@section('content')
<section>
    @include('modal.addPost')
    @include('modal.editPost')
    @include('modal.deletePost')
    <div class="container py-5" data-author="{{$author}}" id="post-author">
        <div class="row">
            <div class="col-md-8 offset-2 ">
                <div id="success_message">

                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>All Post</h4>
                        <a href="#" data-toggle="modal" data-target="#addPost"
                            class="btn btn-primary float-right btn-sm">Add
                            Post</a>
                    </div>
                    <div class="card-body " id='table'>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Title</th>
                                    <th colspan="2" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($posts as $post )
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td><a href="{{route('post',['id'=>$post->id])}}">{{$post->title}}</a></td>
                                    <td class="text-center"><button type="button"
                                            class="btn btn-warning btn-sm edit-btn ">Edit</button>
                                    </td>
                                    <td class="text-center"><button type="button"
                                            class="btn btn-danger btn-sm delete-btn">Delete</button>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function () {
        fetchPost();
        function fetchPost()
        {
            let author_id=$('#post-author').attr('data-author');
            $.ajax({
                type: "GET",
                url: "/fetch-author-post/"+author_id,
                dataType: "json",
                success: function (response) {
                    if(response.status==200)
                    {
                        $('tbody').html('');
                        $.each(response.posts, function (key, item) { 
                             $('tbody').append(
                                '<tr>\
                                <td>'+item.id +'</td>\
                                <td><a href="/posts/'+item.id+'">'+ item.title +'</a></td>\
                                <td class="text-center"><button type="button" data-post="'+item.id+'" class="btn btn-warning btn-sm edit-post-btn ">Edit</button>\
                                </td>\
                                <td class="text-center"><button type="button" data-post="'+item.id+'" class="btn btn-danger btn-sm delete-post-btn">Delete</button>\
                                </td>\
                            </tr>'
                            );
                        });
                    }else{
                        
                        $('#table').html('');
                        $('#table').addClass('text-center');
                        $('#table').append('<h1>'+response.message+'</h1>');
                    }
                }
            });
        }
       
        $(document).on('click','#save-post-btn', function (e) {
            e.preventDefault();
            var data={
                'author':$('#author').val(),
                'title':$('.title').val(),
                'slug':$('.slug').val(),
                'body':$('.body').val()
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/author/addpost",
                data:data,
                dataType: "json",
                success: function (response) {
                    
                   if(response.status==400)
                   {
                        $('#saveform-errlist').html('');
                        $('#saveform-errlist').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                            $('#saveform-errlist').append('<li>'+err_values+'</li>')
                        });
                   }else{
                        $('#saveform-errlist').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#addPost').modal('hide');
                        $('#addPost').find('input').val('');
                        fetchPost();
                   }
                }
            });
        });
        $(document).on('click','.edit-post-btn', function (e) {
            e.preventDefault();
            var edit_post_author=$('#post-author').attr('data-author');
            var edit_post_id=$(this).attr('data-post');
           $.ajax({
            type: "GET",
            url: "/posts/edit/"+edit_post_author+"/"+edit_post_id,
            dataType: "json",
            success: function (response) {
                if(response.status==404)
                {
                    $('#success_message').html('');
                    $('#success_message').addClass('alert alert-danger');
                    $('#success_message').text(response.message);
                }else{
                    $('#editPostModal').modal('show');
                    $('#edit_post_id').val(response.post.id);
                    $('#edit_title').val(response.post.title);
                    $('#edit_slug').val(response.post.slug);
                    $('#edit_body').val(response.post.body);
                }
            }
           });
        });
        $(document).on('click','#updateform-post-btn', function (e) {
            e.preventDefault();
            var id=$('#edit_post_id').val();
            var data={
                'edit_title':$('#edit_title').val(),
                'edit_slug':$('#edit_slug').val(),
                'edit_body':$('#edit_body').val()
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "PUT",
                url: "/posts/update/"+id,
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response.status==400)
                    {
                        $('#updateform-errlist').html('');
                        $('#updateform-errlist').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                            $('#updateform-errlist').append('<li>'+err_values+'</li>')
                        });
                    }else if(response.status==404)
                    {
                        $('#success_message').html('');
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#updateform-errlist').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#editPostModal').modal('hide');
                        $('#editPostModal').find('input').val('');
                        fetchPost();
                    }
                }
            });
        });
        $(document).on('click','.delete-post-btn', function (e) {
            e.preventDefault();
            var id=$(this).attr('data-post');
            console.log(id);
           $('#deleteModalPost').modal('show');
           $('#delete_post_confirm_id').val(id);
            
        });
        $(document).on('click','#deleteform-post-btn', function (e) {
            e.preventDefault();
            var id=$('#delete_post_confirm_id').val();
            console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: "/posts/delete/"+id,
                dataType: "json",
                success: function (response) {
                    if(response.status==404)
                    {
                        $('#deleteModalPost').modal('hide');
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                        
                    }else{
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#deleteModalPost').modal('hide');
                        $('#deleteModalPost').find('input').val('');
                        fetchPost();
                    }
                }
            });
        });
    });
</script>
@endsection