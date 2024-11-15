<!-- Template for input-->
<div class="col-md-{{ $grid }}">
    <div class="form-group row">
        <label class="col-sm-3 col-form-label" style="font-size: 1rem; color: #333;">{{ $label }}</label>
        <div class="col-sm-9">
            <input type="{{ $type }}" name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}"
                class="form-control" style="font-size: 1rem;" />
        </div>
    </div>
</div>