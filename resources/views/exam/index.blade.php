@extends('layouts.app') 
@section('content')
<h1>所有測驗</h1>

    <ul class="list-group">
        @forelse($exams as $exam)
        
            <li class="list-group-item">
                 {{ $exam->created_at->format("Y年m月d日") }}-
                <a href="exam/{{ $exam->id }}">
                    {{$exam->title}}
                </a>
            </li>               
               @empty
            <li class="list-group-item">尚無任何測驗</li>
                                 
        @endforelse
    </ul>
    <small>（共 {{$exams->total()}} 筆資料）</small>
   <div class="my-3">
       {{ $exams->links() }}
</div>

@stop