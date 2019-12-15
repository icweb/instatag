@if(!empty(session()->get('error')))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        {{ implode('', $errors->all(':message')) }}
    </div>
@endif
@if(!empty(session()->get('success')))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
