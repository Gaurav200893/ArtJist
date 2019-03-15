@extends('layouts.app')

@section('content')

 {{-- Content --}}

<h1>Test</h1>
<div class="col-sm-4 col-sm-offset-1">
<form method="POST" action="{{ route('login') }}">
    @foreach ($profile as $key=>$val)

        @if($key == 'id' || $key =='created_at' || $key =='updated_at')
            @continue
        @endif
            {{-- {{ $key }} --}}

        @if($key == 'user_id' || $key =='country' || $key =='city' || $key =='zipcode' || $key =='medium')
        <div class="form-group">
        <input  class="form-control" placeholder="{{$key}}" />
        </div>
        @endif
        
        @if($key == 'type' || $key =='gender')
        <div class="form-group">
            <select  class="form-control" placeholder="{{$key}}" >
                @if($key == "type")
                    <option value="1" >  Professional  </option>
                    <option value="2" >  Hobbyist  </option>
                    <option value="3">  Art Admirer  </option>
                @endif
                @if($key == "gender")
                    <option value='1' >  Male  </option>
                    <option value='2' >  Female  </option>
                @endif
               
  
            </select>
        </div>
        @endif
        
    @endforeach
</form>
</div>
   
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

        <button type="submit" class="btn btn-default">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </form>

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="_token"]').attr('content')
     $.ajax({
                    /* the route pointing to the post function */
                    url: '/posts',
                    type: 'GET',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, message:$(".getinfo").val()},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        $(".writeinfo").append(data.msg); 
                    }
                }); 
</script>

{{-- Content End --}}


@endsection 


    


   