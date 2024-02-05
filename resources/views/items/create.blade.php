<x-html>
<x-head/>
<x-body>
<div class="box">
    <div class="pageTitle">
        <h1>Add an unknown Item</h1>
    </div>

    <x-card
        title="Add new item"
        svg='<path id="Path_19" data-name="Path 19" d="M256,512C114.625,512,0,397.391,0,256S114.625,0,256,0C397.391,0,512,114.609,512,256S397.391,512,256,512Zm0-448C149.969,64,64,149.969,64,256s85.969,192,192,192c106.047,0,192-85.969,192-192S362.047,64,256,64Zm32,320H224V288H128V224h96V128h64v96h96v64H288Z" fill-rule="evenodd"></path>'
        link=""
        body="We've never seen this item before please tell us more about it"
        >
        <form action="{{ route('items.store')}}" method="post">
            @csrf
            <input name="name" type="text" placeholder="Name">
            <input name="qr" type="text" value="">
            <input class="btn btn-blue" type="submit" value="Submit">
        </form>
    </x-card>
</div>
</x-body>
</x-html>
