<x-html>
    <x-head/>
    <x-body>
        <div class="box">
            <div class="pageTitle">
                <h1>Lit Desk</h1>
            </div>
            <div class="grid-3">

                <x-card 
                    title="In" 
                    svg='<path id="Path_4" data-name="Path 4" d="M480,224a31.991,31.991,0,0,0-32,32V448H64V256a32,32,0,0,0-64,0V480a31.991,31.991,0,0,0,32,32H480a31.991,31.991,0,0,0,32-32V256A31.991,31.991,0,0,0,480,224Z" fill-rule="evenodd"></path> <path id="Path_5" data-name="Path 5" d="M288,224V28.091C288,12.578,273.688,0,256,0s-32,12.578-32,28.091V224H128L256,352,384,224Z" fill-rule="evenodd"></path>'
                    link="/demo" 
                    body="Add items to our congregation's inventory"
                />

                <x-card
                    title="Out"
                    svg='<path id="Path_2" data-name="Path 2" d="M480,224a31.991,31.991,0,0,0-32,32V448H64V256a32,32,0,0,0-64,0V480a31.991,31.991,0,0,0,32,32H480a31.991,31.991,0,0,0,32-32V256A31.991,31.991,0,0,0,480,224Z" fill-rule="evenodd"></path> 
                    <path id="Path_3" data-name="Path 3" d="M224,320a32,32,0,0,0,64,0V128h96L256,0,128,128h96Z" fill-rule="evenodd"></path>'
                    link="/demo"
                    body="Take items out of our congregation's inventory"
                />
                
                <x-card
                    title="Start Count"
                    svg='<path d="M341.333333,1.42108547e-14 L426.666667,85.3333333 L426.666667,341.333333 L3.55271368e-14,341.333333 L3.55271368e-14,1.42108547e-14 L341.333333,1.42108547e-14 Z M330.666667,42.6666667 L42.6666667,42.6666667 L42.6666667,298.666667 L384,298.666667 L384,96 L330.666667,42.6666667 Z M106.666667,85.3333333 L106.666,234.666 L341.333333,234.666667 L341.333333,256 L85.3333333,256 L85.3333333,85.3333333 L106.666667,85.3333333 Z M170.666667,149.333333 L170.666667,213.333333 L128,213.333333 L128,149.333333 L170.666667,149.333333 Z M234.666667,106.666667 L234.666667,213.333333 L192,213.333333 L192,106.666667 L234.666667,106.666667 Z M298.666667,170.666667 L298.666667,213.333333 L256,213.333333 L256,170.666667 L298.666667,170.666667 Z" id="Combined-Shape"> </path>'
                    link="{{ route('auth.generate.code',['team' => 'demo', 'time' => 60]) }}"
                    body="Inventory stock take"
                />

            </div>
        </div>
    </x-body>
</x-html>
