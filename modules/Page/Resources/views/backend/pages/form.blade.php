<div class="row">
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_label = __("page::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_label = __("page::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-4 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_label = __("page::$module_name.$field_name");
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                '1'=>__('Published'),
                '0'=>__('Unpublished'),
                '2'=>__('Draft')
            ];
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-control select2')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 mb-3">
        <div class="form-group">
            <?php
            $field_name = 'description';
            $field_label = __("page::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name)->class('form-label') }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'content';
            $field_label = __("page::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<!-- Select2 Library -->
<x-library.select2 />

<!-- Summernote editor -->
<x-library.summernote />