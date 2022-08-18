<div style="display: -ms-flexbox; display: flex; -ms-flex-wrap: wrap; flex-wrap: wrap;" id="printable">
    @for($i = 0; $i < 24; $i++)
        <div style="-ms-flex: 0 0 25%; flex: 0 0 25%; max-width: 25%; text-align: center; padding: 5px; border: 1px solid grey">
            <div style="text-transform: uppercase; line-height: 10px; font-weight: 600; font-size: 12px; margin-bottom: 3px;">
                {{ setting('website.title') }}
                <small style="text-align: right">{{ $medicine->strength }}</small>
            </div>
            <img src="https://chart.apis.google.com/chart?cht=qr&chs=250x250&chl={{ $medicine->bar_code }}&chld=H|0" height="150" alt="">
            <div style="text-transform: uppercase; line-height: 10px; font-weight: 600; font-size: 14px; margin-bottom: 3px;">
                {{ $medicine->name }}
            </div>
            <div style="text-transform: uppercase; line-height: 10px; font-weight: 400; font-size: 12px; margin-bottom: 3px;">
                {!! __(":price :text", ['price' => $medicine->price, 'text' => '<sub>'.__("include vat.").'</sub>']) !!}
            </div>
        </div>
    @endfor
</div>

<button class="btn btn-primary waves-effect waves-light mt-3" onclick="printable('printable')">
    <i class="fas fa-print"></i>
    {{ __('Print') }}
</button>
