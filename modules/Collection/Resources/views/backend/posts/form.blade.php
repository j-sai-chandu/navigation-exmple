<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'name';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'slug';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'created_by_alias';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = "Hide Author User's Name and use Alias";
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'order';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'intro';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'content';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->textarea($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'featured_image';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            <div class="input-group mb-3">
                {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required", 'aria-label'=>'Image', 'aria-describedby'=>'button-image']) }}
                <div class="input-group-append">
                    <button class="btn btn-info" type="button" id="button-image" data-input="{{$field_name}}"><i class="fas fa-folder-open"></i> @lang('Browse')</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'is_featured';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = __("Select an option");
            $required = "";
            $select_options = [
                '1' => 'Yes',
                '0' => 'No',
            ];
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-select')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'taxon_id';
            $field_label = __("collection::$module_name.$field_name");
            $field_relation = "taxon";
            $field_placeholder = __("Select an option");
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('name', 'id'):'')->placeholder($field_placeholder)->class('form-control select2-taxon')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'type';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                'Collection' => 'Collection',
                'Feature' => 'Feature',
                'News' => 'News',
            ];
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-select')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <div class="form-group">
            <?php
            $field_name = 'tags_list[]';
            $field_label = __("collection::$module_name.tags");
            $field_relation = "tags";
            $field_placeholder = __("Select an option");
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->multiselect($field_name,
                isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('name', 'id'):'',
                isset($$module_name_singular)?optional($$module_name_singular->$field_relation)->pluck('id')->toArray():''
                )->class('form-control select2-tags')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'status';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = __("Select an option");
            $required = "required";
            $select_options = [
                '1' => 'Published',
                '0' => 'Unpublished',
                '2' => 'Draft'
            ];
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->select($field_name, $select_options)->placeholder($field_placeholder)->class('form-select')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'published_at';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "required";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->datetime($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_title';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_keywords';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_description';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
    <div class="col-12 col-sm-6">
        <div class="form-group">
            <?php
            $field_name = 'meta_og_image';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12">
        <div class="form-group">
            <?php
            $field_name = 'meta_og_url';
            $field_label = __("collection::$module_name.$field_name");
            $field_placeholder = $field_label;
            $required = "";
            ?>
            {{ html()->label($field_label, $field_name) }} {!! fielf_required($required) !!}
            {{ html()->text($field_name)->placeholder($field_placeholder)->class('form-control')->attributes(["$required"]) }}
        </div>
    </div>
</div>

<!-- Select2 Library -->
<x-library.select2 />

@push('after-styles')
<!-- File Manager -->
<link rel="stylesheet" href="{{ asset('vendor/laravel-filemanager/css/lfm.css') }}">

<link href="https://unpkg.com/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<style>
    .note-editor.note-frame :after {
        display: none;
    }

    .note-editor .note-toolbar .note-dropdown-menu,
    .note-popover .popover-content .note-dropdown-menu {
        min-width: 180px;
    }
</style>
@endpush

@push ('after-scripts')
<script type="module" src="https://unpkg.com/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script type="module">
    // Define function to open filemanager window
    var lfm = function(options, cb) {
        var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
        window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
        window.SetUrl = cb;
    };

    // Define LFM summernote button
    var LFMButton = function(context) {
        var ui = $.summernote.ui;
        var button = ui.button({
            contents: '<i class="note-icon-picture"></i> ',
            tooltip: 'Insert image with filemanager',
            click: function() {

                lfm({
                    type: 'image',
                    prefix: '/laravel-filemanager'
                }, function(lfmItems, path) {
                    lfmItems.forEach(function(lfmItem) {
                        context.invoke('insertImage', lfmItem.url);
                    });
                });

            }
        });
        return button.render();
    };

    $('#content').summernote({
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['fontname', 'fontsize', 'bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'lfm', 'video']],
            ['view', ['codeview', 'undo', 'redo', 'help']],
        ],
        buttons: {
            lfm: LFMButton
        }
    });
</script>

<script type="module" src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script type="module">
    $('#button-image').filemanager('image');
</script>

<script type="module">
    $(document).ready(function() {
        $(document).on('select2:open', () => {
            document.querySelector('.select2-search__field').focus();
            document.querySelector('.select2-container--open .select2-search__field').focus();
        });

        $('.select2-taxon').select2({
            theme: "bootstrap4",
            placeholder: '@lang("Select an option")',
            minimumInputLength: 2,
            allowClear: true,
            ajax: {
                url: '{{route("backend.taxons.index_list")}}',
                dataType: 'json',
                data: function(params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $('.select2-tags').select2({
            // theme: "bootstrap4",
            placeholder: '@lang("Select an option")',
            minimumInputLength: 2,
            allowClear: true,
            ajax: {
                url: '{{route("backend.tags.index_list")}}',
                dataType: 'json',
                data: function(params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    });
</script>
@endpush