@foreach ($collection as $key => $item)
    <div class="modal fade modalpd" id="model_{{$key}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body ">
                    <div class="lockanh">
                        <img src="{{$item->image}}" alt="{{$item->id}}" class="img-responsive">
                    </div>
                    <p class="description">
                        {{$item->title}}
                        @if(isset($item->description) && trim($item->description)!=='')
                            {{' - ' . $item->description}}
                        @endif
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endforeach