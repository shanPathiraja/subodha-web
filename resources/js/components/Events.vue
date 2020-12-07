<template>
    <div class="row">
        <div v-for="event in events" :key="event.id" class="col-12 mb-6">
            <div class="border border-gray-800 px-4 py-5 sm:px-6 rounded-lg">
                <div>
                    <div>
                        <div v-if="event.symbol">
                            <img :src="event.symbol">
                        </div>

                        <div v-else>
                            <i v-if="event.type === 'award'" class="fas fa-award fa-2x"></i>

                            <i v-else class="fas fa-briefcase fa-2x"></i>
                        </div>
                    </div>

                    <h3 class="mt-10 text-xl"><span class="text-white">{{ event.title }}</span></h3>

                    <h6 class="text-sm">{{ event.period }}</h6>
                </div>

                <div class="mt-4">
                    <p class="text-gray-500">
                        {{ event.description }}
                    </p>

                    <div class="mt-4">
                        <span class="text-xs">{{ event.venue }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="signedIn" class="col-12 mb-6">
            <button type="button" class="border border-gray-800 bg-transparent hover:bg-gray-800 hover:bg-opacity-25 px-4 py-5 sm:px-6 flex items-center justify-center w-full h-32 transition ease-in-out duration-150 rounded-lg" data-toggle="modal" data-target="#eventModal">
                <i class="fas fa-plus"></i>
            </button>
        </div>

        <div v-if="signedIn" class="modal fade" id="eventModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form @submit.prevent="createEvent" class="modal-content border border-gray-800 px-4 py-5 sm:px-6 rounded-lg bg-gray-900">
                    <div class="modal-body">
                        <div>
                            <div class="overflow-hidden flex">
                                <label for="symbol" class="cursor-pointer px-4 py-3 rounded-lg border border-gray-800 hover:border-white flex flex-col items-center text-gray-600 hover:text-white transition ease-in-out duration-150">
                                    <span class="text-sm">
                                        Add image
                                    </span>

                                    <input id="symbol" name="symbol" class="hidden" type="file">
                                </label>
                            </div>

                            <div class="mt-10">
                                <input type="text" name="title" v-model="event.title" class="form-input block w-full border border-gray-800 rounded-lg bg-gray-900 focus:bg-gray-900 text-xl text-white" placeholder="Title">
                            </div>

                            <div class="mt-4">
                                <input type="text" name="period" v-model="event.period" class="form-input block w-full border border-gray-800 rounded-lg bg-gray-900 focus:bg-gray-900 text-sm text-gray-600" placeholder="Period (July 2016 - August 2019)">
                            </div>
                        </div>

                        <div class="mt-4">
                            <div>
                                <textarea name="description" v-model="event.description" rows="4" placeholder="Description" class="form-textarea block w-full border border-gray-800 rounded-lg resize-none bg-gray-900 focus:bg-gray-900 text-sm text-gray-500"></textarea>
                            </div>

                            <div class="mt-4">
                                <input type="text" name="venue" v-model="event.venue" class="form-input block w-full border border-gray-800 rounded-lg bg-gray-900 focus:bg-gray-900 text-xs text-gray-600" placeholder="Venue/From (Dialog Axiata)">
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 modal-footer justify-between">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                        <button type="submit" class="btn btn-primary">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['events', 'type', 'signedIn'],

        data() {
            return {
                event: {
                    title: null,
                    period: null,
                    description: null,
                    venue: null,
                    type: this.type,
                    symbol: null,
                }
            }
        },

        methods: {
            createEvent() {
                axios.post('/events', this.event)
                    .then(response => {
                        if (response.status === 200) {
                            this.resetForm();

                            $('#eventModal').modal('hide');

                            this.events.push(response.data.event);
                        }
                    });
            },

            resetForm() {
                this.event.title = null;
                this.event.period = null;
                this.event.description = null;
                this.event.venue = null;
                this.event.symbol = null;
            }
        }
    }
</script>
