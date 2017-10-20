<div class="modal fade modalcontact" id="modal-contact">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Bee</h4>
            </div>
            <div class="modal-body">
                {{Form::open(array('route' => 'order.store', 'method' => 'post', 'role'=>'form'))}}
                {{csrf_field()}}
                <div class="form-group">
                    {{ Form::label('product', 'Product' ) }}
                    {{ Form::text('product',null,['class'=>'form-control','placeholder'=>'Product Id*']) }}
                    @if ($errors->has('product'))
                        <span class="error">{{ $errors->first('product') }}</span>
                    @endif
                    <br>
                    {{ Form::select('gender', [0 => 'Male', 1 => 'Female'], 0 , ['class' => 'form-control']) }}
                    <br>
                    {{ Form::select('size', [0 => 'S (12-14cm)', 1 => 'M (15-17cm)', 2 => 'L (18-20cm)'], 0, ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('information', 'Information' ) }}
                    {{ Form::text('name',null,['class'=>'form-control','placeholder'=>'Name*']) }}
                    @if ($errors->has('name'))
                        <span class="error">{{ $errors->first('name') }}</span>
                    @endif
                    <br>
                    {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email']) }}
                    @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">(+84)</span>
                        {{ Form::text('phone',null,['class'=>'form-control','placeholder'=>'Phone*']) }}
                    </div>
                    @if ($errors->has('phone'))
                        <span class="error">{{ $errors->first('phone') }}</span>
                    @endif
                    <br>
                    {{ Form::text('address',null,['class'=>'form-control','placeholder'=>'Address*']) }}
                    @if ($errors->has('address'))
                        <span class="error">{{ $errors->first('address') }}</span>
                    @endif
                    <br>
                    {{ Form::date('date',date('Y-m-d'),['class'=>'form-control']) }}
                    @if ($errors->has('date'))
                        <span class="error">{{ $errors->first('date') }}</span>
                    @endif
                    <br>
                    {{ Form::textarea('message',null,['class'=>'form-control','placeholder'=>'Message']) }}
                </div>
                {{Form::button('Submit', ['type' => 'submit', 'class' => 'btn btn-primary'])}}
                {{Form::button('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])}}
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>