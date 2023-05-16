@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        <div {!! $options['wrapperAttrs'] !!}>
    @endif
@endif

@if ($showLabel && $options['label'] !== false && $options['label_show'])
    {!! Form::customLabel($name, $options['label'], $options['label_attr']) !!}
@endif

@if ($showField)
    <div class="input-group">
{{--        {!! Form::text($name, $options['value'] ?? now()->format('m/d/Y'), array_merge($options['attr'], ['class' => Arr::get($options['attr'], 'class', '') . str_replace(Arr::get($options['attr'], 'class'), '', ' form-control datepicker')])) !!}--}}
        {!! Form::text($name, $options['value'], array_merge($options['attr'], ['class' => Arr::get($options['attr'], 'class', '') . str_replace(Arr::get($options['attr'], 'class'), '', ' form-control datepicker')])) !!}
        <span class="input-group-text">
            <button class="btn default" type="button">
                <i class="fa fa-calendar"></i>
            </button>
        </span>
    </div>
    @include('core/base::forms.partials.help-block')
@endif

@include('core/base::forms.partials.errors')

@if ($showLabel && $showField)
    @if ($options['wrapper'] !== false)
        </div>
    @endif
@endif
