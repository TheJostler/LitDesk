<x-html>
  <x-head/>
  <x-body>
    <x-scanner title="Stock count for team: {{ $team }}" description="Here you can see a demonstration of a scanner for the lit desk!"/>
      <x-form class="p-6"
      title="Add item"
      body="Loading..."
      svg='<path id="Path_40" data-name="Path 40" d="M325.719,127.625,229.094,231.25l-44.282-47.469L144,227.562l86.781,92.344L367.938,172.875Z" fill-rule="evenodd"></path> <path id="Path_41" data-name="Path 41" d="M480,0H32A31.981,31.981,0,0,0,0,32V480a31.981,31.981,0,0,0,32,32H480a31.981,31.981,0,0,0,32-32V32A31.981,31.981,0,0,0,480,0ZM448,352H352v96H160V352H64V64H448Z" fill-rule="evenodd"></path>'>
        <img class="p-6 max-w-100" src="https://media4.giphy.com/media/3o7bu3XilJ5BOiSGic/giphy.webp?cid=6c09b9520iy39qaog7aj48qes7vq3sfw09ngn1xvsj40jaqp&ep=v1_internal_gif_by_id&rid=giphy.webp&ct=g" id="formImgField">
        <p>Current quantity: <span id="qtyLabel"></span></p>
        <label for="qtyFormField">New qty:</label>
        <input class="rounded" name="qty" id="qtyFormField" type="number" value="1">
        <button class="mt-2 btn btn-blue" onclick="saveItem()">Save</button>
      </x-form>
    <x-js.scanner/>
  </x-body>
</x-html>