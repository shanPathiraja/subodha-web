<template>
    <div>
        <div class="flex flex-col md:flex-row">
            <div>
                <div>
                    <div class="h-48 w-48 rounded-full overflow-hidden mx-auto md:mx-0 shadow-md">
                        <img class="h-48 w-48" :src="photo">
                    </div>

                    <form v-if="edit" class="mt-4">
                        <input type="file" accept="image/*" @change="onImageChange">
                    </form>
                </div>

                <div class="mt-6 w-64 mx-auto md:mx-0">
                    <div class="mt-2 grid grid-cols-3 gap-4">
                        <dt class="text-sm leading-5 text-gray-500">
                            Download
                        </dt>

                        <dd class="text-sm leading-5 whitespace-no-wrap">
                            <a v-if="! edit" :href="photo" target="_blank">Profile picture</a>

                            <input v-else type="text" name="photo" v-model="photo" class="bg-transparent text-gray-200">
                        </dd>
                    </div>

                    <div class="mt-2 grid grid-cols-3 gap-4">
                        <dt class="text-sm leading-5 text-gray-500">
                            Email
                        </dt>

                        <dd class="text-sm leading-5 whitespace-no-wrap">
                            <a v-if="! edit" :href="`mailto:${email}`">{{ email }}</a>

                            <input v-else type="email" name="email" v-model="email" class="bg-transparent text-gray-200">
                        </dd>
                    </div>

                    <div class="mt-2 grid grid-cols-3 gap-4">
                        <dt class="text-sm leading-5 text-gray-500">
                            Get
                        </dt>

                        <dd class="text-sm leading-5 whitespace-no-wrap">
                            <a href="/docs/resume_subodhacharles.pdf" target="_blank">Resumé</a><br><a href="/docs/cv_subodhacharles.pdf">CV</a>
                        </dd>
                    </div>

                    <div class="mt-2 grid grid-cols-3 gap-4">
                        <dt class="text-sm leading-5 text-gray-500">
                            Visit
                        </dt>

                        <dd class="text-sm leading-5 whitespace-no-wrap">
                            <a href="https://scholar.google.com/citations?hl=en&user=VhyUxgcAAAAJ" target="_blank">Google Scholar</a>

                        </dd>
                    </div>
                </div>
            </div>

            <div class="ml-0 mt-6 md:mt-0 md:ml-10 text-center md:text-left flex-1">
                <div v-if="! edit" @dblclick="setEdit">
                    <div class="text-gray-400 about-content w-full" v-html="about"></div>
                </div>

                <div v-else>
                    <ckeditor class="h-custom text-white" :editor="editor" v-model="about" :config="options"></ckeditor>

                    <div class="mt-6">
                        <button @click="saveChanges" class="btn btn-secondary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import BalloonEditor from '@ckeditor/ckeditor5-build-balloon';

    export default {
        props: ['profile', 'profilePhoto', 'auth'],

        data() {
            return {
                about: this.profile.about,
                email: this.profile.email,
                resume: this.profile.resume,
                photo: this.profilePhoto,
                edit: false,
                editor: BalloonEditor,
                options: {
                    toolbar: [ 'heading', 'bold', 'italic', '|', 'link' ]
                }
            }
        },

        methods: {
            setEdit() {
                if (this.auth) {
                    this.edit = ! this.edit;
                }
            },

            saveChanges() {
                if (this.auth && this.about) {
                    this.setEdit();

                    axios.put(`${location.pathname}/${this.profile.id}`, {
                            about: this.about,
                            email: this.email,
                            resume: this.resume
                        })
                        .then(response => {
                            if (response.status === 200) {
                                // location.reload();
                            }
                        });
                }
            },

            onImageChange(e) {
                if (! e.target.files.length) return;

                let file = e.target.files[0];

                let reader = new FileReader();

                reader.readAsDataURL(file);

                reader.onload = e => {
                    let src = e.target.result;

                    this.onLoad({ src, file });
                };
            },

            onLoad(photo) {
                this.photo = photo.src;

                this.persist(photo.file);
            },

            persist(photo) {
                let data = new FormData();

                data.append('image', photo);

                axios.post(`/upload/image/${this.profile.user_id}`, data)
                    .then(() => flash('Avatar uploaded!'));
            }
        }
    }
</script>

