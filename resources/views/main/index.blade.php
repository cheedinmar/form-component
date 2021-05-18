@extends('template.app')

@section('content')

        <form-wrapper
            group="update-form"
            v-cloak
        >
            <div slot-scope="props">
                <fieldset class='fieldset'>
                    <legend>Personal details</legend>
                    <div class='grid-x gird-margin-x'>
                        <div class='cell small-12 medium-6'>
                            <input 
                            type ='text'
                            name ='first_name'
                            id = 'first_name'
                            v-model = props.fields.first_name
                            value='Sebastian'>
                    </div>
                </fieldset>
            </div>
        </form-wrapper>



@endsection

@push('footer-scripts')
    <script src="//cdn.ckeditor.com/4.9.2/full/ckeditor.js"></script>
@endpush