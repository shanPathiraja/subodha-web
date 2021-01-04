<template>
    <div>
        <file-pond
            name="image"
            ref="pond"
            class-name="bg-gray-200 rounded-lg overflow-hidden m-0 p-0 text-gray-200 font-bold text-sm cursor-pointer"
            label-idle="Drag & drop featured image here..."
            v-bind:allow-multiple="false"
            accepted-file-types="image/jpeg, image/jpg, image/png"
            v-bind:files="image"
            :server="serverOptions"
            v-on:init="handleFilePondInit"/>

        <input type="hidden" name="featured" :value="featured">
    </div>
</template>

<script>
    // Import Vue FilePond
    import vueFilePond from 'vue-filepond';

    // Import FilePond styles
    import 'filepond/dist/filepond.min.css';

    // Import FilePond plugins
    // Please note that you need to install these plugins separately

    // Import image preview plugin styles
    import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

    // Import image preview and file type validation plugins
    import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
    import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

    // Create component
    const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);

    export default {
        components: {
            FilePond
        },

        props: ['featured'],

        data() {
            return {
                image: [],
                serverOptions: {
                    url: '/upload/image',
                    process: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        onload: (response) => {
                            this.featured = JSON.parse(response).image;
                        },
                    }
                }
            }
        },

        methods: {
            handleFilePondInit() {
                console.log('FilePond has initialized');

                // FilePond instance methods are available on `this.$refs.pond`
            }
        }
    }
</script>
