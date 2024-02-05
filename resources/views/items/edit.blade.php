<x-html>
<x-head/>
<x-body>
<div class="box">
    <div class="pageTitle">
        <h1>Update Item inventory</h1>
    </div>

    <x-card 
        title=""
        svg='<path id="Path_46" data-name="Path 46" d="M480,512H32A31.991,31.991,0,0,1,0,480V32A31.991,31.991,0,0,1,32,0H352L288,64H64V448H448V224l64-64V480A31.991,31.991,0,0,1,480,512ZM128,384V288L416,0h32l64,64V96L224,384ZM272,272,448,96,416,64,240,240Zm-80,16-32,32v32h32l32-32Z" fill-rule="evenodd"></path>'
        link=""
        body=""
        >
        <form action="{{ route('items.update', ['item' => $item->id]) }}"" method="put">
            @csrf
            <input name="name" type="text" value="{{ $item->name }}">
            @if ($item->qr)
                <input name="qr" type="text" value="{{ $item->qr}}" hidden>
            @else
                <button class="btn btn-blue">Register QR</button>
            @endif
            <input class="btn btn-blue" type="submit" value="Save">
        </form>
    </x-card>
</div>
</x-body>
</x-html>