@extends('layouts.app') 
@section('content')
<h1 class="text-center">
    {{$exam->title}}
    @can('建立測驗')
        <a href="{{route('exam.edit', $exam->id)}}" class="btn btn-warning">編輯</a>
    @endcan

    <form action="{{route('exam.destroy', $exam->id)}}" method="POST" style="display:inline">
        @csrf @method('delete')
        <button type="submit" class="btn btn-danger">刪除</button>
    </form>
</h1>


 <div class="text-center">
    發佈於 {{$exam->created_at->format("Y年m月d日 H:i:s")}} / 最後更新： {{$exam->updated_at->format("Y年m月d日 H:i:s")}}
</div> 

    @can('建立測驗')
        @if(isset($topic))
        {{ bs()->openForm('patch', "/topic/{$topic->id}", ['model' => $topic]) }}
        @else
        {{ bs()->openForm('post', '/topic') }}
        @endif
        {{ bs()->formGroup() ->label('題目內容', false, 'text-sm-right') ->control(bs()->textarea('topic')->placeholder('請輸入題目內容'))
        ->showAsRow() }}
         {{ bs()->formGroup() ->label('選項1', false, 'text-sm-right') ->control(bs()->text('opt1')->placeholder('輸入選項1'))
        ->showAsRow() }}
         {{ bs()->formGroup() ->label('選項2', false, 'text-sm-right') ->control(bs()->text('opt2')->placeholder('輸入選項2'))
        ->showAsRow() }}
         {{ bs()->formGroup() ->label('選項3', false, 'text-sm-right') ->control(bs()->text('opt3')->placeholder('輸入選項3'))
        ->showAsRow() }} 
        {{ bs()->formGroup() ->label('選項4', false, 'text-sm-right') ->control(bs()->text('opt4')->placeholder('輸入選項4'))
        ->showAsRow() }}
         {{ bs()->formGroup() ->label('正確解答', false, 'text-sm-right') ->control(bs()->select('ans',[1=>1, 2=>2, 3=>3, 4=>4])->placeholder('請設定正確解答')) ->showAsRow() }} 
        {{ bs()->hidden('exam_id', $exam->id) }}
        {{ bs()->formGroup() ->label('')->control(bs()->submit('儲存')) ->showAsRow() }} 
        {{ bs()->closeForm() }}
    @endcan

<dl>
    @forelse ($exam->topics as $key => $topic)
    <dt>
            <h3>
            @can('建立測驗')

            

            <form action="{{route('topic.destroy', $topic->id)}}" method="post" style="display:inline">
                @csrf @method('delete')
                <button type="submit" class="btn btn-danger">刪除</button>
            </form>

                <a href="{{route('topic.edit', $topic->id)}}"
                 class="btn btn-warning">編輯</a>
                 {{$topic->ans}}）
            @endcan
            {{ bs()->badge()->text($key+1) }}
            {{$topic->topic}}
            </h3>
        </dt>
    <dd>
        {{ bs()->radioGroup("ans[$topic->id]", [ 1=>"
        <span class='opt'>&#128089; $topic->opt1</span>", 2=>"
        <span class='opt'>&#128087; $topic->opt2</span>", 3=>"
        <span class='opt'>&#128130; $topic->opt3</span>", 4=>"
        <span class='opt'>&#10105; $topic->opt4</span>" ])->addRadioClass(['my-3']) }}
    </dd>
    @empty
    <div class="alert alert-danger">尚無任何題目</div>
    @endforelse
</dl>

    
@endsection
