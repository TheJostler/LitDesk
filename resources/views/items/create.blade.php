<x-html>
<x-body>
Create
<form action="{{ route('items.store')}}" method="post">
{{ csrf_token() }}
@csrf
<input name="name" type="text" placeholder="Name">
<input type="submit" value="Submit">
</form>
</x-body>
</x-html>
