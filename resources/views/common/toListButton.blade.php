<form method="get" action="{{route('list')}}">
    @csrf
    <input class="btn btn-outline-secondary btn-block" type="submit" value={{__('messages.back_to_list')}}>
</form>