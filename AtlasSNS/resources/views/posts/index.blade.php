@extends('layouts.login')

@section('content')
{!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください']) !!}
            {!! Form::hidden('user-id', Auth::user()->id ) !!}
            <button type="button" class="btn btn-sm"><img src="images/post.png"></button>
        </div>
{!! Form::close() !!}

@foreach ($list as $list)
            <ul>
                <il><img src="{{ asset('storage/' . $list->user->images) }}" >{{$list->user->username}} {{ $list->post }} {{ $list->created_at }}</il>
                @if(Auth::user()->id == $list->user_id)
                <il><button type="button" class="btn" data-toggle="modal" data-target="#exampleModalCenter{{$list->id}}"><img src="images/edit.png" style="width:35px; height:35px; "></button></il>
                <td><a class="btn btn-sm" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を消去します。よろしいでしょうか？')"><img src="images/trash-h.png" style="width:50px; height:50px;"></a></td>
                @endif

            </ul>

<!-- Modal -->
            <div class="modal fade" id="exampleModalCenter{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <form action="{{ route('updatePost', ['id' => $list->id ]) }}" method="post">
                            <div class="modal-body">
                                <input id="id" class="form-control" type="hidden" name="id" value="{{$list->id}}">
                                <textarea class="post_edit" name="upPost" maxlength="150">{{$list->post}}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn" ><img src="images/edit.png" style="width:35px; height:35px;"></button>
                            </div>
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>

@endforeach


@endsection
