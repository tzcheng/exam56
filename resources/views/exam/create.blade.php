@extends('layouts.app') 
@section('content')
    <h1>{{ __('Exam Create') }}</h1>

    @can('建立測驗')

        @if(isset($exam->id))
            {{ bs()->openForm('patch', "/exam/{$exam->id}" , [ 'model' => $exam]) }}
        @else
            {{ bs()->openForm('post', '/exam') }}
        @endif

            {{ bs()->formGroup()
                ->label('測驗標題',false,'text-sm-right')
                ->control(bs()->text('title')->placeholder('請填入測驗標題'))
                ->showAsRow()
                }}

            {{ bs()->formGroup()
                 ->label('是否啟用？',false,'text-sm-right') ->control(bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])->selectedOption(isset($exam)?$exam->enable:1)->inline())
                ->showAsRow() 
                }}
                
            {{ bs()->hidden('user_id', Auth::id()) }}
            
            {{ bs()->formGroup()
                ->label('')
                ->control(bs()->submit('儲存'))
                ->showAsRow()
                }}
        {{ bs()->closeForm() }}

        @if (count($errors) > 0)
            @component('bs::alert', ['type' => 'danger'])
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endcomponent
        @endif

    @else
        @component('bs::alert', ['type' => 'danger'])
            @slot('heading')
                沒有建立測驗的權限
            @endslot

            <p>請先登入，或確定身份。</p>
        @endcomponent
    @endcan
@stop