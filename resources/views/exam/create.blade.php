@extends('layouts.app') 
@section('content')
<h1>{{ __('Exam Create') }}</h1>

    @can('建立測驗')
        {{ bs()->openForm('post', '/exam') }}
        {{ bs()->formGroup() 
            ->label('測驗標題') 
            ->control(bs()->text('title')->placeholder('請填入測驗標題'))
            ->showAsRow()
        }} 
        {{ bs()->formGroup() 
            ->label('是否啟用？') 
             ->control(bs()->radioGroup('enable', [1 => '啟用', 0 => '關閉'])->selectedOption(1)->inline())
            ->showAsRow()
        }} 
        {{ bs()->hidden('user_id', Auth::id()) }}
        {{ bs()->submit('儲存') }}
        {{ bs()->closeForm() }} 
        
        @if (count($errors) > 0)
         @component('bs::alert', ['type' => 'danger'])
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endcomponent @endif

        @else
            @component('bs::alert', ['type' => 'info', 'animated' => true, 'dismissible' => true, 'data' => ['alert-id' => 40, 'context'
            => 'sample-code']]) 
                @slot('heading') 
                info 警告視窗 沒有權限
            
                @endslot

                <p>請先登入</p>
                
                <p>dismissible 右上會出現 x 符號，用來關閉；animated 在關閉時會有漸變效果；data 可以用來設置一些屬性</p>
                <p>除了 type 外，其餘參數截可省略</p>
            @endcomponent

        @endcan
@stop