<template>
    <div class="rounded-lg p-3 bg-gray-100 border border-gray-200">
        <div>
            <label class="block">
                <span class="text-gray-700 text-sm font-semibold">Add authors</span>

                <div class="mt-1 flex items-center">
                    <input type="text" v-model="person" class="form-input bg-white block w-full flex-1 mr-2">

                    <button type="button" class="btn btn-primary" @click="addPerson">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>

                <div class="mt-1">
                    <span class="text-xs">Click on an authors name to remove it.</span>
                </div>
            </label>
        </div>

        <div class="mt-6">
            <ul class="flex">
                <li class="mr-2 cursor-pointer" v-for="author in authors" :key="author.id" @click="removePerson(author)">
                    <span class="px-3 py-2 text-sm rounded-lg bg-blue-100 text-blue-800 font-semibold cursor-pointer" v-text="author"></span>
                </li>
            </ul>

            <input type="hidden" name="authors" v-model="authors">
        </div>
    </div>
</template>

<script>
    export default {
        props: ['savedAuthors'],

        data() {
            return {
                person: null,
                authors: this.savedAuthors
            }
        },

        methods: {
            addPerson() {
                this.authors.unshift(this.person);

                this.person = null;
            },

            removePerson(person) {
                const index = this.authors.indexOf(person);

                if (index > -1) {
                    this.authors.splice(index, 1);
                }
            }
        }
    }
</script>
