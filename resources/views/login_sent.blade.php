<x-html>
    <x-head/>
    <x-body>
        <div class="box">
            <div class="pageTitle">
                <h1>Lit Desk</h1>
            </div>
            <x-card 
                title="{{ __('auth.alright')}}" 
                svg='<path id="Path_4" data-name="Path 4" d="M480,224a31.991,31.991,0,0,0-32,32V448H64V256a32,32,0,0,0-64,0V480a31.991,31.991,0,0,0,32,32H480a31.991,31.991,0,0,0,32-32V256A31.991,31.991,0,0,0,480,224Z" fill-rule="evenodd"></path> <path id="Path_5" data-name="Path 5" d="M288,224V28.091C288,12.578,273.688,0,256,0s-32,12.578-32,28.091V224H128L256,352,384,224Z" fill-rule="evenodd"></path>'
                link="/"
                body="{{ __('auth.sent')}}">
            </x-card>
        </div>
    </x-body>
</x-html>
