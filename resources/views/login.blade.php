<x-html>
    <x-head/>
    <x-body>
        <div class="box">
            <div class="pageTitle">
                <h1>Lit Desk</h1>
            </div>

            <x-card 
                title="Login In" 
                svg='<path id="Path_4" data-name="Path 4" d="M480,224a31.991,31.991,0,0,0-32,32V448H64V256a32,32,0,0,0-64,0V480a31.991,31.991,0,0,0,32,32H480a31.991,31.991,0,0,0,32-32V256A31.991,31.991,0,0,0,480,224Z" fill-rule="evenodd"></path> <path id="Path_5" data-name="Path 5" d="M288,224V28.091C288,12.578,273.688,0,256,0s-32,12.578-32,28.091V224H128L256,352,384,224Z" fill-rule="evenodd"></path>'
                link=""
                body="">
                <form action="{{ route('auth.login.submit') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <header>
                    <h2>Email:</h2>
                    </header>
                    <div class="row" style="padding-bottom: 20px">
                    <div class="input-field w-8">
                        <input name="email" type="email" class="validate placeholder:italic" placeholder="john@example.com">
                    </div>
                    </div>
                    <div class="row col s12">
                    <div style="text-align: left">
                        <input class="input-field validate" type="checkbox" name="remember" id="remember">
                        <label for="remember">Remember forever?</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="input-field col s12">
                        <input type="submit" value="submit" class="btn btn-blue">
                    </div>
                    </div>
                </form>
            </x-card>
        </div>
    </x-body>
</x-html>
