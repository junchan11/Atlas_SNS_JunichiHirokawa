@extends('layouts.login')

@section('content')
{!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
            {!! Form::hidden('user-id', Auth::user()->id ) !!}
        </div>
        <button type="submit" class="btn btn-success btn-sm"><img src="images/post.png"></button>
        {!! Form::close() !!}

@foreach ($list as $list)
            <ul>
                <il><img src="{{$list->user->images}}">>{{$list->user->username}}</il>
                <td>{{ $list->post }}</td>
                <td>{{ $list->created_at }}</td>
                <td><a class="btn btn-primary btn-sm" href=""><img src="images/edit.png"></a></td>
                <td><a class="btn btn-danger btn-sm" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を消去します。よろしいでしょうか？')"><img src="images/trash-h.png"></a></td>
            </ul>
@endforeach

@endsection
