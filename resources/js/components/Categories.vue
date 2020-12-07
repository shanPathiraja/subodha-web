<template>
    <div class="row">
        <div class="col-lg-5 col-md-6 mb-6">
            <div>
                <form @submit.prevent="performFormAction">
                    <div>
                        <label class="block">
                            <span class="text-gray-700 text-sm font-semibold">Name</span>

                            <input @input="setSlug" name="name" id="name" type="text" class="form-input mt-1 block w-full" v-model="name">
                        </label>

                        <div class="mt-1">
                            <span class="text-xs text-gray-600">The name is how it appears on the site</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="px-3 py-2 bg-gray-200 text-gray-700 text-sm rounded-lg">
                            <span class="text-gray-700 text-sm font-semibold">Slug:</span> <span class="text-blue-500" v-text="slug"></span>
                        </div>

                        <div class="mt-1 leading-tight">
                            <span class="text-xs text-gray-600">
                                The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens. The slug will be auto generated
                            </span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block">
                            <div class="text-gray-700 text-sm font-semibold flex justify-between items-baseline">
                                <span>Description</span>

                                <span class="font-normal text-gray-600">optional</span>
                            </div>

                            <textarea name="description" id="description" rows="5" v-model="description" class="form-input block w-full mt-1"></textarea>
                        </label>
                    </div>

                    <div class="mt-4">
                        <div class="flex items-center justify-between">
                            <button type="submit" class="btn btn-primary">{{ edit ? 'Save changes' : 'Create category' }}</button>

                            <a v-if="edit" href="#" role="button" @click.prevent="deleteCategory()" class="font-medium text-sm text-red-500 hover:text-red-600">Delete</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 offset-lg-1 mb-6">
            <div>
                <button @click="editCategory(category)" v-for="category in categories" :key="category.id" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 hover:text-gray-800 mr-4 mb-4" v-text="category.name"></button>
            </div>

            <div class="mt-1 leading-tight">
                <span class="text-xs text-gray-600">
                    <span class="uppercase text-gray-700 font-semibold">Important:</span>

                    <span>All posts with deleted categories will be automatically assigned under uncategorized</span>
                </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                edit: false,
                name: null,
                slug: null,
                description: null,
                categories: [],
                toEdit: null
            }
        },

        created() {
            this.fetchCategories();
        },

        methods: {
            async fetchCategories() {
                await axios.get(location.pathname)
                    .then(response => {
                        this.categories = response.data;
                    });
            },

            performFormAction() {
                if (this.edit) {
                    return this.updateCategory();
                }

                return this.createCategory();
            },

            async createCategory() {
                if (this.name) {
                    await axios.post(location.pathname, {
                            name: this.name,
                            slug: this.slug,
                            description: this.description
                        })
                        .then(response => {
                            if (response.status === 200) {
                                this.categories.unshift(response.data.category);

                                this.resetFields();
                            }
                        });
                }
            },

            editCategory(category) {
                this.toEdit = category;
                this.edit = true;
                this.name = category.name;
                this.slug = category.slug;
                this.description = category.description;
            },

            async updateCategory() {
                await axios.put(`${location.pathname}/${this.toEdit.slug}`, {
                        name: this.name,
                        slug: this.slug,
                        description: this.description
                    })
                    .then(response => {
                        if (response.status === 200) {
                            this.categories.shift(this.toEdit);

                            this.categories.unshift(response.data.category);

                            this.resetFields();
                        }
                    });
            },

            async deleteCategory() {
                await axios.delete(`${location.pathname}/${this.toEdit.slug}`)
                    .then(response => {
                        if (response.status === 204) {
                            const index = this.categories.indexOf(this.toEdit);

                            if (index > -1) {
                                this.categories.splice(index, 1);
                            }

                            this.resetFields();
                        }
                    });
            },

            resetFields() {
                this.name = null;
                this.slug = null;
                this.description = null;
                this.toEdit = null;
                this.edit = false;
            },

            setSlug() {
                this.slug = this.name.replace(/^\s+|\s+$/g, ''); // trim
                this.slug = this.slug.toLowerCase();

                // remove accents, swap ñ for n, etc
                var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
                var to   = "aaaaeeeeiiiioooouuuunc------";
                for (var i=0, l=from.length ; i<l ; i++) {
                    this.slug = this.slug.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
                }

                this.slug = this.slug.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                    .replace(/\s+/g, '-') // collapse whitespace and replace by -
                    .replace(/-+/g, '-'); // collapse dashes
            }
        }
    }
</script>
