<form action="{{route('books.search')}}">
    <input type="text" name="q" value="{{request()->q ?? ''}}">
    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>

</form>